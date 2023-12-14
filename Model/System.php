<?php

require_once "Profile.php";
require_once "Cache.php";
require_once "Procedure.php";
require_once "Patient.php";
require_once "Client.php";
require_once "Date.php";
require_once "PartnerDentist.php";
require_once "HiredDentist.php";
require_once "Treatment.php";
require_once "PaymentForm.php";
require_once "Appointment.php";

date_default_timezone_set('America/Sao_Paulo');

final class System{

    private static ?System $instance;
    private array $profileList;
    private array $cache;
    private float $tax;
    private function __construct() {
        $this->cache = [];
        $this->profileList = [];
    }
    private function __clone(){
    }
    public static function getInstance(): System{

        if(!isset(self::$instance)){
            self::$instance = new static();
        }

        return self::$instance;
    }
    public function createProfile(Person $user, string $password, int $level) {

        if(!$user){
            throw new Exception("é necessario passar uma pessoa como parametro");
        }
        $newProfile = new Profile($user, $password, $level);

        array_push($this->profileList, $newProfile);
        return $newProfile;
    }
    public function setTax(float $taxValue){
        $this->tax = $taxValue;
    }
    public function getProfile(string $document) {
        for($i = 0; $i < count($this->profileList); $i++){
            if($this->profileList[$i]->getUser()->getDocument() == $document){
                return $this->profileList[$i];
        }
    }
    return null;
}

    public function login(string $document, string $password){
        $profile = $this->getProfile($document);

        if(!$profile){
            throw new Exception("User not found");
        }
        if($profile->getPassword() != $password){
            throw new Exception("incorrect password");
        }
        array_push($this->cache, new Cache($profile, 
            new Date(date("d"), date("m"), date("Y"), date("H"), date("i")), 
            !$profile->getIsLogged())
        );
        $profile->toggleIsLogged();

        return $profile;
    }
    public function getCache(){
        return $this->cache; 
    }

}

$system = System::getInstance();

$newProfile = $system->createProfile(new Person("name", "document", "email", "phone"),"password", 1);

var_dump($newProfile);