<?php

namespace App\Models;

class NguoiDungModel extends BaseModel
{
    protected $name = "NguoiDungModel";
    public $tableName = 'nguoidung';
    public $table = "nguoidung";
 // Lấy tất cả người dùng
    public function getAllUs()
    {
        return $this->getAllUsser();
    }
    // Tạo mới một bản ghi người dùng
    public function create($data)
    {
        var_dump($this->tableName);
    }
    // abstract public function getAllWithPaginate(int $limit, int $offset);

    public function add($data)
    {
        $TaiLieu = $this->insertData($this->table, $data);
    }
    public function deleteUser($id)
    {

        return $this->deleteUs($id);
    }
    public function updateUsser($data, $id)
    {

        return $this->updateUs($this->table, $data, $id);
    }
}
