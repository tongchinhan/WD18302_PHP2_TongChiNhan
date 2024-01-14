<?php
namespace Php2\Oop\Model;

class BaseModel {
    CONST API_URL = "Chuoi gi do";
    CONST VAT = 0.05;
    protected $_book = "Sách";
    protected $tcnmodel = "BaseModel";

    public function getModel() {
        return $this->tcnmodel;
    }

    public function tcnab() {
        return $this->_book;
    }
}
?>