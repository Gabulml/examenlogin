<?php
session_start();
require_once '../model/Usuario.php';
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
                       <!--validar ruc-->
        <script>
 function validarRuc(type="text/javascript"){
  var number = document.getElementById('idusuario').value;
  var dto = number.length;
  var valor;
  var acu=0;
  if(number==""){
   alert('No has ingresado ningún dato, porfavor ingresar los datos correspondientes.');
   }
  else{
   for (var i=0; i<dto; i++){
   valor = number.substring(i,i+1);
   if(valor==0||valor==1||valor==2||valor==3||valor==4||valor==5||valor==6||valor==7||valor==8||valor==9){
    acu = acu+1;
   }
   }
   if(acu==dto){
    while(number.substring(10,13)!=001){
     alert('Los tres últimos dígitos no tienen el código del RUC 001.');
     document.getElementById("idusuario").value="";
     return;
    }
    while(number.substring(0,2)>24){    
     alert('Los dos primeros dígitos no pueden ser mayores a 24.');
     return;
    }
    alert('El RUC está escrito correctamente');
    alert('Se procederá a analizar el respectivo RUC.');
    var porcion1 = number.substring(2,3);
    if(porcion1<6){
     alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
    }
    else{
     if(porcion1==6){
      alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
     }
     else{
      if(porcion1==9){
       alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
      }
     }
    }
   }
   else{
   alert("ERROR: Por favor no ingrese texto");
   }
  }
 }
</script>
<!--validar cédula-->
        <script type="text/javascript">
                    function validarcedula() {
                        var i;
                        var cedula;
                        var acumulado;
                        cedula = document.cedula.idusuario.value;
                        var instancia;
                        acumulado = 0;
                        for (i = 1; i <= 9; i++) {
                            if (i % 2 != 0) {
                                instancia = cedula.substring(i - 1, i) * 2;
                                if (instancia > 9)
                                    instancia -= 9;
                            } else
                                instancia = cedula.substring(i - 1, i);
                            acumulado += parseInt(instancia);
                        }
                        while (acumulado > 0)
                            acumulado -= 10;
                        if (cedula.substring(9, 10) != (acumulado * -1)) {
                            alert("Cedula no valida!!");
                            document.getElementById("idusuario").value="";
                        }
                    }
                </script>
       <!--validar nombre-->
 <script>
        function validaSoloTexto(){
        var ciunacusuario;
                ciunacusuario=document.cedula.ciunacusuario.value;
        var patron = /^[A-Za-z]+ /;
  // En caso de querer validar cadenas con espacios usar: /^[a-zA-Z\s]*$/
        if(!ciunacusuario.search(patron))
            window.alert("dato correcto");
            else
            document.getElementById("ciunacusuario").value="";
}
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
                                    <h2>Nuestros <span class="color">Usuarios</span></h2>
                                    <div class="border"></div>
                                </div>


                                <div class="container">

                                    <!-- Trigger the modal with a button -->
                                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ingresar un usuario</button>-->
                                    <div class="portfolio-filter clearfix">
                                        <ul class="text-center">
                                            <li><a class="filter" data-toggle="modal" data-target="#myModal"><h3><span class='glyphicon glyphicon-folder-open'></span>&nbsp;&nbsp;&nbsp;INGRESAR USUARIO</h3></a></li>

                                            <!--<li><a href="controller/controller.php?opcion=listar_usuarios" class="filter">LISTAR USUARIOS</a></li>-->
                                        </ul></div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h2  style="background-color: #006633" class="modal-title" class="btn btn-primary">Ingresar  Usuarios</h2>
                                                </div>
                                                <div class="modal-body" >

                                                    <form name="cedula" action="../controller/controller.php" style=" width: 100%;">
                                                        <input type="hidden" name="opcion" value="crear_usuario">
                                                        <center><table style=" width: 100%;   border-collapse: collapse;width: 100%;">                                                                                    
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Identificación:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="idusuario" id="idusuario" maxlength="13" required="true" onchange="validarcedula();validarRuc()"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Tipo:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <select name="tipoidusuario">
                                                                            <option value="C">CÉDULA</option>
                                                                            <option value="P">PASAPORTE</option>
                                                                            <option value="R">RUC</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Rol:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <select name="rolusuario">
                                                                            <option value="C">CAJERO</option>
                                                                            <option value="A">ADMINISTRADOR</option>
                                                                        </select>
                                                                    </td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Nombre:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input style="" type="text" name="nombreusuario" title="Se necesita un nombre" placeholder="Ej: Luis Lomas" maxlength="100" required="true" pattern="^[a-zA-Z]+[ ][a-zA-Z]+"></br></td>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Fecha de Nacimiento:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="date" name="fecnacusuario" required="true" autocomplete="off" required="" max="today" min="01-01-1800" value="<?php echo date('d-m-Y'); ?>"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Ciudad de Nacimiento:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="ciunacusuario" maxlength="50" placeholder="Ej: Quito" required="true" pattern="^[A-Za-z ]+"></br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Dirección:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="direccionusuario" maxlength="100" placeholder="Ej: Quito y Via. Amazonas" pattern="^[0-9A-Za-z- ]+" required="true"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Teléfono:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="tel" name="telefonousuario" placeholder="Ej: 0909785967" maxlength="10" required="true" pattern="^[0-9]+"></br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Email:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="email"  autocomplete="on" name="emailusuario" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" maxlength="50" required="true"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Estado:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <table>
                                                                            <tr>
                                                                                <td><input type="radio" name="estadousuario" value='true'>Activo</td>
                                                                                <td width="20"></td>
                                                                                <td><input type="radio" name="estadousuario" value='false'>Inactivo</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" style="text-align: left;padding: 8px;color: black;"><center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Crear" class="btn btn-sm" ></center></td>
                                                                </tr>

                                                            </table></center>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button  style="color: #000; font-size: medium;border-radius: 0 50% / 0 100%;" type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--FIN DE LA VENTANA EMERGENTE DE CREAR USUARIO-->
                                <br>
                                <br>
                                <div style="overflow-x:auto;">
                                    <div id="cuadro">
                                        <center>
                                            <div class="derecha" id="buscar"><B><span class='glyphicon glyphicon-zoom-in'></span>&nbsp;&nbsp;&nbsp; BUSCAR</B>&nbsp;&nbsp;&nbsp; <input type="search" class="light-table-filter" style="color: black; width:500 " data-table="order-table" placeholder="Filtro" ></div><br>
                                        </center>

                                        <div class="datagrid">
                                            <table class="order-table table">   
                                                <tr class="titulo" style="font-size: 1em">
                                                    <th>ID USUARIO</th>
                                                    <th>TIPO ID</th>
                                                    <th>ROL</th>
                                                    <th>NOMBRE</th>
                                                    <th>FECHA NAC.</th>
                                                    <th>CIUDAD NAC.</th>
                                                    <th>DIRECCIÓN</th>
                                                    <th>TELÉFONO</th>
                                                    <th>EMAIL</th>
                                                    <th>ESTADO</th>
                                                    <th>ELIMINAR</th>
                                                    <th>EDITAR</th>
                                                </tr>

                                                <tbody >                    

                                                    <?php
                                                    //verificamos si existe en sesion el listado de login:
                                                    if (isset($_SESSION['listaUsuarios'])) {
                                                        $listado = unserialize($_SESSION['listaUsuarios']);
                                                        foreach ($listado as $usu) {
                                                            echo "<tr>";
                                                            echo "<td>" . $usu->getIdusuario() . "</td>";
                                                            if ($usu->getTipoidusuario() == 'Cedula' || $usu->getTipoidusuario() == 'c' || $usu->getTipoidusuario() == 'C' || $usu->getTipoidusuario() == 'cedula' || $usu->getTipoidusuario() == 'CEDULA') {
                                                                echo "<td>CÉDULA</td>";
                                                            } else if ($usu->getTipoidusuario() == 'ruc' || $usu->getTipoidusuario() == 'r' || $usu->getTipoidusuario() == 'R' || $usu->getTipoidusuario() == 'Ruc' || $usu->getTipoidusuario() == 'RUC') {
                                                                echo "<td>RUC</td>";
                                                            } else if ($usu->getTipoidusuario() == 'pasaporte' || $usu->getTipoidusuario() == 'p' || $usu->getTipoidusuario() == 'P' || $usu->getTipoidusuario() == 'Pasaporte' || $usu->getTipoidusuario() == 'PASAPORTE') {
                                                                echo "<td>PASAPORTE</td>";
                                                            }
                                                            if ($usu->getRolusuario() == 'C') {
                                                                echo "<td>CAJERO</td>";
                                                            } else if ($usu->getRolusuario() == 'A') {
                                                                echo "<td>ADMINISTRADOR</td>";
                                                            }
                                                            echo "<td>" . $usu->getNombreusuario() . "</td>";
                                                            echo "<td>" . $usu->getFecnacusuario() . "</td>";
                                                            echo "<td>" . $usu->getCiunacusuario() . "</td>";
                                                            echo "<td>" . $usu->getDireccionusuario() . "</td>";
                                                            echo "<td>" . $usu->getTelefonousuario() . "</td>";
                                                            echo "<td>" . $usu->getEmailusuario() . "</td>";
                                                            if ($usu->getEstadousuario() == 1) {
                                                                echo "<td>ACTIVO</td>";
                                                            } else {
                                                                echo "<td>INACTIVO</td>";
                                                            }
                                                            echo "<td><center><a title='Eliminar dato' href='../controller/controller.php?opcion=eliminar_usuario&idusuario=" . $usu->getIdusuario() . "'><span class='glyphicon glyphicon-trash' style='color: black;'> </span></a><center></td>";
                                                            echo "<td><center><a title='Eliminar dato' href='../controller/controller.php?opcion=editar_usuario&idusuario=" . $usu->getIdusuario() . "'><span class='glyphicon glyphicon-pencil' style='color: black;'>  </span></a><center></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "No se han cargado datos.";
                                                    }
                                                    ?>
                                                </tbody >                    

                                            </table >
                                            <a class="btn btn-success" href="../view/pdfusuarios.php">IMPRIMIR</a>

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