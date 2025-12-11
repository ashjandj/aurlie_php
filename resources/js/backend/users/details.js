let details = {
    init: function() {
        details.transactionList();
        details.activityList();
        details.notificationsList();
        details.viewMoreDescription();
        details.saveInternalNotes();
        details.deleteInternalNote();
        details.updateStatus();
    },

    /* Start function transaction's list here */
    transactionList: function(){
        pageLoader("loaderTb");
        let transactionTable = $('#transaction_table');
        let url = route('admin.transaction.index');
        NioApp.DataTable(transactionTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "bFilter": false,
            "ajax": {
                url: url,
                type: 'GET',
                data: function (d) {
                    d.size = d.length;
                    d.sortColumn = d.columns[d.order[0]['column']]['name'];
                    d.sortDirection = d.order[0]['dir'];
                    d.page = parseInt(transactionTable.DataTable().page.info().page) + 1;
                    d.search = transactionTable.DataTable().search();
                    d.customerId = customerId;
                    d.listType = 'user-details'
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
            "order": [0, "asc"],
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
                },
                {
                    "data": "interval",
                    "name": "interval",
                    "targets": "interval",
                },
                {
                    "data": "amount",
                    "name": "amount",
                    "targets": "amount",
                },
                {
                    "data": "status",
                    "name": "status",
                    "targets": "status",
                },
                {
                    "data": "date",
                    "name": "date",
                    "targets": "date",
                },
            ]
        });
    },
    /* End function transaction's list here */
    
    /* Start function activity's list here */
    activityList: function () {
        pageLoader("loaderTb");
        let activityTable = $('#activity_table');
        let url = route('admin.activity.index');
        NioApp.DataTable(activityTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "bFilter": false,
            "ajax": {
                url: url,
                type: 'GET',
                data: function (d) {
                    d.size = d.length;
                    d.sortColumn = d.columns[d.order[0]['column']]['name'];
                    d.sortDirection = d.order[0]['dir'];
                    d.page = parseInt(activityTable.DataTable().page.info().page) + 1;
                    d.search = activityTable.DataTable().search();
                    d.userId = userId;
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
                ]
        });
    },
    /* End function activity's list here */

    /* Start function notifications list here */
    notificationsList: function () {
        var notificationTable = $('#notification-table');
        pageLoader("loaderTb");
        NioApp.DataTable(notificationTable, {
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "oLanguage": {
                "sEmptyTable": "No record found"
            },
            "ajax": {
                url: route('admin.notifications.index'),
                type: 'GET',
                data: function (d) {
                    d.size = d.length;
                    d.sortColumn = d.columns[d.order[0]['column']]['name'];
                    d.sortDirection = d.order[0]['dir'];
                    d.page = parseInt(notificationTable.DataTable().page.info().page) + 1;
                    d.search = notificationTable.DataTable().search();
                    d.fromDate = $('#fromDate').val();
                    d.toDate = $('#toDate').val();
                    d.userId = userId;
                },
                dataSrc: function (d) {
                    d.recordsTotal = d.meta.total;
                    d.recordsFiltered = d.meta.total;
    
                    return d.data;
                },
                error: function (xhr, error, code) {
                    handleError(xhr);
                }
            },
            "stateSave": false,
            "order": [2, "desc"],
            "columnDefs": [{
                "data": 'id',
                "name": "id",
                "targets": 'id',
                'orderable': false,
                "render": function (data, type, full, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                "data": 'message',
                "name": "message",
                "targets": 'message',
                'orderable': false,
                'defaultContent': '--',
                "render": function (data, _type, _full, _meta) {
                    let cleanText = data;
                    if (cleanText.length > 70) {
                        data = cleanText.slice(0, 70);
                        let readMore = `<button class="readMoreNotification cursor-pointer" data-description="${cleanText}" data-heading="Notification"><strong>Read More</strong></button>`;
                        return `<a href="${_full.redirectTo}" class="notification-link cursor-pointer">`+data+`</a>` + ' ... ' + readMore;
                    }
                    return `<a href="${_full.redirectTo}" class="notification-link cursor-pointer">`+data+`</a>`;
                },
            },
            {
                "data": 'created_at',
                "name": "created_at",
                "targets": 'datetime',
                'defaultContent': '--',
                "render": function (data, type, full, meta) {
                    return getLocalTime(data, 'DD MMM YYYY, hh:mm A')
                },
            },
    
            ]
        });
      },
    /* End function notifications list here */

    /* start function readmore activity descripton */
    viewMoreDescription: function () {
        $(document).on('click', '.read-more-activity', function (e) {
            e.preventDefault();
            var data = $(this).data('description');
            $('#read-more-activity').html('').html(data);
            $('#read-more-modal').modal('show');
        });
    },
    /* End function readmore activity descripton */

    /* Start function add internal note */
    saveInternalNotes: function () {
        $(document).on('submit', '#addInternalNoteForm', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = $('#addInternalNoteBtn');
            let btnName = btn.html();
            let url = form.attr('action');

            if (!form.find('#note').val().trim()) {
                errorToaster('Please enter a note.', 'User Management');
                return;
            }

            showButtonLoader(btn, btnName, true);
            $.ajax({
                type: 'POST',
                url: url,
                data: form.serialize(),
                success: function (response) {
                    if (response.success) {
                        successToaster(response.message, 'User Management');
                        // Clear the form
                        form[0].reset();
                        // Add the new note to the list
                        if (response.data && response.data.note) {
                            // Escape HTML and convert newlines to <br>
                            let escapedNote = $('<div>').text(response.data.note.note).html().replace(/\n/g, '<br>');
                            let noteHtml = `
                                <div class="card card-bordered mb-3 note-item" data-note-id="${response.data.note.id}">
                                    <div class="card-inner">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <div class="text-muted small">
                                                    <em class="icon ni ni-user"></em>
                                                    <span>${$('<div>').text(response.data.note.creator).html()}</span>
                                                    <span class="mx-2">•</span>
                                                    <em class="icon ni ni-calendar"></em>
                                                    <span>${response.data.note.created_at}</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-danger deleteNoteBtn" data-note-id="${response.data.note.id}">
                                                <em class="icon ni ni-trash"></em>
                                            </button>
                                        </div>
                                        <div class="note-content">
                                            <p class="mb-0">${escapedNote}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            // Remove empty message if exists
                            $('#internalNotesList').find('.alert-light').remove();
                            // Prepend new note to the list
                            $('#internalNotesList').prepend(noteHtml);
                        }
                    }
                },
                error: function (err) {
                    handleError(err);
                },
                complete: function () {
                    showButtonLoader(btn, btnName, false);
                }
            });
        });
    },
    /* End function add internal note */

    /* Start function delete internal note */
    deleteInternalNote: function () {
        $(document).on('click', '.deleteNoteBtn', function (e) {
            e.preventDefault();
            let noteId = $(this).data('note-id');
            let noteItem = $(this).closest('.note-item');
            
            Swal.fire({
                allowOutsideClick: false,
                title: 'Are you sure?',
                text: 'You want to delete this note?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = route('admin.users.delete-internal-note', { noteId: noteId });
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        beforeSend: function() {
                            $('#background_loader').removeClass('d-none');
                        },
                        success: function (response) {
                            if (response.success) {
                                successToaster(response.message, 'User Management');
                                // Remove the note from the list
                                noteItem.fadeOut(300, function() {
                                    $(this).remove();
                                    // Show empty message if no notes left
                                    if ($('#internalNotesList').find('.note-item').length === 0) {
                                        $('#internalNotesList').html(`
                                            <div class="alert alert-light">
                                                <em class="icon ni ni-info"></em>
                                                <span>No internal notes yet. Add your first note above.</span>
                                            </div>
                                        `);
                                    }
                                });
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
    /* End function delete internal note */

    /* Start function update user status */
    updateStatus: function () {
        $(document).on('submit', '#updateStatusForm', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = $('#updateStatusBtn');
            let btnName = btn.html();
            let url = form.attr('action');
            let selectedStatus = form.find('#application_status').val();

            if (!selectedStatus) {
                errorToaster('Please select a status.', 'User Management');
                return;
            }

            // Show confirmation if status is being changed to "accepted"
            if (selectedStatus === 'accepted') {
                Swal.fire({
                    allowOutsideClick: false,
                    title: 'Confirm Approval',
                    text: 'This will approve the user and send them an email with membership details and payment link. Continue?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, approve!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        submitStatusUpdate(form, btn, btnName, url);
                    }
                });
            } else {
                submitStatusUpdate(form, btn, btnName, url);
            }
        });

        function submitStatusUpdate(form, btn, btnName, url) {
            showButtonLoader(btn, btnName, true);
            $.ajax({
                type: 'PUT',
                url: url,
                data: form.serialize(),
                success: function (response) {
                    if (response.success) {
                        successToaster(response.message, 'User Management');
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
    },
    /* End function update user status */
    
};

$(function() {
    details.init();
});
