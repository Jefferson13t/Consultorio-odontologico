<?php

require_once "persist.php";

class Data extends Persist
{
    private int $dia;
    private int $mes;
    private int $ano;
    private int $hora;
    private int $minuto;

    public function __construct(int $dia, int $mes, int $ano, int $hora, int $minuto)
    {
        $this->setDia($dia);
        $this->setMes($mes);
        $this->setAno($ano);
        $this->setHora($hora);
        $this->setMinuto($minuto);
    }

    public function setDia(int $dia)
    {
        $this->dia = $dia;
    }

    public function getDia()
    {
        return $this->dia;
    }

    public function setMes(int $mes)
    {
        $this->mes = $mes;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function setAno(int $ano)
    {
        $this->ano = $ano;
    }

    public function getAno()
    {
        return $this->ano;
    }
    public function setHora(int $hora)
    {
        $this->hora = $hora;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setMinuto(int $minuto)
    {
        $this->minuto = $minuto;
    }

    public function getMinuto()
    {
        return $this->minuto;
    }
    public function getData()
    {
        return "{$this->getHora()}:{$this->getMinuto()} - {$this->getDia()}/{$this->getMes()}/{$this->getAno()}";
    }
    static public function getFilename() {
      return "Data.php";
    }

}

$agora = new DateTime('now');

var_dump($agora);