<?php 
/*
naam script     : orders.php
omschrijving    : dit is de crud van tabel orders 
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 13/11/2025
*/ 
require_once "../config/database.php";

class klantInfo {
    
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    //de read functie van crud 
    public function getOrders() {
          $query = "SELECT * FROM orders";
          // -> roept een functie of variabele aan
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //de update functie van crud
  public function updateOrders($id, $company_name, $recipient, $addressline1, $addressline2, $country, $status) {
    $query = "UPDATE orders 
              SET company_name = :company_name, 
                  recipient = :recipient, 
                  addressline1 = :addressline1, 
                  addressline2 = :addressline2, 
                  country = :country, 
                  status = :status
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':company_name', $company_name);
    $stmt->bindParam(':recipient', $recipient);
    $stmt->bindParam(':addressline1', $addressline1);
    $stmt->bindParam(':addressline2', $addressline2);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':status', $status);

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