<?php

$dentists = "C:/Users/Jefferson/projetos/estudos/Php/stores/dentists.txt";

$openFile = fopen($dentists, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 


$dentistList = '';
foreach($content as $key => $value){
    $dentistCard = '
    <div class="card">
        <p>Nome: <span>' . $value->name . '</span></p>
        <p>Documento: <span>' . $value->document . '</span></p>
        <p>Cro: <span>' . $value->cro . '</span></p>
        <p>email: <span>' . $value->email . '</span></p>
        <p>Telefone: <span>' . $value->phone . '</span></p>
        <p>Relacao: <span>' . $value->relation . '</span></p>
        <p>Pagamento: <span>' . $value->payment . '</span></p>
        <p>Especialidades: <span>' . implode(", ", $value->specialty) . '</span></p>
    </div>
';
$dentistList .= $dentistCard;
}

fclose($openFile);


$cadastrarDentista = '
<div>
<h1>Cadastrar novo dentista</h1>
<form class="card" method="POST" action="../Controller/dentist.php">
    <div class="cliente">
        <div class="pagamento">
            <h3>Informações profissionais</h3>
            <div class="pagamento">
            <input name="cro" placeholder="CRO">
            <div>
            <input name="specialty" placeholder="Especialidades">
            <p style="font-size:8pt; font-weight: bold">*Separar por virgula</p>
            </div>
            <div>
                <input type="radio" id="contratado" name="relation" value="contratado" checked />
                <label for="contratado">Contratado</label>
                <input type="radio" id="parceiro" name="relation" value="parceiro" />
                <label for="parceiro">Parceiro</label>
        </div>
        <div> 
        <input name="payment" placeholder="Salário / percentual">
        </div>
        </div>
        <input class="button" id="submitDentistButton" type="submit" value="Cadastrar">
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
let submitDentistButton = document.getElementById("submitDentistButton");

if (!(permissao == 1 || permissao == 0)) {
    submitDentistButton.addEventListener("click", function(event) {
        event.preventDefault();
        window.alert("Você deve fazer login para cadastrar um procedimento");
    });
} else {
    if (permissao == 0) {
        submitDentistButton.addEventListener("click", function(event) {
            event.preventDefault();
            window.alert("Seu perfil não tem permissão para esta operação");
        });
    }
}
});
</script>
</div>
';


$fistSection = '<section class="second-section">' .  $cadastrarDentista . '</section>';
$secondSection = '<section class="second-section"> 
<h1>Lista de dentistas</h1>
<div class="container"> ' .  
$dentistList . 
'</div></section>';

$dentists = $fistSection . $secondSection;