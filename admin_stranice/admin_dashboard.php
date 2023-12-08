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
    <section>
        <div class="container">
            <?php 
                foreach ($results as $result) :?>
                    <div class="grade-card">
                        <a href="wikipedia.com" class="grade-link"> </a>
                        <div class="grade-num"><?php echo $result['code']?></div>
                        <h2 class="grade-name"><?php echo $result['ime'] . ' Razred'?></h2>
                        <a href="all-students.php?razredID=<?php echo $result['razredID']?>" class="icon-button"> 
                            <img src="../assets/images/group.png" alt="">   </a>                                
                    </div>
               
            <?php endforeach;?>           
        </div>
    </section>
</body>
</html>