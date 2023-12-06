<?php

require_once "persist.php";

class FormaDePagamento extends persist {

private string $TipoDePagamento;
private float $desconto;  

public function __construct(string $TipoDePagamento,float $desconto) {
$this->setTipoDePagamento($TipoDePagamento);
$this->setDesconto($desconto);
}

  public function setTipoDePagamento(string $TipoDePagamento)
  {
    $this->TipoDePagamento= $TipoDePagamento;
  }
  public function getTipoDePagamento()
  {
    return $this->TipoDePagamento;
  }
  public function setDesconto(float $desconto)
  {
    $this->desconto= $desconto;
  }
  public function getDesconto()
  {
    return $this->desconto;
  }

static public function getFilename() {
    return "Endereco.php";
}
}

