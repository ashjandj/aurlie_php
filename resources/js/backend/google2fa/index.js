let google2fa = {
    init: function() {
        google2fa.twoFaVerify();
        google2fa.loginSecurityOptionSave();
        google2fa.loginSecurityOptionChange();
        google2fa.enable2fa();
        google2fa.disable2fa();
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
                                window.location.href = response.redirectionUrl;
                            }, 1000);
                        }else{
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
                                $("#passwordSecurityIcon").html(`<em class="icon ni ni-shield-off text-danger" title="Password protection disabled."></em>`);
                            } else {
                                $("#passwordSecurityIcon").html(`<em class="icon ni ni-shield-check text-success" title="Password protection enabled."></em>`);
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
                    url: route('admin.2fa.generate2faSecret'),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#google2faFormSection").html('<div class="loader-overlay"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>');
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#google2faFormSection").removeClass('d-none').html(response.data);
                            //eye icon js code
                            NioApp.Passcode('.passcode-switch');
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
                            //header password protect icon change
                            $("#passwordSecurityIcon").html(`<em class="icon ni ni-shield-check text-success" title="Password protection enabled."></em>`);
                            //eye icon js code
                            NioApp.Passcode('.passcode-switch');
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

    /* Start disable2fa function here */
    disable2fa: function() {
        $(document).on('click', '#disable2faBtn', function (e) {
            e.preventDefault();
            let frm = $('#disable2fa-form');
            let btn = $('#disable2faBtn');
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
                            //reset select box
                            $('#login_security').select2('val', '0');
                            //hide div and show button
                            $("#google2faFormSection").addClass('d-none');
                            $("#loginSecurityBtnSection").html(`<button type='button' class='btn btn-primary' id='loginSecuritySubmitBtn'>Save</button>`);
                            //header password protect icon change
                            $("#passwordSecurityIcon").html(`<em class="icon ni ni-shield-off text-danger" title="Password protection disable."></em>`);
                        } else {
                            errorToaster(response.message, 'Login Security Setting');
                        }
                    }, error: function (err) {
                        handleError(err);
                    }, complete : function (){
                        showButtonLoader(btn, btnName, false);
                    }
                });
            }
        });
    },
    /* End disable2fa function here */

    /* Start function generate2faSecret here */
    generate2faSecret: function(){
        $(document).on('click', '#generate2faSecretBtn', function(e) {
            e.preventDefault();
            let btn = $('#generate2faSecretBtn');
            let btnName = btn.text();
            showButtonLoader(btn, btnName, 'disabled');
            $.ajax({
                type: 'POST',
                url: route('admin.2fa.generate2faSecret'),
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
    google2fa.init();
});