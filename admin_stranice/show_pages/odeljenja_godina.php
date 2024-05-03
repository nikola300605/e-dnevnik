<?php
    require_once "../../config/config.php";
    require_once "../../classes/Odeljenje.php";

    if(!isset($_SESSION['adminID'])){
        header('location: '. $_SERVER['DOCUMENT_ROOT'].'/e-dnevnik/index.php');
        exit();
    }
    $razredID = (int)$_GET['razredID'];
    $odeljenje = new Odeljenje();

    $results = $odeljenje->getOdeljenje($razredID);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../admin_css/admin_show.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="/e-dnevnik/sign_out.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Log Out
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <?php 
                foreach ($results as $result) :?>
                    <div class="odeljenje-card">
                        <a href="all_students-class.php?razredID=<?php echo $result["razredID"]?>&odeljenjeID=<?php echo $result['odeljenjeID']?>" class="odeljenje-link"> </a>
                        <div class="odeljenje-num"><?php echo $result['code'] . $result['int_code']?></div>
                        <h2 class="odeljenje-name"><?php echo $result['atribut'] . " " . $result['name']?></h2>                          
                    </div>
            <?php endforeach;?>           
        </div>
    </section>
</body>
</html>