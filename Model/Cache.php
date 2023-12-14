<?php

require_once "Profile.php";
require_once "Date.php";

class Cache {
    private Profile $profile;
    private Date $operationDate;
    private string $operationType;

    public function __construct(Profile $profile, Date $operationDate, bool $operationType) {
        $this->profile = $profile;
        $this->operationDate = $operationDate;
        $this->operationType = $operationType ? "login" : "logoff";
    }

    public function getCache(){
        return $this->operationType . " | " . $this->operationDate->getDate() . " | User: " . $this->profile->getUser()->getName();
    }
    public function getOperation(){
        return $this->operationType;
    }
    public function getDate(){
        return $this->operationDate->getDate();
    }
}
