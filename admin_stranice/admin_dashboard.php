<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/config/config.php";

    if(!isset($_SESSION['adminID'])){
        header('location: ../index.php');
        exit();
    } 

    $sql = 'SELECT * FROM razred';
    $run = $conn->query($sql);
    $results = $run->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_css/admin_dashboard.css">
    <title>Document</title>
    
</head>
<body>
    <nav class="navbar">
        <img src="../assets/site_images/esdnevnik-logo.png" alt="Es Dnevnik Logo" class="logo">
        <div class="buttons-wrapper">
            <div class="nav-link" onclick="location.href='add_pages/add_students.php'"> 
                <span>Add Students</span>
            </div>
            <div class="logout-wrap">
                <form action="/e-dnevnik/sign_out.php" method="post" class="log-out">
                    <button class="log-out-button">Sign Out</button>
                </form>
            </div>
            
        </div>

    </nav>
    
    <section>
        <div class="container">
            <?php 
                foreach ($results as $result) :?>
                    <div class="grade-card">
                        <a href="show_pages/odeljenja_godina.php?razredID=<?php echo $result['razredID']?>" class="grade-link"> </a>
                        <div class="grade-num"><?php echo $result['code']?></div>
                        <h2 class="grade-name"><?php echo $result['ime'] . ' Razred'?></h2>
                        <div class="icon-button">
                            <a href="show_pages/all_students_grade.php?razredID=<?php echo $result['razredID']?>" class="icon-link"> </a>
                            <img src="../assets/images/group.png" alt=""> 
                        </div>                            
                    </div>
            <?php endforeach;?>           
        </div>
    </section>
</body>

</html>