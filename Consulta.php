<?php

require_once "persist.php";
require_once 'Paciente.php';
require_once 'Data.php';
require_once 'Dentista.php';
require_once 'Procedimento.php';

class consulta extends Persist
{
  private Paciente $paciente;
  private Data $inicio;
  private Data $termino;
  private Dentista $dentistaResponsavel;
  private array $listaDeProcedimentos = [];

  public function __construct(Paciente $paciente, Data $inicio, Data $termino, Dentista $dentista, array $procedimento)
  {
    $this->setPaciente($paciente);
    $this->setInicio($inicio);
    $this->setTermino($termino);
    $this->setDentista($dentista);
    $this->setProcedimento($procedimento);

  }

  public function setPaciente(Paciente $paciente)
  {
    $this->paciente = $paciente;
  }

  public function getPaciente()
  {
    return $this->paciente;
  }
  public function setInicio(Data $inicio)
  {
    $this->inicio = $inicio;
  }

  public function getInicio()
  {
    return $this->inicio;
  }

  public function setTermino(Data $termino)
  {
    $this->termino = $termino;
  }

  public function getTermino()
  {
    return $this->termino;
  }

  public function setDentista(Dentista $dentista)
  {
    $this->dentistaResponsavel = $dentista;
  }

  public function getDentista()
  {
    return $this->dentistaResponsavel;
  }
  public function setProcedimento(array $procedimento)
  {
    array_push($this->listaDeProcedimentos, $procedimento);
  }

  public function getProcedimento()
  {
    return $this->listaDeProcedimentos;
  }
  static public function getFilename() {
      return "Consulta.php";
  }
}