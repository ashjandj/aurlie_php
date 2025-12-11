let subscriptionPlans = {
    init: function() {
        subscriptionPlans.list();
        subscriptionPlans.changeStatus();
        subscriptionPlans.add();
        subscriptionPlans.edit();
        subscriptionPlans.saveSubscriptionPlan();
        subscriptionPlans.updateSubscriptionPlan();
        subscriptionPlans.searchFilter();
        subscriptionPlans.resetFilter();
        subscriptionPlans.readMore();
    },

    /* Start function SubscriptionPlan list here */
    list: function(){
        pageLoader("loaderTb");
        let subscriptionPlanTable = $('#subscription-plan-table');
        NioApp.DataTable(subscriptionPlanTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "ajax": {
                url: 'subscription-plan',
                type: 'GET',
                data: function (d) {
                    d.size = d.length;
                    d.sortColumn = d.columns[d.order[0]['column']]['name'];
                    d.sortDirection = d.order[0]['dir'];
                    d.page = parseInt(subscriptionPlanTable.DataTable().page.info().page) + 1;
                    d.search = subscriptionPlanTable.DataTable().search();
                    d.name = searchName.value;
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
                    "data": "upload_limit",
                    "name": "upload_limit",
                    "targets": "upload_limit",
                },
                {
                    "data": "name",
                    "name": "name",
                    "targets": "name",
                    "render": function (_data, _type, full, _meta) {
                        return `<span class="text-capitalize">${full.name}</span>`;
                    }
                },
                {
                    "data": "description",
                    "name": "description",
                    "targets": "description",
                    "render": function (data, _type, _full, _meta) {
                        let cleanText = data.replace(/<\/?[^>]+(>|$)/g, "");
                        if (cleanText.length > 70) {
                            data = cleanText.slice(0, 70);
                            let readMore = ` <a class="read-more" data-id="${_full.id}"><strong>Read More</strong></a>`;
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
                {
                    "data": "id",
                    "targets": "actions",
                    'orderable': false,
                    "render": function (_data, _type, full, _meta) {
                        actionHtml = `<td class="nk-tb-col nk-tb-col-tools">
                            <div class="drodown">
                                <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr p-0">`;

                                    if (full.canEdit) {
                                        actionHtml += `<li>
                                                            <a class="edit-subscription-plan" rel="${full.id}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        </li>`;
                                    }
                                        
                                    actionHtml += `</ul>
                                </div>
                            </div>
                        </td>`;

                        return actionHtml;
                    }
                }
            ]
        });
    },
    /* End function SubscriptionPlan list here */
    /* activate and deactivate plan starts here */
    changeStatus: function () {
        $(document).on('click', '.changeStatus', function (e) {
            var status = $(this).attr("data-status");
            let id = $(this).attr('rel');
            if (status == 'active') {
                var status = 'inactive';
                var Text = 'Deactivate this subscription plan ?';
            }
            else {
                var status = 'active';
                var Text = 'Activate this subscription plan ?';
            }
            let url = route('admin.subscription-plan.changeStatus');
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
                                successToaster(response.message, 'Subscription Plans');
                                setTimeout(function () {
                                    $('#subscription-plan-table').DataTable().ajax.reload();
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
    /* activate and deactivate plan ends here */

    /* Start function SubscriptionPlan add here */
    add: function(){  
        $(document).on('click', '.add-subscription-plan', function () { 
            let btn = $('#add-subscription-plan-btn');
            let btnName = btn.text();
            let url =  route('admin.subscription-plan.create');
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    showButtonLoader(btn, btnName, true); 
                },
                success: function(response) {
                    $("#add-subscription-plan-modal").html(response);
                    $("#add-subscription-plan-modal").modal("show");
                    loadEditor('description-editor');
                },
                error: function(err) {
                    handleError(err);
                },
                complete: function() {
                    showButtonLoader(btn, btnName, false);
                }
            });
        });
    },
    /* End function add here */

    /* Start function edit add here */
    edit: function(){  
        $(document).on('click', '.edit-subscription-plan', function () { 
            $('#editSubscriptionPlanModal').modal("show");
            let id = $(this).attr('rel');
            let url =  route('admin.subscription-plan.edit', {id});
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    $('#editSubscriptionPlanForm').html(`
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                    `);
                },
                success: function(response) {
                    $("#editSubscriptionPlanForm").html(response);
                    loadEditor('description-editor');
                },
                error: function(err) {
                    handleError(err);
                },
            });
        });
    },
    /* Start function edit add here */

    /* Start function saveSubscriptionPlan here */
    saveSubscriptionPlan:function(){
        $(document).on('click', '#saveBtn', function(e) {
            e.preventDefault();
            let frm = $('#saveForm');
            let btn = $(this);
            let cancelBtn = $('#saveCancelBtn');
            let btnName = btn.text();
            let url = frm.attr('action');
            let subscriptionPlanTable = $('#subscription-plan-table');
        
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
                            successToaster(response.message, 'Subscription Plans');
                            setTimeout(function() {
                                subscriptionPlanTable.DataTable().ajax.reload();
                                $("#add-subscription-plan-modal").modal("hide");
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
    /* End function saveSubscriptionPlan here */

    /* Start function updateSubscriptionPlan here */
    updateSubscriptionPlan: function () {
        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();
            let frm = $('#updateForm');
            let btn = $(this);
            let cancelBtn = $('#updateCancelBtn');
            let btnName = btn.text();
            let url = frm.attr('action');
            let subscriptionPlanTable = $('#subscription-plan-table');
        
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
                            successToaster(response.message, 'Subscription Plans');
                            setTimeout(function() {
                                subscriptionPlanTable.DataTable().ajax.reload();
                                $('#editSubscriptionPlanModal').modal("hide");
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
    /* End function updateSubscriptionPlan here */

    /*  filter starts here */
    searchFilter: function () {
        $('#searchFilter').on('click', function (e) {
            $('#filter_badge').show();
            $('#subscription-plan-table').DataTable().draw(true);
        });
    },
    /*  filter ends here */

    /* reset filter starts here */
    resetFilter: function () {
        $('#resetFilter').on('click', function (e) {
            $("#resetFormFilter").trigger("reset");
            $('#filter_badge').hide();
            $("#searchStatus").select2();
            $('#subscription-plan-table').DataTable().draw(true);
        });
    },
    /* reset filter ends here */

    /* readMore function starts here */
    readMore: function () {
        $(document).on('click', '.read-more', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $('#read-more-modal').modal("show");
        
            $.ajax({
                type: 'GET',
                url: route('admin.subscription-plan.description', {id: id}),
                beforeSend: function () {
                    $('#read-more-data').html(`
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                    `);
                },
                success: function (response) {
                    $('#read-more-data').html(response.data.htmlContent);
                },
                error: function (err) {
                    handleError(err);
                },
            });    
        });
    },
    /* readMore function ends here */
};

$(function() {
    subscriptionPlans.init();
});