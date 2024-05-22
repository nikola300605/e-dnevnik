<?php
    require_once "../../config/config.php";
    require_once "../../classes/Predmet.php";
    require_once "../../classes/Ocena.php";

    $predmet = new Predmet();
    $predmeti = $predmet->getPredmets();
    $studentID = $_GET['studentID']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_css/admin_add.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar-container">
                <a href="../admin_dashboard.php">
                    <div class="logo">
                        <img src="../../assets/site_images/esdnevnik-logo.png" alt="">
                    </div>
                </a>
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
        <h1>Dodajte ocenu</h1>
        <form action="" method="post">
            <div class="col col-1">
                <select name="predmetID" id="predmet" required>
                        <option value="" disabled selected>Predmet</option>
                        <?php foreach ($predmeti as $predmet): ?>
                            <option value="<?=$predmet["predmetID"]?>"><?=$predmet["predmet_name"]?></option>                 
                        <?php endforeach;?>
                </select>

                <select name="vrednost">
                    <option value="" selected disabled>Ocena</option>
                    <option value="1">Jedan</option>
                    <option value="2">Dva</option>
                    <option value="3">Tri</option>
                    <option value="4">Četiri</option>
                    <option value="5">Pet</option>
                </select>
                <label for="opis">Opis</label>
                <input type="text" name="opis" id="opis">
            </div>
            <div class="col col-3">
                 <input type="submit" value="Dodaj Ocenu" class="submit">
                 <div class="error"></div>
            </div>
        </form>
    </div>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $predmetID = $_POST["predmetID"];
            $vrednost = (int) $_POST["vrednost"];
            $opis = $_POST['opis'];
            $ocena = new Ocena();
            $resp = $ocena->addOcena($vrednost,$opis,$predmetID,$studentID);
            var_dump($resp);
            if($resp){
                header("Location:../show_pages/student_page.php?studentID=" . $studentID);
            }
        }
    ?>

    <script>
        let resp = <?php echo json_encode($res);?> ;
        console.log(resp);
        if(resp == true){
            document.querySelector(".error").innerHTML = "Greska pri ocenjivanju!"
            document.querySelector(".error").style.display="flex";
        }
    </script>
</body>
</html>

