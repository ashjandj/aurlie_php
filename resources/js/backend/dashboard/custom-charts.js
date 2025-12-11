// Sub Admin and Users per day counts
var allUserPerDayData = JSON.parse(allUserPerDayArr);
var allUserTimeSlots = allUserPerDayData.timeSlot;
var allUserCounts = allUserPerDayData.totalValue;

// Sub Admin per day counts
var subAdminPerDayData = JSON.parse(subAdminPerDayArr);
var subAdminTimeSlots = subAdminPerDayData.timeSlot;
var subAdminCounts = subAdminPerDayData.totalValue;

// Users per day counts
var userPerDayData = JSON.parse(userPerDayArr);
var userPerDayTimeSlots = userPerDayData.timeSlot;
var userPerDayCounts = userPerDayData.totalValue;

// Subscriptions per day counts
var subscriptionsPerDayData = JSON.parse(subscriptionsPerDayArr);
var subscriptionsPerDayTimeSlots = subscriptionsPerDayData.timeSlot;
var subscriptionsPerDayCounts = subscriptionsPerDayData.totalValue;

"use strict";
! function(NioApp, $) {
    "use strict";
    var todayOrders = {
        labels: allUserTimeSlots,
        dataUnit: 'Sub Admin and Users',
        lineTension: .3,
        datasets: [{
            label: "Orders",
            color: "#854fff",
            background: "transparent",
            data: allUserCounts
        }]
    };
    var todayRevenue = {
        labels: subAdminTimeSlots,
        dataUnit: 'Sub Admin',
        lineTension: .3,
        datasets: [{
            label: "Revenue",
            color: "#33d895",
            background: "transparent",
            data: subAdminCounts
        }]
    };
    var todayCustomers = {
        labels: userPerDayTimeSlots,
        dataUnit: 'Users',
        lineTension: .3,
        datasets: [{
            label: "Customers",
            color: "#ff63a5",
            background: "transparent",
            data: userPerDayCounts
        }]
    };
    var todayVisitors = {
        labels: subscriptionsPerDayTimeSlots,
        dataUnit: 'Subscriptions',
        lineTension: .3,
        datasets: [{
            label: "Visitors",
            color: "#559bfb",
            background: "transparent",
            data: subscriptionsPerDayCounts
        }]
    };
    function ecommerceLineS3(selector, set_data) {
        var $selector = selector ? $(selector) : $('.ecommerce-line-chart-s3');
        $selector.each(function() {
            var $self = $(this),
                _self_id = $self.attr('id'),
                _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

            var selectCanvas = document.getElementById(_self_id).getContext("2d");
            var chart_data = [];

            for (var i = 0; i < _get_data.datasets.length; i++) {
                chart_data.push({
                    label: _get_data.datasets[i].label,
                    tension: _get_data.lineTension,
                    backgroundColor: _get_data.datasets[i].background,
                    borderWidth: 2,
                    borderColor: _get_data.datasets[i].color,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: _get_data.datasets[i].color,
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 2,
                    pointRadius: 4,
                    pointHitRadius: 4,
                    data: _get_data.datasets[i].data
                });
            }

            var chart = new Chart(selectCanvas, {
                type: 'line',
                data: {
                    labels: _get_data.labels,
                    datasets: chart_data
                },
                options: {
                    legend: {
                        display: _get_data.legend ? _get_data.legend : false,
                        rtl: NioApp.State.isRTL,
                        labels: {
                            boxWidth: 12,
                            padding: 20,
                            fontColor: '#6783b8'
                        }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                        enabled: true,
                        rtl: NioApp.State.isRTL,
                        callbacks: {
                            title: function title(tooltipItem, data) {
                                return data['labels'][tooltipItem[0]['index']]; //false;
                            },
                            label: function label(tooltipItem, data) {
                                return data.datasets[tooltipItem.datasetIndex]['data'][
                                    tooltipItem['index']
                                ] + ' ' + _get_data.dataUnit;
                            }
                        },
                        backgroundColor: '#1c2b46',
                        titleFontSize: 8,
                        titleFontColor: '#fff',
                        titleMarginBottom: 4,
                        bodyFontColor: '#fff',
                        bodyFontSize: 8,
                        bodySpacing: 4,
                        yPadding: 6,
                        xPadding: 6,
                        footerMarginTop: 0,
                        displayColors: false
                    },
                    scales: {
                        yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: false,
                                fontSize: 12,
                                fontColor: '#9eaecf',
                                padding: 0
                            },
                            gridLines: {
                                color: NioApp.hexRGB("#526484", .2),
                                tickMarkLength: 0,
                                zeroLineColor: NioApp.hexRGB("#526484", .2)
                            }
                        }],
                        xAxes: [{
                            display: false,
                            ticks: {
                                fontSize: 12,
                                fontColor: '#9eaecf',
                                source: 'auto',
                                padding: 0,
                                reverse: NioApp.State.isRTL
                            },
                            gridLines: {
                                color: "transparent",
                                tickMarkLength: 0,
                                zeroLineColor: NioApp.hexRGB("#526484", .2),
                                offsetGridLines: true
                            }
                        }]
                    }
                }
            });
        });
    } // init chart

    NioApp.coms.docReady.push(function() {
        ecommerceLineS3();
    });
}(NioApp, jQuery);

var ctx = document.getElementById("userRegistrationsChart").getContext('2d');
var usersDoughnutStatistics = {};
var userRegistrationsChart = {
    labels: [],
    dataUnit: 'User',
    lineTension: .4,
    legend: true,
    datasets: [{
        label: "User Registrations",
        color: "#6576ff",
        dash: 0,
        background: NioApp.hexRGB('#6576ff', .15),
        backgroundColor: NioApp.hexRGB('#6576ff', .15),
        borderWidth: 1,
        borderColor: '#6576ff',
        data: []
    }],
};
const stackedLine = new Chart(ctx, {
    type: 'line',
    data: userRegistrationsChart,
    options: {
        legend: {
            display: false,
            rtl: NioApp.State.isRTL,
            labels: {
                boxWidth: 12,
                padding: 20,
                fontColor: '#6783b8'
            }
        },
        maintainAspectRatio: false,
        tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
                title: function title(tooltipItem, data) {
                    return data['labels'][tooltipItem[0]['index']];
                },
                label: function label(tooltipItem, data) {
                    return data.datasets[tooltipItem.datasetIndex]['data'][
                        tooltipItem['index']
                    ];
                }
            },
            backgroundColor: '#6576ff',
            titleFontSize: 13,
            titleFontColor: '#fff',
            titleMarginBottom: 6,
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            bodySpacing: 4,
            yPadding: 10,
            xPadding: 10,
            footerMarginTop: 0,
            displayColors: false
        },
        scales: {
            yAxes: [{
                display: true,
                stacked: true,
                position: NioApp.State.isRTL ? "right" : "left",
                ticks: {
                    beginAtZero: true,
                    fontSize: 11,
                    fontColor: '#9eaecf',
                    padding: 10,
                    callback: function callback(value, index, values) {
                        return value;
                    },
                    min: 0,
                    stepSize: 3000
                },
                gridLines: {
                    color: NioApp.hexRGB("#6576ff", .2),
                    tickMarkLength: 0,
                    zeroLineColor: NioApp.hexRGB("#6576ff", .2)
                }
            }],
            xAxes: [{
                display: true,
                stacked: false,
                ticks: {
                    maxRotation: 50,
                    minRotation: 30,
                    padding: 10,
                    autoSkip: false,
                    fontSize: 10
                },
                gridLines: {
                    color: "transparent",
                    tickMarkLength: 0,
                    zeroLineColor: 'transparent'
                }
            }]
        }
    }
});

const graph = {
    init: function () {
        graph.userRegistrationSelectBox();
        graph.userDoughnutGraph();
        graph.search();
        graph.reset();
        graph.range();
    },

    userRegistrationSelectBox: function () {
        $(document).on('change', '#userRegistrationSelectBox', function () {
            var type = $(this).val();
            if ( type == 'custom'){
                $("#start_date").val('');
                $("#end_date").val('');
                $("#dateRange").show();
                var btn = $('#searchBtn');
                btn.prop('disabled', true);

                $(this).closest('.form-group').parent().removeClass('col-md-10').addClass('col-md-12');
            }else{
                userRegistrationsGraph(type);
                $("#dateRange").hide();

                $(this).closest('.form-group').parent().removeClass('col-md-12').addClass('col-md-10');
            }
        });
    },

    userDoughnutGraph: function () {
        $.ajax({
            type: 'GET',
            url: route('admin.usersDoughnutData'),
            success: function (response) {
                usersDoughnutStatistics = {
                    labels: ["Profile Completed", "Profile Incomplete"],
                    dataUnit: 'People',
                    legend: false,
                    datasets: [{
                        borderColor: "#fff",
                        background: ["#816bff", "#ff82b7"],
                        data: response.data.usersCounts
                    }]
                };

                usersDoughnut('.ecommerce-doughnut-s1', usersDoughnutStatistics);
            },
            error: function (err) {
                console.log(err);
            },
        });
    },

    search: function () {
        //custom date search function call
        $(document).on('click', '#searchBtn', function () {
            var startDate = $("#start_date").val();
            var endDate = $("#end_date").val();

            var btn = $('#searchBtn');
            btn.prop('disabled', true);
            if(startDate!='' && endDate !='' && startDate<=endDate){
                $("#graphLoader").siblings().removeClass('col-md-12').addClass('col-md-10');
                userRegistrationsGraph('custom', startDate, endDate);
            }
        });
    },

    reset: function () {
        //custom date reset function call
        $(document).on('click', '#resetBtn', function () {
            $("#userRegistrationSelectBox").val("yearly").change();
            $("#dateRange").hide();
        });
    },

    range: function () {
        $(document).on('change', '#start_date, #end_date', function () {
            var startDate = $("#start_date").val();
            var endDate = $("#end_date").val();
            var btn = $('#searchBtn');
            if(startDate!='' && endDate !='' && startDate<=endDate){
                btn.prop('disabled', false);
            } else {
                btn.prop('disabled', true);
            }
        });
    },
};

// dashboard user activity graph
window.userRegistrationsGraph = function (type, startDate='', endDate='') {
    $.ajax({
        url: route('admin.userRegistrationGraph'),
        type: "POST",
        data: {'type': type, 'startDate': startDate, 'endDate': endDate},
        dataType: 'json',
        beforeSend: function() {
            $("#graphLoader").removeClass('d-none');
        },
        success: function(response) {
            stackedLine.data.labels = response.chartLabels;
            stackedLine.data.datasets[0].data = response.chartData;
            stackedLine.update();
        },
        error: function(data) {
            handleError(data);
        },
        complete: function() {
            $("#graphLoader").addClass('d-none').siblings().removeClass('col-md-10').addClass('col-md-12');
        }
    });
}

window.usersDoughnut = function (selector, set_data) {
    var $selector = selector ? $(selector) : $('.ecommerce-doughnut-s1');
    $selector.each(function() {
        var $self = $(this),
            _self_id = $self.attr('id'),
            _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

        var selectCanvas = document.getElementById(_self_id).getContext("2d");
        var chart_data = [];

        for (var i = 0; i < _get_data.datasets.length; i++) {
            chart_data.push({
                backgroundColor: _get_data.datasets[i].background,
                borderWidth: 2,
                borderColor: _get_data.datasets[i].borderColor,
                hoverBorderColor: _get_data.datasets[i].borderColor,
                data: _get_data.datasets[i].data
            });
        }

        var chart = new Chart(selectCanvas, {
            type: 'doughnut',
            data: {
                labels: _get_data.labels,
                datasets: chart_data
            },
            options: {
                legend: {
                    display: _get_data.legend ? _get_data.legend : false,
                    rtl: NioApp.State.isRTL,
                    labels: {
                        boxWidth: 12,
                        padding: 20,
                        fontColor: '#6783b8'
                    }
                },
                rotation: -1.5,
                cutoutPercentage: 70,
                maintainAspectRatio: false,
                tooltips: {
                    enabled: true,
                    rtl: NioApp.State.isRTL,
                    callbacks: {
                        title: function title(tooltipItem, data) {
                            return data['labels'][tooltipItem[0]['index']];
                        },
                        label: function label(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex]['data'][
                                tooltipItem['index']
                            ] + ' ' + _get_data.dataUnit;
                        }
                    },
                    backgroundColor: '#1c2b46',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    titleMarginBottom: 6,
                    bodyFontColor: '#fff',
                    bodyFontSize: 12,
                    bodySpacing: 4,
                    yPadding: 10,
                    xPadding: 10,
                    footerMarginTop: 0,
                    displayColors: false
                }
            }
        });
    });
} // init Dougnut chart

//on load function call
$(function () {
    graph.init();
    userRegistrationsGraph('yearly');
});
