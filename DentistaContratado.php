<?php

require_once 'Dentista.php';

class DentistaContratado extends Dentista {
    private string $salario;  

    public function __construct(string $nome, string $rg, string $cpf, string $email, string $telefone, string $cro, string $especialidade, float $salario) {
      parent::__construct($nome, $rg, $cpf, $email, $telefone, $cro, $especialidade);
      $this->setSalario($salario);
    }
    public function setSalario($salario) {
      $this->salario = $salario;
 }
  public function getSalario() {
      return $this->salario;
  }
  static public function getFilename() {
      return "DentistaContratado.php";
  }

}