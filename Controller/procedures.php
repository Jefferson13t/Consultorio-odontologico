<?php

require_once "../Model/Procedure.php";
$procedures = "C:/Users/Jefferson/projetos/estudos/Php/stores/procedures.txt";

$name = $_POST['name'];
$cost  = $_POST['cost'];
$description  = $_POST['description'];
$specialty  = $_POST['specialty'];

$newProcedure = new Procedure($name, $cost ? $cost : 0, $description, $specialty);

$content = json_encode(array("procedimento"=> $newProcedure->getName(),
 "valor"=> $newProcedure->getCost(),
 "descricao"=> $newProcedure->getDescription(),
 "especialidade"=> $newProcedure->getSpecialty()
 )) . "\r\n";

$openFile = fopen($procedures, 'a');

fwrite($openFile, $content);

fclose($openFile);

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://localhost/?page=administrativo', false);