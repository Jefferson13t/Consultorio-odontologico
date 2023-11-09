<?php


require_once('Cliente.php');
require_once('Pessoa.php');
require_once('Data.php');

class Paciente extends Pessoa {
    private Data $nascimento;
    private Cliente $responsavel; 

    public function __construct(string $nome,string $rg, string $cpf, string $telefone, string $email, Data $nascimento, Cliente $responsavel) {
        parent::__construct($nome, $rg, $cpf, $email, $telefone);
        $this->setNascimento($nascimento);
        $this->setResponsavel($responsavel);
    }
    public function setNascimento(Data $nascimento) {
        $this->nascimento = $nascimento;
    }
    public function getNascimento(){
        return $this->nascimento;
    }
    public function setResponsavel(Cliente $responsavel) {
        $this->responsavel = $responsavel;
    }
    public function getResponsavel() {
        return $this->responsavel;
    }
  static public function getFilename() {
      return "Paciente.php";
  }
}