<?php 

class Predmet{
    protected $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getPredmets(){
        $sql = "SELECT * FROM predmet";
        $run = $this->conn->query($sql);
        
        $results = $run->fetch_all(MYSQLI_ASSOC);
        return $results;
    }

    public function addPredmet($predmet_name){
        $flag = false;
        $sql = "SELECT predmet_name FROM predmet";
        $run = $this->conn->query($sql);
        $results = $run->fetch_all(MYSQLI_ASSOC);
        foreach($results as $result){
            if(strtolower($result['predmet_name']) == strtolower($predmet_name)){
                $flag = true;
            }
        }

        if(!$flag){
            $sql = "INSERT INTO predmet (predmet_name) VALUES (?)";
            $run = $this->conn->prepare($sql);
            $run->bind_param('s',$predmet_name);
            $valid = $run->execute();
            if($valid){
                return null;
            }
            else{
                return "Problem sa dodavanjem predmeta!";
            }
            
        }
        else{
            
            return "Predmet vec postoji!";
            
        }
    }
}