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


        $('#banks_main_tbl').DataTable({
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
                        action: 'banks_main_tbl',
                        'session_id': '<?=session_id()?>',

                        'PartName': 'banks',
                        'Subset_Action': 'DataTable_AjaxHandler',
                        'Agent': Agent,
                        'Json_data': '{"tableName":"banks_main_tbl"}'
                    },
                    dataFilter: function (data) {
                        var json = jQuery.parseJSON(data);
                        console.log(json);
                        return JSON.stringify(json); // return JSON string
                    }
                }
            ,
            "columns": [
                {"data": "edit", "width": "5%"},
                {"data": "delete", "width": "5%"},
                {"data": "id", "width": "5%"},
                {"data": "bank_name", "width": "5%"},
                {"data": "cardNumber_input", "width": "5%"},
                {"data": "card_number_input_pan1", "width": "5%"},
                {"data": "card_number_input_pan2", "width": "5%"},
                {"data": "card_number_input_pan3", "width": "5%"},
                {"data": "card_number_input_pan4", "width": "5%"},
                {"data": "cvv2_input", "width": "5%"},
                {"data": "month_input", "width": "5%"},
                {"data": "year_input", "width": "5%"},
                {"data": "captcha_input", "width": "5%"},
                {"data": "password_input", "width": "5%"},
                {"data": "email_input", "width": "5%"},
                {"data": "resetCaptcha_button", "width": "5%"},
                {"data": "otpRequest_button", "width": "5%"},
                {"data": "submit_button", "width": "5%"},
                {"data": "cancel_button", "width": "5%"},
                {"data": "return_button", "width": "5%"}
            ],
            error: function () {
                $(".employee-grid-error").html("");
                $("#basic-datatables").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                $("#employee-grid_processing").css("display", "none");
            }

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
    function submit_addNewBank_form() {
        var submit_addNewBank_form_button = $('#submit_addNewBank_form_button');
        submit_addNewBank_form_button.html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        var serialized = $("#addNewBank_form").serializeArray();
        var json_data = JSON.stringify(serialized);
        var result = requestAccessPoint("POST", AccessPoint_url, "banks", "AddNewBank", Agent, json_data);
        var status = get_AccessPoint_Status(result);
        var bank_main_tbl_box = $('#bank_main_tbl_box');
        var addNewBank_box = $("#addNewBank_box");
        setTimeout(function () {
            if (status == 1) {
                bank_main_tbl_box.append('<div class="alert alert-success">\n' +
                    '                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '                            <i class="tim-icons icon-simple-remove"></i>\n' +
                    '                        </button>\n' +
                    '                        <span><b> Success - </b> The bank has successfully added to database.</span>\n' +
                    '                    </div>');
                hide_addNewBank_form();
            } else {
                addNewBank_box.append('<div class="alert alert-danger">\n' +
                    '                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '                            <i class="tim-icons icon-simple-remove"></i>\n' +
                    '                        </button>\n' +
                    '                        <span><b> Danger - </b> ' + result.responseJSON.Message + ' </span>\n' +
                    '                    </div>');
            }
            submit_addNewBank_form_button.html('Done');
        }, 3000);
    }

    function show_addNewBank_form() {
        $("#addNewBank_box").css('display', 'block');

        var addNewBank_showButton = $("#addNewBank_showButton");
        addNewBank_showButton.attr('onclick', 'hide_addNewBank_form()');
        addNewBank_showButton.html('Cancel');
        addNewBank_showButton.removeClass('btn-success');
        addNewBank_showButton.addClass('btn-danger');
    }

    function hide_addNewBank_form() {
        $("#addNewBank_box").css('display', 'none');

        var addNewBank_showButton = $("#addNewBank_showButton");
        addNewBank_showButton.attr('onclick', 'show_addNewBank_form()');
        addNewBank_showButton.html('New +');
        addNewBank_showButton.removeClass('btn-danger');
        addNewBank_showButton.addClass('btn-success');

    }

    function deleteBank(id) {
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
            var Accessresult = requestAccessPoint("POST", AccessPoint_url, "banks", "DeleteBank", Agent, id);
            var Accessstatus = get_AccessPoint_Status(Accessresult);
            if (Accessstatus == 1){
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'The bank has been deleted.',
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
                'The bank has NOT been deleted.',
                'error'
            )
        }
    })
    }

    function editBank(id) {
        var result = requestAccessPoint("POST", AccessPoint_url, "banks", "EditBank", Agent, id);
    }
</script>