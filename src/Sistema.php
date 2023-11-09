<?php

require_once "persist.php";
require_once "Perfil.php";
require_once "Cache.php";

final class Sistema extends persist{

    private array $listaPerfis;
    private static ?Sistema $instance;

    private array $cache;
    private function __construct() {
        $this->listaPerfis = [];
        $this->cache = [];
    }
    private function __clone(){
    }
    public static function getInstance(): Sistema{

        if(!isset(self::$instance)){
            self::$instance = new static();
        }

        return self::$instance;
    }
    public function criarPerfil(string $login,string $senha, Pessoa $usuario, int $nivel) {

        $novoPerfil = new Perfil($login, $senha, $usuario, $nivel);

        array_push($this->listaPerfis, $novoPerfil);

        return $novoPerfil;
    }
    public function getPerfil(string $cpf) {
        for($i = 0; $i < count($this->listaPerfis); $i++){
            if($this->listaPerfis[$i]->getUsuario()->getCpf() == $cpf){
                return $this->listaPerfis[$i];
        }
    }
    return "Cpf não cadastrado.";
}

    public function adicionarLog(Perfil $usuario){

        // $hora = new DateTime('now');

        // $log = new Cache($usuario, )
        // array_push($this->cache, $log)
    }
    static public function getFilename() {
    return "";
}
}


//(string $nome, string $rg, string $cpf, string $email, string $telefone)
$p1 = new Pessoa("n1","r1","c1","e1","t1");
$p2 = new Pessoa("n2","r2","c2","e2","t2");
$p3 = new Pessoa("n3","r3","c3","e3","t3");

//(string $login,string $senha, Pessoa $usuario, int $nivel)
$sistema = Sistema::getInstance();
$sistema2 = Sistema::getInstance();

$sistema->criarPerfil("Ze1", "Senha1", $p1, 1);
$sistema->criarPerfil("Ze2", "Senha2", $p2, 2);
$sistema->criarPerfil("Ze3", "Senha3", $p3, 3);

//(int $dia, int $mes, int $ano, int $hora, int $minuto)
$data = new Data(8,11,2023,1,27);

$cache = new Cache($sistema->getPerfil("c1"), $data);

echo $cache->getAcesso();