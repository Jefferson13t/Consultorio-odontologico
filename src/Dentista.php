<?php

require_once "Especialidade.php";
require_once "Pessoa.php";

class Dentista extends Pessoa {
  private string $cro;
  private array $especialidade;

  public function __construct(string $nome, string  $rg, string  $cpf, string  $email, string  $telefone, string  $cro, array $especialidade) {
    parent::__construct($nome, $rg, $cpf, $email, $telefone);
    $this->setCro($cro);
    $this->especialidade = $especialidade;
  }

  public function setCro(string $cro){
    $this->cro = $cro;
  }

  public function getCro(){
    return $this->cro;
  }
  public function setEspecialidade(array $especialidade){

    for($i = 0; $i < count($especialidade); $i++)
    {
      array_push($this->especialidade, $especialidade[$i]);
    }
    $this->especialidade = $especialidade;
  }
  public function getEspecialidade(){
    return $this->especialidade;
  }
}