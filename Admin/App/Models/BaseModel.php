<?php
use App\Models\CrudInterface;
abstract class BaseModel implements CrudInterface{
    protected $table;
    abstract public function getTable();
    public function getAll(){

    }
    public function getOne(int $id){

    }

    
    public function create(array $data){

    }
    public function update(int $id, array $data){

    }

    public function remove(int $id) : bool{
        return true;
    }
}