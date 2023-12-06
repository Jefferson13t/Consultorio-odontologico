<?php

require_once "persist.php";
require_once "Perfil.php";
require_once "Cache.php";
require_once "Procedimento.php";
require_once "Paciente.php";
require_once "Cliente.php";
require_once "Data.php";
require_once "DentistaParceiro.php";
require_once "DentistaContratado.php";
require_once "Agendamento.php";
require_once "Orcamento.php";
require_once "Especialidade.php";
require_once "formaDePagamento.php";

final class Sistema extends persist{

    private array $listaPerfis;
    private float $imposto;
    private static ?Sistema $instance;
    private array $listaOrcamento;
    private array $listaProcedimento;
    private array $listaEspecialidade;
    private array $listaFormasDePagamento;
    private array $listaDentistas;
    private array $pacientes;
    private array $listaConsulta;




    private array $cache;
    private function __construct() {
        $this->listaPerfis = [];
        $this->cache = [];
        $this->listaOrcamento = [];
        $this->listaProcedimento = [];
        $this->listaEspecialidade = [];
        $this->listaFormasDePagamento = [];
        $this->listaConsulta = [];
        $this->imposto = 0;
    }
    private function __clone(){
    }
    public static function getInstance(): Sistema{

        if(!isset(self::$instance)){
            self::$instance = new static();
        }

        return self::$instance;
    }
    public function criarPerfil(string $login, string $senha, Pessoa $usuario, int $nivel) {

        $novoPerfil = new Perfil($login, $senha, $usuario, $nivel);

        array_push($this->listaPerfis, $novoPerfil);

        return $novoPerfil;
    }
    public function setImposto(float $percentual){
        $this->imposto = $percentual;
    }
    public function getPerfil(string $cpf) {
        for($i = 0; $i < count($this->listaPerfis); $i++){
            if($this->listaPerfis[$i]->getUsuario()->getCpf() == $cpf){
                return $this->listaPerfis[$i];
        }
    }
    echo "Cpf não cadastrado." . PHP_EOL;
    return ;
}

    public function logar(string $cpf, string $senha){
        $usuario = $this->getPerfil($cpf);
        if(!$usuario){
            echo "Usuario não encontrado" . PHP_EOL;
            return ;
        }

        $usuario->setIsLogged();

        for($i = 0; $i < count($this->cache); $i++){
            if($this->cache[$i]->getUsuario()->getUsuario()->getCpf() == $cpf && $this->cache[$i]->getSaida() == null){
                $this->cache[$i]->setSaida(new Data(date("d"), date("m"), date("Y"), date("H") - 3, date("i")));
                return $usuario;
            };
        }

        if($usuario->getSenha() != $senha){
            echo "Senha incorreta" . PHP_EOL;
            return ;
        }

        $log = new Cache($usuario, new Data(date("d"), date("m"), date("Y"), date("H") - 3, date("i")));
        array_push($this->cache, $log);
        return $usuario;
    }
    public function showLog(){
        for($i = 0; $i < count($this->cache); $i++){
            echo "Entrada: " . $this->cache[$i]->getAcesso() . PHP_EOL;  
        }
    }
    public function addOrcamento(Paciente $paciente, Dentista $dentistaResponsavel, Data $dataDeRealizacao, array $listaDeProcedimentos) {
        array_push($this->listaOrcamento, new Orcamento($paciente, $dentistaResponsavel, $dataDeRealizacao, $listaDeProcedimentos));
    }
    public function showOrcamentos(){
        for($i = 0; $i < count($this->listaOrcamento); $i++){
            echo $this->listaOrcamento[$i] . PHP_EOL;
        }
    }
    public function addProcedimento(string $nome, float $custo, string $descricao, string $especialidade) {
        array_push($this->listaProcedimento, new Procedimento($nome, $custo, $descricao, $especialidade));
    }
    public function showProcedimentos(){
        for($i = 0; $i < count($this->listaProcedimento); $i++){
            echo $this->listaProcedimento[$i] . PHP_EOL;
        }
    }
    public function getProcedimento(int $index) {
        return $this->listaProcedimento[$index];
    }
    public function addEspecialidade(string $nome, float $custo) {
        array_push($this->listaEspecialidade, new Especialidade($nome, $custo));
    }
    public function getEspecialidade(int $index){
        return $this->listaEspecialidade[$index];
    }
    public function addFormaDePagamento(string $tipoFormaDePagamento, float $desconto) {
        array_push($this->listaFormasDePagamento, new formaDePagamento($tipoFormaDePagamento, $desconto));
    }
    public function addConsulta(Paciente $paciente, Data $inicio, Data $termino, Dentista $dentista, array $procedimento) {
        array_push($this->listaConsulta, new Consulta($paciente, $inicio, $termino, $dentista, $procedimento));
    }
    
    public function acessarFuncionalidade(Perfil $usuario, string $funcionalidade, array $parametros) {
        if(!$usuario->getIsLogged()){
            echo "É Preciso estar logado para acessar a funcionalidade" . PHP_EOL;
            return ;
        }

        if($funcionalidade == "cadastrar orcamento") {
            $this->addOrcamento($parametros[0],$parametros[1],$parametros[2],$parametros[3]);
        }  
        if($funcionalidade == "cadastrar procedimento") {
            if($usuario->getNivel() < 2){
                echo "Este usuario não pode acessar esta funcionalidade" . PHP_EOL;
                return ;
            }
                $this->addProcedimento($parametros[0],$parametros[1],$parametros[2],$parametros[3]);
        }  
        if($funcionalidade == "cadastrar especialidade") {
            $this->addEspecialidade($parametros[0], $parametros[1]);
        }  
        if($funcionalidade == "cadastrar forma de pagamento"){
            $this->addFormaDePagamento($parametros[0], $parametros[1]);          
        }
        if($funcionalidade == "cadastrar consulta"){
            $this->addConsulta($parametros[0],$parametros[1],$parametros[2],$parametros[3], $parametros[4]);
        }
    }
    static public function getFilename() {
    return "";
}
}

//Inicializa o sistema
$sistema = Sistema::getInstance();

$p1 = new Pessoa("Jhon Doe","12345879","12799536874","doejhon@gmail.com","40028922");
$p2 = new Pessoa("jujuba","32158792","86473579921","jujuba@gmail.com","03002012030");
$p3 = new Pessoa("Florzinha","13245878","12997537468","florzinha@gmail.com","03002012015");


//Cadastrando dentista contratado e Dentista parceiro 
$dentista1 = new DentistaContratado("House","196060","13705570169","drhouse@gmail.com","219508070", "CRO-4321", ["Clínica Geral", "Endodontia", "Cirurgia"], 5000);
$dentista2 = new DentistaParceiro("Hans Chucrute","187070","12707070059","chucrutehans@gmail.com","3199707070", "CRO-1234", ["Clínica Geral", "Estética"], 0.4);


//Cadastrando cliente e paciente cujo cliente é o responsavel financeiro
$cliente = new Cliente("Flora","13245787","12997538674","flora@gmail.com","40028922");
$paciente = new Paciente("Florzinha","13245878","12997537468","florzinha@gmail.com","40028922", new Data(05, 12, 2016, 4, 20), $cliente);

//perfil com nivel de acesso basico
$perfilComum = $sistema->criarPerfil("jhon", "senhaSegura123", $p1, 1);

//perfil com nivel de acesso total
$perfilAdmin = $sistema->criarPerfil("Jujuba", "senhaMaisSegura123", $p2, 2);


//tentativa de acesso sem estar logado
$sistema->acessarFuncionalidade($perfilComum, "cadastrar orcamento", [  $paciente, 
$dentista1, 
new Data(date("d") + 14, date("m"), date("Y"), 13, 30),
                                                                        [
                                                                            "Restauração",
                                                                            "Limpeza"
                                                                        ]
                                                                    ]);

$perfilComum = $sistema->logar("12799536874", "senhaSegura123");

$sistema->acessarFuncionalidade($perfilComum, "cadastrar procedimento", [   "Limpeza", 
                                                                            200, 
                                                                            " ",
                                                                            "Clínica Geral"
                                                                        ]);
                                                                        
//Deslogando usuario com acesso basico
$perfilComum = $sistema->logar("12799536874", "senhaSegura123");

//Logando usuario com acesso completo
$perfilAdmin = $sistema->logar("86473579921", "senhaMaisSegura123");

//Cadastrando as especialidades
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar especialidade", ["Clínica Geral", 1]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar especialidade", ["Endodontia", 1]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar especialidade", ["Cirurgia", 1]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar especialidade", ["Estética", 1]);

//Cadastrando os procedimentos
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["consulta", 0, "", "Clínica Geral"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Limpeza", 200, "", "Clínica Geral"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Restauração", 185, "", "Clínica Geral"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Extração Comum", 280, "Não inclui dente siso.", "Clínica Geral"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Canal", 800, "", "Endodontia"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Extração de Siso", 400, "Valor por dente", "Cirurgia"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Clareamento a laser", 1700, "", "Estética"]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar procedimento", ["Clareamento de moldeira", 900, "Clareamento caseiro", "Estética"]);

//Cadastrando formas de Pagamento
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar forma de pagamento", ["Dinheiro à vista", 0]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar forma de pagamento", ["Pix", 0]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar forma de pagamento", ["Débito", 0.03]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar forma de pagamento", ["Crédito de 1 a 3x", 0.04]);
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar forma de pagamento", ["Crédito de 4 a 6x", 0.07]);

//definindo valor do imposto da clinica
$sistema->setImposto(0.2);

//cadastrando agendamento
$sistema->acessarFuncionalidade($perfilAdmin, "cadastrar consulta", [$sistema->getProcedimento[0], 
                                                                        $sistema->getEspecialidade[0], 
                                                                        $dentista2, 
                                                                        new Data(06, 11, 2023, 14, 00), 
                                                                        null
                                                                        ]);



                                                                        

// //cadastrando orcamento
// $sistema->acessarFuncionalidade($perfilAdmin, "cadastrar orcamento", [  $paciente, 
// $dentista1, 
// new Data(date("d") + 14, date("m"), date("Y"), 13, 30),
//                                                                         [
//                                                                             "Restauração",
//                                                                             "Limpeza"
//                                                                         ]
//                                                                     ]);