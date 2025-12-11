<?php 
/*
naam script     : orderrules.php
omschrijving    : dit is de oop voor orderrules met all zijn functies
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 26/11/2025
*/ 
require_once "../config/database.php";

class orderrules {
    
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // onderdelen ophalen die nog NIET ingepakt zijn
    public function getUnpackedParts() {
        $query = "SELECT o.id AS orderrule_id, o.order_id, p.part
                  FROM orderrules o
                  JOIN parts p ON p.id = o.part_id
                  WHERE o.packed = 0
                  ORDER BY o.order_id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getFullyPackedOrders() {
    $query = "SELECT o.*
              FROM orders o
              WHERE NOT EXISTS (
                  SELECT 1
                  FROM orderrules r
                  WHERE r.order_id = o.id
                  AND r.packed = 0
              )";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    // één onderdeel als ingepakt markeren
    public function markPartPacked($orderruleId) {
        $query = "UPDATE orderrules SET packed = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $orderruleId);
        return $stmt->execute();
    }
}

  

?>