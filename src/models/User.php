<?php

namespace David\ProyectoDayOff\models;

use David\ProyectoDayOff\lib\Model;
use PDO;
use PDOException;
use R as Redbean;
class User extends Model{
    const TABLE = "users";
    private int $id;

    public function __construct(private string $username, private string $password)
    {
        parent::__construct();
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ["cost"=>10]);
    }

    public function save(){
        $user = $this->dispenseElement(self::TABLE);
        $user->username = $this->username;
        $user->password = $this->getHashedPassword($this->password);
        $user->role_id = 1;
        $id = $this->storeElement($user);
        $this->id = $id;
    }

    public static function exists($username){
        $user = self::getAllElements(self::TABLE, "username = $username");
        if (count($user) > 0) {
            return true;
        }else {
            return false;
        }
        return false;
    }

    public static function getUser($username){
        $data = self::getAllElements(self::TABLE, "username = $username");

        $user = new User($data["email"], $data["username"], $data["password"]);
        $user->setId($data["id"]);

        return $user;
    }

    public function comparePassword($password){
        return password_verify($password, $this->password);
    }

    public function createAdmin(){
        $user = $this->dispenseElement(self::TABLE);
        $user->username = $this->username;
        $user->password = $this->getHashedPassword($this->password);
        $user->role = 2;
        $id = $this->storeElement($user);
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}