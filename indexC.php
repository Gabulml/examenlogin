<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php
session_start();
$rolusuario = unserialize($_SESSION['rolusuario']);
$nombreusuario = unserialize($_SESSION['nombreusuario']);
if (!isset($_SESSION['bandera'])) {
    session_destroy();
    header('Location: view/indexLogin.php');
} else if (isset($_SESSION['bandera']) && $rolusuario == "A") {
    session_destroy();
    header('Location: view/indexLogin.php');
} else {
    $bandera = unserialize($_SESSION['bandera']);
    if ($bandera == 'N') {
        session_destroy();
        header('Location: view/indexLogin.php');
    } else if ($bandera == 'S') {
        ?>
        <html class="no-js"> <!--<![endif]-->
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="description" content="Meghna One page parallax responsive HTML Template ">

                <meta name="author" content="Muhammad Morshed">

                <title>MODULO COMPRAS</title>
                <style type="text/css">
                    *{
                        padding:0px;
                        margin: 0px;
                    }

                    .nav li a:hover{
                        background-color:#A4A4A4; 
                    }

                    .nav > li{
                        float:left;
                    }

                    .nav li a {
                        background-color: #585858;
                        color:#fff;
                        text-decoration: none;
                        padding: 10px 15px;
                        display: block;
                    }

                    .nav li ul {
                        display:none;
                        position:absolute; 
                        min-width: 140px;
                    }

                    .nav li:hover > ul{
                        display:block;
                    }
                </style>
                <!-- Mobile Specific Meta
                ================================================== -->
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- Favicon -->
                <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />

                <!-- CSS
                ================================================== -->
                <!-- Fontawesome Icon font -->
                <link rel="stylesheet" href="css/font-awesome.min.css">
                <!-- bootstrap.min css -->
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <!-- Animate.css -->
                <link rel="stylesheet" href="css/animate.css">
                <!-- Owl Carousel -->
                <link rel="stylesheet" href="css/owl.carousel.css">
                <!-- Grid Component css -->
                <link rel="stylesheet" href="css/component.css">
                <!-- Slit Slider css -->
                <link rel="stylesheet" href="css/slit-slider.css">
                <!-- Main Stylesheet -->
                <link rel="stylesheet" href="css/main.css">
                <!-- Media Queries -->
                <link rel="stylesheet" href="css/media-queries.css">

                <!--
                Google Font
                =========================== -->                    

                <!-- Oswald / Title Font -->
                <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
                <!-- Ubuntu / Body Font -->
                <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="js/jquery.dataTables.min.css" type="text/css"/>


                <!-- Modernizer Script for old Browsers -->		
                <script src="js/modernizr-2.6.2.min.js"></script>


                <script>
                    (function (i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r;
                        i[r] = i[r] || function () {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                        a = s.createElement(o),
                                m = s.getElementsByTagName(o)[0];
                        a.async = 1;
                        a.src = g;
                        m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                    ga('create', 'UA-54152927-1', 'auto');
                    ga('send', 'pageview');

                </script>

            </head>

            <body id="body">
                <!--
                Start Preloader
                ==================================== -->
                <div id="loading-mask">
                    <div class="loading-img">
                        <img alt="Meghna Preloader" src="img/preloader.gif"  />
                    </div>
                </div>
                <!--
                End Preloader
                ==================================== -->

                <!--
                Welcome Slider
                ==================================== -->
                <section id="home">	    

                    <div id="slitSlider" class="sl-slider-wrapper">
                        <div class="sl-slider">

                            <!-- single slide item -->
                            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                                <div class="sl-slide-inner">
                                    <div class="bg-img bg-img-1"></div>
                                    <div class="carousel-caption">
                                        <div>
                                            <img class="wow fadeInUp" src="img/logos/meghuna.gif" alt="Meghna" >
                                            <h2 data-wow-duration="500ms"  data-wow-delay="500ms" class="heading animated fadeInRight" style="font-family: cursive; color: #44B36D">BIENVENIDOS </h2>
                                            <h2 data-wow-duration="500ms"  data-wow-delay="500ms" class="heading animated fadeInRight">MÓDULO COMPRAS</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /single slide item -->

                            <!-- single slide item -->
                            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                                <div class="sl-slide-inner">
                                    <div class="bg-img bg-img-2"></div>
                                    <div class="carousel-caption">
                                        <div>
                                            <img class="wow fadeInUp" src="img/logos/meghuna.gif" alt="Meghna" >
                                            <h2 data-wow-duration="500ms"  data-wow-delay="500ms" class="heading animated fadeInRight" style="font-family: cursive; color: #44B36D">Módulo Compras</h2>
                                            <h3 class="animated fadeInUp">Penetra Mallas Corp</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /single slide item -->

                            <!-- single slide item -->
                            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                                <div class="sl-slide-inner">
                                    <div class="bg-img bg-img-3"></div>
                                    <div class="carousel-caption">
                                        <div>
                                            <img class="wow fadeInUp" src="img/logos/meghuna.gif" alt="Meghna" >
                                            <h2 data-wow-duration="500ms"  data-wow-delay="500ms" class="heading animated fadeInRight" style="font-family: cursive; color: #44B36D">Módulo Compras</h2>
                                            <h3 class="animated fadeInLeft">Equipo De Trabajo</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /single slide item -->

                        </div><!-- /sl-slider -->

                        <nav id="nav-arrows" class="nav-arrows">
                            <span class="nav-arrow-prev">Anterior</span>
                            <span class="nav-arrow-next">Siguiente</span>
                        </nav>

                        <nav id="nav-dots" class="nav-dots">
                            <span class="nav-dot-current"></span>
                            <span></span>
                            <span></span>
                        </nav>

                    </div><!-- /slider-wrapper -->
                </section>
                <!--/#home section-->

                <!-- 
                Fixed Navigation
                ==================================== -->
                <header id="navigation" class="navbar navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <!-- responsive nav button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- /responsive nav button -->

                            <!-- logo -->
                            <a class="navbar-brand" href="#body">
                                <h1 id="logo">
                                    <img src="img/logos/meghuna1.gif" alt="Meghna" />
                                </h1>
                            </a>
                            <!-- /logo -->
                        </div>

                        <!-- main nav -->
                        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                            <ul id="nav" class="nav navbar-nav">
                                <li class="current"><a href="#body">Inicio</a></li>
                                <li><a href="#about">Acerca de Nosotros</a></li>
                                <li><a href="#services">Servicios</a></li>
                                <li><a href="#our-team">Equipo de trabajo</a></li>
                                <li><a href="controller/controller.php?opcion=listar_proveedoresC">Proveedores</a>
                                    <ul>
                                        <li><a href="controller/controller.php?opcion=segundoReporteListarC">Reporte Proveedores</a></li>
                                        <li><a href="controller/controller.php?opcion=listar_proveedoresC">Listar Proveedores</a></li>
                                    </ul>
                                </li>
                                <li><a href="controller/controller.php?opcion=listar_facturasC">Facturas</a>
                                    <ul>

                                        <li><a href="controller/controller.php?opcion=nueva_facturaC">Ingresar Factura</a></li>
                                        <a href="controller/controller.php?opcion=listar_facturasC">Listar Facturas</a>
                                        <li><a href="controller/controller.php?opcion=tercerReporteC">Ver Facturas</a></li>
                                    </ul>
                                </li>
                                <li><a href="#body"><?php echo $nombreusuario; ?></a>
                                    <ul>
                                        <li><a href='view/editarLoginCambio.php'>Cambiar Contraseña</a></li>
                                        <li><a href='controller/controller.php?opcion=cerrarSesion'>Cerrar Sesion</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- /main nav -->

                    </div>
                </header>
                <!--
                End Fixed Navigation
                ==================================== -->

                <!--
                Start About Section
                ==================================== -->
                <section id="about" class="bg-one">
                    <div class="container">
                        <div class="row">

                            <!-- section title -->
                            <div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
                                <h2>Módulo <span class="color">Compras</span></h2>
                                <div class="border"></div>
                            </div>
                            <!-- /section title -->

                            <!-- About item -->
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" >
                                <div class="wrap-about">							
                                    <div class="icon-box">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>					
                                    <!-- Express About Yourself -->
                                    <div class="about-content text-center">
                                        <h3 class="ddd">Misión</h3>								
                                        <p>Hacer funcionar el Módulo Compras con los demas Módulos sin ningún problema</p>
                                    </div>
                                </div>
                            </div> 
                            <!-- End About item -->

                            <!-- About item -->
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms">
                                <div class="wrap-about">
                                    <div class="icon-box">
                                        <i class="fa fa-users fa-4x"></i>
                                    </div>
                                    <!-- Express About Yourself -->
                                    <div class="about-content text-center">
                                        <h3>Visión</h3>
                                        <p>En la presentación del proyecto se eejecute sin ningún inconveniente el Módulo Compras</p>
                                    </div>
                                </div>
                            </div> 
                            <!-- End About item -->

                            <!-- About item -->					
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
                                <div class="wrap-about kill-margin-bottom">
                                    <div class="icon-box">
                                        <i class="fa fa-lightbulb-o fa-4x"></i>
                                    </div>
                                    <!-- Express About Yourself -->
                                    <div class="about-content text-center">
                                        <h3>Valores Éticos</h3>
                                        <p>Humildad</p>
                                        <p>Responsabilidad</p>
                                        <P>Creatividad</P>
                                        <P>Confianza</P>
                                        <P>Creatividad</P>
                                    </div>
                                </div>
                            </div>  <!-- End About item -->
                        </div>  <!-- End row -->
                    </div>  <!-- End container -->
                </section>  <!-- End section -->

                <!--
                Start Main Features
                ==================================== -->
                <section id="main-features">
                    <div class="container">
                        <div class="row">

                            <!-- features item -->
                            <div id="features">
                                <div class="item">

                                    <div class="features-item">

                                        <!-- features media -->
                                        <div class="col-md-6 feature-media media-wrapper wow fadeInUp" data-wow-duration="1000ms">
                                            <iframe src="https://player.vimeo.com/video/174772745" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                        <!-- /features media -->
                                        <div class="col-md-6 feature-desc wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                            <h3>Módulo Compras</h3>
                                            <p>El Módulo Compras esta enfoncado al consume de WS de Inventario lo cual no pedira los productos que necesita para bodega</p>
                                        </div>

                                        <!-- features content -->
                                        <!-- /features content -->

                                    </div>
                                </div>
                                <!-- /features content -->
                            </div>
                        </div>
                    </div>
                    <!-- /features item -->

                </div> 		<!-- End row -->
            </div>   	<!-- End container -->
        </section>   <!-- End section -->

        <!--
        Start Counter Section
        ==================================== -->




        <!-- Start Services Section
        ==================================== -->

        <section id="services" class="bg-one">
            <div class="container">
                <div class="row">

                    <!-- section title -->
                    <div class="title text-center wow fadeIn" data-wow-duration="500ms">
                        <h2>Los <span class="color">Servicios</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->

                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-camera-retro fa-5x"></i>
                            </div>
                            <h3>Compra</h3>
                            <p>Este Módulo Compra esta basado a la compra de productos que necesita el Módulo Inventario.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->

                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-krw fa-5x"></i>
                            </div>
                            <h3>Web Service</h3>
                            <p>Consumo de WS de entrada y salída de datos para su respectiva entrega.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->

                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-cloud-download fa-5x"></i>
                            </div>
                            <h3>GitHub</h3>
                            <p>Uso de servidores GitHub para la elaboración del módulo compras entre todo el equipo de trabajo.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->

                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-location-arrow fa-5x"></i>
                            </div>
                            <h3>Heroku</h3>
                            <p>Utilización de los servidores Heroku para el uso del Web Service.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->

                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="service-block text-center">
                            <div class="service-icon text-center">
                                <i class="fa fa-android fa-5x"></i>
                            </div>
                            <h3>Teléfonos Móvil</h3>
                            <p>Plantilla adaptable para teléfonos móviles y tablets.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->

                    <!-- Single Service Item -->
                    <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="service-block text-center kill-margin-bottom">
                            <div class="service-icon text-center">
                                <i class="fa fa-dot-circle-o fa-5x"></i>
                            </div>
                            <h3>PHP</h3>
                            <p>La mayor parte del Módulo Compra esta realizado en lenguaje PHP, con Javascript, html y Css.</p>
                        </div>
                    </article>
                    <!-- End Single Service Item -->

                </div> 		<!-- End row -->
            </div>   	<!-- End container -->
        </section>   <!-- End section -->


        <!-- Start Portfolio Section
        =========================================== -->




        <!-- Start Team Skills
        =========================================== -->

        <section id="team-skills" class="parallax-section">
            <div class="container">
                <div class="row wow fadeInDown" data-wow-duration="500ms">

                    <!-- section title -->
                    <div class="title text-center">
                        <h2>Porcentaje <span class="color">Proyecto</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->

                    <!-- skill set -->
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
                        <div class="skill-chart text-center">
                            <span class="chart" data-percent="42.5">
                                <span class="percent"></span>
                            </span>
                            <h3><i class="fa fa-wordpress"></i> PHP</h3>
                            <p>Lenguaje PHP.</p>
                        </div>
                    </div>
                    <!-- end skill set -->

                    <!-- skill set -->
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
                        <div class="skill-chart text-center">
                            <span class="chart" data-percent="31.7">
                                <span class="percent">86</span>
                            </span>
                            <h3><i class="fa fa-joomla"></i> JavaScript</h3>
                            <p>Lenguaje JavaScript.</p>
                        </div>
                    </div>
                    <!-- end skill set -->

                    <!-- skill set -->
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="skill-chart text-center">
                            <span class="chart" data-percent="15.8">
                                <span class="percent"></span>
                            </span>
                            <h3><i class="fa fa-html5"></i> HTML</h3>
                            <p>Lenguaje HTML.</p>
                        </div>
                    </div>
                    <!-- end skill set -->

                    <!-- skill set -->
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="skill-chart text-center">
                            <span class="chart" data-percent="10.0">
                                <span class="percent"></span>
                            </span>
                            <h3><i class="fa fa-css3"></i> CSS</h3>
                            <p>Lenguaje CSS.</p>
                        </div>
                    </div>
                    <!-- end skill set -->

                </div>  		<!-- End row -->
            </div>   	<!-- End container -->
        </section>   <!-- End section -->

        <!-- Start Our Team
        =========================================== -->

        <section id="our-team">
            <div class="container">
                <div class="row">

                    <!-- section title -->
                    <div class="title text-center wow fadeInUp" data-wow-duration="500ms">
                        <h2>Equipo De <span class="color">Trabajo</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms">
                        <article class="team-mate">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Mateo.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/alexteo22?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Mateo Alexander Salcedo Andrade</h3>
                                <span>Scrum Master</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Líder Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->

                        </article>
                    </div>
                    <!-- end team member -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
                        <article class="team-mate">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Antonio.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/antonio.quina.1?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Ing. José Antonio Quiña Mera</h3>
                                <span>Product Owner</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Último responsable del Product Backlog UTN.</p>
                            </div>
                            <!-- /about member -->
                        </article>
                    </div>
                    <!-- end team member -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">
                        <article class="team-mate">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Gaby.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/gaby.cuaspud1?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Nataly Gabriela Cuaspud</h3>
                                <span>Desarrolladora</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Desarrolladora Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->
                        </article>
                    </div>
                    <!-- end team member -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                        <article class="team-mate kill-margin-bottom">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Lore.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/lore.quelal.7?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Mayra Lorena Quelal Quiroz</h3>
                                <span>Desarrolladora 1/2</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Desarrolladora Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->
                        </article>
                    </div>
                    <!-- end team member -->
                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms">
                        <article class="team-mate">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Dayana.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/dayanita.vila?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Dayana Patricia Vila Espinosa</h3>
                                <span>Desarrolladora</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Desarrolladora Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->

                        </article>
                    </div>
                    <!-- end team member -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
                        <article class="team-mate">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Saul.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/saul.cisneros.180?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Saúl Andrés Cisneros Buitrón</h3>
                                <span>Desarrollador</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Desarrollador Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->
                        </article>
                    </div>
                    <!-- end team member -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">
                        <article class="team-mate">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/Jhonatan.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/Johnny182012?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Jhonatan Marcelo Domínguez Montalvo</h3>
                                <span>Desarrollador</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Desarrollador Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->
                        </article>
                    </div>
                    <!-- end team member -->

                    <!-- team member -->
                    <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                        <article class="team-mate kill-margin-bottom">
                            <div class="member-photo">
                                <!-- member photo -->
                                <img class="img-responsive" src="img/team/David.jpg" alt="Meghna">
                                <!-- /member photo -->

                                <!-- member social profile -->
                                <div class="mask">
                                    <ul class="clearfix">
                                        <li><a href="https://www.facebook.com/david.guerrero.5205?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /member social profile -->
                            </div>

                            <!-- member name & designation -->
                            <div class="member-title">
                                <h3>Joseph David Guerrero Pasquel</h3>
                                <span>Colaborador</span>
                            </div>
                            <!-- /member name & designation -->

                            <!-- about member -->
                            <div class="member-info">
                                <p>Colaborador Módulo Compras UTN.</p>
                            </div>
                            <!-- /about member -->
                        </article>
                    </div>
                    <!-- end team member -->


                </div>  	<!-- End row -->
            </div>   	<!-- End container -->
        </section>   <!-- End section -->


        <!-- Start Twitter Feed
        =========================================== -->

        <section id="twitter-feed" class="parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">

                        <!-- twitter bird -->
                        <!-- /twitter bird -->

                        <!-- fetching tweet -->
                        <div class="tweet wow fadeIn" data-wow-duration="2000ms"></div>
                        <!-- /fetching tweet -->

                        <!-- follow us button -->
                        <!-- /follow us button -->

                    </div>
                </div>       <!-- End row -->
            </div>   	<!-- End container -->
        </section>   <!-- End section -->

        <!-- Start Pricing section
        =========================================== -->













        <!-- Srart Contact Us
        =========================================== -->		
        <section id="contact-us">
            <div class="container">
                <div class="row">

                    <!-- section title -->
                    <div class="title text-center wow fadeIn" data-wow-duration="500ms">
                        <h2>Contáctate con <span class="color">Nosotros</span></h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->

                    <!-- Contact Details -->
                    <div class="contact-info col-md-6 wow fadeInUp" data-wow-duration="500ms">
                        <h3>Detalles de Contacto</h3>
                        <p>Información de Contacto.</p>
                        <div class="contact-details">
                            <div class="con-info clearfix">
                                <i class="fa fa-home fa-lg"></i>
                                <span>San Antonio, Calle Ezequiel Rivadeneira 8-36 y Ramón Teanga</span>
                            </div>

                            <div class="con-info clearfix">
                                <i class="fa fa-phone fa-lg"></i>
                                <span>Teléfono: 06-2932354</span>
                            </div>

                            <div class="con-info clearfix">
                                <i class="fa fa-fax fa-lg"></i>
                                <span>Fax: +880-06-932-354</span>
                            </div>

                            <div class="con-info clearfix">
                                <i class="fa fa-envelope fa-lg"></i>
                                <span>Email: penetramallas@utn.edu.ec</span>
                            </div>
                        </div>
                    </div>
                    <!-- / End Contact Details -->

                    <!-- Contact Form -->
                    <div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <form id="contact-form" method="post" action="sendmail.php" role="form">

                            <div class="form-group">
                                <input type="text" placeholder="Tu Nombre" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <input type="email" placeholder="Tu Email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Título" class="form-control" name="subject" id="subject">
                            </div>

                            <div class="form-group">
                                <textarea rows="6" placeholder="Mensaje" class="form-control" name="message" id="message"></textarea>	
                            </div>

                            <div id="mail-success" class="success">
                                Thank you. The Mailman is on His Way :)
                            </div>

                            <div id="mail-fail" class="error">
                                Sorry, don't know what happened. Try later :(
                            </div>

                            <div id="cf-submit">
                                <input type="submit" id="contact-submit" class="btn btn-transparent" value="Enviar">
                            </div>						

                        </form>
                    </div>
                    <!-- ./End Contact Form -->

                </div> <!-- end row -->
            </div> <!-- end container -->

            <!-- Google Map -->

            <!-- /Google Map -->

        </section> <!-- end section -->

        <!-- end Contact Area
        ========================================== -->

        <footer id="footer" class="bg-one">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="500ms">
                    <div class="col-lg-12">

                        <!-- Footer Social Links -->
                        <div class="social-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!--/. End Footer Social Links -->

                        <!-- copyright -->
                        <div class="copyright text-center">
                            <a href="index.html">
                                <img src="img/logos/meghuna1.gif" alt="Meghna" /> 
                            </a>
                            <br />

                            <p>Elaborado y Diseñado por <a href="index.html"> Penetra Mallas Corp</a>. Copyright &copy; 2017. All Rights Reserved.</p>
                        </div>
                        <!-- /copyright -->

                    </div> <!-- end col lg 12 -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </footer> <!-- end footer -->

        <!-- Back to Top
        ============================== -->
        <a href="javascript:;" id="scrollUp">
            <i class="fa fa-angle-up fa-2x"></i>
        </a>

        <!-- end Footer Area
        ========================================== -->

        <!-- 
        Essential Scripts
        =====================================-->

        <!-- Main jQuery -->
        <script src="js/jquery-1.11.0.min.js"></script>
        <!-- Bootstrap 3.1 -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Slitslider -->
        <script src="js/jquery.slitslider.js"></script>
        <script src="js/jquery.ba-cond.min.js"></script>
        <!-- Parallax -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
        <!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Portfolio Filtering -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Custom Scrollbar -->
        <script src="js/jquery.nicescroll.min.js"></script>
        <!-- Jappear js -->
        <script src="js/jquery.appear.js"></script>
        <!-- Pie Chart -->
        <script src="js/easyPieChart.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing-1.3.pack.js"></script>
        <!-- tweetie.min -->
        <script src="js/tweetie.min.js"></script>
        <!-- Google Map API -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <!-- Highlight menu item -->
        <script src="js/jquery.nav.js"></script>
        <!-- Sticky Nav -->
        <script src="js/jquery.sticky.js"></script>
        <!-- Number Counter Script -->
        <script src="js/jquery.countTo.js"></script>
        <!-- wow.min Script -->
        <script src="js/wow.min.js"></script>
        <!-- For video responsive -->
        <script src="js/jquery.fitvids.js"></script>
        <!-- Grid js -->
        <script src="js/grid.js"></script>
        <!-- Custom js -->
        <script src="js/custom.js"></script>

        </body>
        </html>
        <?php
    }
}
?>