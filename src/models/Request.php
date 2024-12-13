<?php

namespace David\ProyectoDayOff\models;

use DateTime;
use David\ProyectoDayOff\lib\Model;
use Carbon\Carbon;

class Request extends Model{

    private int $userId;
    private int $requestTypeId;
    private int $statusId;
    
    public function __construct(private string $reason, private DateTime $startTime, private DateTime $endTime, private DateTime $date)
    {
        parent::__construct();
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getRequestTypeId(){
        return $this->requestTypeId;
    }

    public function getStatusId(){
        return $this->statusId;
    }

    public function getReason(){
        return $this->reason;
    }

    public function getStartTime(){
        return $this->startTime;
    }

    public function getEndTime(){
        return $this->endTime;
    }

    public function getDate(){
        return $this->date;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function setRequestTypeId($requestTypeId){
        $this->requestTypeId = $requestTypeId;
    }

    public function setStatusId($statusId){
        $this->statusId = $statusId;
    }
    
    public function setReason($reason){
        $this->reason = $reason;
    }
    
    public function setStartTime($startTime){
        $this->startTime = $startTime;
    }

    public function setEndTime($endTime){
        $this->endTime = $endTime;
    }

    public function setDate($date){
        $this->date = $date;
    }

}