<?php

require_once "../Model/System.php";
require_once "../Model/Person.php";
$file = "C:/Users/Jefferson/projetos/estudos/Php/stores/profiles.txt";

$system = System::getInstance();

$name = $_POST['name'];
$document  = $_POST['document'];
$password  = $_POST['password'];
$email  = $_POST['email'];
$phone  = $_POST['phone'];
$permission = $_POST['permission'] == 'comum' ? 0 : 1;

$newProfile = $system->createProfile(new Person($name, $document, $email, $phone), $password, $permission);

$content = json_encode(array("name"=> $newProfile->getUser()->getName(),
 "document"=> $newProfile->getUser()->getDocument(),
 "email"=> $newProfile->getUser()->getEmail(),
 "phone"=> $newProfile->getUser()->getPhone(),
 "password"=> $newProfile->getPassword(),
 "level"=> $newProfile->getLevel())
 ) . "\r\n";

$openFile = fopen($file, 'a');

fwrite($openFile, $content);


fclose($openFile);

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://localhost/?page=administrativo', false);