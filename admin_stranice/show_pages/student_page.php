<?php 
    require_once "../../config/config.php";
    require_once "../../classes/Student.php";
    require_once "../../classes/Ocena.php";
    require_once "../../classes/Predmet.php";

    $studentID = $_GET['studentID'];
    $student = new Student();
    $student = $student->getStudent($studentID);
    $ocena = new Ocena();
    $ocene = $ocena->getOcene($studentID);
    $predmet = new Predmet();
    $predmeti = $predmet->getPredmets();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_css/admin_show.css">
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
                    <a href="../add_pages/add_ocena.php?studentID=<?=$studentID?>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add Grade
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
        <div class="row">
            <div class="col">
                <div class="student-img" style="background-image: url(<?php if($student["photo_path"] == null){
                                    echo "../.." . "/e-dnevnik/assets/user_images/default_user_image.png";
                                } else {
                                    echo "../../assets/user_images/" . $student["photo_path"];
                                }
                                ?>)" >
                    
				</div>
                <div class="name-text">
                    <?=$student['name'] . " " . $student['surname'];?>
                </div>
            </div>
            <div class="col table-wrapper">
                <table class="ocene-table">
                    <thead>
                        <th>Predmet</th>
                        <th>Ocene</th>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < count($predmeti); $i++):?>
                            <tr onclick="window.location.href ='../admin_dashboard.php'">
                                <td><?=$predmeti[$i]["predmet_name"]?></td>
                                <?php for($j = 0; $j < count($ocene); $j++):?>
                                    <?php if($predmeti[$i]["predmetID"] == $ocene[$j]["predmetID"]):?>
                                        <td><?=$ocene[$j]["vrednost"]?></td>
                                    <?php else:?>
                                        <td></td>
                                    <?php endif;?>
                                    

                                <?php endfor;?>
                                
                            </tr>
                        <?php endfor;?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>