let setting = {
    init: function() {
        setting.save();
        setting.runCommand();
        setting.runCommand();
        setting.mailType();
    },

    /* Start function save here */
    save:function(){
        $(document).on('click', '#settingSubmitBtn, #mediaSettingSubmitBtn, #mailSettingSubmitBtn, #stripeSettingSubmitBtn, #socialSettingSubmitBtn', function(e) {
            e.preventDefault();
            if ($('#media-manager-setting').hasClass('active')) {
                var frm = $('#addMediaForm');
                var btn = $('#mediaSettingSubmitBtn');
            } else if($('#mail-settings').hasClass('active')) {
                var frm = $('#mailSettingForm');
                var btn = $('#mailSettingSubmitBtn');
            } else if($('#stripe-settings').hasClass('active')) {
                var frm = $('#stripeSettingForm');
                var btn = $('#stripeSettingSubmitBtn');
            } else if($('#social-settings').hasClass('active')) {
                var frm = $('#socialSettingForm');
                var btn = $('#socialSettingSubmitBtn');
            } else {
                var frm = $('#addForm');
                var btn = $('#settingSubmitBtn');
            }
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
                            successToaster(response.message, 'Setting');
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
    /* End function save here */

    /* Start function runCommand here */
    runCommand:function(){
        $(document).on('click', '.run-command', function(e) {
            let id = $(this).attr('rel');
            let url = route('admin.setting.runCommand',{id}) ;
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        beforeSend: function() {
                            $('#background_loader').removeClass('d-none');
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire(
                                    "Action Performed!",
                                    "Run the command.",
                                    "success"
                                );
                            }
                        },
                        error: function (err) {
                            handleError(err);
                        },
                        complete: function() {
                            $('#background_loader').addClass('d-none');
                        }
                    });
                }
                if(result.isDismissed){
                    if ($(this).is(':checkbox')) {
                        $(this).prop("checked", !$(this).prop("checked"));
                    }
                }
            });
        });
    },
    /* End function runCommand here */

    /* Start function mailType here */
    mailType: function () {
        $(document).on('change', '#mail_type', function () {
            const val = $(this).val();

            switch (val) {
                case 'localhost':
                    $('#mail_host').val('localhost');
                    $('#mail_host').attr('disabled', true);
                    break;
                case 'mailpit':
                    $('#mail_host').val('mailpit');
                    $('#mail_host').attr('disabled', true);
                    break;
                case 'smtp':
                    $('#mail_host').val('');
                    $('#mail_host').attr('disabled', false);
                    $('#mail_port').val('');
                    $('#mail_username').val('');
                    $('#mail_password').val('');
                    $('#mail_from_address').val('');
                    $('#mail_from_name').val('');
                    break;
                default:
                    $('#mail_host').val('');
                    $('#mail_host').attr('disabled', false);
            }
        });
    },
    /* End function mailType here */
};

$(function() {
    setting.init();
    loadEditor('contact_address');
});
