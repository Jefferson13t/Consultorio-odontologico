<?php

$profile = "C:/Users/Jefferson/projetos/estudos/Php/stores/profiles.txt";
$cache = "C:/Users/Jefferson/projetos/estudos/Php/stores/cache.txt";

$openFile = fopen($profile, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 
$profileList = '';
foreach($content as $key => $value){
    $userCard = '
    <div class="card">
        <p>Nome: <span>' . $value->name . '</span></p>
        <p>documento: <span>' . $value->document . '</span></p>
        <p>email: <span>' . $value->email . '</span></p>
        <p>telefone: <span>' . $value->phone . '</span></p>
        <p>permissão: <span>' . $value->level . '</span></p>
    </div>
';
$profileList .= $userCard;
}

fclose($openFile);

$openFile = fopen($cache, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 
$cacheList = '';
foreach($content as $key => $value){
    $operationCard = '
    <div class="card">
        <p>documento: <span>' . $value->document . '</span></p>
        <p>Data: <span>' . $value->date . '</span></p>
        <p>operação: <span>' . $value->operation . '</span></p>
    </div>
';
$cacheList .= $operationCard;
}

fclose($openFile);

$logar = '
<div>
    <h1>Logar</h1>
    <form class="card" method="POST" action="../Controller/login.php">
        <h3>Dados</h3>
        <input name="document" placeholder="documento">
        <input name="password" placeholder="senha">
        <input class="button" id="loginButton" type="submit" value="logar">
    </form>

    <script>
        let permissao = sessionStorage.getItem("permissao");

        let loginButton = document.getElementById("loginButton");
        if (permissao == 1 || permissao == 0) {
            loginButton.value = "deslogar";
        } else {
            loginButton.value = "logar";
        }
    </script>
</div>
';

$criarPerfil = '
<div >
    <h1>Criar perfil</h1>
    <form class="card" method="POST" action="../Controller/profile.php">
        <h3>Dados</h3>
        <input name="name" placeholder="nome">
        <input name="document" placeholder="documento">
        <input name="password" placeholder="senha">
        <input name="email" placeholder="email">
        <input name="phone" placeholder="telefone">
        <div>
            <input type="radio" id="comum" name="permission" value="comum" checked />
            <label for="comum">comum</label>
            <input type="radio" id="admin" name="permission" value="admin" />
            <label for="admin">admin</label>
        </div>
        <input class="button" type="submit" value="Criar">
    </form>
</div>
';

$criarProcedimento = '
<div >
    <h1>Cadastrar procedimento</h1>
    <form class="card" method="POST" action="../Controller/procedures.php">
        <h3>Dados</h3>
        <input name="name" placeholder="procedimento">
        <input name="cost" placeholder="custo">
        <input name="description" placeholder="descrição">
        <input name="specialty" placeholder="especialidade">
        <input class="button" id="submitProcedureButton" type="submit" value="Criar">
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        let permissao = sessionStorage.getItem("permissao");
        let submitProcedureButton = document.getElementById("submitProcedureButton");

        if (!(permissao == 1 || permissao == 0)) {
            submitProcedureButton.addEventListener("click", function(event) {
                event.preventDefault();
                window.alert("Você deve fazer login para cadastrar um procedimento");
            });
        } else {
            if (permissao == 0) {
                submitProcedureButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    window.alert("Seu perfil não tem permissão para esta operação");
                });
            }
        }
    });
    </script>
</div>
';

$firstSection = '<section class="first-section">' . $logar . $criarPerfil . $criarProcedimento . '</section>';
$secondSection =    '<section class="second-section">
                        <h1>Lista de Perfis</h1>
                        <div class="container"> ' . 
                        $profileList . 
                        '</div>
                        <h1>Lista atividades</h1>
                        <div class="container rev"> ' . 
                        $cacheList . 
                        '</div>
                    </section>';
$admin = $firstSection . $secondSection;