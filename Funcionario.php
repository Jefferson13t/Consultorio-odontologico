<?php

require_once 'Pessoa.php';

class Funcionario extends Pessoa {
    private string $funcao;
    private string $salario;    

    public function __construct(string $nome,string $rg, string $cpf,string $email,string  $telefone, string $funcao,float $salario) {
        parent::__construct($nome, $rg, $cpf, $email, $telefone);
        $this->setFuncao($funcao);
        $this->setSalario($salario);
    }
    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
   }
    public function getSalario() {
        return $this->salario;
    }
  static public function getFilename() {
      return "Funcionario.php";
  }
}