<?php


class Address
{
    private int $number;
    private string $street;
    private string $neighborhood;
    private string $city;

    public function __construct(string $street, int $number, string $neighborhood, string $city)
    {
        $this->setAddress($street, $number, $neighborhood, $city);
    }
    public function setAddress(string $street, int $number, string $neighborhood, string $city)
    {
        $this->number = $number;
        $this->street = $street;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
    }

    public function getAddress()
    {
        return "{$this->street}, {$this->number}, {$this->neighborhood} - {$this->city}";
    }
}
