<?php

require_once "persist.php";

class Procedimento extends Persist{
  private string $nome;
  private float $custo;
  private string $descricao;
  private string $especialidade;

  public function __construct(string $nome, float $custo, string $descricao, string $especialidade)
  {
    $this->setNome($nome);
    $this->setCusto($custo);
    $this->setDescricao($descricao);
    $this->setEspecialidade($especialidade);
  }

  public function setNome(string $nome)
  {
    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setCusto(float $custo)
  {
    $this->custo = $custo;
  }

  public function getCusto()
  {
    return $this->custo;
  }
  public function setDescricao(string $descricao)
  {
    $this->descricao = $descricao;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }
  public function setEspecialidade(string $descricao)
  {
    $this->descricao = $descricao;
  }

  public function getEspecialidade()
  {
    return $this->especialidade;
  }
  static public function getFilename() {
      return "Procedimento.php";
  }
}