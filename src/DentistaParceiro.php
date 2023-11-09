<?php

require_once 'Pessoa.php';

class DentistaParceiro extends Dentista
{
  private float $percentualDeParticipacao;

  public function __construct(string $nome, string $rg, string $cpf, string $email, string $telefone, string $cro, string $especialidade, float $percentualDeParticipacao)
  {
    parent::__construct($nome, $rg, $cpf, $email, $telefone, $cro, $especialidade);
    $this->setPercentual($percentualDeParticipacao);

  }

  public function setPercentual(float $percentualDeParticipacao)
  {
    $this->percentualDeParticipacao = $percentualDeParticipacao;
  }
  public function getPercentual()
  {
    return $this->percentualDeParticipacao;
  }
  static public function getFilename() {
      return "DentistaParceiro.php";
  }
}