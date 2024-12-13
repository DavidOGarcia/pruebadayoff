<?php

namespace David\ProyectoDayOff\models;
use David\ProyectoDayOff\lib\Model;


class RequestType extends Model{
    const TABLE = "requesttype";
    const TYPES = ["Hourly PTO" => 40, "Time Adjustment" => 10, "Working Remotely" => 72, "Unpaid Time Off" => 72, "Project Hold" => 720];
    private int $id;  
    private string $name; 
    private int $availableHours;
    private int $spentHours; 

    public function __construct(private int $userId)
    {
        parent::__construct();
    }

    public function createRequestTypes(){
        foreach (self::TYPES as $type => $hours) {
            $requestType = $this->dispenseElement(self::TABLE);
            $requestType->user_id = $this->userId;
            $requestType->name = $type;
            $requestType->available_hours = $hours;
            $requestType->spent_hours = 0;
            $this->storeElement($requestType);
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getName(){
        return $this->name;
    }

    public function getAvailableHours(){
        return $this->availableHours;
    }

    public function getSpentHours(){
        return $this->spentHours;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUserId($userId){
        $this->id = $userId;
    }

    public function setName($name){
        $this->id = $name;
    }

    public function setAvailableHours($availableHours){
        $this->id = $availableHours;
    }

    public function setSpentHours($spentHours){
        $this->id = $spentHours;
    }
}