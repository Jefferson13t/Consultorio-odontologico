<?php

require_once 'Pessoa.php';
require_once 'Professor.php';
require_once 'Funcionario.php';
require_once 'Cache.php';
require_once 'Cliente.php';
require_once 'Consulta.php';
require_once 'Data.php';
require_once 'DentistaContratado.php';
require_once 'DentistaParceiro.php';
require_once 'Funcionario.php';
require_once 'Sistema.php';
require_once 'Procedimento.php';
require_once 'Tratamento.php';


function autoloader($pClassName) {
    //echo __NAMESPACE__;
    $path = __DIR__ . '/classes/' . $pClassName . '.php';
    if (is_file($path)) {
        include_once $path;
    }
    else {
        $path = __DIR__ . '/classes/class.' . $pClassName . '.php';
        if (is_file($path)) {
            include_once $path;
        }
        else
            throw( new Exception('Não foi encontrada a definição da classe '.$pClassName.' na pasta classes.'));
    }
}
spl_autoload_register('autoloader');