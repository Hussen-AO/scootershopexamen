<?php 
/*
naam script     : orders.php
omschrijving    : dit is voor onderdeel a van de opdracht hier schrijf ik de code zodat je de klant en artikelen kan zien
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 13/11/2025
*/ 
require_once "./scootershopexamen/config/database.php";

class klantinfo {
    
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getOrders() {
          $query = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
}
?>