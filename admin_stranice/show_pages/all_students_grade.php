<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/config/config.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/classes/Student.php";


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
                <div class="logo">
                    <img src="/e-dnevnik/assets/site_images/esdnevnik-logo.png" alt="">
                </div>
                <div class="menu">
                    <a href="../add_pages/add_student.php?razredID=<?=$razredID?>" target="_self" rel="noopener noreferrer" class="nav-link">
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
                <a class="student-card-link" href="student.php?studentID=<?= $result["studentID"]?>">
					<div class="student-card">
						<div class="student-card-img">
							<img class="img-1" src="<?php if($result["photo_path"] == null){
								echo "../.." . "/e-dnevnik/assets/user_images/default_user_image.png";
							} else {
								echo "../.." . $result["photo_path"];
							}
							?>" alt="" />
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