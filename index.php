<?php 
    require_once 'config/config.php';
    if(isset($_SESSION['admin_error_message'])){
        $err = $_SESSION['admin_error_message'];
        $resp = true;
        unset($_SESSION['admin_error_message']);
    }
    else {
        $resp = false;
        $err = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <section class="hero-section">
        <div class="blur-cover">
            <div class="container">
                <div class="row">
                    <div class="col col-7">
                        <div class="title-wrap">
                            <h2>moj</h2>
                            <h1>E-Dnevnik</h1>
                            <h2>portal za učenike i roditelje</h2>
                        </div>
                    </div>
                    <div class="col col-5">
                        <div class="form-wrapper">                          
                            <h3 class="prijava">Prijava</h3>
                            <span class="subtitle">nalogom iz e-Dnevnika</span>

                            <form action="login_func/login.php" method="post" class="login-form" id="login-form">
                                    <div class="form-element">
                                        <label for="username">Korisničko ime</label> 
                                        <input type="text" name="username" id="username" spellcheck="false">
                                    </div>
                                    <div class="form-element">
                                        <label for="password">Lozinka</label>
                                        <input type="password" name="password" id="password" spellcheck="false">
                                    </div>
                                    
                                    <div class="button-wrapper">
                                        <a href="admin_login.php" class="admin-login">Admin login</a>
                                        <input type="submit" value="prijavi se" class="prijavi-dugme">
                                    </div>
                                    <div class="error-box" id="error-box">
                                        <p id="err-text"></p>
                                    </div>
                                   
                                </form>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var resp = <?php echo json_encode($resp);?> ;
        console.log(resp);
        if(resp == true){
            document.getElementById('error-box').style.display="flex";
            let err = <?php echo json_encode($err);?> ;
            document.querySelector("#err-text").innerHTML = err; 
        }
    </script>
</body>
</html>