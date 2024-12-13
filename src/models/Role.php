<?php

namespace David\ProyectoDayOff\models;

use David\ProyectoDayOff\lib\Model;
use R as GlobalR;

class Role extends Model
{
    const TABLE = "roles";
    public function __construct(private string $role)
    {
        parent::__construct();
    }

    public function createRole()
    {
        $role = $this->dispenseElement(self::TABLE);
        $role->role = $this->role;
        $this->storeElement($role);
    }

    public function getAllRoles()
    {
        $roles = $this->getAllElements(self::TABLE);
        return $roles;
    }

    public function getSingleRole($id){
        $role = $this->getElement(self::TABLE, $id);
        return $role;
    }

    public function updateRole($id,$newRole){
        $role = $this->getElement(self::TABLE,$id);
        $role->role = $newRole;
        $this->storeElement($role);
    }

    public function delete($id){
        $role = $this->getElement(self::TABLE, $id);
        $this->deleteElement($role);
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }
}
