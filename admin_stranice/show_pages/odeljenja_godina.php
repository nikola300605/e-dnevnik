<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/config/config.php";

    if(!isset($_SESSION['adminID'])){
        header('location: '. $_SERVER['DOCUMENT_ROOT'].'/e-dnevnik/index.php');
        exit();
    }
    $razredID = (int)$_GET['razredID'];
    $sql = "SELECT * FROM odeljenje INNER JOIN razred on odeljenje.razredID = razred.razredID WHERE odeljenje.razredID = ?";
    $run = $conn->prepare($sql);
    $run->bind_param('i',$razredID);
    $run -> execute();

    $results = $run->get_result();
    $results = $results->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../admin_css/admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <img src="../../assets/site_images/esdnevnik-logo.png" alt="Es Dnevnik Logo" class="logo">
        <div class="logout-wrap">
            <form action="/e-dnevnik/sign_out.php" method="post" class="log-out">
                <button class="log-out-button">Log out</button>
            </form>
        </div>
    </nav>

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