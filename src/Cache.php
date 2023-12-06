<?php

require_once "persist.php";
require_once "Perfil.php";
require_once "Data.php";

class Cache extends persist{

    private Perfil $usuario;
    private Data $entrada;
    private ?Data $saida;


    public function __construct(Perfil $usuario, $entrada) {
        $this->usuario = $usuario;
        $this->entrada = $entrada;
        $this->saida = null ;
    }
    public function getUsuario(){
        return $this->usuario;
    }

    public function setSaida(Data $data) {
        $this->saida = $data;
    }
    public function getSaida(){
        return $this->saida;
    }
    public function getAcesso() {
        if($this->saida == null){
            return "{$this->usuario->getLogin()} | Entrada: {$this->entrada->getData()} | Saída: - ";
        }
            return "{$this->usuario->getLogin()} | Entrada: {$this->entrada->getData()} | Saída: {$this->saida->getData()}";
    }
    static public function getFilename() {
        return "";
    }
}
