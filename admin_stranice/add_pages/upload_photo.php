<?php
if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
    header('Location: ../../index.php');
}

require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/config/config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/classes/Student.php";

$target_dir = $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/assests/user_images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uOk = 1;




if($uOk == 0){
    $_SESSION['error_message'] = "Greska u uploadovanju fajla";
    header('Location:../admin_dashboard.php');
}
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
        $_SESSION['success_message'] = "Slike je uploadovana na server";
    } else{
        $_SESSION['error_message'] = "Greska u uploadovanju fajla";
    }
