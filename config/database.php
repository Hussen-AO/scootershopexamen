<?php
/*
naam script     : 
omschrijving    : 
Auteur          : 
project         : 
Aanmaakdatum    : 
*/ 
class Database {
    private $host = "localhost";
    private $dbname = "hollenbe_vesuvio";
    private $username = "root";
    private $password = "";

    public function connect() {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            die("Fout met de database: " . $e->getMessage());
        }
    }
}
?>