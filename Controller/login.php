<?php

date_default_timezone_set('America/Sao_Paulo');

require_once "../Model/Cache.php";
$profiles = "C:/Users/Jefferson/projetos/estudos/Php/stores/profiles.txt";
$cache = "C:/Users/Jefferson/projetos/estudos/Php/stores/cache.txt";

$document = $_POST['document'];
$password = $_POST['password'];

$log = new Cache(new Profile(new Person('-', $document, '-', '-'), $password, -1) , 
new Date(date("d"), date("m"), date("Y"), date("H"), date("i")), 
$document == true);

$content = json_encode(array("document"=> $document,
"operation"=> $log->getOperation(),
"date"=> $log->getDate())
) . "\r\n";

$openFile = fopen($cache, 'a');

fwrite($openFile, $content);

fclose($openFile);

if($document == false){
    echo '<script>';
    echo 'sessionStorage.clear()';
    echo '</script>';
} 

$openFile = fopen($profiles, 'r');

while($line = fgets($openFile)){
    $temp = json_decode($line);
    if($temp->document == $document && $temp->password == $password){
            
        echo '<script>';
        echo 'sessionStorage.setItem("document", "' . $temp->document . '");';
        echo 'sessionStorage.setItem("permissao", "' . $temp->level . '");';
        echo '</script>';

        break;
    }
} 
    
    fclose($openFile);

    echo '<script>';
    echo 'window.location = "http://localhost/?page=administrativo"';
    echo '</script>';