<?php
    namespace Php2\Oop\responsitories;

    abstract class BaseModelAbstract{
        protected $model;
        public function getModel(){
            return $this->model;
        }
        abstract public function getTable();
    }
?>