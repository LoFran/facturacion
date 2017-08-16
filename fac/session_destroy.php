<?php

session_start();
$inactive = 60;

if($_GET['action'] == 'salir'){


   $user = $_SESSION['user'];
   include_once("../fac/php/clases/class.Database.php");
   $sql = "UPDATE usuarios set flg_sesion = 0 where codigo = '$user'";
   Database::ejecutar_idu($sql);

   $respuesta = array(
        'err' => "termino_sesion",
        'valor' => 1
     );

    echo json_encode( $respuesta );
    session_destroy();

}


if($_GET['action'] == 'destroy_session' && $_GET['time'] == "true"){

    $session_life = time() - $_SESSION['timeout'];
    if($session_life > $inactive) {

      $respuesta = array(
           'err' => "termino_sesion",
           'valor' => 1
        );

       echo json_encode( $respuesta );
       session_destroy();
       $user = $_SESSION['user'];
       include_once("../fac/php/clases/class.Database.php");
       $sql = "UPDATE usuarios set flg_sesion = 0 where codigo = '$user'";
       Database::ejecutar_idu($sql);
    }

    $_SESSION['timeout']=time();

  }else{

    $session_life = time() - $_SESSION['timeout'];
    if($session_life > $inactive) {

      $respuesta = array(
           'err' => "termino_sesion",
           'valor' => 1
        );

        echo json_encode( $respuesta );
        session_destroy();
        $user = $_SESSION['user'];
        include_once("../fac/php/clases/class.Database.php");
        $sql = "UPDATE usuarios set flg_sesion = 0 where codigo = '$user'";
        Database::ejecutar_idu($sql);
    }
  }
