<?php
session_start();
require_once '../model/Proveedor.php';
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
                <!--validar cédula y ruc-->
                <script type="text/javascript">
                    function validad(idproveedor) {
                        numero = idproveedor.value;
                        var suma = 0;
                        var residuo = 0;
                        var pri = false;
                        var pub = false;
                        var nat = false;
                        var numeroProvincias = 22;
                        var modulo = 11;

                        /* Verifico que el campo no contenga letras */
                        var ok = 1;
                        for (i = 0; i numeroProvincias){
                            alert('El código de la provincia (dos primeros dígitos) es inválido');
                            return false;
                        }

                        /* Aqui almacenamos los digitos de la cedula en variables. */
                        d1 = numero.substr(0, 1);
                        d2 = numero.substr(1, 1);
                        d3 = numero.substr(2, 1);
                        d4 = numero.substr(3, 1);
                        d5 = numero.substr(4, 1);
                        d6 = numero.substr(5, 1);
                        d7 = numero.substr(6, 1);
                        d8 = numero.substr(7, 1);
                        d9 = numero.substr(8, 1);
                        d10 = numero.substr(9, 1);

                        /* El tercer digito es: */
                        /* 9 para sociedades privadas y extranjeros */
                        /* 6 para sociedades publicas */
                        /* menor que 6 (0,1,2,3,4,5) para personas naturales */

                        if (d3 == 7 || d3 == 8) {
                            alert('El tercer dígito ingresado es inválido');
                            return false;
                        }

                        /* Solo para personas naturales (modulo 10) */
                        if (d3 < 6) {
                            nat = true;
                            p1 = d1 * 2;
                            if (p1 >= 10)
                                p1 -= 9;
                            p2 = d2 * 1;
                            if (p2 >= 10)
                                p2 -= 9;
                            p3 = d3 * 2;
                            if (p3 >= 10)
                                p3 -= 9;
                            p4 = d4 * 1;
                            if (p4 >= 10)
                                p4 -= 9;
                            p5 = d5 * 2;
                            if (p5 >= 10)
                                p5 -= 9;
                            p6 = d6 * 1;
                            if (p6 >= 10)
                                p6 -= 9;
                            p7 = d7 * 2;
                            if (p7 >= 10)
                                p7 -= 9;
                            p8 = d8 * 1;
                            if (p8 >= 10)
                                p8 -= 9;
                            p9 = d9 * 2;
                            if (p9 >= 10)
                                p9 -= 9;
                            modulo = 10;
                        }

                        /* Solo para sociedades publicas (modulo 11) */
                        /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
                        else if (d3 == 6) {
                            pub = true;
                            p1 = d1 * 3;
                            p2 = d2 * 2;
                            p3 = d3 * 7;
                            p4 = d4 * 6;
                            p5 = d5 * 5;
                            p6 = d6 * 4;
                            p7 = d7 * 3;
                            p8 = d8 * 2;
                            p9 = 0;
                        }

                        /* Solo para entidades privadas (modulo 11) */
                        else if (d3 == 9) {
                            pri = true;
                            p1 = d1 * 4;
                            p2 = d2 * 3;
                            p3 = d3 * 2;
                            p4 = d4 * 7;
                            p5 = d5 * 6;
                            p6 = d6 * 5;
                            p7 = d7 * 4;
                            p8 = d8 * 3;
                            p9 = d9 * 2;
                        }

                        suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
                        residuo = suma % modulo;

                        /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
                        digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

                        /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
                        if (pub == true) {
                            if (digitoVerificador != d9) {
                                alert('El ruc de la empresa del sector público es incorrecto.');
                                return false;
                            }
                            /* El ruc de las empresas del sector publico terminan con 0001*/
                            if (numero.substr(9, 4) != '0001') {
                                alert('El ruc de la empresa del sector público debe terminar con 0001');
                                return false;
                            }
                        } else if (pri == true) {
                            if (digitoVerificador != d10) {
                                alert('El ruc de la empresa del sector privado es incorrecto.');
                                return false;
                            }
                            if (numero.substr(10, 3) != '001') {
                                alert('El ruc de la empresa del sector privado debe terminar con 001');
                                return false;
                            }
                        } else if (nat == true) {
                            if (digitoVerificador != d10) {
                                alert('El número de cédula de la persona natural es incorrecto.');
                                return false;
                            }
                            if (numero.length > 10 && numero.substr(10, 3) != '001') {
                                alert('El ruc de la persona natural debe terminar con 001');
                                return false;
                            }
                        }
                        return true;
                    }
                </script>
                <!--fin de cedula y ruc-->
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
                                    <h2>Nuestros <span class="color">Proveedores</span></h2>
                                    <div class="border"></div>
                                </div>


                                <div class="container">

                                    <!-- Trigger the modal with a button -->
                                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ingresar un usuario</button>-->
                                    <div class="portfolio-filter clearfix">
                                        <ul class="text-center">
                                            <li><a class="filter" data-toggle="modal" data-target="#myModal"><h3><span class='glyphicon glyphicon-folder-open'></span>&nbsp;&nbsp;&nbsp;INGRESAR PROVEEDOR</h3></a></li>

                                            <!--<li><a href="controller/controller.php?opcion=listar_usuarios" class="filter">LISTAR USUARIOS</a></li>-->
                                        </ul></div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h2  style="background-color: #006633" class="modal-title" class="btn btn-primary">Ingresar  Proveedor</h2>
                                                </div>
                                                <div class="modal-body" >

                                                    <!--permite ingresar un nuevo proveedor-->
                                                    <form action="../controller/controller.php" style=" width: 100%;">
                                                        <input type="hidden" name="opcion" value="crear_proveedor">
                                                        <center><table style=" width: 100%;   border-collapse: collapse;width: 100%;">                                                                                    
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Identificación Proveedor:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="idproveedor" id="idproveedor" maxlength="13" required="true" onchange="validarcedula();validarRuc()"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Tipo Identificación</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <select name="tipoidproveedor">
                                                                            <option value="CEDULA">CÉDULA</option>
                                                                            <option value="PASAPORTE">PASAPORTE</option>
                                                                            <option value="RUC">RUC</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Nombres:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input title="Se necesita un nombre" placeholder="Ej: Luis Lomas" pattern="^[a-zA-Z]+[ ][a-zA-Z]+"  type="text" name="nombreproveedor" maxlength="100" required="true">  </br></td>                      
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Fecha Nacimiento:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="date" name="fecnacproveedor" required="true" autocomplete="off" required="true" max="today" min="01-01-1800"  value="<?php echo date('d-m-Y'); ?>"></br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Ciudad Nacimiento:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: Quito" pattern="^[A-Za-z]+" type="text" name="ciudnacproveedor" maxlength="50" required="true">                    </br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Tipo proveedor:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <table>
                                                                            <tr>
                                                                                <td><input type="radio" name="tipoproveedor" value='true' required="true">Credito</td>
                                                                                <td width="20"></td>
                                                                                <td><input type="radio" name="tipoproveedor" value='false' required="true">Efectivo</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Dirección:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: Quito y Via. Amazonas" pattern="^[0-9A-Za-z- ]+" type="text" name="direccionproveedor" maxlength="100" required="true"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Teléfono:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: 0909785967" pattern="^[0-9]+" type="tel" name="telefonoproveedor" maxlength="10" required="true"></br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Email:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="emailproveedor" maxlength="50" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  required="true"></br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;"><br>Estado:</br></td>
                                                                    <td style="text-align: left;padding: 8px;color: black;">
                                                                        <table>
                                                                            <tr>
                                                                                <td style="text-align: left;padding: 8px;color: black;"><input type="radio" name="estadoproveedor" value='true' required="true">Activo</td>
                                                                                <td width="20"></td>
                                                                                <td style="text-align: left;padding: 8px;color: black;"><input type="radio" name="estadoproveedor" value='false' required="true">Inactivo</td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <td>
                                                                <td style="padding: 8px;color: black;" colspan="4"><center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Crear" class="btn btn-sm" ></center></td>
                                                                </td>
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
                                                    <th>IDENTIFICACION</th>
                                                    <th>TIPO IDENTIFICACION</th>
                                                    <th>NOMBRES</th>
                                                    <th>FECHA NACIMIENTO</th>                        
                                                    <th>CIUDAD NACIMIENTO</th>
                                                    <th>TIPO PROVEEDOR</th>
                                                    <th>DIRECCION</th>
                                                    <th>TELEFONO</th>
                                                    <th>EMAIL</th>
                                                    <th>ESTADO</th>
                                                    <th>ELIMINAR</th>
                                                    <th>EDITAR</th>
                                                </tr>
                                                <tbody >                    
                                                    <?php
                                                    //verificamos si existe en sesion el listado de proveedores:
                                                    if (isset($_SESSION['listaProveedores'])) {
                                                        $listado = unserialize($_SESSION['listaProveedores']);
                                                        foreach ($listado as $proveedor) {
                                                            echo "<tr>";
                                                            echo "<td>" . $proveedor->getIdproveedor() . "</td>";
                                                            if ($proveedor->getTipoidproveedor() == 'Cedula' || $proveedor->getTipoidproveedor() == 'c' || $proveedor->getTipoidproveedor() == 'C' || $proveedor->getTipoidproveedor() == 'cedula' || $proveedor->getTipoidproveedor() == 'CEDULA') {
                                                                echo "<td>CÉDULA</td>";
                                                            } else if ($proveedor->getTipoidproveedor() == 'ruc' || $proveedor->getTipoidproveedor() == 'r' || $proveedor->getTipoidproveedor() == 'R' || $proveedor->getTipoidproveedor() == 'Ruc' || $proveedor->getTipoidproveedor() == 'RUC') {
                                                                echo "<td>RUC</td>";
                                                            } else if ($proveedor->getTipoidproveedor() == 'pasaporte' || $proveedor->getTipoidproveedor() == 'p' || $proveedor->getTipoidproveedor() == 'P' || $proveedor->getTipoidproveedor() == 'Pasaporte' || $proveedor->getTipoidproveedor() == 'PASAPORTE') {
                                                                echo "<td>PASAPORTE</td>";
                                                            }
                                                            echo "<td>" . $proveedor->getNombreproveedor() . "</td>";
                                                            echo "<td>" . $proveedor->getFecnacproveedor() . "</td>";
                                                            echo "<td>" . $proveedor->getCiudnacproveedor() . "</td>";
                                                            if ($proveedor->getTipoproveedor() == 1) {
                                                                echo "<td>SI</td>";
                                                            } else {
                                                                echo "<td>NO</td>";
                                                            }
                                                            echo "<td>" . $proveedor->getDireccionproveedor() . "</td>";
                                                            echo "<td>" . $proveedor->getTelefonoproveedor() . "</td>";
                                                            echo "<td>" . $proveedor->getEmailproveedor() . "</td>";
                                                            if ($proveedor->getEstadoproveedor() == 1) {
                                                                echo "<td>ACTIVO</td>";
                                                            } else {
                                                                echo "<td>INACTIVO</td>";
                                                            }
                                                            echo "<td><center><a title='Eliminar dato' href='../controller/controller.php?opcion=eliminar_proveedor&idproveedor=" . $proveedor->getIdproveedor() . "'><span class='glyphicon glyphicon-trash' style='color: black;'> </span></a></center></td>";
                                                            echo "<td><center><a title='Actualizar dato' href='../controller/controller.php?opcion=editar_proveedor&idproveedor=" . $proveedor->getIdproveedor() . "'><span class='glyphicon glyphicon-pencil' style='color: black;'>  </span></a></center></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "No se han cargado datos.";
                                                    }
                                                    ?>
                                                </tbody >                    

                                            </table >
                                            <a class="btn btn-success" href="../view/pdfproveedor.php">IMPRIMIR</a>

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