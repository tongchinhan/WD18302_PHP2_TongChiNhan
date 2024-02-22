<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $_renderBase;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    // Phương thức hiển thị giao diện đăng nhập
    public function loadViewLogin()
    {
        // Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng về trang chính
        if (!empty($_SESSION['user'])) {
            $this->redirect(ROOT_URL);
        }

        // Render header
        $this->_renderBase->renderHeader();

        // Render trang đăng nhập
        $this->load->render('layouts/client/pages/login');

        // Render footer
        $this->_renderBase->renderFooter();
    }

    // Phương thức xử lý quá trình đăng nhập
    public function handleLogin()
    {
        // Kiểm tra xem có dữ liệu được gửi từ form đăng nhập không
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            // Nếu không có dữ liệu, chuyển hướng về trang đăng nhập và hiển thị thông báo lỗi
            // header('Location: ' . ROOT_URL . 'LoginController/loadViewLogin?error=missing_credentials');
            // exit();
        }
    
        // Kiểm tra trước rồi mới khởi tạo UserModel
        $userModel = new UserModel();
    
        // Lấy thông tin người dùng từ email
        $user = $userModel->getUserByEmail($_POST["email"]);
    
        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            // Nếu không tồn tại, chuyển hướng về trang đăng nhập và hiển thị thông báo lỗi
            // header('Location: ' . ROOT_URL . 'LoginController/loadViewLogin?error=user_not_found');
            // exit();
        }
    
        // Xác thực mật khẩu
        if (password_verify($_POST['password'], $user['password'])) {
            // Nếu mật khẩu khớp, lưu thông tin người dùng vào session
            $_SESSION['user'] = $user;
    
            // Chuyển hướng về trang chính sau khi đăng nhập thành công
            $this->redirect(ROOT_URL);
        } else {
            // Nếu mật khẩu không khớp, chuyển hướng về trang đăng nhập và hiển thị thông báo lỗi
            // header('Location: ' . ROOT_URL . 'LoginController/loadViewLogin?error=invalid_password');
            // exit();
        }
    }
    
    // Phương thức đăng xuất người dùng
    public function logout()
    {
        // Xoá thông tin người dùng khỏi session
        unset($_SESSION['user']);

        // Chuyển hướng về trang đăng nhập sau khi đăng xuất
        $this->redirect(ROOT_URL . 'LoginController/loadViewLogin');
    }
}
