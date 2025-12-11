var offset = 0;
var loadData = true; // check if all data is loaded
var loading = false; // track if process is already on request
let subscriptionDetail = {
    init: function () {
        subscriptionDetail.cancelSubscription();
        subscriptionDetail.scrollDetail();
    },
    /* Start fetch payment history */
    loadTransaction: function () {
        let url = $(location).attr('href');
        let pageLength = $('.page').length + 1;
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                subscriptionId: subscriptionId,
                page: pageLength
            },
            beforeSend: function () {
                pageLoader("loadDiv");
            },
            success: function (response) {
                $('.pageLoader').remove();
                if (response.data.length > 0) {
                    $('.paymentHistory').append(response.data);
                }
                else {
                    loadData = false;
                }
                loading = false;
            },
            error: function () {
                loading = false;
            }
        })

    },
    /* End fetch payment history */
    
    /* Start capture scroll event */
    scrollDetail: function () {
        $('.paymentHistory').scroll(function () {
            if (!loading && $(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                loading = true;
                if (loadData) {
                    subscriptionDetail.loadTransaction(offset);
                }
            }
        });
    },
    /* End capture scroll event*/

    /* Start cancel subscription */
        cancelSubscription: function() {
            $(document).on('click', "#cancelSubscription", function () {
                url = '/profile/subscription/cancel/' + subscriptionId
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, cancel subscription.',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: url,
                            success: function (data) {
                                Swal.fire(
                                    'Cancelled!',
                                    'Subscription cancelled.',
                                    "success"
                                )
                                setTimeout(function () {
                                    window.location.reload();
                                }, 2000);
                            },
                            error: function (err) {
                                handleError(err);
                            },
                            complete: function () { }
                        });
                    }
                });
            })
        },
        /* End cancel subscription */
}
$(function() {
    subscriptionDetail.init();
});

