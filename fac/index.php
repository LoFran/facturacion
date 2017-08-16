<?php
// Incluir el archivo de base de datos
include_once("../fac/php/clases/class.Database.php");
session_start();

$_SESSION['user'];


$_SESSION['timeout'] = time();

if( !isset( $_SESSION['user'] ) ){
  echo "Acceso denegado.";
  die;

}

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html ng-app="facturacionApp" ng-controller="mainCtrl">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="refresh" content="10">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de {{ config.aplicativo }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="documentation/style.css">
    <link href="dist/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Estilos Personalizados -->
    <link rel="stylesheet" href="dist/css/animate.css">



    <!-- Importaciones de angular -->
    <script src="angular/lib/angular.min.js"></script>
    <script src="angular/lib/angular-route.min.js"></script>
    <script src="angular/lib/jcs-auto-validate.min.js"></script>

    <!-- Controladores -->
    <script src="angular/app.js"></script>
    <script src="angular/controladores/dashboardCtrl.js"></script>
    <script src="angular/controladores/clientesCtrl.js"></script>
    <script src="angular/controladores/facturasCtrl.js"></script>
    <script src="angular/controladores/noticiasCtrl.js"></script>
    <script src="angular/controladores/cuentasCtrl.js"></script>
    <script src="angular/controladores/usuariosCtrl.js"></script>


    <!-- servicios -->
    <script src="angular/servicios/configuracion_service.js"></script>
    <script src="angular/servicios/mensajes_service.js"></script>
    <script src="angular/servicios/notificaciones_service.js"></script>
    <script src="angular/servicios/clientes_service.js"></script>
    <script src="angular/servicios/factura_service.js"></script>
    <script src="angular/servicios/usuarios_service.js"></script>
		<script src="angular/servicios/cuentas_service.js"></script>


    <!-- Plugins -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">

  </head>
      <body class="hold-transition skin-purple layout-top-nav">
        <div class="wrapper">

          <header class="main-header">
            <nav class="navbar navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <a href="index.php" class="navbar-brand"><b>{{ config.aplicativo }} &nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i></b></a>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                  </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse" ng-include="'template/menu.html'">
                </div><!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                  <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                      <!-- User Account Menu -->
                      <li class="dropdown user user-menu"
                          ng-include="'template/usuario.html'">
                      </li>

                    </ul>
                  </div><!-- /.navbar-custom-menu -->
              </div><!-- /.container-fluid -->
            </nav>
          </header>
          <!-- Full Width Column -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

              <!--<h1>
                {{ titulo }}
                <small>{{ subtitulo }}</small>
              </h1>-->

            </section>

            <!-- Main content -->
            <section class="content" ng-view>

							<!-- Your Page Content Here -->

            </section><!-- /.content -->


          </div><!-- /.content-wrapper -->
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <div class="container">
              <div class="pull-right hidden-xs">
                <b>Version</b> {{ config.version }}
              </div>
              <strong>Copyright &copy; {{ config.anio }}
                  <a href="{{ config.web }}" target="blank">{{ config.empresa }}</a>
              </strong> Derechos reservados.
            </div><!-- /.container -->
          </footer>
        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Otros -->
        <script src="dist/js/cuenta/cuenta.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="dist/js/fileinput.js" type="text/javascript"></script>

        <script type="text/javascript">


        jQuery(document).ready(function($) {

          jQuery( ".wrapper" ).on("click","#navbar-collapse", function() {

            //console.log("entro al click");
            //TODO SE REALIZA CONSULTA AL AJAX Y SE MODIFICA LA VARIABLE SESSION

            var url = "/udemy/facturacion/public/";
            var url2 = "/udemy/facturacion/public/register.html";

            var action = "";
            jQuery.get('/udemy/facturacion/fac/session_destroy.php', {
                  'action': 'destroy_session',
                  'time': true

                },function(data){

                  if (data != "") {
                    data =  JSON.parse(data);

                    if (data.err == "termino_sesion") {
                      window.location.replace("/udemy/facturacion/public/index.php");
                    }

                  }

                });

          });

        });

        setInterval(function(){
          //console.log("setInterval");

          var action = "";
          jQuery.get('/udemy/facturacion/fac/session_destroy.php', {
                'action': 'destroy_session',
                'time': false

            },function(data){

              if (data != "") {
                data =  JSON.parse(data);

                if (data.err == "termino_sesion") {
                  window.location.replace("/udemy/facturacion/public/index.php");
                }

              }

            });


          /*jQuery.ajax({
          url: '/udemy/facturacion/fac/session_destroy.php',
          type: 'GET',
          data :{
                  action: "destroy_session",
                  time : false
                },
          success: function(data) {
            console.log(data);
          },
          error: function(){
          console.log('Error!');
          }
        });*/

      }, 60000);


        </script>


        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
      </body>

</html>
