<?php
require_once '../../config/config.php';
require '../../classes/Student.php';


if(!isset($_SESSION['adminID'])){
    header('location: ../index.php');
    exit();
}

$studentID = $_GET['studentID'];
$odeljenjeID = $_GET['odeljenjeID'];
$razredID = $_GET['razredID'];

$student = new Student();
$student->deleteStudent($studentID);
echo $razredID;
header('location: ../show_pages/all_students-class.php?odeljenjeID=' . $odeljenjeID . '&razredID=' . $razredID);