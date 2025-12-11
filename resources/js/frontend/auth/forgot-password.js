let password = {
    init: function () {
        password.sendResetPasswordLink();
        password.resetPassword();
    },

    sendResetPasswordLink: function () {
        $(document).on('click', '#forgotPasswordBtn', function(e) {
            e.preventDefault();
            let form = $('#forgotPasswordForm');
            let btn = $(this);
            let btnName = btn.text();
            let url = form.attr('action');
        
            if (form.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, '');
                            setTimeout(function() {
                                window.location.href = response.data.redirectUrl;
                            }, 1000);
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

    resetPassword: function () {
        $(document).on('click', '#resetPasswordBtn', function (e) {
            e.preventDefault();
            let form = $('#resetPasswordForm');
            let btn = $(this);
            let btnName = btn.text();
            let url = form.attr('action');
        
            if (form.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'PUT',
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, '');
                            setTimeout(function() {
                                window.location.href = response.data.redirectUrl;
                            }, 1000);
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
};

$(function () {
    password.init();
});
