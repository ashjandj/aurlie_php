let activity = {
    init: function () {
        activity.list();
        activity.deleteActivity();
        activity.viewMoreDescription();
        activity.exportCsv();
    },

    /* Start function activity's list here */
    list: function () {
        pageLoader("loaderTb");
        let activityTable = $('#activity_table');
        let url = route('admin.activity.index');
        NioApp.DataTable(activityTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "ajax": {
                url: url,
                type: 'GET',
                data: function (d) {
                    d.size = d.length;
                    d.sortColumn = d.columns[d.order[0]['column']]['name'];
                    d.sortDirection = d.order[0]['dir'];
                    d.page = parseInt(activityTable.DataTable().page.info().page) + 1;
                    d.search = activityTable.DataTable().search();
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
                        "data": "log_name",
                        "name": "log_name",
                        "targets": "log_name",
                    },
                    {
                        "data": "event",
                        "name": "event",
                        "targets": "event"
                    },
                    {
                        "data": "causer",
                        "name": "causer",
                        "targets": "causer"
                    },
                    {
                        "data": "description",
                        "name": "description",
                        "targets": "description",
                        "render": function (data, _type, _full, _meta) {
                            let cleanText = data.replace(/<\/?[^>]+(>|$)/g, "");
                            if (cleanText.length > 70) {
                                data = cleanText.slice(0, 70);
                                let readMore = ` <a class="read-more-activity" data-description="${cleanText}"><strong>Read More</strong></a>`;
                                return data + ' ... ' + readMore;
                            }
                            return data;
                        }
                    },
                    {
                        "data": "date",
                        "name": "date",
                        "targets": "date"
                    },
                    {
                        "data": "id",
                        "targets": "actions",
                        'orderable': false,
                        "render": function (_data, _type, full, _meta) {
                            if (full.canDelete) {
                                return `<td class="nk-tb-col nk-tb-col-tools">
                                <div class="drodown">
                                    <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-more-h"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr p-0">
                                            <li>
                                                <a class="deleteActivity" rel="${full.id}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>`;
                            }
                        }
                    }
                ]
        });
    },
    /* End function activity's list here */
    /* Start function deleteActivity here */
    deleteActivity: function () {
        $(document).on('click', '.deleteActivity', function (e) {
            let id = $(this).attr('rel');
            let url = route('admin.activity.destroy', { id });
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
                        type: "Delete",
                        url: url,
                        beforeSend: function () {
                            $('#background_loader').removeClass('d-none');
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Activity has been deleted!',
                                    "success"
                                )
                                setTimeout(function () {
                                    $('#activity_table').DataTable().ajax.reload();
                                }, 1000);
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
            });
        });
    },
    /* End function deleteActivity here */

    /* start function readmore activity descripton */
    viewMoreDescription: function () {
        $(document).on('click', '.read-more-activity', function (e) {
            e.preventDefault();
            var data = $(this).data('description');
            $('#read-more-activity').html('').html(data);
            $('#read-more-modal').modal('show');
        });
    },
    /* End readmore activity description*/

    /* start function exportCsv descripton */
    exportCsv: function () {
        $(document).on('click', '.exportCsv', function () {
            var search = $('input[type="search"]').val();

            var searchByRecord = `?search=${search}`;
            var url = route('admin.activity.export-csv');
            $(this).attr("href", url + searchByRecord);
        });
    },
    /* end function exportCsv descripton */
};

$(function () {
    activity.init();
});

