<?php

class Database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dbandzee";
    private $conn;

    // Uncomment this for Live Connection

    // private $hostname = "localhost";
    // private $username = "dbanjdci_user";
    // private $password = "Dbandzee@2026";
    // private $dbname = "dbanjdci_db";
    // private $conn;

    // Uncomment this for Free Hosting

    // private $hostname = "sql308.infinityfree.com";
    // private $username = "if0_40342062";
    // private $password = "Retech9ja2025";
    // private $dbname = "if0_40342062_retch9ja";
    // private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            echo "Connection failed: " . $th->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
