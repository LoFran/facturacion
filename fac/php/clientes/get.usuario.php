<?php
session_start();
// Incluir el archivo de base de datos
include_once("../clases/class.Database.php");

$user = $_SESSION['user'];

$respuesta = Database::get_todo_usuarios( 'usuarios','roles', $user );

echo json_encode( $respuesta );


?>
