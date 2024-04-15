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
                <div class="logo">
                    <img src="/e-dnevnik/assets/site_images/esdnevnik-logo.png" alt="">
                </div>
                <div class="menu">
                    <a href="../add_pages/add_student.php?razredID=<?=$razredID?>&odeljenjeID=<?=$odeljenjeID?>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add student
                        </div>
                    </a>
                    <a href="/e-dnevnik/sign_out.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Log Out
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>