<?php

namespace App\Models;
use Exception;
use PDO;
use PDOException;
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
    public function DoiPass($email, $password)
{
    $passmoi = $this->select()->where('email', '=', $email)->first();
    if ($passmoi) {
        $id = $passmoi['idnguoidung'];
        $this->updatePass($id, ['password' => $password]);
    }

}

    
}
