<?php

namespace App\Models;

class TheLoaiModel extends BaseModel
{
    protected $name = "TheLoaiModel";
    public $tableName = 'TaiLieu';
    public $table = "tailieu";

    public function getAllCate()
    {
        return $this->GetTheloai();
       
    }
    public function create($data)
    {
        var_dump($this->tableName);
    }
}
