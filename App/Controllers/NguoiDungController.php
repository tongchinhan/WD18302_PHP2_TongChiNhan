<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\NguoiDungModel;
use PDOException;

class NguoiDungController extends BaseController
{
    private $_renderBase;

    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    // Phương thức hiển thị giao diện đăng nhập
    public function loaduser()
    {
        $load = new NguoiDungModel();
        $data = $load->getAllUs(); // Sửa đổi tên phương thức gọi
        if (!is_array($data)) {
            $data = [];
        }
        // Render header
        $this->_renderBase->renderHeader();

        $this->_renderBase->renderHead();
 
       
        // Render trang đăng nhập
        $this->load->render('layouts/doc/nguoidung', $data);

        // Render footer
        $this->_renderBase->renderFooter();
    }
}

