<?php 
/*
naam script     : parts.php
omschrijving    : dit is de oop voor parts met all zijn functies
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 25/11/2025
*/ 
require_once "../config/database.php";

class partsInfo {
    
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
    public function deleteParts($id) {
        $query = "DELETE FROM parts WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getPartsByOrderId($orderId) {
      $query = "SELECT p.id, p.part, p.purchase_price, p.sell_price
               FROM parts p
               JOIN orderrules o ON p.id = o.part_id
               WHERE o.order_id = :order_id";

      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':order_id', $orderId);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
  
}
?>