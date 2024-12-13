<?php

namespace David\ProyectoDayOff\lib;
//include "rb-mysql.php";
use R as Redbean;
use David\ProyectoDayOff\lib\Database;

class Model
{
    private string $host;
    //private string $db;
    protected Database $db;
    private string $user;
    private string $password;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();

        // $this->host = $_ENV["HOST"];
        // $this->db = $_ENV["DB"];
        // $this->user = $_ENV["USER"];
        // $this->password = $_ENV["PASSWORD"];

        // if (!Redbean::testConnection()) {
        //     $connection = "mysql:host=$this->host; dbname=$this->db";
        //     Redbean::setup($connection, $this->user, $this->password);
        // }
    }

    // public function query($query){
    //     return $this->db->connect()->query($query);
    // }

    // public function prepare($query){
    //     return $this->db->connect()->prepare($query);
    // }

    public function dispenseElement($tableName){
        return Redbean::dispense($tableName);
    }

    public function storeElement($element){
        return Redbean::store($element);
    }

    public function getElement($tableName, $id){
        return Redbean::load($tableName,$id);
    }

    public function getBatch($tableName, $ids){
        return Redbean::loadAll($tableName, $ids);
    }

    public static function getAllElements($tableName, $sql=NULL){
        return Redbean::findAll($tableName, $sql);
    }

    public function deleteElement($element){
        Redbean::trash($element);
    }
    
}
