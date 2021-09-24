<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <div id="loading_box_s">
        <img src="<?=HTTP_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/img/LameDifferentBalloonfish-small.gif" alt="">
    </div>
    <?php \Module\Panel\partSetup::PartHeaderAssetsIncluder(); ?>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" >
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="javascript:void(0)" class="simple-text logo-mini">
                    <img src="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/img/favicon.png" alt="">
                </a>
                <a href="javascript:void(0)" class="simple-text logo-normal">
                    WITCHER DASHBOARD
                </a>
            </div>
            <ul class="nav" id="sidebar_menu_navbar">
                <?php
                $witcher = new witcher();
                $admin_parts = $witcher->getCoreConfigs('admin_parts.php');
                ?>
                <?php foreach (explode(",",\Core\controller::$data['user_info']['parts']) as $item){ ?>
                <li>
                    <a href="<?= HTTPS_SERVER ?>/<?=\Core\controller::$data['admin_root_path']?>/<?=$item?>">
                        <i class="tim-icons <?=$admin_parts[$item]['menu_icons']?>"></i>
                        <p><?=ucfirst($admin_parts[$item]['menu_title'])?></p>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle d-inline">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:void(0)"><b style="color: #d63034;">Welcome</b> <?=\Core\controller::$data['user_info']['username']?></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto">
                        <!--<li class="search-bar input-group">
                            <button class="btn btn-link" id="search-button" data-toggle="modal"
                                    data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                <span class="d-lg-none d-md-block">Search</span>
                            </button>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <div class="notification d-none d-lg-block d-xl-block"></div>
                                <i class="tim-icons icon-sound-wave"></i>
                                <p class="d-lg-none">
                                    Notifications
                                </p>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to
                                        your email</a></li>
                                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You
                                        have 5 more tasks</a></li>
                                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your
                                        friend Michael is in town</a></li>
                                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another
                                        notification</a></li>
                                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another
                                        one</a></li>
                            </ul>
                        </li>
                        -->
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <div class="photo">
                                    <img
                                         src="<?= HTTPS_SERVER ?>/witcherAssets/admin-panel/black-dashboard-master/img/profilePics/sample.png"
                                         alt="Profile Photo">

                                </div>
                                <b class="caret d-none d-lg-block d-xl-block"></b>
                                <p class="d-lg-none">
                                    Log out
                                </p>
                            </a>
                            <ul class="dropdown-menu dropdown-navbar">
                               <!-- <li class="nav-link"><a
                                            href="<?= HTTPS_SERVER ?>/hello/administrator/user"
                                            class="nav-item dropdown-item">Profile</a></li>
                                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                                </li>
                                <li class="dropdown-divider"></li>-->
                                <li class="nav-link"><a
                                            href="<?= HTTPS_SERVER ?>/<?=\Core\controller::$data['admin_root_path']?>/logout"
                                            class="nav-item dropdown-item">Log out</a></li>
                            </ul>
                        </li>
                        <li class="separator d-lg-none"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <?php \Module\Panel\partSetup::PartIncluder(); ?>
        <footer class="footer">
            <div class="container-fluid">
                <!--
                <ul class="nav">

                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Blog
                        </a>
                    </li>

                </ul>
                -->
                <div class="copyright">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        <img src="<?=HTTPS_SERVER?>/witcherAssets/admin-panel/black-dashboard-master/img/favicon.png" alt="" style="height: 20px;">
                    </a>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            WITCHER <?=WITCHER_VERSION?>
                        </a>
                    </li>
                    ©
                    <?=date("Y")?>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--
<div class="fixed-plugin">
   <div class="dropdown show-dropdown">
       <a href="#" data-toggle="dropdown">
           <i class="fa fa-cog fa-2x"> </i>
       </a>
     <ul class="dropdown-menu">
           <li class="header-title"> Sidebar Background</li>
           <li class="adjustments-line">
               <a href="javascript:void(0)" class="switch-trigger background-color">
                   <div class="badge-colors text-center">
                       <span class="badge filter badge-primary active" data-color="primary"></span>
                       <span class="badge filter badge-info" data-color="blue"></span>
                       <span class="badge filter badge-success" data-color="green"></span>
                   </div>
                   <div class="clearfix"></div>
               </a>
           </li>
           <li class="adjustments-line text-center color-change">
               <span class="color-label">LIGHT MODE</span>
               <span class="badge light-badge mr-2"></span>
               <span class="badge dark-badge ml-2"></span>
               <span class="color-label">DARK MODE</span>
           </li>
       </ul>

    </div>
</div>
 -->
<script>
    menu_items = document.getElementById('sidebar_menu_navbar').children;
    for (var i = 0; i < menu_items.length; i++) {
        var menu_item = menu_items[i];
        var menu_item_a = menu_item.getElementsByTagName('a')[0];
        var href = menu_item_a.getAttribute('href');
        if (href == "<?= HTTP_SERVER . $_SERVER['REDIRECT_URL']?>") {
            menu_item.classList.add("active");
            break;
        }
    }
</script>

<?php \Module\Panel\partSetup::PartFooterAssetsIncluder(); ?>

</body>

</html>