<?php

require_once "Person.php";

class Dentist extends Person {
  private string $CRO;
  private array $specialty;

  public function __construct(string $name, string  $document, string  $email, string  $phone, string  $CRO, array $specialty) {
    parent::__construct($name, $document, $email, $phone);
    $this->setCRO($CRO);
    $this->setSpecialty($specialty);
  }

  public function setCRO(string $CRO){
    $this->CRO = $CRO;
  }

  public function getCRO(){
    return $this->CRO;
  }
  public function setSpecialty(array $specialty){
    if (!isset($this->specialty)) {
      $this->specialty = $specialty;
    } else {
      $this->specialty = array_merge($this->specialty, $specialty);
    }
  }
  public function getSpecialty(){
    return $this->specialty;
  }
}