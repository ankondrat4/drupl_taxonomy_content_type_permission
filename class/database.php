<?php
interface iDatabase
{
    public function SetNewValues(string $h, string $u, string $p, string $d);
    public function query($query);
    public function mysqli();
    public function ShowConfig();
    public function GetHost();
    public function GetUsername();
    public function GetPassword();
    public function GetDB();
}

class Database implements iDatabase
{
    private string $DB_HOST = "localhost";
    private string $DB_USERNAME = "admin";
    private string $DB_PASSWORD = "Flvbybcnhfnjh123$";
    private string $DB_DATABASE = "site";

    public function __construct() {
        $this->mysqli = new mysqli($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_DATABASE);
    }

    public function SetNewValues(string $h, string $u, string $p, string $d) {
        $this->DB_HOST = $h;
        $this->DB_USERNAME = $u;
        $this->DB_PASSWORD = $p;
        $this->DB_DATABASE = $d;
        $this->mysqli = new mysqli($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_DATABASE);
    }

    public function query($query)
    {
        return $this->mysqli->query($query);
    }

    public function mysqli()
    {
        return $this->mysqli;
    }

    public function ShowConfig(){
        echo "DB_HOST: " . $this->DB_HOST . "<br>DB_USERNAME: " . $this->DB_USERNAME . "<br>DB_PASSWORD: " . $this->DB_PASSWORD . "<br>DB_DATABASE: " . $this->DB_DATABASE;
    }

    public function GetHost(){
        return $this->DB_HOST;
    }

    public function GetUsername(){
        return $this->DB_USERNAME;
    }

    public function GetPassword(){
        return $this->DB_PASSWORD;
    }

    public function GetDB(){
        return $this->DB_DATABASE;
    }
}