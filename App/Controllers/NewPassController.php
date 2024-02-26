<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\UserModel;

class NewPassController extends BaseController
{
    private $_renderBase;

    // Hàm tạo của LoginController
    function __construct()
    {
        parent::__construct();
        // Khởi tạo đối tượng RenderBase để sử dụng cho việc render trang
        $this->_renderBase = new RenderBase();
        // Gọi phương thức hiển thị giao diện đăng nhập ngay khi khởi tạo
        $this->loadViewNewPass();
    }

    // Phương thức hiển thị giao diện đăng nhập
    public function loadViewNewPass()
    {
        $this->_renderBase->renderlogin();
        // Render trang đăng nhập
        $this->load->render('layouts/client/pages/NewPass');
        $this->_renderBase->renderfooterlogin();
        // Render footer
        $this->_renderBase->renderFooter();
    }
    
    // Phương thức xử lý quá trình đăng nhập
   
}
