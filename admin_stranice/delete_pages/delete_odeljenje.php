<?php 
require_once '../../config/config.php';
require '../../classes/Odeljenje.php';


if(!isset($_SESSION['adminID'])){
    header('location: ../index.php');
    exit();
}

$odeljenjeID = (int) $_GET['odeljenjeID'];
$odeljenje = new Odeljenje();
$odeljenje->updateStudentOdeljenje($odeljenjeID);
$odeljenje->deleteOdeljenje($odeljenjeID);
header('location: ../admin_dashboard.php');