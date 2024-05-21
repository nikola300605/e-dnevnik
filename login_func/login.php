<?php 

    require_once '../config/config.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT adminID, password FROM admin WHERE username = ?";

        $run = $conn->prepare($sql);
        $run->bind_param('s', $username);
        $run -> execute();

        $results = $run->get_result();

        if($results->num_rows == 1){
            $admin = $results->fetch_assoc();

            if(password_verify($password,$admin['password'])){
                $_SESSION['adminID'] = $admin['adminID'];

                $conn->close();
                header('Location: ../admin_stranice/admin_dashboard.php');
                exit();
            }

            else{
                $_SESSION['admin_error_message'] = 'Pogresna lozinka';

                $conn->close();
                header('Location: ../index.php');
                exit();
            }
        }
        else{
            $_SESSION['admin_error_message'] = 'Pogresno korisnicko ime';

            $conn->close();
            header('Location: ../index.php');
            exit();
        }
    }