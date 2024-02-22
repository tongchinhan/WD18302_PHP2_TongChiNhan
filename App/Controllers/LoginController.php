<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $_renderBase;

    // Hàm tạo của LoginController
    function __construct()
    {
        parent::__construct();
        // Khởi tạo đối tượng RenderBase để sử dụng cho việc render trang
        $this->_renderBase = new RenderBase();
        // Gọi phương thức hiển thị giao diện đăng nhập ngay khi khởi tạo
        $this->loadViewLogin();
    }

    // Phương thức hiển thị giao diện đăng nhập
    public function loadViewLogin()
    {
        $this->_renderBase->renderlogin();
        // Render trang đăng nhập
        $this->load->render('layouts/client/pages/login');
        $this->_renderBase->renderfooterlogin();
        // Render footer
        $this->_renderBase->renderFooter();
    }
    
    // Phương thức xử lý quá trình đăng nhập
    public function handleLogin()
    {
        // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu không
        $userModel = new UserModel();
        $user = $userModel->checkUserExist($_POST["email"]);

        // Nếu người dùng không tồn tại, chuyển hướng và báo lỗi
        if (!$user) {
            
        }

        // Xác thực mật khẩu
        if (isset($_POST['password'], $user['password'])) {
            // Nếu mật khẩu khớp, lưu thông tin người dùng vào session
            $_SESSION['user'] = $user;

            // Chuyển hướng người dùng đến trang chính (HomeController)
            return header('Location: ?url=HomeController/home');
           
        } else {
            // Nếu mật khẩu không khớp, có thể thực hiện xử lý bổ sung ở đây
        }

        // In thông tin người dùng đã đăng nhập (để kiểm tra)
      
    }

    // Phương thức đăng xuất người dùng
    public function logout()
    {
        // Xoá thông tin người dùng khỏi session
        unset($_SESSION['user']);
    }
}
