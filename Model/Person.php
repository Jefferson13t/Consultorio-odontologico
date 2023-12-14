<?php

require_once 'Address.php';

class Person 
{
    protected string $name;
    protected string $document;
    protected string $email;
    protected string $phone;
    protected Address $address;

    public function __construct(string $name, string $document, string $email, string $phone)
    {
        $this->setName($name);
        $this->setDocument($document);
        $this->setEmail($email);
        $this->setPhone($phone);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDocument($document)
    {
        $this->document = $document;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setAddress(Address $address)
    {

        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address->getaddress();
    }

}