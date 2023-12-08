<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>

<?php 
    require_once 'config/config.php';
    if(isset($_SESSION['error_message_admin'])){
        echo $_SESSION['error_message_admin'];
        unset($_SESSION['error_message_admin']);
        #TODO: Napraviti error message da se pokaze kad login informacije nisu tacne
    }
?>
<body>
    <section class="hero-section">
        <div class="blur-cover">
            <div class="container">
                <div class="row">
                    <div class="col col-7">
                        <div class="title-wrap">
                            <h2>moj</h2>
                            <h1>E-Dnevnik</h1>
                            <h2>Admin login</h2>
                        </div>
                    </div>
                    <div class="col col-5">
                        <div class="form-wrapper">                          
                            <h3 class="prijava">Prijava</h3>
                            <span class="subtitle">za admine</span>

                            <form action="login_func/login_admin.php" method="post" class="login-form" id="login-form">
                                    <div class="form-element">
                                        <label for="username">Korisničko ime</label> 
                                        <input type="text" name="username" id="username" spellcheck="false">
                                    </div>
                                    <div class="form-element">
                                        <label for="password">Lozinka</label>
                                        <input type="password" name="password" id="password">
                                    </div>
                                    
                                    <div class="button-wrapper">
                                        <a href="index.php" class="admin-login">Login za ucenike</a>
                                        <input type="submit" value="prijavi se" class="prijavi-dugme">
                                    </div>
                                </form>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>