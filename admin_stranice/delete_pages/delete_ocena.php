<?php
require_once '../../config/config.php';
require '../../classes/Ocena.php';


if(!isset($_SESSION['adminID'])){
    header('location: ../index.php');
    exit();
}

$ocena = new Ocena();
$ocena->deleteOcena($_GET['ocenaID']);
header('location: ../show_pages/student_page.php?studentID=' . $_GET['studentID']);