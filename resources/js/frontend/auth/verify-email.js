let verification = {
    init: function () {
        verification.resendVerificationLink();
        verification.startCountdown();
    },

    resendVerificationLink: function () {
        $(document).on('click', '#resendVerificationLinkBtn', function (e) {
            e.preventDefault();
            let form = $('#resendVerificationForm');
            let btn = $(this);
            let url = form.attr('action');

            if (form.valid()) {
                enableDisableButton(btn, 'disabled');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        enableDisableButton(btn, true);
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, '');
                            $('#tempToken').val(response.data.newToken);
                            verification.startCountdown();
                        }
                    },
                    error: function(err) {
                        handleError(err);
                        enableDisableButton(btn, false);
                        $('#timerDisplay').text('');
                    }
                });
            }
        });
    },
    
    startCountdown: function () {
        let timer = 60; // Timer in seconds
        let interval = setInterval(function() {
            $('#timerDisplay').text(`Resend in  ${timer} seconds`);
            timer--;

            if (timer < 0) {
                clearInterval(interval);
                let btn = $('#resendVerificationLinkBtn');
                let btnName = $('#resendVerificationLinkBtn').text();
                showButtonLoader(btn, btnName, false);
                $('#timerDisplay').text(''); // Clear the timer display
            }
        }, 1000); // Update every second (1000 milliseconds)
    },
};

$(function () {
    verification.init();

    // disabled resend button initially
    $('#resendVerificationLinkBtn').prop('disabled', true);
});
