<?php

require_once "persist.php";

class Endereco extends Persist
{
    private int $numero;
    private string $rua;
    private string $bairro;
    private string $cidade;

    public function __construct(string $rua, int $numero, string $bairro, string $cidade)
    {
        $this->setEndereco($rua, $numero, $bairro, $cidade);
    }
    public function setEndereco(string $rua, int $numero, string $bairro, string $cidade)
    {
        $this->numero = $numero;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
    }

    public function getEndereco()
    {
        return "{$this->rua}, {$this->numero}, {$this->bairro} - {$this->cidade}";
    }
  static public function getFilename() {
      return "Endereco.php";
  }
}
