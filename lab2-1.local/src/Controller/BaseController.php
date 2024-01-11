<?php
    namespace Php2\Oop\Controller;
    class BaseController{
        public $tcnvip = 20;
        public function getnhantong(){
           
            return "Tống Chí Nhân 2 - Control ? ". $this->tcnvip;
        }
    }
?>