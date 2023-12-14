<?php

require_once "Procedure.php";
require_once "Patient.php";
require_once "Dentist.php";
require_once "PartnerDentist.php";
require_once "Client.php"; // Corrected class name

class Treatment {
    private Patient $patient;
    private Dentist $responsibleDentist;
    private array $procedureList;

    public function __construct(Patient $patient, Dentist $responsibleDentist, array $procedureList) {
        $this->setPatient($patient);
        $this->setResponsibleDentist($responsibleDentist);
        $this->setProcedureList($procedureList);
    }

    public function setPatient(Patient $patient) {
        $this->patient = $patient;
    }

    public function getPatient() {
        return $this->patient;
    }

    public function setResponsibleDentist(Dentist $responsibleDentist) {
        $this->responsibleDentist = $responsibleDentist;
    }

    public function getResponsibleDentist() {
        return $this->responsibleDentist;
    }

    public function setProcedureList(array $procedures) {
        if (!isset($this->procedureList)) {
            $this->procedureList = $procedures;
        } else {
            $this->procedureList = array_merge($this->procedureList, $procedures);
        }
    }

    public function getProcedureList() {
        return $this->procedureList;
    }

    public function calculateTotal() {
        $total = 0;
        for ($i = 0; $i < count($this->procedureList); $i++) {
            $total += $this->procedureList[$i]->getCost();
        }
        return $total;
    }
}

// $c1 = new Client("July", "document", "email", "phone", [new PaymentForm("Cartao", 0.02), new PaymentForm("pix", 0)]);
// $p1 = new Patient("Ryan", "document", "phone", "email", new Data(9, 12, 2023, 18, 55), $c1);
// $d1 = new PartnerDentist("Dr House", "document", "Email", "phone", "CRO", ["Clinica geral", "ortodontia"], 0.4);

// $t1 = new Treatment($p1, $d1, [new Procedure("Limpeza", 120, "", "Clinica geral"), new Procedure("Extracao", 350, "", "ortodontia")]);
