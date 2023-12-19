<?php

$patients = "C:/Users/Jefferson/projetos/estudos/Php/stores/patients.txt";
$dentist = "C:/Users/Jefferson/projetos/estudos/Php/stores/dentists.txt";
$procedure = "C:/Users/Jefferson/projetos/estudos/Php/stores/procedures.txt";
$appointment = "C:/Users/Jefferson/projetos/estudos/Php/stores/appointments.txt";

$openFile = fopen($patients, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 

$patientList = '';
foreach($content as $key => $value){
    $patientOption = '
        <option value="'. $value->name .'">' .$value->name . '</option>
';
$patientList .= $patientOption;
}

fclose($openFile);

$openFile = fopen($dentist, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 

$dentistList = '';
foreach($content as $key => $value){
    $dentistOption = '
        <option value="'. $value->name .'">' . $value->name . '</option>
';
$dentistList .= $dentistOption;
}

fclose($openFile);

$openFile = fopen($procedure, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 

$procedureList = '';
foreach($content as $key => $value){

    $procedureBox = '
    <div>
    <input type="checkbox" id="' . ($value != null ? $value->procedimento : '') . '" name="procedure[]" value="' . ($value != null ? $value->procedimento : '') . '" />
    <label for="' . ($value != null ? $value->procedimento : '') . '">' . ($value != null ? $value->procedimento : '') . '</label>
    </div>
';
$procedureList .= $procedureBox;
}

fclose($openFile);

$openFile = fopen($appointment, 'r');

$content = [];

while($line = fgets($openFile)){
    array_push($content, json_decode($line));
} 

$appointmentList = '';
foreach($content as $key => $value){
    $appointmentCard = '
    <div class="card">
        <p>Nome: <span>' . $value->patient . '</span></p>
        <p>documento: <span>' . $value->dentist . '</span></p>
        <p>documento: <span>' . $value->date . '</span></p>
        <p>Valor: <span> R$ ' . $value->cost . '</span></p>
        <p>telefone: <span>' . implode(", ", $value->procedures) . '</span></p>
    </div>
';
$appointmentList .= $appointmentCard;
}

fclose($openFile);

$schedule = '<div>
<h1>Agendar Consulta</h1>
<form class="card" method="POST" action="../Controller/appointment.php">
        <div>
            <label for="patient">Paciente</label>
            <select name="patient"> ' . 
                $patientList . '
            </select>
        </div>
        <div>
            <label for="dentist">Dentista</label>
            <select name="dentist"> ' . 
                $dentistList . '
            </select>
        </div>
        <fieldset class="lista-procedimentos">
            <legend>Selecionar procedimentos</legend>'. 
                $procedureList . '
        </fieldset>
        <div>
            <label for="date"></label>
            <input type="date" id="date" name="date">
            <label for="time"></label>
            <input type="time" id="time" name="time" min="08:00" max="16:00" step="1800">
        </div>
        <input class="button "type="submit" id="submitAppointmentButton" value="Agendar">
</form>
<script>
document.addEventListener("DOMContentLoaded", function() {
let permissao = sessionStorage.getItem("permissao");
let submitAppointmentButton = document.getElementById("submitAppointmentButton");

if (!(permissao == 1 || permissao == 0)) {
    submitAppointmentButton.addEventListener("click", function(event) {
        event.preventDefault();
        window.alert("Você deve fazer login para cadastrar um procedimento");
    });
} else {
    if (permissao == 0) {
        submitAppointmentButton.addEventListener("click", function(event) {
            event.preventDefault();
            window.alert("Seu perfil não tem permissão para esta operação");
        });
    }
}
});
</script>
</div>
';

$fistSection = '<section class="first-section">' . $schedule . '</section>';
$secondSection = '<section class="second-section">  
    <h1>Consultas Agendadas</h1> 
        <div class="container">' . 
            $appointmentList . 
        '</div>
        </section>' ;

$appointment = $fistSection . $secondSection;
