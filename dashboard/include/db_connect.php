<?php
class Database
{
    public $db;
    private $dbHost = "localhost";
    private $dbUsername = "heaven8_blogcamp";
    private $dbPassword = "Y1T6VB*c";
    private $dbName = "heaven8_blogcamp";

    public function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            try {
                $conn = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            } catch (PDOException $e) {
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

}
