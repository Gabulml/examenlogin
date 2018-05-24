<?php
session_start();
require_once '../model/Proveedor.php';
$rolusuario = unserialize($_SESSION['rolusuario']);
$nombreusuario = unserialize($_SESSION['nombreusuario']);
if (!isset($_SESSION['bandera'])) {
    session_destroy();
    header('Location: ../view/indexLogin.php');
} else if (isset($_SESSION['bandera']) && $rolusuario == "A") {
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
                <title>Proveedores</title>
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
                            <a class="navbar-brand" href="../indexC.php">
                                <h1 id="logo">
                                    <img src="../img/logos/meghuna1.gif" alt="Meghna" />
                                </h1>
                            </a>
                        </div>

                        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                                    <ul id="nav" class="nav navbar-nav">
                                        <li class="current"><a href="../indexC.php">Inicio</a></li>

                                        <li><a href="../controller/controller.php?opcion=listar_proveedoresC">Proveedores</a>
                                            <ul>
                                                <li><a href="../controller/controller.php?opcion=segundoReporteListarC">Reporte Proveedores</a></li>
                                                <li><a href="../controller/controller.php?opcion=listar_proveedoresC">Listar Proveedores</a></li>
                                            </ul>
                                        </li> 
                                        <li><a href="../controller/controller.php?opcion=listar_facturasC">Facturas</a>
                                            <ul>
                                                <a href="../controller/controller.php?opcion=listar_facturasC">Listar Facturas</a>
                                                <li><a href="../controller/controller.php?opcion=nueva_facturaC">Ingresar Factura</a></li>
                                                <li><a href="../controller/controller.php?opcion=tercerReporteC">Ver Facturas</a></li>
                                            </ul>
                                        </li>                            
                                        <li><a href="../indexC.php"><?php echo $nombreusuario; ?></a>
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
                                    <h2>Editar <span class="color">Proveedores</span></h2>
                                    <div class="border"></div>
                                </div>
                                <div class="container" style="color: pink">
                                    <!-- Modal -->
                                    <?php
                                    $listaProveedores = unserialize($_SESSION['listaProveedores']);
                                    ?>
                                    <form action="../controller/controller.php">
                                        <input type="hidden" name="opcion" value="actualizar_proveedorC">
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
                                                        <td>Identificador:</td>
                                                        <td>
                                                            <?php echo $listaProveedores->getIdproveedor();
                                                            ?>
                                                            <input maxlength="13" type="hidden" name="idproveedor" value="<?php echo $listaProveedores->getIdproveedor(); ?>" />
                                                        </td>
                                                        <td>Tipo de identificación:</td>
                                                        <td>
                                                            <select name="tipoidproveedor">
                                                                <?php
                                                                if ($listaProveedores->getTipoidproveedor() == 'Cedula' || $listaProveedores->getTipoidproveedor() == 'c' || $listaProveedores->getTipoidproveedor() == 'C' || $listaProveedores->getTipoidproveedor() == 'cedula' || $listaProveedores->getTipoidproveedor() == 'CEDULA') {
                                                                    echo"<option select=true>CÉDULA</option>";
                                                                    echo"<option >PASAPORTE</option>";
                                                                    echo"<option >RUC</option>";
                                                                } else if ($listaProveedores->getTipoidproveedor() == 'ruc' || $listaProveedores->getTipoidproveedor() == 'r' || $listaProveedores->getTipoidproveedor() == 'R' || $listaProveedores->getTipoidproveedor() == 'Ruc' || $listaProveedores->getTipoidproveedor() == 'RUC') {
                                                                    echo"<option select=true>RUC</option>";
                                                                    echo"<option >CÉDULA</option>";
                                                                    echo"<option >PASAPORTE</option>";
                                                                } else if ($listaProveedores->getTipoidproveedor() == 'pasaporte' || $listaProveedores->getTipoidproveedor() == 'p' || $listaProveedores->getTipoidproveedor() == 'P' || $listaProveedores->getTipoidproveedor() == 'Pasaporte' || $listaProveedores->getTipoidproveedor() == 'PASAPORTE') {
                                                                    echo"<option select=true>PASAPORTE</option>";
                                                                    echo"<option >CÉDULA</option>";
                                                                    echo"<option >RUC</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombres:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getNombreproveedor(); ?>" type="text" name="nombreproveedor"  required="true" title="Se necesita un nombre" placeholder="Ej: Luis" pattern="[A-Za-z ]+" maxlength="100" >
                                                        </td>
                                                        <td>DOB:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getFecnacproveedor(); ?>" type="date" name="fecnacproveedor"  required="true" max="today" min="01-01-1800" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ciudad de nacimiento:</td>
                                                        <td>
                                                            <input  placeholder="Ej: Quito" pattern="[A-Za-z ]+" value="<?php echo $listaProveedores->getCiudnacproveedor(); ?>" type="text" name="ciudnacproveedor"  maxlength="50" required="true">
                                                        </td>
                                                        <td>Tipo de proveedor</td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <?php
                                                                    if ($listaProveedores->getTipoproveedor() == true) {
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'true' required = 'true' checked=true>Crédito</td>";
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'false' required = 'true' >Efectivo</td>";
                                                                    } else if ($listaProveedores->getTipoproveedor() == false) {
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'false' required = 'true' >Crédito</td>";
                                                                        echo "<td><input type = 'radio' name = 'tipoproveedor' value = 'true' required = 'true' checked=true>Efectivo</td>";
                                                                    }
                                                                    //                                                            <td><input type = "radio" name = "tipoproveedor" value = 'true' required = "true">Credito</td>
                                                                    //                                                            <td width = "20"></td>
                                                                    //                                                            <td><input type = "radio" name = "tipoproveedor" value = 'false' required = "true">Efectivo</td>
                                                                    ?>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dirección:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getDireccionproveedor(); ?>" placeholder="Ej: Quito y Via. Amazonas" type="text" name="direccionproveedor" maxlength="100" required="true">
                                                        </td>
                                                        <td>Teléfono:</td>
                                                        <td>
                                                            <input value="<?php echo $listaProveedores->getTelefonoproveedor(); ?>" placeholder="Ej: 0909785967" pattern="[0-9]+" type="tel" name="telefonoproveedor" maxlength="10" required="true">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td>
                                                            <input autocomplete="on" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="<?php echo $listaProveedores->getEmailproveedor(); ?>" type="email" name="emailproveedor" maxlength="50" required="true">
                                                        </td>
                                                        <td>Estado</td>
                                                        <td>
                                                            <table>
                                                                <?php
                                                                if ($listaProveedores->getEstadoproveedor() == true) {
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'true' required = 'true' checked=true>Activo</td>";
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'false' required = 'true' >Inactivo</td>";
                                                                } else if ($listaProveedores->getEstadoproveedor() == false) {
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'false' required = 'true' >Activo</td>";
                                                                    echo "<td><input type = 'radio' name = 'estadoproveedor' value = 'true' required = 'true' checked=true>Inactivo</td>";
                                                                }

//                                                        <tr>
//                                                        <td><input type = "radio" name = "estadoproveedor" value = 'true' required = "true">Activo</td>
//                                                        <td width = "20"></td>
//                                                        <td><input type = "radio" name = "estadoproveedor" value = 'false' required = "true">Inactivo</td>
//                                                        </tr>
                                                                ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><center><input 
                                                            style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;"
                                                            type="submit" value="Actualizar Proveedor" class="btn btn-sm" ></center></td>
                                                    <td colspan="2"><center><input  
                                                            style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;"
                                                            type="submit" value="Cancelar" class="btn btn-sm" ><a href="controller/controller.php?opcion=listar_proveedoresC"></a></center></td>
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