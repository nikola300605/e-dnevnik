<?php 

class Ocena {
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getOcene($studentID){
        $sql = "SELECT * FROM ocena WHERE studentID = ?";
        $run = $this->conn->prepare($sql);
        $run->bind_param('i', $studentID);
        $run->execute();

        $results = $run->get_result();
        $results = $results->fetch_all(MYSQLI_ASSOC);

        return $results;
    }

    public function addOcena($vrednost, $opis, $predmetID, $studentID){
        $ime = match ($vrednost) {
            1 => "nedovoljan",
            2 => "dovoljan",
            3 => "dobar",
            4 => "vrlodobar",
            5 => "odličan",
        };
        $sql = "INSERT INTO ocena (vrednost, ime, opis, predmetID, studentID) 
        VALUES (?, ?, ?, ?, ?)";
        $run = $this->conn->prepare($sql);
        $run->bind_param("issii", $vrednost, $ime, $opis, $predmetID, $studentID);


        return $run->execute();;
    }
}
