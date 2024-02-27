<?php

namespace App\Models;

class NguoiDungModel extends BaseModel
{
    protected $name = "NguoiDungModel";
    public $tableName = 'nguoidung';
    public $table = "nguoidung";

    public function getAllUs()
    {
        return $this->getAllUsser();
    }
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
