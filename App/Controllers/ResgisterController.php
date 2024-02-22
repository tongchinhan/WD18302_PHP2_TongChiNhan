<?php

namespace App\Controllers;

use App\Core\RenderBase;

use App\Models\UserModel;

class ResgisterController extends BaseController{
   
    private $_renderBase;


    function __construct(){
        parent::__construct();
        $this->_renderBase = new RenderBase();
       
    }
    

    public function loadViewRegister(){

       
        $this->_renderBase->renderlogin();
        // Render trang đăng nhập
       
       
        $this->load->render('layouts/client/pages/resgister');
        $this->_renderBase->renderfooterlogin();
        // Render footer
        $this->_renderBase->renderFooter();
    }


    public function handleRegister(){
        // Kiểm tra xem các trường thông tin cần thiết đã được điền đầy đủ hay không
        $requiredFields = ['ten', 'email', 'sdt', 'diachi', 'password'];
        $errorMessages = [];
    
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                // Nếu trường này không được điền, thêm thông báo lỗi vào mảng $errorMessages
                $errorMessages[$field] = "Bạn vui lòng nhập $field!";
            }
        }
    
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
        $userModel = new UserModel();
        $existingUser = $userModel->checkUserExist($_POST["email"]);
        
        if($existingUser){
            $errorMessages['email'] = 'Email này đã được sử dụng, vui lòng chọn một email khác!';
        }
    
        // Nếu có bất kỳ trường nào chưa được điền hoặc email đã tồn tại, gán mảng $errorMessages vào session 'error' và chuyển hướng lại trang đăng kí
        if (!empty($errorMessages)) {
            $_SESSION['error'] = $errorMessages;
            header('Location: ?url=ResgisterController/loadViewRegister');
            exit;
        }
    
        // Nếu không có lỗi, tiến hành đăng kí người dùng
        $userModel->registerUser($_POST);
    
        // Chuyển hướng về trang đăng nhập
        header('Location: ?url=LoginController/loadViewLogin');
        exit;
    }
    

}