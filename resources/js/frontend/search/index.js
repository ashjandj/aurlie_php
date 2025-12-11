let search = {
    init: function () {
        search.initDatePicker();
        search.initSearch();
    },

    initDatePicker() {
        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
        });
    },

    initSearch() {
        $(document).on('click', '#searchBtn', function (event) {
            event.preventDefault();
            const startDate = $("#start_date").val();
            const endDate = $("#end_date").val();

            const btn = $('#searchBtn');
            btn.prop('disabled', true);

            if(startDate!='' && endDate !='' && startDate <= endDate){
                window.localStorage.setItem('startDate', startDate);
                window.localStorage.setItem('endDate', endDate);
                saveTempData('POST', startDate, endDate);
                window.location.href = route('frontend.searchResult');
            } 
        });
    },
};

$(function () {
    search.init();

    const startDate = window.localStorage.getItem('startDate');
    const endDate = window.localStorage.getItem('endDate');

    if (startDate && endDate) {
        saveTempData('GET', startDate, endDate);
    }
});

window.saveTempData = function (method, startDate, endDate) {
    $.ajax({
        type: method,
        async: true,
        url: route('frontend.saveTempSearch'),
        data: {
            startDate: startDate,
            endDate: endDate,
        },
        success: function(response) {
            console.log(response);
            if(response.message === 'complete'){
                window.localStorage.removeItem('startDate');
                window.localStorage.removeItem('endDate');
                Swal.fire('Success', 'Data fetch successfully!', 'success').then(() => {
                    window.location.reload();
                });
            } else if(response.message === 'in_progress'){
                setTimeout(saveTempData('GET', startDate, endDate), 1000);
            }
        },
        error: function(err) {
            window.localStorage.removeItem('startDate');
            window.localStorage.removeItem('endDate');
            handleError(err);
        },
    });
}
