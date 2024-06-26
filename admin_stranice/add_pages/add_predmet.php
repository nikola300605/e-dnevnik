<?php
    require_once "../../config/config.php";
    require_once "../../classes/Predmet.php";

    $predmet = new Predmet();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_css/admin_add.css">
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
                    <a href="../admin_dashboard.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Admin Dashboard
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
        <h1>Dodajte predmet</h1>
        <form action="" method="post">
            <div class="col col-1">
                <label for="predmet">Ime predmeta</label>
                <input type="text" name="predmet_name" id="predmet">
            </div>
            <div class="col col-3">
                 <input type="submit" value="Dodaj predmet" class="submit">
                 <div class="error"></div>
            </div>
        </form>
    </div>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $predmet_name = $_POST['predmet_name'];
            $resp = $predmet->addPredmet($predmet_name);
            $err;
            if(is_null($resp)){
                $err = false;
                header("Location:../admin_dashboard.php"); 
            }
            else{
                $err =  true;
            }
        }
    ?>

    <script>
        if(<?=json_encode($err)?>){
            document.querySelector(".error").innerHTML = <?=json_encode($resp)?>;
            document.querySelector(".error").style.display="flex";
        }
    </script>
</body>
</html>
