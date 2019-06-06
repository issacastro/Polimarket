<head>
<?php
$whatINeed = explode('/', $_SERVER['REQUEST_URI']);
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>PoliMarket</title>
    <link rel="shortcut icon" href="View/img/Polimarket.png" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="View/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="View/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="View/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="View/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="View/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="View/css/style.css"/>

</head>
<body>
    <!-- HEADER -->
    <header>
    <input id="SESSION" type="hidden" value="NO">
        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <br>
                            <a href="/POLIMARKET" class="logo">
                                <img src="View/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form id="Buscar-nombre">
                            <select  class="input-select categorias">
                                    <option>Categorias</option>
                                </select>
                                <input name="bus" id="bus" class="input" placeholder="¿Que estas Buscando?">
                                <button class="search-btn">Va!</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Account -->
                            <div class="col-md-3">
                                <a href="login">
                                    <i class="fa fa-user"></i>
                                    <span>Sign In</span>

                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="signup">
                                    <i class="fas fa-address-card"></i>
                                    <span>Sign Up</span>

                                </a>
                            </div>
                            <!-- /Account -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->
	<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                    <?php if($whatINeed[2]==''){ ?>
						<li class="active"><a href="/PoliMarket">Home</a></li>
						<li class="" ><a href="store">Store</a></li>
                    <?php }elseif($whatINeed[2]=='store'){?>
						<li class=""><a href="/PoliMarket">Home</a></li>
						<li class="active" ><a href="store">Store</a></li>
                    <?php }else{?>
						<li class=""><a href="/PoliMarket">Home</a></li>
						<li class="" ><a href="store">Store</a></li>
                    <?php }?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->