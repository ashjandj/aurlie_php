const userListTable = $('#user-list-table');
let users = {
    init: function () {

        users.list();
        users.addUser();
        users.editUser();
        users.saveUser();
        users.updateUser();
        users.changeStatus();
        users.deleteUser();
        users.changeCountry();
        users.changeState();
        users.updateCountry();
        users.updateState();
        users.searchFilter();
        users.resetFilter();
        users.exportCsv();
        users.updateCountryCode();
        users.selectBoxValidation();
    },

    /* Start function users list here */
    list: function () {
        pageLoader("loaderTb");
        NioApp.DataTable(userListTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "ajax": {
                url: 'users',
                type: 'GET',
                beforeSend: function() {
                    pageLoader("loaderTb");
                },
                data: function (table) {
                    table.size = table.length;
                    table.sortColumn = table.columns[table.order[0]['column']]['name'];
                    table.sortDirection = table.order[0]['dir'];
                    table.page = parseInt(userListTable.DataTable().page.info().page) + 1;
                    table.search = userListTable.DataTable().search();
                    table.name = $("#userName").val();
                    table.email = $('#userEmail').val();
                    table.status = $('#searchStatus').val();
                },
                dataSrc: function (table) {
                    table.recordsTotal = table.meta.total;
                    table.recordsFiltered = table.meta.total;
                    return table.data;
                },

            },

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
                        "data": "name",
                        "name": "name",
                        "targets": "name",
                        "render": function (_data, _type, _full, meta) {
                            return `
                            <div class="user-card">
                                <div class="user-avatar bg-transparent">
                                    <img src="${_full.profile_image}" alt="user-img">
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">${_full.name}</span>
                                    <span>${_full.email}</span>
                                </div>
                            </div>`;
                        }
                    },
                    {
                        "data": "login_type",
                        "name": "login_type",
                        "targets": "login_type",
                    },
                    {
                        "data": "phone_number",
                        "name": "phone_number",
                        "targets": "phone_number",
                    },
                    {
                        "data": "country",
                        "name": "country",
                        "targets": "country",
                    },
                    {
                        "data": "state",
                        "name": "state",
                        "targets": "state",
                    },
                    {
                        "data": "city",
                        "name": "city",
                        "targets": "city",
                    },
                    {
                        "data": "created_by",
                        "name": "created_by",
                        "targets": "created_by",
                    },
                    {
                        "data": "updated_by",
                        "name": "updated_by",
                        "targets": "updated_by",
                    },
                    {
                        "data": "created_at",
                        "name": "created_at",
                        "targets": "created_at",
                    },
                    {
                        "data": "is_profile_completed",
                        "name": "is_profile_completed",
                        "targets": "is_profile_completed",
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
                            actionHtml =  `<td class="nk-tb-col nk-tb-col-tools">
                                        <div class="drodown">
                                            <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr p-0">
                                                <li>
                                                    <a href="${route('admin.user.details', full.id)}"><em class="icon ni ni-eye"></em><span>View</span></a>
                                                </li>`;

                            // Edit option commented out
                            // if (full.canEdit) {
                            //     actionHtml += `<li>
                            //                         <a class="editUserBtn" rel="${full.id}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                            //                     </li>`;
                            // }

                            if (full.canDelete) {
                                actionHtml += `<li>
                                                    <a class="deleteUser" rel="${full.id}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                </li>`;
                            }
                                                
                            actionHtml +=       `
                                             </ul>
                                            </div>
                                        </div>
                                    </td>`;

                            return actionHtml;
                        }
                    }
                ]
        });
    },

    addUser: function () {
        $(document).on('click', '.addUserBtn', function () { 
            let btn = $(this);
            let btnName = btn.text();
            let url =  route('admin.users.create');
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    showButtonLoader(btn, btnName, true); 
                },
                success: function(response) {
                    if(response.success){
                        $("#addUserModal").html(response.data.html);
                        $(".js-select2-add").select2();
                        $("#countries").select2({
                            templateResult: function(item) {
                            return format(item, false);
                            },
                            templateSelection: function(item) {
                            return format(item, true);
                            }
                        });
                        $("#addUserModal").modal("show");
                    }
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

    editUser: function () {
        $(document).on('click', '.editUserBtn', function () { 
            $("#editUserModal").modal("show");
            let id = $(this).attr('rel');
            let url =  route('admin.users.edit', {id});
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    $('#editUserForm').html(`
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                    `);
                },
                success: function(response) {
                    if(response.success){
                        $("#editUserForm").html(response.data.html);
                        $(".js-select2").select2();
                        $("#editCountries").select2({
                            templateResult: function(item) {
                            return format(item, false);
                            },
                            templateSelection: function(item) {
                            return format(item, true);
                            }
                        });
                    }
                },
                error: function(err) {
                    handleError(err);
                },
            });
        });
    },

    saveUser: function () {
        $(document).on('click', '#saveBtn', function(e) {
            e.preventDefault();
            let form = $('#saveForm');
            let btn = $(this);
            let cancelBtn = $('#saveCancelBtn');
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
                        cancelBtn.prop('disabled',true); 
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, 'User Management');
                            setTimeout(function() {
                                $('#user-list-table').DataTable().draw(true);
                                $("#addUserModal").modal("hide");
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

    updateUser: function () {
        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();
            let form = $('#updateForm');
            let btn = $(this);
            let cancelBtn = $('#updateCancelBtn');
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
                        cancelBtn.prop('disabled',true); 
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, 'User Management');
                            setTimeout(function() {
                                $('#user-list-table').DataTable().draw(true);
                                $("#editUserModal").modal("hide");
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

    changeStatus: function () {
        $(document).on('click', '.changeStatus', function () {
            var status = $(this).attr("data-status");
            let user = $(this).attr('rel');
            if (status == 'active') {
                var status = 0;
                var Text = 'Deactivate this User ?';
            }
            else {
                var status = 'inactive';
                var Text = 'Activate this User ?';
            }
            let url = route('admin.users.changeStatus', {user});
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
                        type: 'PUT',
                        url: url,
                        data: {
                            status: status,
                        },
                        success: function (response) {
                            if (response.success) {
                                successToaster(response.message, 'User Management');
                                setTimeout(function () {
                                    userListTable.DataTable().ajax.reload();
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
                if(result.isDismissed){
                    $(this).prop("checked", !$(this).prop("checked"));
                }
            });
        });
    },

    deleteUser: function () {
        $(document).on('click', '.deleteUser', function(e) {
            let id = $(this).attr('rel');
            let url = route('admin.users.destroy',{id}) ;
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete user!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        beforeSend: function() {
                            $('#background_loader').removeClass('d-none'); 
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'User has been deleted!',
                                    "success"
                                )
                                setTimeout(function () {
                                    userListTable.DataTable().ajax.reload();
                                }, 1000);
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
            });
        });
    },

    changeCountry: function () {
        $(document).on('change', '#countryId', function () {
            let countryId = $(this).val();
            stateContainer = $('#stateId');
            cityContainer = $('#cityId');
            if (countryId) {
                setStatebyCountryId(countryId, stateContainer, cityContainer);
            }
        });   
    },

    changeState: function () {
        $(document).on('change', '#stateId', function () {
            let stateId = $(this).val();
            cityContainer = $('#cityId');
            setCitybyStateId(stateId, cityContainer);
        });   
    },

    updateCountry: function () {
        $(document).on('change', '#updateCountryId', function () {
            let updateCountryId = $(this).val();
            stateContainer = $('#updateStateId');
            cityContainer = $('#updateCityId');
            if (updateCountryId) {
                setStatebyCountryId(updateCountryId, stateContainer, cityContainer);
            }
        });   
    },

    updateState: function () {
        $(document).on('change', '#updateStateId', function () {
            let udpateStateid = $(this).val();
            cityContainer = $('#updateCityId');
            setCitybyStateId(udpateStateid, cityContainer);
        });
    },

    searchFilter: function () {
        $('#searchFilter').on('click', function (e) {
            $('#filter_badge').show();
            $('#user-list-table').DataTable().draw(true);
        });
    },

    resetFilter: function () {
        $('#resetFilter').on('click', function (e) {
            $("#resetFormFilter").trigger("reset");
            $("#searchStatus").select2();
            $('#filter_badge').hide();
            $('#user-list-table').DataTable().draw(true);
        });
    },

    exportCsv: function () {
        $(document).on('click', '.exportCsv', function () {
            var searchStatus = $('#searchStatus').val();
            var email = $('#userEmail').val();
            var search = $('input[type="search"]').val();

            var searchByRecord = `?status=${searchStatus}&email=${email}&search=${search}`;
            var url = route('admin.users.export-csv');
            $(this).attr("href", url + searchByRecord);
        });
    },

    updateCountryCode: function () {
        $(document).on('change', '.select-country', function () {
            const selectedOption = $(this).find('option:selected');
            const code = selectedOption.data('code');
            
            $(`#country_code`).val(code);
        });
    },

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

$(function () {
    users.init();

    // password toggle
    togglePasswordOn();
    togglePasswordOff();
});
