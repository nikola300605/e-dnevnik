<?php
    require_once "../../config/config.php";
    require_once "../../classes/Student.php";


    $razredID = $_GET['razredID'];

    $student = new Student();
    $results = $student->getStudents($razredID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_css/admin_show.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="navbar-container">
                <a href="../admin_dashboard.php">
                    <div class="logo">
                        <img src="/e-dnevnik/assets/site_images/esdnevnik-logo.png" alt="">
                    </div>
                </a>
                <div class="menu">
                    <a href="../add_pages/add_student.php>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                                Add student
                        </div>
                    </a>
                    <a href="../add_pages/add_predmet.php>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                                Add student
                        </div>
                    </a>
                    <a href="/e-dnevnik/sign_out.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Log Out
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
    <div class="student-card-wrapper">
            <?php   
                foreach ($results as $result) :?>
                <a class="student-card-link" href="student_page.php?studentID=<?= $result["studentID"]?>">
					<div class="student-card">
						<div class="student-card-img" style="background-image: url(<?php if($result["photo_path"] == null){
								echo "../.." . "/e-dnevnik/assets/user_images/default_user_image.png";
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