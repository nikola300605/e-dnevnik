<?php 

class Odeljenje {
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getOdeljenje($razredID = null, $odeljenjeID = null){
        if($razredID != null){
            $sql = "SELECT * FROM odeljenje INNER JOIN razred on odeljenje.razredID = razred.razredID WHERE odeljenje.razredID = ?";
            $run = $this->conn->prepare($sql);
            $run->bind_param('i',$razredID);
            $run -> execute();

            $results = $run->get_result();
            $results = $results->fetch_all(MYSQLI_ASSOC);
            return $results;
        }
        else if($odeljenjeID != null){
            $sql = "SELECT * FROM odeljenje WHERE odeljenjeID = ?";
            $run = $this->conn->prepare($sql);
            $run->bind_param('i',$odeljenjeID);
            $run -> execute();

            $results = $run->get_result();
            $results = $results->fetch_assoc();
            return $results;
        }
        else{
            $stmt = $this->conn->query("SELECT * FROM odeljenje");
            $results = $stmt->fetch_all(MYSQLI_ASSOC);

            return $results;
        }

        
    }

    public function addOdeljenje($razredID, $int_code){
        $flag = false;
        $sql = "SELECT int_code FROM odeljenje WHERE razredID = ?";
        $run = $this->conn->prepare($sql);
        $run->bind_param('i', $razredID);
        $run->execute();

        $results = $run->get_result();
        $results = $results->fetch_all(MYSQLI_ASSOC);
        foreach($results as $result){
            if($result['int_code'] == $int_code){
                $flag = true;
            }
        }

        $name = match ($int_code) {
            1 => "jedan",
            2 => "dva",
            3 => "tri",
            4 => "ćetiri",
            5 => "pet",
            6 => "šest",
            7 => "sedam",
            8 => "osam",
        };

        if(!$flag){
            $sql = "INSERT INTO odeljenje (name,razredID,int_code) VALUES (?, ?, ?)";
            $run = $this->conn->prepare($sql);
            $run->bind_param('sii',$name, $razredID, $int_code);
            $valid = $run->execute();
            if($valid){
                return null;
            }
            else{
                return "Problem sa dodavanjem odeljenja!";
            }
        }
    }

    public function deleteOdeljenje($odeljenjeID){
        $sql = "DELETE FROM odeljenje WHERE odeljenjeID = ?";
        $run = $this->conn->prepare($sql);
        $run->bind_param('i',$odeljenjeID);

        $run->execute();
    }

    public function updateStudentOdeljenje($odeljenjeID){
        $sql = "SELECT studentID, razredID FROM student WHERE odeljenjeID = ?";
        $run = $this->conn->prepare($sql);
        $run->bind_param('i',$odeljenjeID);
        $run->execute();

        $results = $run->get_result();
        $results = $results->fetch_all(MYSQLI_ASSOC);
        foreach($results as $result){
            $sql = "SELECT odeljenjeID FROM odeljenje WHERE razredID = ? AND odeljenjeID != ?";
            $run = $this->conn->prepare($sql);
            $run->bind_param('ii', $result['razredID'], $odeljenjeID);
            $run->execute();

            $odeljenjas = $run->get_result();
            $odeljenjas = $odeljenjas->fetch_all(MYSQLI_ASSOC);
            $odeljenjeArray = [];
            for($i = 0; $i<count($odeljenjas); $i++){
                array_push($odeljenjeArray, (int) $odeljenjas[$i]['odeljenjeID']);
            }
            $random_odeljenje = rand(min($odeljenjeArray), max($odeljenjeArray));
            
            $sql = "UPDATE student SET odeljenjeID = ? WHERE studentID = ?";
            $run = $this->conn->prepare($sql);
            $run->bind_param("ii", $random_odeljenje, $result['studentID']);

            $run->execute();
        }

    }

}