<?php

require_once "../Model/Client.php";

$clients = "C:/Users/Jefferson/projetos/estudos/Php/stores/clients.txt";

$name = $_POST['name'];
$document = $_POST['document'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$payment = $_POST['payment'];

$newClient = new Client($name, $document, $email, $phone, [$paymentForm]);

$test = json_encode(array("client"=> $newClient,
)
) . "\r\n";

$content = json_encode(array("name"=> $newClient->getName(),
 "document"=> $newClient->getDocument(),
 "email"=> $newClient->getEmail(),
 "phone"=> $newClient->getPhone(),
 "payment"=> $payment,
 )
 ) . "\r\n";

$openFile = fopen($clients, 'a');

fwrite($openFile, $content);

fclose($openFile);

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://localhost/?page=clientes', false);