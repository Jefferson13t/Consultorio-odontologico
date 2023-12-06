<?php

require_once "persist.php";

class Especialidade extends persist {

private string $nome;
private float $percentualDeExecucao;


public function __construct(string $nome, float $percentualDeExecucao) {
$this->setNome($nome);
$this->setPercentualDeExecucao($percentualDeExecucao);
}

public function setNome (string $nome )
{
  $this->nome = $nome;
}
public function getNome ()
{
  return $this->nome;
}
public function setPercentualDeExecucao (float $percentualDeExecucao )
{
  $this->percentualDeExecucao = $percentualDeExecucao;
}
public function getPercentualDeExecucao ()
{
  return $this->percentualDeExecucao;
}

static public function getFilename() {
    return "Endereco.php";
}
}

