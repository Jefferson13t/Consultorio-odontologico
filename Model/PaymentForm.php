<?php

class PaymentForm {

private string $type;
private float $discount;  

public function __construct(string $type,float $discount) {
$this->setType($type);
$this->setDiscount($discount);
}

  public function setType(string $type)
  {
    $this->type= $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setDiscount(float $discount)
  {
    $this->discount= $discount;
  }
  public function getDiscount()
  {
    return $this->discount;
  }
}