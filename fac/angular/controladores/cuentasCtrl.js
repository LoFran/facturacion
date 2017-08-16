var app = angular.module('facturacionApp.cuentasCrtl', []);
//console.log("facturacionApp.cuentasCrtl");
// ================================================
//   Controlador de noticias
// ================================================
app.controller('cuentasCtrl', ['$scope', 'Cuentas', function($scope, Cuentas){

	$scope.activar('mCuentas','','Cuentas','clientes');
	//$scope.cuentas   = {};
	$scope.cuentas   = {};
	$scope.cuentaSel = {};

	// ================================================
	//   Funcion para guardar
	// ================================================

	$scope.guardar = function( cuenta, frmCuenta){

		Cuentas.guardar( cuenta ).then(function(data){
			//console.log("cuenta desde facturacionApp.cuentasCrtl: ",cuenta);
			$scope.cuentaSel = {};
			frmCuenta.autoValidateFormOptions.resetForm();

			//console.log("guardar");
			//console.log(data);


			if( data.err == true ){

				$scope.noInsertado = true;
				$scope.mensaje  = data.Mensaje;

				setTimeout(function() {
				    jQuery("#mensaje").fadeOut(1500);
				},3000);

				return;

			}

			if( data.err == false ){

				//console.log("paso por el else")

				$scope.validaOK = true;
				$scope.mensaje  = data.Mensaje;

				setTimeout(function() {
				    jQuery("#mensaje2").fadeOut(1500);
				},3000);

			}

		});


	}


}]);
