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
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="fa fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nick" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-unlock-alt"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <p id="error"></p>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Va!"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                            <a href="index">
                        <figure><img src="View/img/Polimarket.png" alt="sing up image"></figure>
                            </a>
                        <a href="login" class="signup-image-link">Ya estoy registrado !</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="View/js/jquery.min.js"></script>
    <script src="View/js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="Controller/JS/Ajax.js"></script>
</body>
</html>
