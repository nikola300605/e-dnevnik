<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/config/config.php";

    if(!isset($_SESSION['adminID'])){
        header('location: '. $_SERVER['DOCUMENT_ROOT'].'/e-dnevnik/index.php');
        exit();
    }
    $razredID = (int) $_GET['razredID'];
    $odeljenjeId = (int)$_GET['odeljenjeID'];
    echo $odeljenjeId . "\n";
    echo $razredID;
    $sql = "SELECT * FROM student WHERE razredID = ? AND odeljenjeID = ?";
    $run = $conn->prepare($sql);
    $run->bind_param("ii",$razredID, $odeljenjeId);
    $run->execute();

    $results = $run->get_result();
    $results = $results->fetch_all(MYSQLI_ASSOC);
    var_dump($results);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_css/admin.css">
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

    <div class="container">
        <?php 
            foreach ($results as $result) :?>
            <a href="student.php?studentID=<?php echo $result["studentID"]?>">
                <div class="student_card">
                    <img src="<?php if($result["photo_path"] == null){
                        echo $_SERVER['DOCUMENT_ROOT'] . "/e-dnevnik/assets/user_images/default_user_image.png";
                    } else {
                        echo $_SERVER['DOCUMENT_ROOT'] . $result["photo_path"];
                    }
                    ?>" alt="Slika">
                    <h2><?php echo $result["name"] . " " . $result["surname"]?></h2>
            
                </div>
            </a>
        <?php endforeach;?>
    </div>
</body>
</html>