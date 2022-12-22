<?php

class Admin{

    private $name;
    private $password;
    private $email;
    private $surname;
    private $phone;
    

    public function __construct(string $email, string $password, string $name, string $surnamed){
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        
    }

    public function getEmail():string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName():string
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname():string
    {
        return $this->surname;
    }
    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

}