const otp = {
    init: function () {
        otp.initSignIn();
        otp.resendOtp();
    },

    /* Begin initSignIn function */
    initSignIn: function () {
        $(document).on('click', '#signInBtn', function (e) {
            e.preventDefault();
            var form = $('#frontend-otp-login-form');
            var otp = $(".otp-input").map(function() {
                return $(this).val();
            }).get().join("");
            
            if(form.valid()) { 
                elementEnableDisabled('#signInBtn',true);
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
                        }else{
                            errorToaster(response.message, 'Login');
                        }
                    }, 
                    error: function (err) {
                        // reset otp inputs
                        resetOtpBoxes($('#otp'));
                        handleError(err);
                    }, complete : function (){
                        elementEnableDisabled('#signInBtn',false);
                    }
                });
            }
        });
    },
    /* End initSignIn function */

    /* Begin resendOtp function */
    resendOtp: function () {
        $(document).on('click', "#resentBtn", function(e){
            e.preventDefault();
            let url = $(this).data('href');
            elementEnableDisabled('#resentBtn',true);
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response)
                {
                    if(response.success){
                        successToaster(response.message);
                    }else{
                        errorToaster(response.message, 'OTP');
                    }
                }, error: function (err) {
                    handleError(err);
                }, complete : function (){
                    elementEnableDisabled('#resentBtn',false);
                }
            });
        });
    },
    /* End resendOtp function */
};

$(function () {
    otp.init();

    // focus on first box
    $(".otp-field > input").eq(0).focus();

    pasteOtp($('#otp'));
    otpInput($('#signInBtn'), $('#otp'));
});