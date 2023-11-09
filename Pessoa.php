<?php

require_once "persist.php";
require_once './Endereco.php';

class Pessoa extends Persist
{
    protected string $nome;
    protected string $rg;
    protected string $cpf;
    protected string $email;
    protected string $telefone;
    protected Endereco $endereco;

    public function __construct(string $nome, string $rg, string $cpf, string $email, string $telefone)
    {
        $this->setNome($nome);
        $this->setRg($rg);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setTelefone($telefone);
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setEndereco(Endereco $endereco)
    {

        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco->getEndereco();
    }
    static public function getFilename() {
        return "";
    }
}