<?php

class Procedure {
  private string $name;
  private float $cost;
  private string $description;
  private string $specialty;

  public function __construct(string $name, float $cost, string $description, string $specialty)
  {
    $this->setName($name);
    $this->setCost($cost);
    $this->setDescription($description);
    $this->setSpecialty($specialty);
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setCost(float $cost)
  {
    $this->cost = $cost;
  }

  public function getCost()
  {
    return $this->cost;
  }
  public function setDescription(string $description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }
  public function setSpecialty(string $specialty)
  {
    $this->specialty = $specialty;
  }

  public function getSpecialty()
  {
    return $this->specialty;
  }
}