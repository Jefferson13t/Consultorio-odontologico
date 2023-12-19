<?php

require_once "../Model/Appointment.php";

$appointments = "C:/Users/Jefferson/projetos/estudos/Php/stores/appointments.txt";
$procedures = "C:/Users/Jefferson/projetos/estudos/Php/stores/procedures.txt";

$patientName = $_POST['patient'];
$dentistName = $_POST['dentist'];
$procedure = $_POST['procedure'];
$date = $_POST['date'];
$time = $_POST['time'];

if(!$patientName || !$dentistName || !$procedure || !$date || !$time){
    Redirect('http://localhost/?page=consultas', false);
}

$dateArray = explode("-", $date);
$timeArray = explode(":", $time);

$content = json_encode(array("date"=> $dateArray[2] . $dateArray[1] . $dateArray[0],
"hour"=> intval($timeArray[0]),
"minute"=> intval($timeArray[1]),
)) . "\r\n";

$start = new Date(intval($dateArray[2]), intval($dateArray[1]), intval($dateArray[0]), intval($timeArray[0]), intval($timeArray[1]));
$patient = new Patient($patientName, '', '', '', 
new Date(date("d"), date("m"), date("Y"), date("H"), date("i")),
new Client('','','','',[''])
);

$dentist = new Dentist($dentistName,'','','','',['']);

$newAppointment = new Appointment($patient, $start, $dentist, $procedure ? $procedure : []);

$openFile = fopen($procedures, 'r');

$procList = [];

while($line = fgets($openFile)){
    array_push($procList, json_decode($line));
} 

$cost = 0;
foreach($procList as $key => $value){
    if(in_array($value->procedimento, $procedure)){
        $cost += $value->valor;
    }
}

fclose($openFile);

$openFile = fopen($appointments, 'r+');

$content = json_encode(array("patient"=> $newAppointment->getPatient()->getName(),
 "dentist"=> $newAppointment->getResponsibleDentist()->getName(),
 "procedures"=> $newAppointment->getProcedureList(),
 "date"=> $newAppointment->getStart()->getDate(),
 "cost"=> $cost,
 )
 ) . "\r\n";


while($line = fgets($openFile)){
    $appointment = json_decode($line);
    if( $appointment->date == $newAppointment->getStart()->getDate() &&
      ( $appointment->dentist == $newAppointment->getResponsibleDentist()->getName() ||
        $appointment->patient == $newAppointment->getPatient()->getName())
    ) {
        Redirect('http://localhost/?page=consultas', false); 
    }

} 

fwrite($openFile, $content);

fclose($openFile);

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect('http://localhost/?page=consultas', false);