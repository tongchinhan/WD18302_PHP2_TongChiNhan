<?php

namespace App\Models;

class UserModel extends BaseModel
{
    public $tableName = 'nguoidung';
    public $table = 'nguoidung';
    protected $name = 'UserModel';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        return $this->getAll()->get();
    }

    public function checkUserExist($email)
    {
        return $this->select()->where('email', '=', $email)->first();
    }

    public function getAllWithPaginate(int $limit = 10, int $offset = 0)
    {
        // return $this->select()->where('email', '=', $email)->first();
    }

    public function registerUser($data)
    {
        $user = $this->insert($this->table, $data);
    }

    public function create($data)
    {
        var_dump($this->tableName);
    }
}
