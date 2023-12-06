<?php

require_once "Pessoa.php";
require_once "persist.php";

class Perfil extends persist{
    private string $login;
    private string $senha;
    private Pessoa $usuario;
    private int $nivel;
    private bool $isLogged;

    public function __construct(string $login,string $senha, Pessoa $usuario, int $nivel) {
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setUsuario($usuario);
        $this->setNivel($nivel);
        $this->isLogged = false;

    }
    public function setLogin(string $login){
        $this->login = $login;
    }
    public function getLogin() {
        return $this->login;
    }
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setUsuario(Pessoa $usuario){
        $this->usuario = $usuario;	
    }
    public function getUsuario(){
        return $this->usuario;	
    }
    public function setNivel(int $nivel){
        $this->nivel = $nivel;	
    }
    public function getNivel(){
        return $this->nivel;	
    }
    public function setIsLogged(){
        $this->isLogged = !$this->isLogged;
    }
    public function getIsLogged():bool{
        return (bool) $this->isLogged;
    }

      static public function getFilename() {
      return "Perfil.php";
    }
}