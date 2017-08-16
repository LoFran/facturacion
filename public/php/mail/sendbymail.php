<?php

session_start();
require_once("../clases/class.Database.php");
$email_to = $_POST['email'];
$user = $_POST['usuario'];
$contrasena = "sKoqNKZ3";
$contrasena_crypt = Database::crypt( $contrasena );

// Verificar que el usuario exista
$sql = "SELECT count(*) as existe, correo as correos, nombre as nombre FROM usuarios where codigo = '$user'";
$existe = Database::get_valor_query( $sql, 'existe' );
$correo = Database::get_valor_query( $sql, 'correos' );
$nombre = Database::get_valor_query( $sql, 'nombre' );

if($correo != NULL) {

    if( $existe == 1 ){

        //Actualizamos el usuario

        $sql = "UPDATE usuarios set contrasena = '$contrasena_crypt' where codigo = '$user'";
        Database::ejecutar_idu($sql);

        if(isset($correo)) {

        // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
        $email_from = "Blmsolutions.tei@gmail.com";
        $email_subject = "Reseteo de contraseña | G.E.A";


        // Aquí se deberían validar los datos ingresados por el usuario
        if(!isset($correo)) {

        echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
        echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
        die();
        }

        $email_message =  $nombre. ": \n\n\n";
        $email_message .= "Hemos recibido una solicitud de reseteo de contraseña: \n\n";
        $email_message .= "Contraseña nueva: " . $contrasena . " \n\n";
        $email_message .= "Recuerde que al volver a ingresar, debe resetear su contraseña en la seccion 'Crear Cuenta': \n\n\n\n";
        $email_message .= "Muchas Gracias: \n\n";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($correo, $email_subject, $email_message, $headers);

        }
        header("location: /udemy/facturacion/public/");
    }else{
        header("location: /udemy/facturacion/public/register.html");
    }
}else{
  //echo '<div class="alert alert-danger" role="alert">ERROR: El correo del usuario ' .$user.' no es correcto.  </div>';
  header("location: /udemy/facturacion/public/register.html");
}
?>
