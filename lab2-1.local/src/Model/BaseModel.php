<?php
    namespace Php2\Oop\Model;
    class BaseModel{
        public $tcnmodel = 20;
        public function getModel(){
           
            return "Tống Chí Nhân 1- Model ? ". $this->tcnmodel;
        }
    }
?>