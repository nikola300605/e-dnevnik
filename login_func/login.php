<?php 

    require_once '../config/config.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT userID, password FROM user WHERE username = ?";

        $run = $conn->prepare($sql);
        $run->bind_param('s', $username);
        $run -> execute();

        $results = $run->get_result();

        if($results->num_rows == 1){
            $user = $results->fetch_assoc();

            if(password_verify($password,$user['password'])){
                $_SESSION['userID'] = $user['userID'];

                $conn->close();
                #header('Location: ../user_stranice/user_dashboard.php');
                exit();
            }

            else{
                $_SESSION['error_message'] = 'Pogresna lozinka';

                $conn->close();
                #header('Location: ../index.php');
                exit();
            }
        }
        else{
            $_SESSION['error_message'] = 'Pogresno korisnicko ime';
            $conn->close();
            header('Location: ../index.php');
            exit();
        }

    }
