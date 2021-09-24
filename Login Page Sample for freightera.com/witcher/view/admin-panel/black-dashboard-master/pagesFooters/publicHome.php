<!--   Core JS Files   -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/jquery.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/popper.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/bootstrap.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->

<!-- Witcher JS -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/witcher/accessPoint.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/witcher/pages/home.js"></script>

<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/demo/demo.js"></script>

<script>
    $(document).ready(function () {
        $().ready(function () {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();


            $('.fixed-plugin a').click(function (event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data', new_color);
                }

                if ($main_panel.length != 0) {
                    $main_panel.attr('data', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function () {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function () {
                var $btn = $(this);

                if (white_color == true) {

                    $('body').addClass('change-background');
                    setTimeout(function () {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                    }, 900);
                    white_color = false;
                } else {

                    $('body').addClass('change-background');
                    setTimeout(function () {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                    }, 900);

                    white_color = true;
                }


            });

            $('.light-badge').click(function () {
                $('body').addClass('white-content');
            });

            $('.dark-badge').click(function () {
                $('body').removeClass('white-content');
            });

        });
    });
</script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
    TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
    });
</script>

<script>
    gradientChartOptionsConfigurationWithTooltipPurple = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },

        tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
        },
        responsive: true,
        scales: {
            yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.0)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    suggestedMin: 60,
                    suggestedMax: 125,
                    padding: 20,
                    fontColor: "#9a9a9a"
                }
            }],

            xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(225,78,202,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    padding: 20,
                    fontColor: "#9a9a9a"
                }
            }]
        }
    };

    var submit_client_api_key = $('#submit_client_api_key');
    var api_key_request_form = $('#api_key_request_form');
    var client_api_key_input = $("input[name='client_api_key']");
    var client_api_key_errorMessage = $('#client_api_key_errorMessage');
    var client_api_key_errorBox = $('#client_api_key_errorBox');
    var client_api_key_successMessage = $('#client_api_key_successMessage');
    var client_api_key_successBox = $('#client_api_key_successBox');
    var resetApi_box = $('#resetApi_box');
    $('#loading_box').css('display','block');
    $( document ).ajaxComplete(function() {
        $('#loading_box').fadeOut();
    });
    $(document).ready(function () {
        $().ready(function () {
            if (localStorage.getItem("get_dashboard_data_by_api_key_json_data") !== null) {

                renew_data();
                ChartsInitiation();
            }
        });
    });

    function get_api() {
        var result = requestAccessPoint("POST", AccessPoint_url, "publicReports", "get_api_key", Agent, '');
        var status = get_AccessPoint_Status(result);

        if (status != 1) {
            showError(result.responseJSON.Message);
            return;
        }

        return result.responseJSON.api_key;
    }

    function go_with_apiKey() {
        var client_api_key = get_api();

        json_data_req = '{"api_key": "' + client_api_key + '"}';
        var json_data = request_new_json_data(json_data_req);

        localStorage.setItem("get_dashboard_data_by_api_key_json_data", JSON.stringify(json_data));

        ChartsInitiation();
    }

    function getJson_data_from_localStorage() {
        json_raw = localStorage.getItem("get_dashboard_data_by_api_key_json_data");
        json_data = JSON.parse(json_raw);

        return json_data;
    }

    function ChartsInitiation() {
        var chartBig1_Box = $("#chartBig1_Box");
        var chartBig2_Box = $("#chartBig2_Box");

        json_data = getJson_data_from_localStorage();
        tdd = json_data.seven_days_transactions.transactions_detailed;
        // chartBig1

        var chart_labels = ['a week ago', '6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'A day ago', 'Today'];
        var chart_data = [tdd.seven_days_ago.sum_amount, tdd.six_days_ago.sum_amount, tdd.five_days_ago.sum_amount, tdd.four_days_ago.sum_amount, tdd.three_days_ago.sum_amount, tdd.two_days_ago.sum_amount, tdd.one_day_ago.sum_amount, tdd.today.sum_amount];
        //   var chart_data = [tdd.seven_days_ago.count,tdd.six_days_ago.count,tdd.five_days_ago.count,tdd.four_days_ago.count,tdd.three_days_ago.count,tdd.two_days_ago.count,tdd.one_day_ago.count, tdd.today.count];


        var ctx = document.getElementById("chartBig1").getContext('2d');

        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
        gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
        gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors
        var newConfig = {
            type: 'bar',
            responsive: true,
            legend: {
                display: false
            },
            data: {
                labels: chart_labels,
                datasets: [{
                    label: "Deposits",
                    fill: true,
                    backgroundColor: gradientStroke,
                    hoverBackgroundColor: gradientStroke,
                    borderColor: '#1f8ef1',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    data: chart_data,
                }]
            },
            options: gradientBarChartConfiguration
        }
        var myChartData = new Chart(ctx, newConfig);

        chartBig1_Box.fadeIn();

        $("#0").click(function () {
            chartBig1_Initiations(myChartData, "0");
        });
        $("#1").click(function () {
            chartBig1_Initiations(myChartData, "1");
        });

        // chartBig2

        var chart_labels = ['a week ago', '6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'A day ago', 'Today'];
        var chart_data = [tdd.seven_days_ago.count, tdd.six_days_ago.count, tdd.five_days_ago.count, tdd.four_days_ago.count, tdd.three_days_ago.count, tdd.two_days_ago.count, tdd.one_day_ago.count, tdd.today.count];
        //   var chart_data = [tdd.seven_days_ago.count,tdd.six_days_ago.count,tdd.five_days_ago.count,tdd.four_days_ago.count,tdd.three_days_ago.count,tdd.two_days_ago.count,tdd.one_day_ago.count, tdd.today.count];


        var ctx = document.getElementById("chartBig2").getContext('2d');

        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
        gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
        gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
        var config = {
            type: 'line',
            data: {
                labels: chart_labels,
                datasets: [{
                    label: "Total Transactions",
                    fill: true,
                    backgroundColor: gradientStroke,
                    borderColor: '#d346b1',
                    borderWidth: 2,
                    borderDash: [],
                    borderDashOffset: 0.0,
                    pointBackgroundColor: '#d346b1',
                    pointBorderColor: 'rgba(255,255,255,0)',
                    pointHoverBackgroundColor: '#d346b1',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    data: chart_data,
                }]
            },
            options: gradientChartOptionsConfigurationWithTooltipPurple
        };
        var myChartData2 = new Chart(ctx, config);

        chartBig2_Box.fadeIn();

        $("#20").click(function () {
            chartBig2_Initiations(myChartData2, "20");
        });
        $("#21").click(function () {
            chartBig2_Initiations(myChartData2, "21");
        });

        resetApi_box.fadeIn();
        showSuccess();
    }

    function chartBig1_Initiations(chart, id) {
        json_data = getJson_data_from_localStorage();

        switch (id) {
            case "0":
                var chart_labels = ['a week ago', '6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'A day ago', 'Today'];
                tdd = json_data.seven_days_transactions.transactions_detailed;
                var data = chart.config.data;
                chart_data = [tdd.seven_days_ago.sum_amount, tdd.six_days_ago.sum_amount, tdd.five_days_ago.sum_amount, tdd.four_days_ago.sum_amount, tdd.three_days_ago.sum_amount, tdd.two_days_ago.sum_amount, tdd.one_day_ago.sum_amount, tdd.today.sum_amount];
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                chart.update();
                break;
            case "1":
                var chart_labels = ['A year ago', '11 months ago', '10 months ago', '9 months ago', '8 months ago', '7 months ago', '6 months ago', '5 months ago', '4 months ago', '3 months ago', '2 months ago', 'A month ago', 'This month'];
                tmd = json_data.last_months_transactions.transactions_detailed;
                var data = chart.config.data;
                chart_data = [tmd.month12.sum_amount, tmd.month11.sum_amount, tmd.month10.sum_amount, tmd.month9.sum_amount, tmd.month8.sum_amount, tmd.month7.sum_amount, tmd.month6.sum_amount, tmd.month5.sum_amount, tmd.month4.sum_amount, tmd.month3.sum_amount, tmd.month2.sum_amount, tmd.month1.sum_amount, tmd.month0.sum_amount];
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                chart.update();
                break;
        }
    }

    function chartBig2_Initiations(chart, id) {
        json_data = getJson_data_from_localStorage();

        switch (id) {
            case "20":
                var chart_labels = ['a week ago', '6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'A day ago', 'Today'];
                tdd = json_data.seven_days_transactions.transactions_detailed;
                var data = chart.config.data;
                chart_data = [tdd.seven_days_ago.count, tdd.six_days_ago.count, tdd.five_days_ago.count, tdd.four_days_ago.count, tdd.three_days_ago.count, tdd.two_days_ago.count, tdd.one_day_ago.count, tdd.today.count];
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                chart.update();
                break;
            case "21":
                var chart_labels = ['A year ago', '11 months ago', '10 months ago', '9 months ago', '8 months ago', '7 months ago', '6 months ago', '5 months ago', '4 months ago', '3 months ago', '2 months ago', 'A month ago', 'This month'];
                tmd = json_data.last_months_transactions.transactions_detailed;
                var data = chart.config.data;
                chart_data = [tmd.month12.count, tmd.month11.count, tmd.month10.count, tmd.month9.count, tmd.month8.count, tmd.month7.count, tmd.month6.count, tmd.month5.count, tmd.month4.count, tmd.month3.count, tmd.month2.count, tmd.month1.count, tmd.month0.count];
                data.datasets[0].data = chart_data;
                data.labels = chart_labels;
                chart.update();
                break;
        }
    }

    function showSuccess() {
        submit_client_api_key.html('Go');
        client_api_key_successBox.fadeIn();
        client_api_key_successMessage.html("Success - Here you are!");

    }

    function showError(msg) {
        client_api_key_input.removeAttr('disabled');
        submit_client_api_key.removeAttr('disabled');
        submit_client_api_key.html('Go');
        client_api_key_errorBox.css('display', 'block');
        client_api_key_errorMessage.html("Error - " + msg);
        setTimeout(function () {
            client_api_key_errorBox.fadeOut();
        }, 4000);
    }

    function submit_resetApi() {
        localStorage.removeItem('get_dashboard_data_by_api_key_json_data');
        location.reload();
    }

    function renew_data() {
        api_key = get_api();

        json_data_req = '{"api_key": "' + api_key + '"}';

        var json_data = request_new_json_data(json_data_req);

        localStorage.setItem("get_dashboard_data_by_api_key_json_data", JSON.stringify(json_data));
    }

    function request_new_json_data(json_data) {
        var result = requestAccessPoint("POST", AccessPoint_url, "publicHome", "get_dashboard_data_by_api_key", Agent, json_data);
        var status = get_AccessPoint_Status(result);
        if (status != 1) {
            showError(result.responseJSON.Message);
            return;
        }

        return JSON.parse(result.responseJSON.Json_data);
    }

    client_api_key_input.keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            go_with_apiKey();
            event.preventDefault();
        }
    });
</script>