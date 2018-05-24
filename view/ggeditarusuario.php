<?php
session_start();
require_once '../model/Usuario.php';
include_once '../model/CrudModel.php';
$rolusuario = unserialize($_SESSION['rolusuario']);
$nombreusuario = unserialize($_SESSION['nombreusuario']);
if (!isset($_SESSION['bandera'])) {
    session_destroy();
    header('Location: ../view/indexLogin.php');
} else if (isset($_SESSION['bandera']) && $rolusuario == "C") {
    session_destroy();
    header('Location: ../view/indexLogin.php');
} else {
    $bandera = unserialize($_SESSION['bandera']);
    if ($bandera == 'N') {
        session_destroy();
        header('Location: ../view/indexLogin.php');
    } else if ($bandera == 'S') {
        ?>
        <html class="no-js"> <!--<![endif]-->
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <!--___________________-->
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <title>Usuarios</title>
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
                <meta name="description" content="description">

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
                <!-- Main Stylesheet -->
                <link rel="stylesheet" href="css/main.css">
                <!-- Media Queries -->
                <link rel="stylesheet" href="css/responsive.css">


                <!--
                Google Font
                =========================== -->                    

                <!-- Oswald / Title Font -->
                <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
                <!-- Ubuntu / Body Font -->
                <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>

                <!-- Modernizer Script for old Browsers -->
                <script src="js/modernizr-2.6.2.min.js"></script>

            </head>

            <body class="blog-page">
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
                Fixed Navigation
                ==================================== -->
                <header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="../index.php">
                                <h1 id="logo">
                                    <img src="../img/logos/meghuna1.gif" alt="Meghna" />
                                </h1>
                            </a>
                        </div>

                        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                            <ul id="nav" class="nav navbar-nav">
                                <li class="current"><a href="../index.php">Inicio</a></li>

                                <li><a href="../controller/controller.php?opcion=listar_proveedores">Proveedores</a>
                                    <ul>
                                        <li><a href="../controller/controller.php?opcion=segundoReporteListar">Reporte Proveedores</a></li>
                                        <li><a href="../controller/controller.php?opcion=listar_proveedores">Listar Proveedores</a></li>
                                    </ul>
                                </li>                        
                                <li><a href="../controller/controller.php?opcion=listar_usuarios">Usuarios</a>
                                    <ul>
                                        <li><a href="../controller/controller.php?opcion=primerReporteListar">Listar Cajeros</a></li>
                                        <li><a href="../controller/controller.php?opcion=listar_usuarios">Listar Usuarios</a></li>
                                        <li><a href="../controller/controller.php?opcion=listar_logins">Inicios de Sesión</a></li>
                                    </ul>
                                </li>
                                <li><a href="../controller/controller.php?opcion=listar_facturas">Facturas</a>
                                    <ul>
                                        <a href="../controller/controller.php?opcion=listar_facturas">Listar Facturas</a>
                                        <li><a href="../controller/controller.php?opcion=nueva_factura">Ingresar Factura</a></li>
                                        <li><a href="../controller/controller.php?opcion=tercerReporte">Ver Facturas</a></li>
                                    </ul>
                                </li>
                                <li><a href='../index.php'><?php echo $nombreusuario; ?></a>
                                    <ul>
                                        <li><a href='editarLoginCambio.php'>Cambiar Contraseña</a></li>
                                        <li><a href='../controller/controller.php?opcion=cerrarSesion'>Cerrar Sesion</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav><!-- /.navbar-collapse -->
                    </div>
                </header>
                <!--
                End Fixed Navigation
                ==================================== -->


                <!-- Start Blog Banner
                ==================================== -->
                <section id="blog-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">

                                <div class="blog-icon">
                                    <i class="fa fa-book fa-4x"></i>
                                </div>
                                <div class="title text-center">
                                    <h2>Editar <span class="color">Usuarios</span></h2>
                                    <div class="border"></div>
                                </div>


                                <div class="container" style="color: pink">
                                    <!-- Modal -->

                                    <?php
                                    $listaUsuarios = unserialize($_SESSION['listaUsuarios']);
                                    ?>
                                    <form action="../controller/controller.php">
                                        <input type="hidden" name="opcion" value="actualizar_usuario">
                                        <div class="panel panel-info">

                                            <div class="panel-body">
                                                <style>
                                                    table {
                                                        border-collapse: collapse;
                                                        width: 100%;

                                                    }

                                                    th, td {
                                                        text-align: left;
                                                        padding: 8px;
                                                        color: black;

                                                    }

                                                    tr:nth-child(even){background-color: #cccccc}
                                                    tr:nth-child(odd){background-color: whitesmoke}

                                                    th {
                                                        background-color: #4CAF50;
                                                        color: white;
                                                    }
                                                </style>
                                                <table>
                                                    <tr>
                                                        <td>Identificación: </td>
                                                        <td>
                                                            <?php echo $listaUsuarios->getIdusuario();
                                                            ?>
                                                            <input type="hidden" name="idusuario" value="<?php echo $listaUsuarios->getIdusuario(); ?>" />
                                                        </td>
                                                        <td>Tipo de Identificación:</td>
                                                        <td>
                                                            <select name="tipoidusuario">
                                                                <?php
                                                                if ($listaUsuarios->getTipoidusuario() == 'Cedula' || $listaUsuarios->getTipoidusuario() == 'c' || $listaUsuarios->getTipoidusuario() == 'C' || $listaUsuarios->getTipoidusuario() == 'cedula' || $listaUsuarios->getTipoidusuario() == 'CEDULA' || $listaUsuarios->getTipoidusuario() == 'CÉDULA') {
                                                                    echo"<option value='C' select=true>CÉDULA</option>";
                                                                    echo"<option value='P'>PASAPORTE</option>";
                                                                    echo"<option value='R'>RUC</option>";
                                                                } else if ($listaUsuarios->getTipoidusuario() == 'ruc' || $listaUsuarios->getTipoidusuario() == 'r' || $listaUsuarios->getTipoidusuario() == 'R' || $listaUsuarios->getTipoidusuario() == 'Ruc' || $listaUsuarios->getTipoidusuario() == 'RUC') {
                                                                    echo"<option value='R' select=true>RUC</option>";
                                                                    echo"<option value='C'>CÉDULA</option>";
                                                                    echo"<option value='P'>PASAPORTE</option>";
                                                                } else if ($listaUsuarios->getTipoidusuario() == 'pasaporte' || $listaUsuarios->getTipoidusuario() == 'p' || $listaUsuarios->getTipoidusuario() == 'P' || $listaUsuarios->getTipoidusuario() == 'Pasaporte' || $listaUsuarios->getTipoidusuario() == 'PASAPORTE') {
                                                                    echo"<option value='P' select=true>PASAPORTE</option>";
                                                                    echo"<option value='C'>CÉDULA</option>";
                                                                    echo"<option value='R'>RUC</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rol usuario:</td>
                                                        <td>
                                                            <select name="rolusuario" >
                                                                <?php
                                                                if ($listaUsuarios->getRolusuario() == 'C') {
                                                                    echo "<option value='C' selected=true >CAJERO</option>";
                                                                    echo "<option value='A'>ADMINISTRADOR</option>";
                                                                } else if ($listaUsuarios->getRolusuario() == 'A') {
                                                                    echo "<option value='A' >ADMINISTRADOR</option>";
                                                                    echo "<option value='C' >CAJERO</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>Nombre:</td>
                                                        <td>
                                                            <input value="<?php echo $listaUsuarios->getNombreusuario(); ?>" type="text" name="nombreusuario"  title="Se necesita un nombre" placeholder="Ej: Luis Lomas" maxlength="100" required="true" pattern="^[a-zA-Z]+[ ][a-zA-Z]+">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>DOB:</td>
                                                        <td><input value="<?php echo $listaUsuarios->getFecnacusuario(); ?>" type="date" name="fecnacusuario" required="true" autocomplete="off" required="" max="today" min="01-01-1800" value="<?php echo date('d-m-Y'); ?>"></td>
                                                        <td>Ciudad:</td>
                                                        <td>
                                                            <input value="<?php echo $listaUsuarios->getCiunacusuario(); ?>" type="text" name="ciunacusuario"  maxlength="50" placeholder="Ej: Quito" required="true" pattern="^[A-Za-z]+">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dirección:</td>
                                                        <td>
                                                            <input value="<?php echo $listaUsuarios->getDireccionusuario(); ?>" type="text" name="direccionusuario"  maxlength="100" placeholder="Ej: Quito y Via. Amazonas" pattern="^[0-9A-Za-z- ]+" required="true">
                                                        </td>
                                                        <td>Teléfono:</td>
                                                        <td>
                                                            <input value="<?php echo $listaUsuarios->getTelefonousuario(); ?>" type="tel" name="telefonousuario" placeholder="Ej: 0909785967" maxlength="10" required="true" pattern="^[0-9]+">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td>
                                                            <input autocomplete="on" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" maxlength="50"  value="<?php echo $listaUsuarios->getEmailusuario(); ?>" type="email" name="emailusuario"  required="true">
                                                        </td>
                                                        <td>Estado:</td>
                                                        <td>
                                                            <table>
                                                                <tr>   
                                                                    <?php
                                                                    if ($listaUsuarios->getEstadousuario() == true) {
                                                                        echo "<td><input type = 'radio' name = 'estadousuario' value = 'true' required = 'true' checked=true>Activo</td>";
                                                                        echo "<td><input type = 'radio' name = 'estadousuario' value = 'false' required = 'true' >Inactivo</td>";
                                                                    } else if ($listaUsuarios->getEstadousuario() == false) {
                                                                        echo "<td><input type = 'radio' name = 'estadousuario' value = 'true' required = 'true' >Activo</td>";
                                                                        echo "<td><input type = 'radio' name = 'estadousuario' value = 'false' required = 'true' checked=true>Inactivo</td>";
                                                                    }
                                                                    ?>
                                                                </tr>
        <!--                                                        <td><input type = 'radio' name = "estadousuario" value = "true" type = "text" required = "true">Activo</td>
                                                                    <td width = "20"></td>
                                                                    <td><input type = "radio" name = "estadousuario" value = "false" type = "text" required = "true">Inactivo</td>-->
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><center><input 
                                                            style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;"
                                                            type="submit" value="Actualizar Usuario" class="btn btn-sm" ></center></td>
                                                    <td colspan="2"><center><input  
                                                            style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;"
                                                            type="submit" value="Cancelar" class="btn btn-sm" ><a href="controller/controller.php?opcion=listar_usuarios"></a></center></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>     <!-- End col-lg-12 -->
                        </div>	    <!-- End row -->
                    </div>       <!-- End container -->
                </section>    <!-- End Section -->

                <!-- Start Blog Post Section
                ==================================== -->
                <section id="blog-page">
                    <div class="container">
                        <div class="row">

                            <div id="blog-posts" class="col-md-8 col-sm-8">
                                <div class="post-item">




                                </div>
                            </div>

                        </div>	    <!-- End row -->
                    </div>       <!-- End container -->
                </section>    <!-- End Section -->


                <!-- Start Footer Section
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
                                    <img src="img/logo-meghna.png" alt="Meghna" /> <br />
                                    <p>Copyright &copy; 2014. All Rights Reserved.</p>
                                </div>
                                <!-- /copyright -->

                            </div> <!-- end col lg 12 -->
                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </footer> <!-- end footer -->

                <!-- Back to Top
                ============================== -->
                <a href="#" id="scrollUp"><i class="fa fa-angle-up fa-2x"></i></a>

                <!-- end Footer Area
                ========================================== -->

                <!-- 
                Essential Scripts
                =====================================-->

                <!-- Main jQuery -->
                <script src="js/jquery-1.11.0.min.js"></script>
                <!-- Bootstrap 3.1 -->
                <script src="js/bootstrap.min.js"></script>
                <!-- Back to Top -->
                <script src="js/jquery.scrollUp.min.js"></script>
                <script src="js/classie.js"></script>
                <!-- Owl Carousel -->
                <script src="js/owl.carousel.min.js"></script>
                <!-- Custom Scrollbar -->
                <script src="js/jquery.nicescroll.min.js"></script>
                <!-- jQuery Easing -->
                <script src="js/jquery.easing-1.3.pack.js"></script>
                <!-- wow.min Script -->
                <script src="js/wow.min.js"></script>
                <!-- For video responsive -->
                <script src="js/jquery.fitvids.js"></script>
                <!-- Custom js -->
                <script src="js/custom.js"></script>

            </body>
        </html>
        <?php
    }
}
?>