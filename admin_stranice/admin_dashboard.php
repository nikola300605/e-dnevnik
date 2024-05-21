<?php 
    require_once "../config/config.php";
    require_once "../classes/Razred.php";

    if(!isset($_SESSION['adminID'])){
        header('location: ../index.php');
        exit();
    } 
    $razred = new Razred();
    $results = $razred->getRazred();
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
    <header>
        <nav>
            <div class="navbar-container">
                <div class="logo">
                    <img src="../assets/site_images/esdnevnik-logo.png" alt="">
                </div>
                <div class="menu">
                    <a href="add_pages/add_student.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add student
                        </div>
                    </a>
                    <a href="add_pages/add_predmet.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add predmet
                        </div>
                    </a>
                    <a href="../sign_out.php" target="_self" rel="noopener noreferrer" class="nav-link">
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
                    <div class="grade-card">
                        <a href="show_pages/odeljenja_godina.php?razredID=<?php echo $result['razredID']?>" class="grade-link"> </a>
                        <div class="grade-num"><?php echo $result['code']?></div>
                        <h2 class="grade-name"><?php echo $result['ime'] . ' Razred'?></h2>
                        <div class="icon-button">
                            <a href="show_pages/all_students_grade.php?razredID=<?php echo $result['razredID']?>" class="icon-link"> </a>
                            <img src="../assets/site_images/group.png" alt=""> 
                        </div>                            
                    </div>
            <?php endforeach;?>           
        </div>
    </section>
</body>

</html>