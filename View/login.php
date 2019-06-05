<?php
    session_start();
    if( isset($_SESSION['user']) ){
        header("location: /POLIMARKET");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PoliMarket</title>
    <link rel="shortcut icon" href="View/img/Polimarket.png" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="View/css/login.css">
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                            <a href="/POLIMARKET">
                        <figure><img src="View/img/Market.png" alt="sing up image"></figure>
                            </a>
                        <a href="signup" class="signup-image-link">Registrate Ya !</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" >
                            <div class="form-group">
                                <label for="your_name"><i class="fas fa-envelope"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Email o Usuario"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fas fa-unlock-alt"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <p id="error"></p>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Va!"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="Controller/JS/Ajax.js"></script>
    <script src="View/js/jquery.min.js"></script>
    <script src="View/js/login.js"></script>
</body>
</html>
