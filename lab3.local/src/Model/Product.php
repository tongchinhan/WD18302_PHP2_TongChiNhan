<?php
namespace Php2\Oop\Model;

class Product extends BaseModel {
    public function ProductModelMethod() {
        return $this->_book; // Truy cập trực tiếp thuộc tính từ lớp cha BaseModel
    }
}
?>