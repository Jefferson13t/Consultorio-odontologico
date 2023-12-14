<?php


require_once('Client.php');
require_once('Person.php');
require_once('Date.php');

class Patient extends Person {
    private Date $birth;
    private Client $responsible; 

    public function __construct(string $name, string $document, string $phone, string $email, Date $birth, Client $responsible) {
        parent::__construct($name, $document, $email, $phone);
        $this->setBirth($birth);
        $this->setResponsible($responsible);
    }
    public function setBirth(Date $birth) {
        $this->birth = $birth;
    }
    public function getBirth(){
        return $this->birth;
    }
    public function setResponsible(Client $responsible) {
        $this->responsible = $responsible;
    }
    public function getResponsible() {
        return $this->responsible;
    }
}