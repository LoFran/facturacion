<?php
session_start();
require_once("../clases/class.Database.php");

$postdata = file_get_contents("php://input");

$request = json_decode($postdata);
$request =  (array) $request;


$respuesta = array(
				'err' => true,
				'mensaje' => 'Usuario/Contraseña incorrectos',
			);


// ================================================
//   Encriptar la contraseña maestra (UNICA VEZ)
// ================================================
// encriptar_usuario();

//$request['usuario']  ="FRANCO";
//$request['contrasena'] ="123456";

if(  isset( $request['usuario'] ) && isset( $request['contrasena'] ) ){ // ACTUALIZAR

	$user = addslashes( $request['usuario'] );
	$pass = addslashes( $request['contrasena'] );

	$user = strtoupper($user);


	// Verificar que el usuario ya se conecto
	$sql = "SELECT flg_sesion as sesion FROM usuarios where codigo = '$user'";
	$sesion = Database::get_valor_query( $sql, 'sesion' );

	// Verificar que el usuario exista
	$sql = "SELECT count(*) as existe FROM usuarios where codigo = '$user'";
	$existe = Database::get_valor_query( $sql, 'existe' );

	if( $sesion == 1 and $existe == 1){
		$respuesta = array(
			'err' => true,
			'mensaje' => 'Acceso denegado'
		);
	 }else{
			if( $existe == 1){

				$sql = "SELECT contrasena FROM usuarios where codigo = '$user'";
				$data_pass = Database::get_valor_query( $sql, 'contrasena' );


				// Encriptar usando el mismo metodo
				$pass = Database::uncrypt( $pass, $data_pass );

				// Verificar que sean iguales las contraseñas
				if( $data_pass == $pass ){

					$respuesta = array(
						'err' => false,
						'mensaje' => 'Login válido',
						'url' => '../fac/'
					);

					$_SESSION['user'] = $user;

					// actualizar ultimo acceso
					$sql = "UPDATE usuarios set ultimoacceso = NOW() where codigo = '$user'";
					Database::ejecutar_idu($sql);
					$sql = "UPDATE usuarios set flg_sesion = 1 where codigo = '$user'";
					Database::ejecutar_idu($sql);
				}else{
					if( $data_pass =! $pass ){
						$respuesta = array(
							'err' => true,
							'mensaje' => 'Contraseña incorrecta'
						);
					}
				}
			}else{
				if( $existe == 0 ){
					$respuesta = array(
						'err' => true,
						'mensaje' => 'Usuario incorrecto'
					);
				}
			}
		}
}


//$respuesta = Database::get_todo_usuarios( 'usuarios','roles', $id );

//$user = addslashes( $request['usuario'] );

// sleep(1.5);
echo json_encode( $respuesta );


// Esto se puede borrar despues
// ================================================
//   Funcion para Encriptar
// ================================================
// function encriptar_usuario(){

// 	$usuario_id = '1';
// 	$contrasena = '123456';
// 	$contrasena_crypt = Database::crypt( $contrasena );

// 	$sql = "UPDATE usuarios set contrasena = '$contrasena_crypt' where id = '$usuario_id'";
// 	Database::ejecutar_idu($sql);

// }


?>
