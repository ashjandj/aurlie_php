let google2fa = {
    init: function() {
        google2fa.twoFaVerify();
        google2fa.loginSecurityOptionSave();
        google2fa.loginSecurityOptionChange();
        google2fa.enable2fa();
        google2fa.generate2faSecret();
    },
    /* Start twoFaVerify function here */
    twoFaVerify: function() {
        $(document).on('click', '#2faVerifyBtn', function (e) {
            e.preventDefault();
            var form = $('#2faVerify-form')
            if(form.valid()) { 
                elementEnableDisabled('#2faVerifyBtn',true);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function (response)
                    {
                        if(response.success){
                            successToaster(response.message);
                            setTimeout(function () {
                                window.location.href = response.redirectUrl;
                            }, 1000);
                        } else {
                            // reset otp inputs
                            resetOtpBoxes($('#one_time_password'));
                            errorToaster(response.message, '2 Factor Authentication');
                        }
                    }, error: function (err) {
                        handleError(err);
                    }, complete : function (){
                        elementEnableDisabled('#2faVerifyBtn',false);
                    }
                });
            }
        });
    },
    /* End twoFaVerify function here */

    /* Start function loginSecurityOptionSave here */
    loginSecurityOptionSave: function(){
        $(document).on('click', '#loginSecuritySubmitBtn', function(e) {
            e.preventDefault();
            let frm = $('#loginSecurityForm');
            let btn = $('#loginSecuritySubmitBtn');
            let btnName = btn.text();
            let url = frm.attr('action');
            // only for one time otp security update

            if (frm.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                var formData = new FormData(frm[0]);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, 'Login Security Setting');

                            //header password protect icon change
                            if (response.data.login_security==0) {
                                $("#passwordSecurityIcon").html(`<em class="icon ni ni-shield-off text-danger" title="Password protection disable!"></em>`);
                            } else {
                                $("#passwordSecurityIcon").html(`<em class="icon ni ni-shield-check text-success" title="Password protection enabled!"></em>`);
                            }

                            // redirect to home if it is initial OTP option setup
                            if ($('#isInitital').val() == 1) {
                                setTimeout(function () {
                                    window.location.href = route('frontend.home');
                                }, 1000);
                            }
                        }
                    },
                    error: function(err) {
                        handleError(err);
                    },
                    complete: function() {
                        showButtonLoader(btn, btnName, false);
                    }
                });
            }
        });
    },
    /* End function loginSecurityOptionSave here */

    /* Start function loginSecurityOptionChange here */
    loginSecurityOptionChange: function(){
        $(document).on('change', '#login_security', function(e) {
            e.preventDefault();
            
            if ($(this).val()==2) { //TOTP (Google 2FA)
                $("#loginSecuritySubmitBtn").remove();
                
                $("#google2faFormSection").removeClass('d-none');
                $.ajax({
                    type: 'POST',
                    url: route('frontend.2fa.generate2faSecret'),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#google2faFormSection").html('<div class="loader-overlay"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>');
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#google2faFormSection").removeClass('d-none').html(response.data);
                        }
                    },
                    error: function(err) {
                        handleError(err);
                    }
                });
            } else {
                $("#google2faFormSection").addClass('d-none');
                $("#loginSecurityBtnSection").html(`<button type='button' class='btn btn-primary' id='loginSecuritySubmitBtn'>Save</button>`);
            }
        });
    },
    /* End function loginSecurityOptionChange here */
    
    /* Start enable2fa function here */
    enable2fa: function() {
        $(document).on('click', '#enable2faBtn', function (e) {
            e.preventDefault();
            let frm = $('#enable2fa-form');
            let btn = $('#enable2faBtn');
            let btnName = btn.text();
            let url = frm.attr('action');
            if (frm.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                var formData = new FormData(frm[0]);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function (response) {
                        if (response.success) {
                            successToaster(response.message, 'Login Security Setting');
                            $("#google2faFormSection").removeClass('d-none').html(response.data);
                            
                            // redirect to home if it is initial OTP option setup
                            if ($('#isInitital').val() == 1) {
                                setTimeout(function () {
                                    window.location.href = route('frontend.home');
                                }, 1000);
                            }
                        } else {
                            errorToaster(response.message, 'Login Security Setting');
                        }
                    }, error: function (err) {
                        handleError(err);
                    },
                    complete: function() {
                        showButtonLoader(btn, btnName, false);
                    }
                });
            }
        });
    },
    /* End enable2fa function here */

    /* Start function generate2faSecret here */
    generate2faSecret: function(){
        $(document).on('click', '#generate2faSecretBtn', function(e) {
            e.preventDefault();
            let btn = $('#generate2faSecretBtn');
            let btnName = btn.text();
            showButtonLoader(btn, btnName, 'disabled');
            $.ajax({
                type: 'POST',
                url: route('frontend.2fa.generate2faSecret'),
                data: {'generateSecretKey': true},
                beforeSend: function() {
                    showButtonLoader(btn, btnName, true);
                },
                success: function(response) {
                    if (response.success) {
                        successToaster(response.message, 'Login Security Setting');
                        $("#google2faFormSection").html(response.data);
                    } else {
                        errorToaster(response.message, 'Login Security Setting');
                    }
                },
                error: function(err) {
                    handleError(err);
                }, 
                complete : function () {
                    showButtonLoader(btn, btnName, false);
                }
            });
        });
    },
    /* End function generate2faSecret here */
};

$(function() {
    $(".js-select2").select2();
    google2fa.init();

    // focus on first box
    $(".otp-field > input").eq(0).focus();

    pasteOtp($('#one_time_password'));
    otpInput($('#2faVerifyBtn'), $('#one_time_password'));
});