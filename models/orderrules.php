<?php 
/*
naam script     : orderrules.php
omschrijving    : dit is de oop voor orderrules met all zijn functies
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 25/11/2025
*/ 
require_once "./scootershopexamen/config/database.php";

class partsinfo {
    
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getParts() {
          $query = "SELECT * FROM parts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        //de update functie van crud
    public function updateParts($part, $purchase_price, $sell_price){
        $query = "UPDATE parts SET part = :part, purchase_price = :purchase_price, sell_price = :sell_price  WHERE id = :id;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':part', $part);
        $stmt->bindParam(':purchase_price', $purchase_price);
        $stmt->bindParam(':sell_price', $sell_price);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
  
    // Delete
    public function deleteOrder($id) {
        $query = "DELETE FROM orders WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

  
}
?>