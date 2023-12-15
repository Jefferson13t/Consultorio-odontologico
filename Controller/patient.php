<?php

require_once "../Model/Patient.php";

$patient = "C:/Users/Jefferson/projetos/estudos/Php/stores/patients.txt";

$name = $_POST['name'];
$document = $_POST['document'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birth = $_POST['birth'];
$clientDoc = $_POST['clientDoc'];

$newPatient = new Patient($name, $document, $phone, $email,
new Date(date("d"), date("m"), date("Y"), date("H"), date("i")),  
new Client("", $clientDoc, $email, $phone, []));

$content = json_encode(array("name"=> $newPatient->getName(),
 "document"=> $newPatient->getDocument(),
 "email"=> $newPatient->getEmail(),
 "phone"=> $newPatient->getPhone(),
 "clientDoc"=> $newPatient->getResponsible()->getDocument(),
 )
 ) . "\r\n";

$openFile = fopen($patient, 'a');

fwrite($openFile, $content);

fclose($openFile);

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://localhost/?page=clientes', false);