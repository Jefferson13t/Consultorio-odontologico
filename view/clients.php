<?php

$clients = "C:/Users/Jefferson/projetos/estudos/Php/stores/clients.txt";
$patients = "C:/Users/Jefferson/projetos/estudos/Php/stores/patients.txt";

$openFile = fopen($clients, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 
$clientList = '';
foreach($content as $key => $value){
    $clientCard = '
    <div class="card">
        <p>Nome: <span>' . $value->name . '</span></p>
        <p>documento: <span>' . $value->document . '</span></p>
        <p>email: <span>' . $value->email . '</span></p>
        <p>telefone: <span>' . $value->phone . '</span></p>
        <p>forma de pagamento: <span>' . $value->payment . '</span></p>
    </div>
';
$clientList .= $clientCard;
}

fclose($openFile);

$openFile = fopen($patients, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 
$patientList = '';
foreach($content as $key => $value){
    $patientCard = '
    <div class="card">
        <p>Nome: <span>' . $value->name . '</span></p>
        <p>documento: <span>' . $value->document . '</span></p>
        <p>email: <span>' . $value->email . '</span></p>
        <p>telefone: <span>' . $value->phone . '</span></p>
        <p>Responsável: <span>' . $value->clientDoc . '</span></p>
    </div>
';
$patientList .= $patientCard;
}

fclose($openFile);

$cadastrarCliente = '
<div>
<h1>Cadastrar novo cliente</h1>
<form class="card" method="POST" action="../Controller/clients.php">
    <div class="cliente">
        <div class="pagamento">
        <h3>Forma de pagamento</h3>
        <div>
        <div>
            <input type="radio" id="Pix" name="payment" value="Pix" checked />
            <label for="Pix">Pix</label>
        </div>
        <div>
            <input type="radio" id="cartao" name="payment" value="cartao" />
            <label for="cartao">cartão</label>
        </div>
        <div>
            <input type="radio" id="boleto" name="payment" value="boleto" />
            <label for="boleto">Boleto</label>
        </div>
        </div>
        <input class="button" id="submitPatientButton" type="submit" value="Cadastrar">
        </div>
        <div>
            <div class="cliente-input">
                <h2>Dados</h2>
                <input name="name" placeholder="Nome">
                <input name="document" placeholder="Documento">
                <input name="email" placeholder="Email">
                <input name="phone" placeholder="Telefone">
            </div>
        </div>
    </div>
</form>
<script>
document.addEventListener("DOMContentLoaded", function() {
let permissao = sessionStorage.getItem("permissao");
let submitPatientButton = document.getElementById("submitPatientButton");

if (!(permissao == 1 || permissao == 0)) {
    submitPatientButton.addEventListener("click", function(event) {
        event.preventDefault();
        window.alert("Você deve fazer login para cadastrar um procedimento");
    });
} else {
    if (permissao == 0) {
        submitPatientButton.addEventListener("click", function(event) {
            event.preventDefault();
            window.alert("Seu perfil não tem permissão para esta operação");
        });
    }
}
});
</script>
</div>
';

$cadastrarPaciente = '
<div>
<h1>Cadastrar novo Paciente</h1>
<form class="card" method="POST" action="../Controller/patient.php">
    <div class="cliente">
        <div class="pagamento">
        <h3>Forma de pagamento</h3>
        <div class="pagamento">
        <input name="birth" placeholder="data de nascimento">
        <input name="clientDoc" placeholder="Doc do cliente">
        </div>
        <input class="button" id="submitClientButton" type="submit" value="Cadastrar">
        </div>
        <div>
            <div class="cliente-input">
                <h2>Dados</h2>
                <input name="name" placeholder="Nome">
                <input name="document" placeholder="Documento">
                <input name="email" placeholder="Email">
                <input name="phone" placeholder="Telefone">
            </div>
        </div>
    </div>
</form>
<script>
document.addEventListener("DOMContentLoaded", function() {
let permissao = sessionStorage.getItem("permissao");
let submitClientButton = document.getElementById("submitClientButton");

if (!(permissao == 1 || permissao == 0)) {
    submitClientButton.addEventListener("click", function(event) {
        event.preventDefault();
        window.alert("Você deve fazer login para cadastrar um procedimento");
    });
} else {
    if (permissao == 0) {
        submitClientButton.addEventListener("click", function(event) {
            event.preventDefault();
            window.alert("Seu perfil não tem permissão para esta operação");
        });
    }
}
});
</script>
</div>
';


$fistSection = '<section class="second-section">' .  $cadastrarCliente . $cadastrarPaciente . '</section>';
$secondSection = '<section class="second-section"> 
<h1>Lista de clientes</h1>
<div class="container"> ' .  
$clientList . 
'</div>
<h1>Lista de pacientes</h1>
<div class="container"> ' .
$patientList . 
'</div></section>';

$clients = $fistSection . $secondSection;

