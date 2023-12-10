<?php 
    require_once '../config/config.php';

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
        <img src="../assets/images/esdnevnik-logo.png" alt="Es Dnevnik Logo" class="logo">
        <div class="logout-wrap">
            <form action="sign_out.php" method="post" class="log-out">
                <button class="log-out-button">Log out</button>
            </form>
        </div>
    </nav>

    <section>
        <div class="container">
            <?php 
                foreach ($results as $result) :?>
                    <div class="grade-card">
                        <a href="odeljenja-godina.php?razredID=<?php echo $result['razredID']?>" class="grade-link"> </a>
                        <div class="grade-num"><?php echo $result['code']?></div>
                        <h2 class="grade-name"><?php echo $result['ime'] . ' Razred'?></h2>
                        <div class="icon-button">
                            <a href="all-students-class.php?razredID=<?php echo $result['razredID']?>" class="icon-link"> </a>
                            <img src="../assets/images/group.png" alt=""> 
                        </div>                            
                    </div>
            <?php endforeach;?>           
        </div>
    </section>
</body>

</html>