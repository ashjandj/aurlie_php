let roles = {
    init: function () {
        roles.list();
        roles.changeStatus();
        roles.deleteRole();
    },

    /* Start function roles list here */
    list: function () {
        pageLoader("loaderTb");
        let roleListTable = $('#role-list-table');
        NioApp.DataTable(roleListTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "ajax": {
                url: 'roles',
                type: 'GET',
                data: function (table) {
                    table.size = table.length;
                    table.sortColumn = table.columns[table.order[0]['column']]['name'];
                    table.sortDirection = table.order[0]['dir'];
                    table.page = parseInt(roleListTable.DataTable().page.info().page) + 1;
                    table.search = roleListTable.DataTable().search();
                    table.name = $("#searchName").val();
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
                    // {
                    //     "data": "status",
                    //     "name": "status",
                    //     "targets": "status",
                    //     'orderable': false,
                    //     render: function (_data, _type, row, _meta) {
                    //         if (row.status == '1') {
                    //             var activeStatus = 'checked';
                    //         }
                    //         else {
                    //             var activeStatus = '';
                    //         }
                    //         return `<div class="custom-control custom-switch">
                    //         <input type="checkbox" class="custom-control-input changeStatus"
                    //             id="customSwitch${row.id}" rel="${row.id}" data-status="${row.status}" ${activeStatus}>
                    //         <label class="custom-control-label"
                    //             for="customSwitch${row.id}"></label>
                    //         </div>`;
                    //     },
                    // },
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
                                                <ul class="link-list-opt no-bdr p-0">`;

                            if (full.canEdit) {
                                let editRoute = route('admin.roles.edit', {role: full.id});
                                actionHtml += `<li>
                                                    <a href="${editRoute}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                </li>`;
                            }

                            // if (full.canDelete) {
                            //     actionHtml += `<li>
                            //                         <a class="deleteRole" rel="${full.id}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                            //                     </li>`;
                            // }
                                                
                            actionHtml +=       `</ul>
                                            </div>
                                        </div>
                                    </td>`;

                            return actionHtml;
                        }
                    }
                ]
        });
    },

    changeStatus: function () {
        $(document).on('click', '.changeStatus', function () {
            var status = $(this).attr("data-status");
            let role = $(this).attr('rel');
            if (status == 1) {
                var status = 0;
                var Text = 'Deactivate this Role?';
            }
            else {
                var status = 1;
                var Text = 'Activate this Role?';
            }
            let url = route('admin.roles.changeStatus', {role});
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: Text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Want  to !'
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
                                successToaster(response.message, 'Role Management');
                                setTimeout(function () {
                                    $('#role-list-table').DataTable().ajax.reload();
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

    deleteRole: function () {
        $(document).on('click', '.deleteRole', function(e) {
            let id = $(this).attr('rel');
            let url = route('admin.roles.destroy',{id}) ;
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
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
                                    'Role has been deleted!',
                                    "success"
                                )
                                setTimeout(function () {
                                    $('#role-list-table').DataTable().ajax.reload();
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
};

$(function () {
    roles.init();
});
