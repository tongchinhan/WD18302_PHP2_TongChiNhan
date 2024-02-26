<?php

namespace App\Controllers;

use App\Core\RenderBase;

use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class AddCodeController extends BaseController{
   
    private $_renderBase;


    function __construct(){
        parent::__construct();
        $this->_renderBase = new RenderBase();
       
    }
    

    public function loadViewCode(){

        // if(!empty($_SESSION['user'])){
        //     $this->redirect(ROOT_URL);
        // }
        $this->_renderBase->renderlogin();
        // Render trang đăng nhập
       
       
        $this->load->render('layouts/client/pages/addcode');
        $this->_renderBase->renderfooterlogin();
        // Render footer
        $this->_renderBase->renderFooter();
    }


    public function checkCode()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["token"])) {
            $token = $_POST["token"];

           
            if ($_SESSION["reset_token"] === (int) $token) {
                header("Location: ?url=NewPassController/loadViewNewPass");
                exit();
            } else {

                echo "Mã không hợp lệ.";
            }
        } else {

            echo "Mã không xác định.";
        }
    }
    

}
