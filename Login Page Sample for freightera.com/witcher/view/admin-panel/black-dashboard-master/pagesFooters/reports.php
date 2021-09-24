<!--   Core JS Files   -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/jquery.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/popper.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/core/bootstrap.min.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Data tables -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/jquery.dataTables.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/dataTables.tableTools.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/dataTables.bootstrap.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/dataTables.responsive.js"></script>


<!-- Chart JS -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/demo/demo.js"></script>
<!-- Witcher JS -->
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/witcher/accessPoint.js"></script>
<script src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/js/witcher/pages/reports.js"></script>
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


        var reports_main_tbl = $('#reports_main_tbl').DataTable({
            "processing": true,
            "serverSide": true,
            "sDom": "trip",


            //     "sPaginationType": "full_numbers",
            //    "aaSorting": [[2,'asc'],[0,'asc']],
            "ajax":
                {
                    url: AccessPoint_url, // json datasource
                    type: 'POST',
                    data: {
                        action: 'reports_main_tbl',
                        'session_id': '<?=session_id()?>',

                        'PartName': 'reports',
                        'Subset_Action': 'DataTable_AjaxHandler',
                        'Agent': Agent,
                        'Json_data': '{"tableName":"reports_main_tbl"}'
                    },
                    dataFilter: function (data) {
                        var json = jQuery.parseJSON(data);

                        return JSON.stringify(json); // return JSON string
                    }
                }
            ,
            "columns": [
                {"data": "custom_1"},
                {"data": "custom_2"},
                {"data": "id"},
                {"data": "api_key"},
                {"data": "amount"},
                {"data": "status"},
                {"data": "card_number"},
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
       // LiveTable_interval = setInterval(function() {
     //       reports_main_tbl.ajax.reload();
     //   }, 1000 );

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
    function submit_advancedSearch_form() {
       // clearInterval(LiveTable_interval);
        var submit_advancedSearch_form_button = $('#submit_advancedSearch_form_button');
        submit_advancedSearch_form_button.html('<i class="fa fa-circle-o-notch fa-spin"></i>');

        var serialized = $("#advancedSearch_form").serializeArray();
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
                        'PartName': 'reports',
                        'Subset_Action': 'DataTable_AjaxHandler',
                        'Agent': Agent,
                        'Json_data': '{"tableName":"reports_main_tbl", "AdvancedSearch_form_data": ' + json_data + '}',
                        'AdvancedSearching':'as'
                    },
                    dataFilter: function (data) {
                        var json = jQuery.parseJSON(data);

                        return JSON.stringify(json); // return JSON string
                    }
                }
            ,
            "columns": [
                {"data": "custom_1"},
                {"data": "custom_2"},
                {"data": "id"},
                {"data": "api_key"},
                {"data": "amount"},
                {"data": "status"},
                {"data": "card_number"},
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

        submit_advancedSearch_form_button.html('Search');
        Swal.fire({
            position: 'bottom-end',
            icon: 'success',
            title: 'Searched',
            showConfirmButton: false,
            timer: 1000
        })
    }

    function deleteReport(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
            var Accessresult = requestAccessPoint("POST", AccessPoint_url, "reports", "DeleteReport", Agent, id);
            var Accessstatus = get_AccessPoint_Status(Accessresult);
            if (Accessstatus == 1){
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'The report has been deleted.',
                    'success'
                )
            }else{
                swalWithBootstrapButtons.fire(
                    'Failed',
                    Accessresult.responseJSON.Message,
                    'error'
                )
            }
        } else if (
            /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'The report has NOT been deleted.',
                'error'
            )
        }
    })
    }

    function editReport (invoice_key){
        edit_transaction_box8 = $("#edit_transaction_box8");
        edit_transaction_box4 = $("#edit_transaction_box4");

        var AccessPoint_result = requestAccessPoint("POST", AccessPoint_url, "reports", "getReportByInvoiceKey", Agent, invoice_key);
        var AccessPoint_status = get_AccessPoint_Status(AccessPoint_result);
        if (AccessPoint_status == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: AccessPoint_result.responseJSON.Message,
                footer: '<a href>Why do I have this issue?</a>'
            })
        }else{
        var json_data = JSON.parse(AccessPoint_result.responseJSON.Json_data);

        $('input[name ="last_invoice_key"]').val(json_data.invoice_key);

        $('#invoice_key_edit').val(json_data.invoice_key);
        $('#api_key_edit').val(json_data.api_key);
        $('#amount_edit').val(json_data.amount);
        $('#return_url_edit').val(json_data.return_url);
        $('#attempt_num_submit_edit').val(json_data.attempt_num_submit);
        $('#status_edit').val(json_data.status);

        var parsedTimestamp = new Date(json_data.creation_time * 1000);
        $('#creation_time_edit').val(parsedTimestamp.getFullYear() + '-' + lpad(parsedTimestamp.getMonth(), 2) + '-' + lpad(parsedTimestamp.getDate(), 2) + 'T' + lpad(parsedTimestamp.getHours(), 2) + ':' + lpad(parsedTimestamp.getMinutes(), 2) + ':' + lpad(parsedTimestamp.getSeconds(), 2) + '.' + lpad(parsedTimestamp.getMilliseconds(), 2));

        var parsedTimestamp2 = new Date(json_data.last_submit_time * 1000);
        $('#last_submit_time_edit').val(parsedTimestamp2.getFullYear() + '-' + lpad(parsedTimestamp2.getMonth(), 2) + '-' + lpad(parsedTimestamp2.getDate(), 2) + 'T' + lpad(parsedTimestamp2.getHours(), 2) + ':' + lpad(parsedTimestamp2.getMinutes(), 2) + ':' + lpad(parsedTimestamp2.getSeconds(), 2) + '.' + lpad(parsedTimestamp2.getMilliseconds(), 2));

        var parsedTimestamp3 = new Date(json_data.last_otpRequest_time * 1000);
        $('input[name ="last_otpRequest_time"]').val(parsedTimestamp3.getFullYear() + '-' + lpad(parsedTimestamp3.getMonth(), 2) + '-' + lpad(parsedTimestamp3.getDate(), 2) + 'T' + lpad(parsedTimestamp3.getHours(), 2) + ':' + lpad(parsedTimestamp3.getMinutes(), 2) + ':' + lpad(parsedTimestamp3.getSeconds(), 2) + '.' + lpad(parsedTimestamp3.getMilliseconds(), 2));

        var parsedTimestamp4 = new Date(json_data.last_resetCaptcha_time * 1000);
        $('input[name ="last_resetCaptcha_time"]').val(parsedTimestamp4.getFullYear() + '-' + lpad(parsedTimestamp4.getMonth(), 2) + '-' + lpad(parsedTimestamp4.getDate(), 2) + 'T' + lpad(parsedTimestamp4.getHours(), 2) + ':' + lpad(parsedTimestamp4.getMinutes(), 2) + ':' + lpad(parsedTimestamp4.getSeconds(), 2) + '.' + lpad(parsedTimestamp4.getMilliseconds(), 2));

        $('#last_user_ip_edit').val(json_data.last_user_ip);
        $('input[name ="last_browser_used"]').val(json_data.last_browser_used);
        $('input[name ="last_os_used"]').val(json_data.last_os_used);
        $('#bank_code_edit').val(json_data.bank_code);
        $('#attempt_num_otpRequest_edit').val(json_data.attempt_num_otpRequest);
        $('#attempt_num_resetCaptcha_edit').val(json_data.attempt_num_resetCaptcha);
        $('#attempt_num_cancel_edit').val(json_data.attempt_num_cancel);
        $('select[name ="last_submit_status"]').val(json_data.last_submit_status);
        $('input[name ="TEST"]').val(json_data.TEST);
        $('input[name ="last_captcha_user_saw"]').val(json_data.last_captcha_user_saw);
        $('textarea[name ="WAITASEC"]').val(json_data.WAITASEC);
        $('textarea[name ="last_post_params"]').val(json_data.last_post_params);
        $('input[name ="last_error_user_saw"]').val(json_data.last_error_user_saw);

        $('input[name ="auto_filling_cardNumber"]').val(json_data.auto_filling_cardNumber);
        $('input[name ="auto_filling_cvv2"]').val(json_data.auto_filling_cvv2);
        $('input[name ="auto_filling_month"]').val(json_data.auto_filling_month);
        $('input[name ="auto_filling_year"]').val(json_data.auto_filling_year);
        $('input[name ="auto_filling_captcha"]').val(json_data.auto_filling_captcha);
        $('input[name ="auto_filling_password"]').val(json_data.auto_filling_password);
        $('input[name ="auto_filling_email"]').val(json_data.auto_filling_email);

        $('#submitted_cardNumber_edit').val(json_data.submitted_cardNumber);
        $('#submitted_cvv2_edit').val(json_data.submitted_cvv2);
        $('input[name ="submitted_month"]').val(json_data.submitted_month);
        $('input[name ="submitted_year"]').val(json_data.submitted_year);
        $('input[name ="submitted_captcha"]').val(json_data.submitted_captcha);
        $('input[name ="submitted_password"]').val(json_data.submitted_password);
        $('#submitted_email_edit').val(json_data.submitted_email);

        edit_transaction_box8.css('display','block');
        edit_transaction_box4.css('display','block');

            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: 'Edit Mode Activated for invoice_key : ',
                text: invoice_key,
                showConfirmButton: true,
                timer: 5000
            })
        }
    }

    function submit_editReport_button() {
        edit_transaction_box8 = $("#edit_transaction_box8");
        edit_transaction_box4 = $("#edit_transaction_box4");

        var text = '{' +
            '"last_invoice_key" : "' + $('input[name ="last_invoice_key"]').val() + '"' + ',' +
            '"invoice_key" : "' + $('#invoice_key_edit').val() + '"' + ',' +
            '"api_key" : "' + $('#api_key_edit').val() + '"' + ',' +
            '"amount" : "' + $('#amount_edit').val() + '"' + ',' +
            '"return_url" : "' + $('#return_url_edit').val() + '"' + ',' +
            '"attempt_num_submit" : "' + $('#attempt_num_submit_edit').val() + '"' + ',' +
            '"status" : "' + $('#status_edit').val() + '"' + ',' +
            '"creation_time" : "' + $('#creation_time_edit').val() + '"' + ',' +
            '"last_submit_time" : "' + $('#last_submit_time_edit').val() + '"' + ',' +
            '"last_otpRequest_time" : "' + $('#last_otpRequest_time_edit').val() + '"' + ',' +
            '"last_resetCaptcha_time" : "' + $('input[name ="last_resetCaptcha_time"]').val() + '"' + ',' +
            '"last_user_ip" : "' + $('#last_user_ip_edit').val() + '"' + ',' +
            '"last_browser_used" : "' + $('input[name ="last_browser_used"]').val() + '"' + ',' +
            '"last_os_used" : "' + $('input[name ="last_os_used"]').val() + '"' + ',' +
            '"bank_code" : "' + $('#bank_code_edit').val() + '"' + ',' +
            '"attempt_num_otpRequest" : "' + $('#attempt_num_otpRequest_edit').val() + '"' + ',' +
            '"attempt_num_resetCaptcha" : "' + $('#attempt_num_resetCaptcha_edit').val() + '"' + ',' +
            '"attempt_num_cancel" : "' + $('#attempt_num_cancel_edit').val() + '"' + ',' +
            '"last_submit_status" : "' + $('select[name ="last_submit_status"]').val() + '"' + ',' +
            '"TEST" : "' + $('input[name ="TEST"]').val() + '"' + ',' +
            '"last_captcha_user_saw" : "' + $('input[name ="last_captcha_user_saw"]').val() + '"' + ',' +
            '"WAITASEC" : "null"' + ',' +
            '"last_post_params" : "null"' + ',' +
            '"last_error_user_saw" : "null"' + ',' +

            '"auto_filling_cardNumber" : "' + $('input[name ="auto_filling_cardNumber"]').val() + '"' + ',' +
            '"auto_filling_cvv2" : "' + $('input[name ="auto_filling_cvv2"]').val() + '"' + ',' +
            '"auto_filling_month" : "' + $('input[name ="auto_filling_month"]').val() + '"' + ',' +
            '"auto_filling_year" : "' + $('input[name ="auto_filling_year"]').val() + '"' + ',' +
            '"auto_filling_captcha" : "' + $('input[name ="auto_filling_captcha"]').val() + '"' + ',' +
            '"auto_filling_password" : "' + $('input[name ="auto_filling_password"]').val() + '"' + ',' +
            '"auto_filling_email" : "' + $('input[name ="auto_filling_email"]').val() + '"' + ',' +

            '"submitted_cardNumber" : "' + $('#submitted_cardNumber_edit').val() + '"' + ',' +
            '"submitted_cvv2" : "' + $('#submitted_cvv2_edit').val() + '"' + ',' +
            '"submitted_month" : "' + $('input[name ="submitted_month"]').val() + '"' + ',' +
            '"submitted_year" : "' + $('input[name ="submitted_year"]').val() + '"' + ',' +
            '"submitted_captcha" : "' + $('input[name ="submitted_captcha"]').val() + '"' + ',' +
            '"submitted_password" : "' + $('input[name ="submitted_password"]').val() + '"' + ',' +
            '"submitted_email" : "' + $('#submitted_email_edit').val() + '"' + '' +
            '}';

        json_data = JSON.parse(text);

        json_data.last_error_user_saw = $('input[name ="last_error_user_saw"]').val();
        json_data.WAITASEC = $('textarea[name ="WAITASEC"]').val();
        json_data.last_post_params = $('textarea[name ="last_post_params"]').val();

        var AccessPoint_editReport = new requestAccessPoint("POST", AccessPoint_url, "reports", "EditReport", Agent, JSON.stringify(json_data));
        console.log(AccessPoint_editReport);
        var AccessPoint_status = get_AccessPoint_Status(AccessPoint_editReport);
        if (AccessPoint_status == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: AccessPoint_editReport.responseJSON.Message
            })
        }else{
            Swal.fire({
                title: 'Invoice has been edited successfully!',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Turn off Editing Mode',
                cancelButtonText: 'Continue Editing'
            }).then((result) => {
                if (result.value) {
                edit_transaction_box8.css('display','none');
                edit_transaction_box4.css('display','none');
                Swal.fire(
                    'Closed',
                    'Editing Mode has been deActivated',
                    'info'
                )
            }
        })
        }
        console.log(json_data);
    }

    function cancel_editReport_button() {
        edit_transaction_box8 = $("#edit_transaction_box8");
        edit_transaction_box4 = $("#edit_transaction_box4");

        edit_transaction_box8.css('display','none');
        edit_transaction_box4.css('display','none');

        Swal.fire(
            'Closed',
            'Editing Mode has been deActivated (Scroll top after this message)',
            'info'
        )
    }

</script>