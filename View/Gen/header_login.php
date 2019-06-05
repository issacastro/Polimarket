<head>
<?php
$whatINeed = explode('/', $_SERVER['REQUEST_URI']);
if($whatINeed[2]!=""){include "../Clases/usuario.class.php"; include "../Clases/producto.class.php"; include '../Controller/Session/cart.php'; }
    else{ include "./Clases/usuario.class.php"; include "./Clases/producto.class.php"; include './Controller/Session/cart.php';}
    
?>
 <input id="SESSION" type="hidden" value="SI">
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
                    <!-- /SEARCH BAR -->                   <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Account -->

                            <div class="col-md-3">
                                <a href="perfil">
                                    <i class="fa fa-user"></i>
                                    <span><?php $usr=unserialize($_SESSION['user']);
											    echo $usr->ID_Nick;
                                    ?></span>

                                </a>
                            </div>  
                            <!-- /Account -->
                            <div class="col-md-3">
                                <a href="Controller/Session/logout.php">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>

                                </a>
                            </div>
                    <!-- Cart -->
                    <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Carrito</span>
                                    <div id="nump" class="qty"></div>
                                </a>
                                <div class="cart-dropdown">
                                    <div id ="CARRITO" class="cart-list">

                    
                                    </div>
                                    <div class="cart-summary">
                                        <small id="items"></small>
                                        <h5 id="Total"></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="pedido" >Más detalles</a>
                                        <a href="pagar">Pagar  <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->


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
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="/PoliMarket">Home</a></li>
						<li><a href="store">Store</a></li>
						<li><a href="publicar">Publicar</a></li>
						<!--<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Camaras</a></li>
						<li><a href="#">Accessorios</a></li> /NAV -->
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->