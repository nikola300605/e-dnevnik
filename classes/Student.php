<?php

class Student{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getStudents($razredID, $odeljenjeID = null){  
            if($odeljenjeID != null){
                $sql = "SELECT * FROM student WHERE razredID = ? AND odeljenjeID = ?";
                $run = $this->conn->prepare($sql);
                $run->bind_param('ii', $razredID, $odeljenjeID);
                $run->execute();

                $results = $run->get_result();
                $results = $results->fetch_all(MYSQLI_ASSOC);
                return $results;
            }

            else{
                echo $razredID;
                $sql = "SELECT * FROM student WHERE razredID = ?";
                $run = $this->conn->prepare($sql);
                $run->bind_param('i', $razredID);
                $run->execute();

                $results = $run->get_result();
                $results = $results->fetch_all(MYSQLI_ASSOC);
                return $results;
            }
    }

    public function addStudent($name, $surname, $date_of_birth, $adress, $gender, $email, $parent_name, $razredID, $odeljenjeID, $photo_path){
        $sql = "INSERT INTO student (name, surname, date_of_birth, address, gender, email, parent_name, razredID, odeljenjeID, photo_path)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $run = $this->conn->prepare($sql);
        $run->bind_param("sssssssiis", $name, $surname, $date_of_birth,$adress, $gender, $email, $parent_name, $razredID, $odeljenjeID, $photo_path);
        $run->execute();

        if(!$run){
            return false;
        }
        else return true;
    }
}