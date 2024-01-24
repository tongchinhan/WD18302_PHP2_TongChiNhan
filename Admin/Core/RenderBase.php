<?php

namespace Msifpt\Wd18302Php2TongChiNhan\Core;

use Msifpt\Wd18302Php2TongChiNhan\Controllers\BaseController;

class RenderBase extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * renderHeader là phương thức để render phần header của trang web
     *
     * @return void
     */
    public function renderHeader()
    {
        // Gọi phương thức render từ lớp Load để tải file view 'layouts/client/header'
        $this->load->render('Include/header');
    }

    /**
     * renderFooter là phương thức để render phần footer của trang web
     *
     * @return void
     */
    public function renderFooter()
    {
        // Gọi phương thức render từ lớp Load để tải file view 'Include/footer'
        $this->load->render('Include/footer');
    }
    
}
