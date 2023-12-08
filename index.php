<?php 
    require 'config/config.php';
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
                                    <?php
                                        if(isset($_SESSION['error_message'])){
                                            echo  $_SESSION['error_message'];
                                            unset($_SESSION['error_message']);
                                            #TODO: Napraviti error message da se pokaze kad login informacije nisu tacne
                                        }
                                    ?>
                                </form>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>