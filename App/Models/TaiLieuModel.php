<?php

namespace App\Models;

class TaiLieuModel extends BaseModel
{
    protected $name = "TaiLieuModel";
    public $tableName = 'tailieu';
    public $table = "tailieu";

    public function getAll()
    {
        return $this->getAllDocuments();
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
    public function deleteDocument($id)
    {

        return $this->delete($id);
    }
    public function updateDocumett($data, $id)
    {

        return $this->updateData($this->table, $data, $id);
    }
}
