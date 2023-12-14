<?php

require_once "Person.php";
require_once "PaymentForm.php";

class Client extends Person {
    private array $paymentForms;
    public function __construct(string $name, string $document,string $email,string $phone, array $paymentForm) {
        parent::__construct($name, $document, $email, $phone);
        $this->setPaymentForms($paymentForm);
    }

  public function setPaymentForms(array $paymentForm){

    if (!isset($this->paymentForms)) {
      $this->paymentForms = $paymentForm;
    } else {
      $this->paymentForms = array_merge($this->paymentForms, $paymentForm);
    }
  }
  public function getPaymentForms(){
    return $this->paymentForms;
  }

}
