<?php

require_once "persist.php";
require_once "Procedimento.php";
require_once "especialidade.php";
require_once "Dentista.php";
require_once "Data.php";
require_once "Tratamento.php";

class Agendamento extends persist {
private Procedimento $procedimento;
private Especialidade $especialidade;
private Dentista $dentistaExecutor;
private Data $realizacao;
private Tratamento $tratamento;

public function __construct(Procedimento $procedimento, Especialidade $especialidade, Dentista $dentistaExecutor, Data $realizacao, Tratamento $tratamento) {
$this->setProcedimento ($procedimento);
$this->setEspecialidade($especialidade);
$this->setDentistaExecutor ($dentistaExecutor);
$this->setRealizacao ($realizacao);
$this->setTratamento ($tratamento);
}

public function setProcedimento (Procedimento $procedimento )
{
  $this->procedimento= $procedimento;
}
public function getProcedimento ()
{
  return $this->procedimento;
}

public function setEspecialidade (especialidade $especialidade )
{
  $this->especialidade = $especialidade;
}
public function getEspecialidade ()
{
  return $this->especialidade;
}

public function setDentistaExecutor (Dentista $dentistaExecutor)
{
  $this->dentistaExecutor = $dentistaExecutor;
}
public function getDentistaExecutor ()
{
  return $this->dentistaExecutor;
}

public function setRealizacao (Data $realizacao)
{
  $this->realizacao = $realizacao;
}
public function getRealizacao ()
{
  return $this->realizacao;
}

public function setTratamento (Tratamento $tratamento)
{
  $this->tratamento = $tratamento;
}
public function getTratamento ()
{
  return $this->tratamento;
}

static public function getFilename() {
    return "Agendamento.php";
}
}


