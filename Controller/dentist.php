<?php

require_once "../Model/HiredDentist.php";
require_once "../Model/PartnerDentist.php";

$dentists = "C:/Users/Jefferson/projetos/estudos/Php/stores/dentists.txt";

$name = $_POST['name'];
$document = $_POST['document'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$relation = $_POST['relation'];
$cro = $_POST['cro'];
$payment = $_POST['payment'];
$specialty = $_POST['specialty'];

$specialtyArray = explode(", ", $specialty);

if($relation == "contratado") {
    $newDentist = new HiredDentist($name, $document, $email, $phone, $cro, $specialtyArray, $payment ? $payment : 0);
}

if($relation == "parceiro") {
    $newDentist = new PartnerDentist($name, $document, $email, $phone, $cro, $specialtyArray, $payment ? $payment : 0);
}


$content = json_encode(array("name"=> $newDentist->getName(),
 "document"=> $newDentist->getDocument(),
 "email"=> $newDentist->getEmail(),
 "phone"=> $newDentist->getPhone(),
 "payment"=> $relation == "contratado" ? 'R$ ' . $payment : $payment . '%',
 "cro"=> $newDentist->getCRO(),
 "relation"=> $relation,
 "specialty"=> $specialtyArray
 )
 ) . "\r\n";

$openFile = fopen($dentists, 'a');

fwrite($openFile, $content);

fclose($openFile);

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://localhost/?page=dentistas', false);