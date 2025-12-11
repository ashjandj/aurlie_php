const { success } = require("toastr");

let contactUs = {
    init: function () {
        contactUs.saveBtnFunction();
    },

    /* start saveBtnFunction here */
    saveBtnFunction: function () {
        $(document).on('click', '#saveBtn', function (e) {
            e.preventDefault();
            let form = $('#contactUsForm');
            let btn = $('#saveBtn');
            let btnName = btn.text();
            let url = form.attr('action');
            if (form.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(),
                    beforeSend: function () {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function (response) {
                        if (response.success) {
                            successToaster(response.message);
                            setTimeout(function () {
                                location.href = response.data.redirectionUrl;
                            }, 1000);
                        }
                    },
                    error: function (err) {
                        handleError(err);
                    },
                    complete: function () {
                        showButtonLoader(btn, btnName, false);
                    }
                });
            }
        });
    }

    /* End saveBtnFunction here */
}

$(function() {
    contactUs.init();
});
