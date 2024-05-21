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
    $colspan = count($ocene);
    $max_ocena = $ocena->getMaxOcenaCount($studentID);
    $max_ocena = (int)$max_ocena['max'];
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
                    <a href="all_students-class.php?odeljenjeID=<?=$student['odeljenjeID']?>&razredID=<?=$student['razredID']?>" class="nav-link">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                    <a href="../admin_dashboard.php">
                        <div class="logo">
                            <img src="../../assets/site_images/esdnevnik-logo.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="menu">
                    <a href="../add_pages/add_ocena.php?studentID=<?=$studentID?>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add Grade
                        </div>
                    </a>
                    <a href="../delete_pages/delete_student.php?studentID=<?=$studentID?>&odeljenjeID=<?=$student['odeljenjeID']?>&razredID=<?=$student['razredID']?>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Delete student
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

    <div class="container">
        <div class="row">
            <div class="">
                <div class="student-img" style="background-image: url(<?php if($student["photo_path"] == null){
                                    echo "../../assets/user_images/default_user_image.png";
                                } else {
                                    echo "../../assets/user_images/" . $student["photo_path"];
                                }
                                ?>)" >
                    
				</div>
                <h1 class="name-text">
                    <?=$student['name'] . " " . $student['surname'];?>
                </h1>
            </div>
            <div class="table-wrapper">
                <table class="ocene-table">
                    <thead>
                        <th>Predmet</th>
                        <th colspan="<?=json_encode($colspan)?>">Ocene</th>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < count($predmeti); $i++):?>
                            <?php 
                                $temp_max_ocena = $max_ocena;
                            ?>
                            <?php $flag = 0;?>
                            <tr>
                                <td><?=$predmeti[$i]["predmet_name"]?></td>
                                <?php for($j = 0; $j < count($ocene); $j++):?>
                                    <?php if($predmeti[$i]["predmetID"] == $ocene[$j]["predmetID"]):?>
                                        <?php $temp_max_ocena-=1?>
                                        <td onclick="window.location.href='../delete_pages/delete_ocena.php?ocenaID=<?=$ocene[$j]['ocenaID']?>&studentID=<?=$studentID?>'"><div style="--opis_ocene: '<?=$ocene[$j]['opis']?>'" class="ocena-td"><?=$ocene[$j]["vrednost"]?></div></td>
                                    <?php endif;?>
                                <?php endfor;?>
                                
                                <?php for($j = 0; $j < $temp_max_ocena; $j++):?>
                                    <td></td>
                                <?php endfor?>
                            
                            
                            </tr>
                        <?php endfor;?>
                    </tbody>
                </table>
            </div>

            <div class="col">
                
            </div>
        </div>
    </div>
</body>
</html>