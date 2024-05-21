<?php 
    require_once "../../config/config.php";
    require_once "../../classes/Odeljenje.php";

    $odeljenje = new Odeljenje();
    $razredID = $_GET['razredID']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_css/admin_add.css">
    <title>Document</title>
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
        <h1>Dodajte odeljenje</h1>
        <form action="" method="post">
            <div class="col col-1">
                <label for="predmet">Broj odeljenja</label>
                <input type="number" name="int_code" id="int_code" max="8" min="1">
            </div>
            <div class="col col-3">
                 <input type="submit" value="Dodaj odeljenje" class="submit">
                 <div class="error"></div>
            </div>
        </form>
    </div>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $int_code = (int) $_POST['int_code'];

            $resp = $odeljenje->addOdeljenje($razredID,$int_code);
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