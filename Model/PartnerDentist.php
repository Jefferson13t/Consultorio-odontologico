<?php


require_once 'Dentist.php';

class PartnerDentist extends Dentist
{
  private float $commission;

  public function __construct(string $name, string $document, string $email, string $phone, string $CRO, array $specialty, float $commission)
  {
    parent::__construct($name, $document, $email, $phone, $CRO, $specialty);
    $this->setCommisison($commission);
  }

  public function setCommisison(float $commission)
  {
    $this->commission = $commission;
  }
  public function getPayment()
  {
    return $this->commission;
  }
}