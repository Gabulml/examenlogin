<?php
session_start();
require_once '../model/Proveedor.php';
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
        <title> Index Login</title>
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
                        <span class="sr-only">Index login</span>
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


            </div>
        </header>


        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <table align="center">
            <tr><td height="20" colspan="5"></tr>
            <tr>
                <td width="10%"></td>
                <td width="35%">
                    <form action="../controller/controller.php">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <table align="center" >
                            <input type="hidden" value="iniciarSesion" name="opcion">
                            <tr>
                                <td width="20" ></td>
                                <td>Usuario *:</td>
                                <td width='10'>
                                <td><font color="black"><input type="text" name="idusuario" requiered="true"></font></td>
                                <td width="20"></td>
                            </tr>
                            <tr><td height="20" colspan="5"></td></tr>
                            <tr>
                                <td width="20"></td>
                                <td>Clave *:</td>
                                <td width='10'>
                                <td><font color="black"><input type="password" name="passwordlogin" requiered="true"></font></td>
                                <td width="20"></td>
                            </tr>
                            <tr><td height="20" colspan="5"></td>
                            </tr>
                            <tr>
                                <td colspan="4"><center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Iniciar Sesión" class="btn btn-sm " ></td></center></td>
                            </tr>
                            <tr>
                            <tr>
                                <td height="10"></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="center"><a align='center' href='editarLoginCambio.php'>Cambiar Contraseña</a><br></td>
                            </tr>
                        </table>
                    </form>

                </td>

                </td>
                <td width="10%"></td>
            </tr>
        </table>



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