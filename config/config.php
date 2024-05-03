<?php 
    session_start();
    define("BASE_PATH", dirname(__FILE__));
    $_SESSION['base_path'] = BASE_PATH;
    $servername = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database_name = 'e-dnevnik';
    $conn = mysqli_connect($servername, $db_username,$db_password,$database_name);

    if (!$conn){
        die("Connection failed: ");
    }