<?php

require_once "Pessoa.php";
class Cliente extends Pessoa {
    private string $formaDePagamento;
    public function __construct(string $nome,string $rg, string $cpf,string $email,string $telefone) {
        parent::__construct($nome, $rg, $cpf, $email, $telefone);
    }

  public function setFormaDePagamento(string $formaDePagamento){
    $this->formaDePagamento = $formaDePagamento;
  }
  public function getFormaDePagamento(){
    return $this->formaDePagamento;
  }
  static public function getFilename() {
      return "Cliente.php";
  }
}
