<?php
// Incluir el archivo de base de datos
include_once("../clases/class.Database.php");

$postdata = file_get_contents("php://input");

$request = json_decode($postdata);
$request = (array) $request;
$contrasena = $request['contrasena'];
$confirme = $request['confirme'];


print_r($request,TRUE);
//echo $request;


if ($contrasena == $confirme) {
	if( isset( $request['id'] )  ){  // ACTUALIZAR

		$usuario_id = $request['id'];
		$contrasena = $request['contrasena'];
		$contrasena_crypt = Database::crypt( $contrasena );

		$sql = "UPDATE usuarios
					SET
					  id_rol   	 			= '". $request['especialidad'] . "',
						codigo   	 			= '". strtoupper($request['usuario']) . "',
						nombre    			= '". $request['nombre'] ."',
						contrasena 			= '". $contrasena_crypt ."',
						ultimoacceso		= '2017-05-19 16:27:53',
						imagen_usuario  = '". 'dist/img/avatar8.png' ."',
						correo    			= '". $request['correo'] ."',
						flg_sesion      = '0',
						sexo    			  = '". $request['sexo'] ."'
				WHERE id=" . $request['id'];

		$hecho = Database::ejecutar_idu( $sql );


		if( is_numeric($hecho) OR $hecho === true ){
			$respuesta = array( 'err'=>false, 'Mensaje'=>'Usuario actualizado' );
		}else{
			$respuesta = array( 'err'=>true, 'Mensaje'=>$hecho );
		}



	}else{  // INSERT

		$usuario_id = $request['id'];
		$contrasena = $request['contrasena'];
		$contrasena_crypt = Database::crypt( $contrasena );

		$sexoFoto = $request['sexo'];


		if ($sexoFoto == "Femenino") {
			$urlImagen = 'dist/img/avatar2.png';
		}else if ($sexoFoto == "Masculino") {
			$urlImagen = 'dist/img/avatar5.png';
		}else if ($sexoFoto == "Otro") {
			$urlImagen = 'dist/img/avatar_2x.png';
		}

		$sql = "INSERT INTO usuarios(id_rol, codigo, nombre, contrasena, ultimoacceso, imagen_usuario, correo, flg_sesion, sexo) VALUES (
			    '". $request['especialidad'] . "',
					'". strtoupper($request['usuario']) . "',
					'". $request['nombre'] . "',
					'". $contrasena_crypt . "',
					'2017-05-19 16:27:53',
					'". $urlImagen . "',
					'". $request['correo'] . "',
					'0',
					'". $request['sexo'] ."')";

		$hecho = Database::ejecutar_idu( $sql );


		if( is_numeric($hecho) OR $hecho === true ){
			$respuesta = array( 'err'=>false, 'Mensaje'=>'Usuario insertado' );
		}else{
			$respuesta = array( 'err'=>true, 'Mensaje'=>$hecho );
		}

	}
}else{
	$respuesta = array( 'err'=>true, 'Mensaje'=>'La password no coincide' );
}

echo json_encode( $respuesta );

?>
