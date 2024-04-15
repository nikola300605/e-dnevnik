<?php

class Razred{

    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }


    public function getRazred(){
        $stmt = $this->conn->query("SELECT * FROM razred");
        $results = $stmt->fetch_all(MYSQLI_ASSOC);

        return $results;
    }
}