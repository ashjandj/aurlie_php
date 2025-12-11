let contactUs = {
    init: function () {
        contactUs.list();
        contactUs.changeStatus();
        contactUs.deleteContactUs();
        contactUs.readMore();
        contactUs.openReplyModal();
        contactUs.sendReply();
    },

    /* Start function contactUs list here */
    list: function () {
        pageLoader("loaderTb");
        let contactUsTable = $('#contact_us_table');
        let url = route('admin.contactUs');
        NioApp.DataTable(contactUsTable, {
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
                    d.page = parseInt(contactUsTable.DataTable().page.info().page) + 1;
                    d.search = contactUsTable.DataTable().search();
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
                        "data": "message",
                        "name": "message",
                        "targets": "message",
                        "render": function (data, _type, _full, _meta) {
                            let cleanText = data.replace(/<\/?[^>]+(>|$)/g, "");
                            if (cleanText.length > 70) {
                                data = cleanText.slice(0, 70);
                                let readMore = ` <a class="readMoreContactUs" data-type="message" data-id="${_full.id}"><strong>Read More</strong></a>`;
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
                        render: function (_data, _type, _full, _meta) {
                            if (_full.status == 1) {
                                var messageStatus = 'selected';
                            }
                            else {
                                var messageStatus = '';
                            }
                            return `<div class="customDropDown">
                            <select class="form-select changeStatus" rel="${_full.id}">
                            <option value="0" ${messageStatus}>Open</option>
                            <option value="1" ${messageStatus}>Close</option>
                            </select>
                        </div>`;
                        },
                    },
                    {
                        "data": "date",
                        "name": "date",
                        "targets": "date"
                    },
                    {
                        "data": "id",
                        "targets": "reply",
                        "render": function (_data, _type, _full, _meta) {
                            if (_full.canReply) {
                                if (_full.status != 1) {
                                    return `<div class="replyDiv">
                                    <a class="messageReply nk-menu-icon" rel="${_full.id}"><em class="icon ni ni-reply icon-sssssxl"></em></a>
                                </div>`;
                                } else {
                                    return `<div class="replyDiv"> - </div>`;
                                }
                            } else {
                                return ``;
                            }
                        }
                    },
                    {
                        "data": "id",
                        "targets": "actions",
                        'orderable': false,
                        "render": function (_data, _type, full, _meta) {
                            let actionHtml = ``;
                            actionHtml = `<td class="nk-tb-col nk-tb-col-tools">
                            <div class="drodown">
                                <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr p-0">`;

                            if (full.canDelete) {
                                actionHtml += `<li>
                                            <a class="deleteContactUs" rel="${full.id}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
    /* End function contactUs's list here */

    /* Start function delete contact us here */
    deleteContactUs: function () {
        $(document).on('click', '.deleteContactUs', function (e) {
            let id = $(this).attr('rel');
            let url = route('admin.contactUs.destroy', { id });
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
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
                                    'contact us record deleted.',
                                    "success"
                                )
                                setTimeout(function () {
                                    $('#contact_us_table').DataTable().ajax.reload();
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
    /* End function deleteContactUsss here */

    /* Start readMore function here */
    readMore: function () {
        $(document).on('click', '.readMoreContactUs', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#read-more-modal').modal('show');

            $.ajax({
                type: 'GET',
                url: route('admin.contactUs.content', { id }),
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
    /* End function readMore here */

    /* Start changeStatus function here */
    changeStatus: function () {
        $(document).on('change', '.changeStatus', function (e) {
            var status = $(this).val();
            let id = $(this).attr('rel');
            let url = route('admin.contactUs.changeStatus');
            let Text = status == '1' ? 'Close this contact us' : 'Open this contact us';
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
                                successToaster(response.message, 'Manage Contact us');
                            }
                        },
                        error: function (err) {
                            handleError(err);
                        },
                        complete: function () {
                            $('#contact_us_table').DataTable().ajax.reload();
                            $('#background_loader').addClass('d-none');
                        }
                    });
                }
                if (result.isDismissed) {
                    const oldStatus = status == 1 ? 0 : 1;
                    $(this).val(oldStatus);
                }
            });
        });
    },
    /* End changeStatus function here */

    /* Start openReplyModal function */
    openReplyModal: function () {
        $(document).on('click', '.messageReply', function () {
            let id = $(this).attr('rel');
            $('#reply-message-form').find("input[type=text], textarea").val("");
            $('#user_id').val(id);
            $('#replyMessageModal').modal('show');
        })
    },
    /* End openReplyModal function */

    /* start sendReply function here */
    sendReply: function () {
        $(document).on('click', '#sendReplyBtn', function (e) {
            let frm = $('#reply-message-form');
            let btn = $('#sendReplyBtn');
            let cancelBtn = $('#cancelReplyBtn');
            let btnName = btn.text();
            let url = frm.attr('action');

            if (frm.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: frm.serialize(),
                    beforeSend: function () {
                        showButtonLoader(btn, btnName, true);
                        cancelBtn.prop('disabled', true);
                    },
                    success: function (response) {
                        if (response.success) {
                            successToaster(response.message, 'Manage Contact us');
                            setTimeout(function () {
                                $("#replyMessageModal").modal("hide");
                                frm.find("input[type=text], textarea").val("");
                            }, 1000);
                        }
                    },
                    error: function (err) {
                        handleError(err);
                    },
                    complete: function () {
                        showButtonLoader(btn, btnName, false);
                        cancelBtn.prop('disabled', false);
                    }
                })
            }
        });
    }
    /* start sendReply function here */
};

$(function () {
    contactUs.init();
});
