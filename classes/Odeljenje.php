<?php 

class Odeljenje {
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getOdeljenje($razredID = null){
        if($razredID != null){
            $sql = "SELECT * FROM odeljenje INNER JOIN razred on odeljenje.razredID = razred.razredID WHERE odeljenje.razredID = ?";
            $run = $this->conn->prepare($sql);
            $run->bind_param('i',$razredID);
            $run -> execute();

            $results = $run->get_result();
            $results = $results->fetch_all(MYSQLI_ASSOC);
            return $results;
        }
        else{
            $stmt = $this->conn->query("SELECT * FROM odeljenje");
            $results = $stmt->fetch_all(MYSQLI_ASSOC);

            return $results;
        }
    }

}