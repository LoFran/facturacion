<?php
// Incluir el archivo de base de datos
include_once("../clases/class.Database.php");

if( isset( $_GET["pag"] ) ){
	$pag = $_GET["pag"];
}else{
	$pag = 1;
}


$respuesta = Database::get_valor_query ('usuarios', $id = 2);


echo json_encode( $respuesta );


?>
