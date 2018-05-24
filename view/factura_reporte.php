<!DOCTYPE html>
<?php
require_once '../model/Producto.php';
require_once '../model/Facturas.php';
require_once '../model/DetalleFactura.php';
require_once '../model/CrudModel.php';
require_once '../model/FacturaModel.php';
require_once '../model/Proveedor.php';
session_start();
$facturaCab = $_SESSION['facturaCab'];
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
                <!--inicio del método búsqueda inteligente-->
                <script type="text/javascript">
                    (function (document) {
                        'use strict';

                        var LightTableFilter = (function (Arr) {

                            var _input;

                            function _onInputEvent(e) {
                                _input = e.target;
                                var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                                Arr.forEach.call(tables, function (table) {
                                    Arr.forEach.call(table.tBodies, function (tbody) {
                                        Arr.forEach.call(tbody.rows, _filter);
                                    });
                                });
                            }

                            function _filter(row) {
                                var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                                row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                            }

                            return {
                                init: function () {
                                    var inputs = document.getElementsByClassName('light-table-filter');
                                    Arr.forEach.call(inputs, function (input) {
                                        input.oninput = _onInputEvent;
                                    });
                                }
                            };
                        })(Array.prototype);

                        document.addEventListener('readystatechange', function () {
                            if (document.readyState === 'complete') {
                                LightTableFilter.init();
                            }
                        });

                    })(document);
                </script>		
                <style type="text/css">
                    body {
                        font: normal medium/1.4 sans-serif;
                    }
                    table {
                        border-collapse: collapse;
                        width: 100%;
                        text-align: center;
                        margin: auto;

                    }
                    th, td {
                        text-align: left;
                        padding: 20px ;
                        color: black;

                    }
                    tr:nth-child(even){background-color: #cccccc}
                    tr:nth-child(odd){background-color: whitesmoke}
                    th {
                        background-color: #4CAF50;
                        color: white;
                    }

                    .titulo{
                        padding: 0.5rem;
                        background: #FD0808 ;
                        color: red;
                        text-align: center;
                        font-size: 21px;
                    }

                    #buscar{
                        width: 650px;
                        font-size: 18px;
                        color: #fff;
                        background: transparent ;
                        padding-left: 20px ;
                        text-align: center;
                        border-radius: 5px;
                        padding: 10px;
                        margin:10px; 
                        border: 4px solid #006633;
                    }

                </style>	
                <!--fin búsqueda-->
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
<!--                <div id="loading-mask">
                    <div class="loading-img">
                        <img alt="Meghna Preloader" src="img/preloader.gif"  />
                    </div>
                </div>-->
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
                            <a class="navbar-brand" href="index.php">
                                <h1 id="logo">
                                    <img src="../img/logos/meghuna1.gif" alt="Meghna" />
                                </h1>
                            </a>
                        </div>

                        <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                            <ul id="nav" class="nav navbar-nav">
                                <li><a href="../index.php">Inicio</a></li>
                                <li><a href="javascript:window.print()">Imprimir</a>
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
                                    <h2>Factura <span class="color">Final</span></h2>
                                    <div class="border"></div>
                                </div>
                                </section>    <!-- End Section -->

                                <!--INICIO DE INGRESAR FACTURA-->
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


                                    <center>
                                        <div class="derecha" id="buscar">
                                            <B><span class='glyphicon glyphicon-zoom-in'></span>&nbsp;&nbsp;&nbsp; BUSCAR</B>&nbsp;&nbsp;&nbsp; <input type="search" class="light-table-filter" style="color: black; width:500 " data-table="order-table" placeholder="Filtro" ></div><br>
                                    </center>
                                    <div class="datagrid">
                                        <table class="order-table table">
                                            <tr>
                                                <th>Fecha:</th>
                                                <td><?php echo $facturaCab->getFechafactura(); ?></td>
                                                <th>Nro. factura:</th>
                                                <td><?php echo $facturaCab->getIdfacturass(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Cédula:</th>
                                                <td><?php echo $facturaCab->getidProveedor(); ?></td>
                                                <th>Dirección:</th>
                                                <td><?php
                                                    //  $proveedor = new Proveedor();
                                                    $crudModel = new CrudModel();

                                                    $proveedor = $crudModel->getProveedor($facturaCab->getIdproveedor());
                                                    echo $proveedor->getDireccionproveedor();
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <th>Proveedor:</th>
                                                <td><?php
                                                    //  $proveedor = new Proveedor();
                                                    $crudModel = new CrudModel();
                                                    $proveedor = $crudModel->getProveedor($facturaCab->getIdproveedor());
                                                    echo $proveedor->getNombreproveedor();
                                                    ?></td>

                                                <th>teléfono:</th>
                                                <td><?php
                                                    //  $proveedor = new Proveedor();
                                                    $crudModel = new CrudModel();

                                                    $proveedor = $crudModel->getProveedor($facturaCab->getIdproveedor());
                                                    echo $proveedor->getTelefonoproveedor();
                                                    ?></td>
                                            </tr>

                                        </table>
                                    </div>

                                    </p>
                                    <div style="overflow-x:auto;">
                                        <div id="cuadro">
                                            <div class="datagrid">
                                                <table class="order-table table">
                                                    <thead>
                                                        <tr class="titulo" style="font-size: 1em">
                                                            <th>ID PRODUCTO</th>
                                                            <th>NOMBRE</th>
                                                            <th>PRECIO</th>
                                                            <th>CANTIDAD</th>
                                                            <th>IVA</th>
                                                            <th>SUBTOTAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
//verificamos si existe en sesion el listado de clientes:
                                                        if (isset($_SESSION['listaFacturaDet'])) {
                                                            $listado = unserialize($_SESSION['listaFacturaDet']);
                                                            foreach ($listado as $facturaDet) {
                                                                echo "<tr>";
                                                                echo "<td>" . $facturaDet->getIdProductoss() . "</td>";
                                                                echo "<td>" . $facturaDet->getNombreProductosss() . "</td>";
                                                                echo "<td>" . $facturaDet->getPrecio() . "</td>";
                                                                echo "<td>" . $facturaDet->getCantidadproducto() . "</td>";
                                                                echo "<td>" . $facturaDet->getPorcentajeIva() . "</td>";
                                                                echo "<td>" . $facturaDet->getSubtotal() . "</td>";
                                                                echo "</tr>";
                                                            }
                                                            echo "<tr>";
                                                            echo "<td> </td>";
                                                            echo "<td>BASE IMPONIBLE</td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td>" . $facturaCab->getBaseImponible() . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<td> </td>";
                                                            echo "<td>BASE NO IMPONIBLE</td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td>" . $facturaCab->getBaseNoImponible() . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<td> </td>";
                                                            echo "<td>IVA</td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td>" . $facturaCab->getIvafactura() . "</td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<td> </td>";
                                                            echo "<td>TOTAL</td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td>" . $facturaCab->getValorfacturassss() . "</td>";
                                                            echo "</tr>";
                                                        } else {
                                                            echo "No se han cargado datos.";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </body>
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
                                                    <img src="../img/logos/meghuna1.gif" alt="Meghna" /> <br />
                                                    <p>Copyright &copy; 2017. All Rights Reserved.</p>
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