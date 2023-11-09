<?php

require_once "persist.php";
require_once 'Orcamento.php';

class Tratamento extends Persist {
    private Orcamento $orcamento;
    private string $formaDePagamento;

    public function __construct(Orcamento $orcamento, string $formaDePagamento) {
        $this->orcamento = $orcamento;
        $this->formaDePagamento = $formaDePagamento;
    }
      public function setOrcamento(Orcamento $orcamento) {
        $this->orcamento = $orcamento;
    }

    public function getOrcamento() {
        return $this->orcamento;
    }
    public function setFormaDePagamento(string $formaDePagamento) {
        $this->formaDePagamento = $formaDePagamento;
    }

    public function getFormaDePagamento() {
        return $this->formaDePagamento;
    }
    static public function getFilename() {
      return "Tratamento.php";
    }
}