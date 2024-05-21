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
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="navbar-container">
                <div class="logo-menu">
                    <a href="../admin_dashboard.php" class="nav-link">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                    <a href="../admin_dashboard.php">
                        <div class="logo">
                            <img src="../../assets/site_images/esdnevnik-logo.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="menu">
                    <a href="../add_pages/add_odeljenje.php?razredID=<?=$razredID?>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add odeljenje
                        </div>
                    </a>
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

    <section>
        
        <h1 class="naslov"> <?=$results[0]['code']?>. godina</h1>
        <div class="container">       
            <?php 
                foreach ($results as $result) : ?>
                    <div class="odeljenje-wrap">
                        <div class="odeljenje-card" onclick="window.location.href='all_students-class.php?odeljenjeID=<?=$result['odeljenjeID']?>&razredID=<?=$razredID?>'">                    
                            <div class="odeljenje-num"><?php echo $result['code'] . $result['int_code']?></div>
                            <h2 class="odeljenje-name"><?php echo $result['atribut'] . " " . $result['name']?></h2>                  
                        </div>
                        <i class="fa fa-trash trash-ikonica" onclick="window.location.href='../delete_pages/delete_odeljenje.php?odeljenjeID=<?=$result['odeljenjeID']?>'"></i>        
                    </div>
            <?php endforeach;?>     
        </div>      
    </section>
</body>
</html>