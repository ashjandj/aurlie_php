let login = {
    init: function () {
        login.startLoginProcess();
    },

    startLoginProcess: function () {
        $(document).on('click', '#loginBtn', function(e) {
            e.preventDefault();
            let form = $('#loginForm');
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
                        // Clear previous inline error, if any
                        $('#loginError').remove();
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, '');
                            setTimeout(function() {
                                window.location.href = response.redirectUrl;
                            }, 1000);
                        }
                    },
                    error: function(err) {
                        // Fallback: show inline error message on the form
                        let message =
                            (err &&
                                err.responseJSON &&
                                err.responseJSON.message) ||
                            'Invalid login details. Please try again.';

                        if (!$('#loginError').length) {
                            $('<div id="loginError" class="mb-4 rounded-md bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-800"></div>')
                                .insertBefore(form.find('div').first());
                        }

                        $('#loginError').text(message);

                        // Keep existing global error handling (toastr, etc.) if configured
                        if (typeof handleError === 'function') {
                            handleError(err);
                        }
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
    login.init();
});
