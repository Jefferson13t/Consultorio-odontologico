<?php

require_once "Persist.php";
require_once "Data.php";
require_once "Procedimento.php";
require_once "Paciente.php";
require_once "Cliente.php";
require_once "Dentista.php";


class Orcamento extends Persist {
  private Paciente $paciente;
  private Dentista $dentistaResponsavel;
  private Data $dataDeRealizacao;
  private array $listaDeProcedimentos = [];
  private float $total;

  public function __construct(Paciente $paciente, Dentista $dentistaResponsavel, Data $dataDeRealizacao, array $listaDeProcedimentos) {
    $this->setPaciente($paciente);
    $this->setDentistaResponsavel($dentistaResponsavel);
    $this->setDataDeRealizacao($dataDeRealizacao);
    $this->total = 0;
    $this->setListaDeProcedimentos($listaDeProcedimentos);
}
    public function setPaciente(Paciente $paciente){
      $this->paciente = $paciente;
    }
    public function getPaciente(){
      return $this->paciente;
  }
    public function setDentistaResponsavel(Pessoa $dentistaResponsavel){
      $this->dentistaResponsavel = $dentistaResponsavel;
  }
    public function getDentistaResponsavel(){
      return $this->dentistaResponsavel;
;
  }
    public function setDataDeRealizacao(Data $dataDeRealizacao){
    $this->dataDeRealizacao = $dataDeRealizacao;
  }
    public function getDataDeRealizacao(){
    return $this->dataDeRealizacao->getData();
  }
    public function setListaDeProcedimentos(array $procedimentos){
        array_push($this->listaDeProcedimentos, $procedimentos);

        foreach($procedimentos as $procedimento){
          $this->total += $procedimento->getCusto();
        }
  }
    public function getListaDeProcedimentos(){
      return $this->listaDeProcedimentos;
  }

    public function getValorTotal(){
      return $this->total;

}
  static public function getFilename() {
      return "Orcamento.php";
  }
}
