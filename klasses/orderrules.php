<?php 
/*
naam script     : orderrules.php
omschrijving    : dit is de oop voor orderrules met all zijn functies
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 26/11/2025
*/ 
require_once "../config/database.php";

class orderrulesinfo {
    
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getOrderRules() {
          $query = "SELECT * FROM orderrules";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        //de update functie van crud
    public function updateOrderRules($packed){
        $query = "UPDATE orderrules SET packed = :packed WHERE id = :id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':packed', $packed);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
  
    // Delete
    public function deleteOrderRules($id) {
        $query = "DELETE FROM orderrules WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

  
}
?>