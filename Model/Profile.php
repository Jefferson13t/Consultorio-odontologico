<?php

require_once "Person.php";

class Profile {
    private Person $user;
    private string $password;
    private int $level;
    private bool $isLogged;

    public function __construct(Person $user, string $password, int $level) {
        $this->setUser($user);
        $this->setPassword($password);
        $this->setLevel($level);
        $this->isLogged = false;

    }
    public function setPassword(string $password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setUser(Person $user){
        $this->user = $user;	
    }
    public function getUser(){
        return $this->user;	
    }
    public function setLevel(int $level){
        $this->level = $level;	
    }
    public function getLevel(){
        return $this->level;	
    }
    public function toggleIsLogged(){
        $this->isLogged = !$this->isLogged;
    }
    public function getIsLogged():bool{
        return (bool) $this->isLogged;
    }
}