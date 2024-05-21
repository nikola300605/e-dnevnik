<?php 
    require_once "../../config/config.php";
    require_once "../../classes/Student.php";
    require_once "../../classes/Odeljenje.php";

    if(!isset($_SESSION['adminID'])){
        header('location: '. $_SERVER['DOCUMENT_ROOT'].'/e-dnevnik/index.php');
        exit();
    }
    $razredID = (int) $_GET['razredID'];
    $odeljenjeID = (int)$_GET['odeljenjeID'];
    //echo $razredID . " " . $odeljenjeId . " ";
    $student = new Student();
    $results = $student->getStudents($razredID,$odeljenjeID);
    $odeljenje = new Odeljenje();
    $odeljenje = $odeljenje->getOdeljenje(null,$odeljenjeID);


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_css/admin_show.css">
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="navbar-container">
                <div class="logo-menu">
                    <a href="odeljenja_godina.php?razredID=<?=$razredID?>" class="nav-link">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                    <a href="../admin_dashboard.php">
                        <div class="logo">
                            <img src="../../assets/site_images/esdnevnik-logo.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="menu">
                    <a href="../add_pages/add_student.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add student
                        </div>
                    </a>
                    <a href="../add_pages/add_predmet.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add predmet
                        </div>
                    </a>
                    <a href="../../sign_out.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Log Out
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <h1 class="naslov"> <?=$razredID?>. <?=$odeljenje['int_code']?></h1>
    <div class="container">
        <div class="student-card-wrapper">
            <?php   
                foreach ($results as $result) :?>
                <a class="student-card-link" href="student_page.php?studentID=<?= $result["studentID"]?>">
					<div class="student-card">
						<div class="student-card-img" style="background-image: url(<?php if($result["photo_path"] == null){
								echo "../../assets/user_images/default_user_image.png";
							} else {
								echo "../../assets/user_images/" . $result["photo_path"];
							}
							?>)" >
				 
						</div>
						<div class="student-card-text">
							<h2><?=$result["name"] . " " . $result["surname"]?></h2>
						</div>
					</div>
				</a>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>