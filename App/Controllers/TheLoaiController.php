<?php

namespace App\Controllers;

use App\Core\RenderBase;

use App\Models\TheLoaiModel;
use App\Controllers\BaseController;
class TheLoaiController extends BaseController
{
    
    private $_renderBase;
    private $theLoaiModel;

    private $dbConnection;
    private $db;
    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->TheLoaiPage();
    }

    

    function TheLoaiPage()
    {
        $Get = new TheLoaiModel();
        $data = $Get->getAllCate();
        if (!is_array($data)) {
            $data = [];
        }
        $this->_renderBase->renderHeader();
        $this->_renderBase->renderHead();
        $this->load->render('layouts/doc/theloai', $data);
        $this->_renderBase->renderFooter();
    }
  

    function detail($id)
    {        // dữ liệu ở đây lấy từ responsitories hoặc model
        // $this->redirect('layouts/doc/table-data-product/' . $productId);
    }
}
