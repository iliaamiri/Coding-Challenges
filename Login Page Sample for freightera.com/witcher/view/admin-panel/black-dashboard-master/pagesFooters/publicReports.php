<!--   Core JS Files   -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/jquery.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/popper.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/bootstrap.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Data tables -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/jquery.dataTables.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/dataTables.tableTools.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/dataTables.bootstrap.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/dataTables.responsive.js"></script>

<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/demo/demo.js"></script>
<!-- Witcher JS -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/witcher/accessPoint.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/witcher/pages/publicReports.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
    TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
    });
</script>

<script>
    var publicReports_main_box = $("#publicReports_main_box");
    var advanceSearchShow_box = $("#advanceSearchShow_box");

    var client_api_key_errorMessage = $('#client_api_key_errorMessage');
    var client_api_key_errorBox = $('#client_api_key_errorBox');
    var client_api_key_successMessage = $('#client_api_key_successMessage');
    var client_api_key_successBox = $('#client_api_key_successBox');

    $('#loading_box').css('display', 'block');
    $(document).ajaxComplete(function () {
        $('#loading_box').fadeOut();
    });
    $(document).ready(function () {
        $().ready(function () {
            var storage = localStorage.getItem("get_dashboard_data_by_api_key_json_data");

            $("#api_key_to_show").html(get_api());
            if (storage === null || storage === 'undefined') {
                go_with_apiKey();
            } else {
                ReportsInitiation();
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

    function submit_simpleSearch_form() {
        var submit_simpleSearch_form_button = $('#submit_simpleSearch_form_button');
        submit_simpleSearch_form_button.html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        submit_simpleSearch_form_button.attr('disabled', 'disabled');

        var serialized = $("#simpleSearch_form").serializeArray();
        var json_data = JSON.stringify(serialized);

        var reports_main_tbl = $('#reports_main_tbl');
        reports_main_tbl.DataTable().clear();
        reports_main_tbl.DataTable().destroy();
        $('#reports_main_tbl tbody').empty();
        var reports_main_tbl_datatable = reports_main_tbl.DataTable({
            "processing": true,
            "serverSide": true,
            "sDom": "tip",

            "ajax":
                {
                    url: AccessPoint_url, // json datasource
                    type: 'POST',
                    data: {
                        action: 'reports_main_tbl',
                        'session_id': '<?=session_id()?>',
                        'PartName': 'publicReports',
                        'Subset_Action': 'DataTable_AjaxHandler',
                        'Agent': Agent,
                        'Json_data': '{"tableName":"reports_main_tbl", "api_key":"' + get_api() + '" ,"AdvancedSearch_form_data": ' + json_data + '}',
                        'AdvancedSearching': 'as'
                    },
                    dataFilter: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.draw == 1) {
                            if (json.recordsTotal > 0) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Searched',
                                    showConfirmButton: false,
                                    timer: 1300
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'There is no data with these information you gave.',
                                    showConfirmButton: true,
                                    timer: 6000
                                })
                            }
                        }
                        submit_simpleSearch_form_button.html('Show');
                        submit_simpleSearch_form_button.removeAttr('disabled');
                        return JSON.stringify(json); // return JSON string
                    }
                }
            ,
            "columns": [
                {"data": "id"},
                {"data": "card_number"},
                {"data": "amount"},
                {"data": "status"},
                {"data": "created_at"},
                {"data": "bank_code"},
                {"data": "return_validation"}
            ],
            error: function () {
                $(".employee-grid-error").html("");
                $("#basic-datatables").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#employee-grid_processing").css("display", "none");
            }

        })
    }

    function go_with_apiKey() {
        client_api_key = get_api();

        $("#api_key_to_show").html(client_api_key);

        json_data_req = '{"api_key": "' + client_api_key + '"}';
        var json_data = request_new_json_data(json_data_req);
        console.log(json_data);
        localStorage.setItem("get_dashboard_data_by_api_key_json_data", JSON.stringify(json_data));

        ReportsInitiation();
    }

    function ReportsInitiation() {
        json_raw = localStorage.getItem("get_dashboard_data_by_api_key_json_data");
        json_data = JSON.parse(json_raw);
        api_key = json_data.api_key;

        publicReports_main_box.fadeIn();
        advanceSearchShow_box.fadeIn();

        var reports_main_tbl = $('#reports_main_tbl').DataTable({
            "processing": true,
            "serverSide": true,
            "sDom": "tip",


            //     "sPaginationType": "full_numbers",
            //    "aaSorting": [[2,'asc'],[0,'asc']],
            "ajax":
                {
                    url: AccessPoint_url, // json datasource
                    type: 'POST',
                    data: {
                        action: 'reports_main_tbl',
                        'session_id': '<?=session_id()?>',

                        'PartName': 'publicReports',
                        'Subset_Action': 'DataTable_AjaxHandler',
                        'Agent': Agent,
                        'Json_data': '{"tableName":"reports_main_tbl","api_key":"' + get_api() + '"}'
                    },
                    dataFilter: function (data) {
                        var json = jQuery.parseJSON(data);

                        return JSON.stringify(json); // return JSON string
                    }
                }
            ,
            "columns": [
                {"data": "id"},
                {"data": "card_number"},
                {"data": "amount"},
                {"data": "status"},
                {"data": "created_at"},
                {"data": "bank_code"},
                {"data": "return_validation"}
            ],
            error: function () {
                $(".employee-grid-error").html("");
                $("#basic-datatables").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#employee-grid_processing").css("display", "none");
            }

        });
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

    function clear_inputs() {
        $("#simpleSearch_form   input[name='invoice_key']").val('');
        $("#simpleSearch_form  input[name='order_number']").val('');
        $("#simpleSearch_form  input[name='submitted_cardNumber']").val('');
    }

    $("form").submit(function (e) {
        e.preventDefault();
    });
    $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });

</script>