<?php

namespace App\Controllers;

use App\Core\RenderBase;

class HomeController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    function home()
    {
        // Dữ liệu ở đây lấy từ responsitories hoặc model

        $this->_renderBase->renderHeader();
        $this->_renderBase->renderHead();

        $this->load->render('layouts/doc/index');
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {
        // Dữ liệu ở đây lấy từ responsitories hoặc model
        // $this->redirect('layouts/doc/table-data-product/' . $productId);
    }
}
