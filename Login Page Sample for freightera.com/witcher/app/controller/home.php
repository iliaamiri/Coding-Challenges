<?php
namespace Controller;

use Core\controller;
use Core\module;
use Core\pager;
use Model\Message;
use Module\loginModule;

class home extends controller {

    public function welcome(){
        $login_module = new loginModule();
        if (!$login_module->is_login()){
            pager::go_page('login');
            exit();
        }
        module::auth_init();

        $user_info = module::$user_info;


        parent::setData(['user_info' =>  $user_info]);
        parent::setViews(['success.php']);
        parent::Show();
    }

    public function index(){
        controller::$page_title = "Welcome to Freightera";
        parent::setViews(['/login-forms/login1.php']);
        parent::Show();
    }

    public function login(){
        controller::$page_title = "log-in";
        $data_array = array();
        $login_module = new loginModule();

        $views_array = array("layouts/500.php");
        if ($login_module->is_login()){
            if (isset($_GET['logout'])){
                $login_module->logout();
                pager::go_page('login');
                exit();
            }
            pager::go_page('welcome');
        }else{
            $data_array = array(
                'auth_method' => $login_module->getAuth_method()
            );
            $views_array =  array("login-forms/login1.php");
            $req_method = $_SERVER['REQUEST_METHOD'];
            if ($req_method == "POST") {
                loginModule::$as = "member";
                $login_stat = $login_module->login();
                if (!$login_stat['status']){
                    Message::msg_box_session_prepare($login_stat['message'],"danger");
                    pager::refresh();
                    exit();
                }
                $login_module->after_login_changes();
                pager::go_page('welcome');
                exit();
            }
        }
        parent::setData($data_array);
        parent::setViews($views_array);
        parent::Show();
    }
}