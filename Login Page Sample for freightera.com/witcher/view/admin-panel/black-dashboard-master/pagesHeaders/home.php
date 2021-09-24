<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/img/apple-icon.png">
<link rel="icon" type="image/png" href="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/img/favicon.png">
<title>
    <?=\Core\controller::$page_title?>
</title>
<style type="text/css">
    #loading_box_s{
        position:fixed;
        z-index:99999;
        top:0;
        left:0;
        bottom:0;
        right:0;
        background: rgba(0, 0, 0, 0.84);
        transition: 1s 0.4s;
    }
    #loading_box_s img {
        position: fixed;
        z-index: 99999;
        top:0;
        left: 0;
        right: 0;
        width: 100%;
        height:100%;
    }
    @media (max-width: 590px){
        #loading_box_s img {
            height:70%;
        }
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>
    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $("#loading_box_s").fadeOut("slow");;
    });
</script>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<!-- Nucleo Icons -->
<link href="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/css/nucleo-icons.css" rel="stylesheet" />
<!-- CSS Files -->
<link href="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/demo/demo.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
    var AccessPoint_url = "<?=HTTPS_SERVER?>/m9toh9xiltv6lwcoj1rzbz0nbbyj6gnhccu10f47/accessPoint";
    var Agent = "<?=\Core\controller::$data['user_info']['email']?>";
    var HTTP_SERVER = "<?= HTTPS_SERVER ?>";
    var HTTP_SERVER_ADMIN_ASSETS_PATH = HTTP_SERVER + "/witcherAssets/admin-panel/black-dashboard-master";
    var HTTP_SERVER_JS_PATH = HTTP_SERVER + "/witcherAssets/admin-panel/black-dashboard-master/js";
</script>