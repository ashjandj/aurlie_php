let faqs = {
    init: function() {
        faqs.list();
        faqs.changeStatus();
        faqs.add();
        faqs.edit();
        faqs.saveFaq();
        faqs.updateFaq();
        faqs.deleteFaq();
        faqs.readMore();
    },

    /* Start function faq's list here */
    list: function(){
        pageLoader("loaderTb");
        let faqTable = $('#faq_table');
        let url = route('admin.faq.index');
        NioApp.DataTable(faqTable, {
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
                    d.page = parseInt(faqTable.DataTable().page.info().page) + 1;
                    d.search = faqTable.DataTable().search();
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
                    "data": "question",
                    "name": "question",
                    "targets": "question",
                    "render": function (data, _type, _full, _meta) {
                        let cleanText = data.replace(/<\/?[^>]+(>|$)/g, "");
                        if(cleanText.length > 70){
                            data = cleanText.slice(0, 70);
                            let readMore = ` <a class="readMoreFaq" data-type="question" data-id="${_full.id}"><strong>Read More</strong></a>`;
                            return data + ' ... ' + readMore;
                        }
                        return data;
                    }
                },
                {
                    "data": "answer",
                    "name": "answer",
                    "targets": "answer",
                    "render": function (data, _type, _full, _meta) {
                        let cleanText = data.replace(/<\/?[^>]+(>|$)/g, "");
                        if(cleanText.length > 70){
                            data = cleanText.slice(0, 70);
                            let readMore = ` <a class="readMoreFaq" data-type="answer" data-id="${_full.id}"><strong>Read More</strong></a>`;
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
                            var activeStatus = 'checked';
                        }
                        else {
                            var activeStatus = '';
                        }
                        return `<div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input changeStatus"
                            id="customSwitch${_full.id}" rel="${_full.id}" data-status="${_full.status}" ${activeStatus}>
                        <label class="custom-control-label"
                            for="customSwitch${_full.id}"></label>
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
                                    <ul class="link-list-opt no-bdr p-0">`;

                                    if (full.canEdit) {
                                        actionHtml += `<li>
                                            <a class="editFaq" rel="${full.id}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                        </li>`;
                                    }

                                    if (full.canDelete) {
                                        actionHtml += `<li>
                                            <a class="deleteFaq" rel="${full.id}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
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
    /* End function faq's list here */
    
    /* Start function faq's add here */
    add: function(){  
        $(document).on('click', '#addFaqBtn', function () { 
            let btn = $(this);
            let btnName = btn.text();
            let url =  route('admin.faq.create');
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    showButtonLoader(btn, btnName, true); 
                },
                success: function(response) {
                    if(response.success){
                        $("#addFAQModal").html(response.data);
                        $("#addFAQModal").modal("show");
                        loadEditor('faq-description');
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
    /* End function add here */

    /* Start function faq's edit here */
    edit: function(){  
        $(document).on('click', '.editFaq', function () { 
            $("#editFAQModal").modal("show");
            let id = $(this).attr('rel');
            let url =  route('admin.faq.edit', {id});
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    $('#editFaqForm').html(`
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                    `);
                },
                success: function(response) {
                    if(response.success){
                        $("#editFaqForm").html(response.data);
                        $("#editFAQModal").modal("show");
                        loadEditor('faq-description');
                    }
                },
                error: function(err) {
                    handleError(err);
                },
            });
        });
    },
    /* End function edit here */

    /* Start function saveFaq here */
    saveFaq:function(){
        $(document).on('click', '#saveBtn', function(e) {
            e.preventDefault();
            let frm = $('#saveForm');
            let btn = $(this);
            let cancelBtn = $('#saveCancelBtn');
            let btnName = btn.text();
            let url = frm.attr('action');
            let faqTable = $('#faq_table');
        
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
                            successToaster(response.message, 'Manage FAQ');
                            setTimeout(function() {
                                faqTable.DataTable().ajax.reload();
                                $("#addFAQModal").modal("hide");
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
    /* End function saveFaq here */

    /* Start function updateFaq here */
    updateFaq:function(){
        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();
            let frm = $('#updateForm');
            let btn = $(this);
            let cancelBtn = $('#updateCancelBtn');
            let btnName = btn.text();
            let url = frm.attr('action');
            let faqTable = $('#faq_table');
        
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
                            successToaster(response.message, 'Manage FAQ');
                            setTimeout(function() {
                                faqTable.DataTable().ajax.reload();
                                $("#editFAQModal").modal("hide");
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
    /* End function updateFaq here */

    /* Start function deleteFaq here */
    deleteFaq:function(){
        $(document).on('click', '.deleteFaq', function(e) {
            let id = $(this).attr('rel');
            let url = route('admin.faq.destroy',{id}) ;
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
                        beforeSend: function() {
                            $('#background_loader').removeClass('d-none'); 
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'FAQ record deleted.',
                                    "success"
                                )
                                setTimeout(function () {
                                    $('#faq_table').DataTable().ajax.reload();
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
    /* End function deleteFaq here */

    /* Start readMore function here */
    readMore: function () {
        $(document).on('click', '.readMoreFaq', function(e) {
            e.preventDefault();
            
            var id = $(this).data('id');
            var type = $(this).data('type');

            $('#read-more-modal').modal('show');

            $.ajax({
                type: 'GET',
                url: route('admin.faq.content', {type: type, id: id}),
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
    changeStatus: function() {
        $(document).on('click', '.changeStatus', function (e) {
            var status = $(this).attr("data-status");
            let id = $(this).attr('rel');
            if (status == '1') {
                var status = '0';
                var Text = 'Deactivate this faqs?';
            }
            else {
                var status = '1';
                var Text = 'Activate this faqs ?';
            }
            let url = route('admin.faq.changeStatus');
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
                                successToaster(response.message, 'Manage FAQ');
                                setTimeout(function () {
                                    $('#faq_table').DataTable().ajax.reload();
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
    }
    /* End changeStatus function here */
};

$(function() {
    faqs.init();
});
