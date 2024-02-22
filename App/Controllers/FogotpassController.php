<?php

namespace App\Controllers;

use App\Core\RenderBase;

use App\Models\UserModel;

class FogotpassController extends BaseController{
   
    private $_renderBase;


    function __construct(){
        parent::__construct();
        $this->_renderBase = new RenderBase();
       
    }
    

    public function loadViewFogot(){

        // if(!empty($_SESSION['user'])){
        //     $this->redirect(ROOT_URL);
        // }
        $this->_renderBase->renderlogin();
        // Render trang đăng nhập
       
       
        $this->load->render('layouts/client/pages/forgot');
        $this->_renderBase->renderfooterlogin();
        // Render footer
        $this->_renderBase->renderFooter();
    }


    public function handleRegister(){
        // validation form
        // kiểm tra trước rồi mới new UserModel();

        $userModel = new UserModel();
        $user = $userModel->checkUserExist($_POST["email"]);


        if($user){
            // tài khoản này có rồi , vui lòng đăng nhập
            // chuyển trang tới /?url=LoginController/loadViewLogin
            // báo lỗi
        }

        $userModel->registerUser($_POST);


        // //xác thực
        // if(password_verify($_POST['password'], $user['password'])){
        //     // xử lý session
        //     $_SESSION['user'] = $user;

        // }else{
            
        // }
        
        // var_dump($_SESSION['user']);

    }



}