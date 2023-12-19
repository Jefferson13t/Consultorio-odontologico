<?php

require_once 'Patient.php';
require_once 'Date.php';
require_once 'Dentist.php';
require_once 'Procedure.php';

class Appointment
{
  private Patient $patient;
  private Date $start;
  private Dentist $responsibleDentist;
  private array $procedureList;

  public function __construct(Patient $patient, Date $start, Dentist $responsibleDentist, array $procedure)
  {
    $this->setPatient($patient);
    $this->setStart($start);
    $this->setResponsibleDentist($responsibleDentist);
    $this->setProcedureList($procedure);
  }

  public function setPatient(Patient $patient)
  {
    $this->patient = $patient;
  }

  public function getPatient()
  {
    return $this->patient;
  }
  public function setStart(Date $start)
  {
    $this->start = $start;
  }

  public function getStart()
  {
    return $this->start;
  }

  public function setResponsibleDentist(Dentist $responsibleDentist)
  {
    $this->responsibleDentist = $responsibleDentist;
  }

  public function getResponsibleDentist()
  {
    return $this->responsibleDentist;
  }

  public function setProcedureList(array $procedures) {
    if (!isset($this->procedureList)) {
        $this->procedureList = $procedures;
    } else {
        $this->procedureList = array_merge($this->procedureList, $procedures);
    }
}
  
  public function getProcedureList()
  {
    return $this->procedureList;
  }
  public function getTotal(){
    $total = 0;
    for ($i = 0; $i < count($this->procedureList); $i++) {
        $total += $this->procedureList[$i]->getCost();
    }
    return $total;
  }
}