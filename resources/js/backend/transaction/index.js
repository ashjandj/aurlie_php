let transactions = {
    init: function() {
        transactions.list();
    },

    /* Start function transaction's list here */
    list: function(){
        pageLoader("loaderTb");
        let transactionTable = $('#transaction_table');
        let url = route('admin.transaction.index');
        NioApp.DataTable(transactionTable, {
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
                    d.page = parseInt(transactionTable.DataTable().page.info().page) + 1;
                    d.search = transactionTable.DataTable().search();
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
    
};

$(function() {
    transactions.init();
});
