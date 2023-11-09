<?php

require_once "persist.php";
require_once "Perfil.php";
require_once "Data.php";

class Cache extends persist{

    private Perfil $usuario;
    private Data $acesso;

    public function __construct(Perfil $usuario, Data $acesso) {
        $this->usuario = $usuario;
        $this->acesso = $acesso;
    }
 

    public function setAcesso(Perfil $usuario, Data $data) {
        $this->usuario = $usuario;
        $this->data = $data;
    }
    public function getAcesso() {
        return "login realizado pelo usuario {$this->usuario->getLogin()} às {$this->acesso->getData()}";
    }
    static public function getFilename() {
        return "";
    }
}
