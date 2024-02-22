<?php

namespace App\Core;

use App\Controllers\BaseController;

class RenderBase extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function renderHeader(){
        $this->load->render('layouts/client/header');
    }
    public function renderHead(){
        $this->load->render('layouts/client/head');
    }

    public function renderFooter(){
        $this->load->render('layouts/client/footer');
    }
    public function renderlogin(){
        $this->load->render('layouts/client/headlogin');
    }
    public function renderfooterlogin(){
        $this->load->render('layouts/client/footerlogin');
    }

}