<?php

namespace David\ProyectoDayOff\models;

use David\ProyectoDayOff\lib\Model;

class Status extends Model{
    const TABLE = "users";
    private $id;
    public function __construct(private string $status)
    {
        parent::__construct();
    }

    public function getId(){
        return $this->id;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}