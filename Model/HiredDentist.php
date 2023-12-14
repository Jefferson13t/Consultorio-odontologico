<?php

require_once 'Dentist.php';

class HiredDentist extends Dentist {
    private float $salary;  

    public function __construct(string $name, string $document, string $email, string $phone, string $CRO, array $specialty, float $salary) {
      parent::__construct($name, $document, $email, $phone, $CRO, $specialty);
      $this->setSalary($salary);
    }
    public function setSalary(float $salary) {
      $this->salary = $salary;
 }
  public function getSalary() {
      return $this->salary;
  }
}