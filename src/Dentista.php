<?php

class Dentista extends Pessoa {
  private string $cro;
  private string $especialidade;

  public function __construct($nome, $rg, $cpf, $email, $telefone, $cro, $especialidade) {
    parent::__construct($nome, $rg, $cpf, $email, $telefone);
    $this->setCro($cro);
    $this->setespecialidade($especialidade);
  }

  public function setCro($cro){
    $this->cro = $cro;
  }

  public function getCro(){
    return $this->cro;
  }
  public function setEspecialidade($especialidade){
    $this->especialidade = $especialidade;
  }
  public function getEspecialidade(){
    return $this->especialidade;
  }
}