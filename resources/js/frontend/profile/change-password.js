let user = {
    init: function () {
        user.changePassword();
        user.togglePasswordOn();
        user.togglePasswordOff();
    },

    changePassword: function () {
        $(document).on('click', '#changePasswordBtn', function (e) {
            e.preventDefault();    
            var frm     = $('#changePasswordForm');
            var action  = frm.attr('action');
            var type    = frm.attr('method');
            var btn = $('#changePasswordBtn');
            if(frm.valid())
            {
            var showLoader = 'Processing...';
            showButtonLoader(btn, showLoader, 'disabled');
                $.ajax({
                    url: action,
                    type: type,
                    data: frm.serialize(),
                    success: function(data) {
                    successToaster(data.message);
                        setTimeout(function() {
                        location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {
                        errorToaster(xhr.responseJSON.message);
                    },
                });
            }
        });
    },

    togglePasswordOn: function () {
        $(document).on('click', '.ni-eye-fill', function () {
            let target = $(this).data('target');
    
            $(this).removeClass('ni-eye-fill');
            $(this).addClass('ni-eye-off-fill');
    
            $(`#${target}`).attr('type', 'text');
        });
    },

    togglePasswordOff: function () {
        $(document).on('click', '.ni-eye-off-fill', function () {
            let target = $(this).data('target');
    
            $(this).removeClass('ni-eye-off-fill');
            $(this).addClass('ni-eye-fill');
    
            $(`#${target}`).attr('type', 'password');
        });
    },
}

$(function () {
    user.init();

});
