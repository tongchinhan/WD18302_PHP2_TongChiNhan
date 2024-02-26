<?php

namespace App\Controllers;

use App\Core\RenderBase;

use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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

    public function resetPassword(){
        // Xử lý khi form gửi đi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra xem email đã được gửi chưa
            if (isset($_POST['email'])) {
                $email = $_POST['email'];

                // Kiểm tra xem email có tồn tại trong CSDL không
                $userModel = new UserModel(); // Giả sử bạn có một model để làm việc với người dùng

                // Kiểm tra xem email có được nhập vào không
                if (empty($email)) {
                    $_SESSION['forgot_error'] = "Vui lòng nhập địa chỉ email.";
                } else {
                    $user = $userModel->checkUserExist($email);
                    if ($user) {
                        // Tạo token reset mật khẩu
                        $token = random_int(100000, 999999); // Tạo số ngẫu nhiên từ 100000 đến 999999 (bao gồm cả hai số này)
                        // Gửi email chứa link reset mật khẩu
                        $_SESSION['reset_token'] = $token;
                        $_SESSION['reset_email'] = $email;
                        if ($this->sendResetEmail($email, $token)) {
                            // Lưu token vào CSDL hoặc session
                            header('Location: /?url=AddCodeController/loadViewCode');
                            exit();
                        } else {
                            $_SESSION['forgot_error'] = "Gửi Email lỗi!";
                        }
                    } else {
                        $_SESSION['forgot_error'] = "Email không tồn tại!";
                    }
                }
            }
        }

    }

    function sendResetEmail($email, $token)
    {
        // $dotenv = Dotenv::createImmutable(__DIR__);
        // $dotenv->load();
        $mail = new PHPMailer(true);
        try {
            $_SESSION['reset_token'] = $token;
            $_SESSION['email'] = $email;
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->CharSet = 'utf-8';
            $mail->SMTPAuth = true;
            $mail->Username = 'nguyenduvipno1@gmail.com'; // SMTP username
            $mail->Password = 'fllzqgrowwkytxrt'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = '465';

            // Thiết lập các thông tin email
            $mail->setFrom('nguyenduvipno1@gmail.com', 'Bảo trì thiết bị');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Đặt lại mật khẩu';
            // $mail->Body    = 'Mã xác nhận của bạn là: ' . $token;
            //$token = "mã của bạn ở đây"; // Giả sử bạn đã có mã token từ hàm random_int hoặc bất kỳ nguồn nào khác
// Tạo đường link kèm mã token
// $resetLink = 'http://localhost:8000/ResetPasswordController?token=' . $token;
            $resetLink = $token;


            // Thiết lập nội dung email với đường link
            $mail->Body = 'Mã code để nhập lại mật khẩu:' . $resetLink;

            // Gửi email
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function pass(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra xem email đã được gửi chưa
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                  var_dump($email);
                }else{
                  echo('Ko co gi');
                }
            }else{
                echo('Loi');
            }
    }
    public function handleResetPassword()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_SESSION["email"];
            $password = $_POST["passwordmoi"];

            $userModel = new UserModel();
            $userModel->DoiPass($email, $password);

            return header("Location: ?url=LoginController/loadViewLogin");
            
        } else {
           
    }

    }
}
public function test(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra xem email đã được gửi chưa
        if (isset($_POST['passwordmoi'])) {
            $password = $_POST['passwordmoi'];
              var_dump($password);
            }else{
              echo('Ko co gi');
            }
        }else{
            echo('Loi');
        }
}
    }
