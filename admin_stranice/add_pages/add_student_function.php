<?php
require_once "../../config/config.php";
require_once "../../classes/Student.php";
if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
    header('Location: ../../index.php');
}
$student = new Student();
$name = ucfirst($_POST["name"]);
$surname = ucfirst($_POST["surname"]);
$date_of_birth = $_POST["date_of_birth"];
$adress = $_POST["adress"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$parent_name = $_POST["parent-name"];
$razredID = $_POST["razredID"];
$odeljenjeID = $_POST["odeljenjeID"];




if($_FILES["student_image"]["name"] == ""){
    $photo_path = "../../assets/user_images/default_user_image.png";
}
else{
    $target_dir = "../../assets/user_images/";
    $file_name = $target_dir . basename($_FILES["student_image"]["name"]);
    $new_file_name = $name."_". $surname . "." . strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $target_file = $target_dir . $new_file_name;
    $uOk = 1;

    if($uOk == 0){
        $_SESSION['error_message'] = "Greska u uploadovanju fajla";
        header('Location:../admin_dashboard.php');
    }
    if(move_uploaded_file($_FILES["student_image"]["tmp_name"], "$target_file")){
        $_SESSION['success_message'] = "Slike je uploadovana na server";
    } else{
        $_SESSION['error_message'] = "Greska u uploadovanju fajla";
    }

    $photo_path = $new_file_name;
}

$result = $student->addStudent($name, $surname, $date_of_birth,$adress,$gender,$email,$parent_name,$razredID,$odeljenjeID,$photo_path);
if($result){
    $_SESSION['success_message'] = "Ucenik je dodat!";
}
else{
    $_SESSION['error_message'] = "Greska pri dodavanju ucenika!";
}
header("Location: ../admin_dashboard.php");     


