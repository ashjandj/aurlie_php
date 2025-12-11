let roles = {
    init: function () {
        roles.checkboxCheck($('input[value="admin.roles.index"]'), 'roles');
        roles.checkboxCheck($('input[value="admin.faq.index"]'), 'faq');
        roles.checkboxCheck($('input[value="admin.subscription-plan.index"]'), 'subscription-plan');
        roles.checkboxCheck($('input[value="admin.users.index"]'), 'users');
        roles.checkboxCheck($('input[value="admin.subscription-price.index"]'), 'subscription-price');
        roles.checkboxCheck($('input[value="admin.activity.index"]'), 'activity');
        roles.checkboxMediaCheck($('input[value="admin.media.view"]'), 'media');
        roles.checkboxContactCheck($('input[value="admin.contactUs"]'), 'contactUs');

        roles.saveRole();
        roles.roleManagementCheckbox();
        roles.faqManagementCheckbox();
        roles.subscriptionManagementCheckbox();
        roles.subscriptionPriceManagementCheckbox();
        roles.userManagementCheckbox();
        roles.activityManagementCheckbox();
        roles.mediaManagementCheckbox();
        roles.contactUsCheckbox();
    },

    saveRole: function () {
        $(document).on('click', '#roleSubmitBtn', function(e) {
            e.preventDefault();
            let form = $('#roleAddEditForm');
            let btn = $(this);
            let cancelBtn = $('#roleCancelBtn');
            let btnName = btn.text();
            let url = form.attr('action');
            let rolesTable = $('#role-list-table');
        
            if (form.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                        cancelBtn.prop('disabled',true); 
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, 'Role Management');
                            setTimeout(function() {
                                window.location.href = route('admin.roles.index');
                            }, 1000);
                        }
                    },
                    error: function(err) {
                        handleError(err);
                    },
                    complete: function() {
                        showButtonLoader(btn, btnName, false);
                        cancelBtn.prop('disabled',false);
                    }
                });
            }
        });
    },

    roleManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.roles.index"]', function () {
            roles.checkboxCheck($(this), 'roles');
        });
    },

    faqManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.faq.index"]', function () {
            roles.checkboxCheck($(this), 'faq');
        });
    },

    subscriptionManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.subscription-plan.index"]', function () {
            roles.checkboxCheck($(this), 'subscription-plan');
        });
    },

    subscriptionPriceManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.subscription-price.index"]', function () {
            roles.checkboxCheck($(this), 'subscription-price');
        });
    },

    userManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.users.index"]', function () {
            roles.checkboxCheck($(this), 'users');
        });
    },

    activityManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.activity.index"]', function () {
            roles.checkboxCheck($(this), 'activity');
        });
    },

    mediaManagementCheckbox: function () {
        $(document).on('change', 'input[value="admin.media.view"]', function () {
            roles.checkboxMediaCheck($(this), 'media');
        });
    },

    contactUsCheckbox: function () {
        $(document).on('change', 'input[value="admin.contactUs"]', function () {
            roles.checkboxContactCheck($(this), 'contactUs');
        });
    },

    checkboxCheck: function (checkbox, module) {
        if (checkbox.is(':checked')) {
            $(`input[value="admin.${module}.create"]`).prop('disabled', false);
            $(`input[value="admin.${module}.show"]`).prop('disabled', false);
            $(`input[value="admin.${module}.edit"]`).prop('disabled', false);
            $(`input[value="admin.${module}.destroy"]`).prop('disabled', false);
            $(`input[value="admin.${module}.changeStatus"]`).prop('disabled', false);
        } else {
            $(`input[value="admin.${module}.create"]`).prop('disabled', true);
            $(`input[value="admin.${module}.show"]`).prop('disabled', true);
            $(`input[value="admin.${module}.edit"]`).prop('disabled', true);
            $(`input[value="admin.${module}.destroy"]`).prop('disabled', true);
            $(`input[value="admin.${module}.changeStatus"]`).prop('disabled', true);

            $(`input[value="admin.${module}.create"]`).prop('checked', false);
            $(`input[value="admin.${module}.show"]`).prop('checked', false);
            $(`input[value="admin.${module}.edit"]`).prop('checked', false);
            $(`input[value="admin.${module}.destroy"]`).prop('checked', false);
            $(`input[value="admin.${module}.changeStatus"]`).prop('checked', false);
        }
    },

    checkboxMediaCheck: function (checkbox, module) {
        if (checkbox.is(':checked')) {
            $(`input[value="admin.${module}.store"]`).prop('disabled', false);
            $(`input[value="admin.${module}.download"]`).prop('disabled', false);
            $(`input[value="admin.${module}.delete"]`).prop('disabled', false);
        } else {
            $(`input[value="admin.${module}.store"]`).prop('disabled', true);
            $(`input[value="admin.${module}.download"]`).prop('disabled', true);
            $(`input[value="admin.${module}.delete"]`).prop('disabled', true);

            $(`input[value="admin.${module}.store"]`).prop('checked', false);
            $(`input[value="admin.${module}.download"]`).prop('checked', false);
            $(`input[value="admin.${module}.delete"]`).prop('checked', false);
        }
    },

    checkboxContactCheck: function (checkbox, module) {
        if (checkbox.is(':checked')) {
            $(`input[value="admin.${module}.destroy"]`).prop('disabled', false);
            $(`input[value="admin.${module}.sendReplyMessage"]`).prop('disabled', false);
        } else {
            $(`input[value="admin.${module}.destroy"]`).prop('disabled', true);
            $(`input[value="admin.${module}.sendReplyMessage"]`).prop('disabled', true);

            $(`input[value="admin.${module}.destroy"]`).prop('checked', false);
            $(`input[value="admin.${module}.sendReplyMessage"]`).prop('checked', false);
        }
    },
};

$(function () {
    roles.init();
});
