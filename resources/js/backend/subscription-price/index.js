let subscriptionPrices = {
    init: function() {
        subscriptionPrices.list();
        subscriptionPrices.changeStatus();
        subscriptionPrices.addAndEdit();
        subscriptionPrices.saveSubscriptionPrice();
        subscriptionPrices.searchFilter();
        subscriptionPrices.resetFilter();
        subscriptionPrices.selectBoxValidation();
    },

    /* Start function SubscriptionPrice list here */
    list: function(){
        pageLoader("loaderTb");
        let subscriptionPriceTable = $('#subscription-price-table');
        NioApp.DataTable(subscriptionPriceTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "ajax": {
                url: 'subscription-price',
                type: 'GET',
                data: function (d) {
                    d.size = d.length;
                    d.sortColumn = d.columns[d.order[0]['column']]['name'];
                    d.sortDirection = d.order[0]['dir'];
                    d.page = parseInt(subscriptionPriceTable.DataTable().page.info().page) + 1;
                    d.search = subscriptionPriceTable.DataTable().search();
                    d.interval = searchInterval.value;
                    d.status = searchStatus.value;
                },
                dataSrc: function (d) {
                    d.recordsTotal = d.meta.total;
                    d.recordsFiltered = d.meta.total;
                    return d.data;
                },
                error: function (xhr, _error, _code) {
                    handleError(xhr);   
                }
            },
            "stateSave": false,
            "order": [0, "desc"],
            "columnDefs": 
            [
                {
                    "data": "id",
                    "name": "id",
                    "targets": "id",
                    "render": function (_data, _type, _full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {    
                    "data": "plan_name",
                    "name": "plan_name",
                    "targets": "plan_name",
                    'defaultContent': '--',
                },
                {
                    "data": "name",
                    "name": "name",
                    "targets": "name",
                },
                {
                    "data": "upload_limit",
                    "name": "upload_limit",
                    "targets": "upload_limit",
                },
                {
                    "data": "interval",
                    "name": "interval",
                    "targets": "interval",
                    "render": function (_data, _type, full, _meta) {
                        return `<span class="text-capitalize">${full.interval}</span>`;
                    }
                },
                {
                    "data": "amount",
                    "name": "amount",
                    "targets": "amount",
                },
                {
                    "data": "description",
                    "name": "description",
                    "targets": "description",
                    "render": function (data, _type, _full, _meta) {
                        let cleanText = data.replace(/<\/?[^>]+(>|$)/g, "");
                        if (cleanText.length > 70) {
                            data = cleanText.slice(0, 70);
                            let readMore = ` <a class="read-more" data-description="${cleanText}"><strong>Read More</strong></a>`;
                            return data + ' ... ' + readMore;
                        }
                        return data;
                    }
                },
                {
                    "data": "status",
                    "name": "status",
                    "targets": "status",
                    'orderable': false,
                    render: function (_data, _type, row, _meta) {
                        if (row.status == 'active') {
                            var activeStatus = 'checked';
                        }
                        else {
                            var activeStatus = '';
                        }
                        return `<div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input changeStatus"
                            id="customSwitch${row.id}" rel="${row.id}" data-status="${row.status}" ${activeStatus}>
                        <label class="custom-control-label"
                            for="customSwitch${row.id}"></label>
                        </div>`;
                    },
                },
            ]
        });
    },
    /* End function SubscriptionPrice list here */
    /* activate and deactivate price starts here */
    changeStatus: function () {
        $(document).on('click', '.changeStatus', function (e) {
            var status = $(this).attr("data-status");
            let id = $(this).attr('rel');
            if (status == 'active') {
                var status = 'inactive';
                var Text = 'Deactivate this subscription price?';
            }
            else {
                var status = 'active';
                var Text = 'Activate this subscription price ?';

            }
            let url = route('admin.subscription-price.changeStatus');
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: Text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Want to!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            id: id,
                            status: status,
                        },
                        success: function (response) {
                            if (response.success) {
                                successToaster(response.message, 'Subscription Prices');
                                setTimeout(function () {
                                    $('#subscription-price-table').DataTable().ajax.reload();
                                }, 10);
                            }
                        },
                        error: function (err) {
                            handleError(err);
                        },
                        complete: function () {
                            $('#background_loader').addClass('d-none');
                        }
                    });
                }
                if (result.isDismissed) {
                    $(this).prop("checked", !$(this).prop("checked"));
                }
            });
        });
    },
    /* activate and deactivate price ends here */

    /* Start function SubscriptionPrice addAndEdit here */
    addAndEdit: function(){  
        $(document).on('click', '.add-subscription-price', function () { 
            let id = $(this).attr('rel');
            let btn = $('#add-subscription-price-btn');
            let btnName = btn.text();
            let url =  (id != '' && id != undefined) ? route('admin.subscription-price.edit', {id}) : route('admin.subscription-price.create');
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    if(id == '' || id == undefined){
                        showButtonLoader(btn, btnName, true); 
                    }else{
                        $('#background_loader').removeClass('d-none');
                    }
                },
                success: function(response) {
                    $("#add-subscription-price-modal").html(response);
                    $("#add-subscription-price-modal").modal("show");
                    $(".js-select2").select2();
                    loadEditor('description-editor');
                },
                error: function(err) {
                    handleError(err);
                },
                complete: function() {
                    if(id == '' || id == undefined){
                        showButtonLoader(btn, btnName, false);
                    }else{
                        $('#background_loader').addClass('d-none');
                    }
                }
            });
        });
    },
    /* End function addAndEdit here */

    /* Start function saveSubscriptionPrice here */
    saveSubscriptionPrice:function(){
        $(document).on('click', '#subscription-price-submit-btn', function(e) {
            e.preventDefault();
            let frm = $('#subscription-price-add-form');
            let btn = $('#subscription-price-submit-btn');
            let cancelBtn = $('#subscription-price-cancel-btn');
            let btnName = btn.text();
            let url = frm.attr('action');
            let subscriptionPriceTable = $('#subscription-price-table');
        
            if (frm.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: frm.serialize(),
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                        cancelBtn.prop('disabled',true); 
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, 'Subscription Prices');
                            setTimeout(function() {
                                subscriptionPriceTable.DataTable().ajax.reload();
                                $("#add-subscription-price-modal").modal("hide");
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
    /* End function saveSubscriptionPrice here */

    /*  filter starts here */
    searchFilter: function () {
        $('#searchFilter').on('click', function (e) {
            $('#filter_badge').show();
            $('#subscription-price-table').DataTable().draw(true);
        });
    },
    /*  filter ends here */

    /* reset filter starts here */
    resetFilter: function () {
        $('#resetFilter').on('click', function (e) {
            $("#resetFormFilter").trigger("reset");
            $('#filter_badge').hide();
            $("#searchStatus").select2();
            $("#searchInterval").select2();
            $('#subscription-price-table').DataTable().draw(true);
        });
    },
    /* reset filter ends here */

    // selectBoxValidation function start
    selectBoxValidation: function () {
        $(document).on('change', '.form-select', function () {
            const id = $(this).attr('name');
        
            if ($(this).valid()) {
                $(`#${id}-error`).text('');
            } 
        });
    },
    // selectBoxValidation function end
};

$(function() {
    subscriptionPrices.init();
});

/* for readmore SubscriptionPrice description */
$(document).on('click', '.read-more', function(e) {
    e.preventDefault();
    var data = $(this).data('description');
    $('#read-more-data').text('').text(data);
    $('#read-more-modal').modal('show');
});