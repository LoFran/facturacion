var app = angular.module( 'facturacionApp',[
		'ngRoute', 'jcs-autoValidate',

		'facturacionApp.configuracion',
		'facturacionApp.mensajes',
		'facturacionApp.notificaciones',
		'facturacionApp.clientes',
		'facturacionApp.cuentas',
		'facturacionApp.factura',
		'facturacionApp.usuarios',
		'facturacionApp.dashboardCrtl',
		'facturacionApp.clientesCrtl',
		'facturacionApp.facturasCrtl',
		'facturacionApp.noticiasCrtl',
		'facturacionApp.cuentasCrtl',
		'facturacionApp.usuariosCrtl'
		]);

angular.module('jcs-autoValidate')
.run([
    'defaultErrorMessageResolver',
    function (defaultErrorMessageResolver) {
        // To change the root resource file path
        defaultErrorMessageResolver.setI18nFileRootPath('angular/lib');
        defaultErrorMessageResolver.setCulture('es-co');
    }
]);

app.controller('mainCtrl', ['$scope', '$http', '$q', 'Usuarios', 'Configuracion','Mensajes', 'Notificaciones', 'Cuentas', function($scope, $http, $q, Usuarios, Configuracion,Mensajes, Notificaciones, Cuentas){

	$scope.config = {};
	$scope.mensajes = Mensajes.mensajes;
	$scope.notificaciones = Notificaciones.notificaciones;

	$scope.titulo    = "";
	$scope.subtitulo = "";
	$scope.noInsertado = false;
	$scope.validaOK = false;
	$scope.mensaje  = "";
	$scope.datos = {};

	$scope.usuario = {
		nombre:"Franco Bello"
	}

	$scope.salir = function() {
		//console.log("entro al scope de salir");

		$http({
              method: 'GET',
              url:'/udemy/facturacion/fac/session_destroy.php',
              params: {action: "salir"}
            }).then(function successCallback(response)
            {
                // this callback will be called asynchronously
								//console.log(response.data);
								//console.log(response.data.err);

								if (response.data != "") {
								 //response.data =  JSON.parse(response.data);

								 if (response.data.err == "termino_sesion") {
									 window.location.replace("/udemy/facturacion/public/index.php");
								 }

							 }

            }, function errorCallback(response)
            {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                //console.log("ERROR");
                //console.log(response);
            });

		/*$http.get('/udemy/facturacion/fac/session_destroy.php', {
				headers: {'Authorization': 'Token token=xxxxYYYYZzzz'},
      	action: 'salir'
			},function(data){

					if (data != "") {
					 data =  JSON.parse(data);

					 if (data.err == "termino_sesion") {
						 window.location.replace("/udemy/facturacion/public/index.php");
					 }

				 }

	    });*/

		//return d.promise;

	};

	/*$scope.salir = function() {
		console.log("entro al scope del salir");

		var action = "";
		jQuery.get('/udemy/facturacion/fac/session_destroy.php', {
					'action': 'salir'
			},function(data){

				if (data != "") {
					data =  JSON.parse(data);

					if (data.err == "termino_sesion") {
						window.location.replace("/udemy/facturacion/public/index.php");
					}

				}

			});

	};*/

	Configuracion.cargar().then( function(){
		$scope.config = Configuracion.config;
	});

	Usuarios.cargarUsuarios().then( function(){
		$scope.configOpta = Usuarios.configOpta;
	});

	// ================================================
	//   Funciones Globales del Scope
	// ================================================
	$scope.activar = function( menu, submenu, titulo, subtitulo ){

		$scope.titulo    = titulo;
		$scope.subtitulo = subtitulo;

		$scope.mDashboard = "";
		$scope.mClientes  = "";
		$scope.mCuentas  = "";
		$scope.mNoticias  = "";

		$scope[menu] = 'active';

	};



}]);

// ================================================
//   Directivas
// ================================================
app.directive('enterKey', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.enterKey);
                });

                event.preventDefault();
            }
        });
    };
});



// ================================================
//   Rutas
// ================================================
app.config([ '$routeProvider', function($routeProvider){

	$routeProvider
		.when('/',{
			templateUrl: 'dashboard/dashboard.html',
			controller: 'dashboardCtrl'
		})
		.when('/facturas',{
			templateUrl: 'facturas/facturas.html',
			// controller: 'clientesCtrl'
		})
		.when('/facturanueva',{
			templateUrl: 'facturas/nueva_factura.html',
			controller: 'facturaCtrl'
		})
		.when('/clientes/:pag',{
			templateUrl: 'clientes/clientes.html',
			controller: 'clientesCtrl'
		})
		.when('/noticias/:pag',{
			templateUrl: 'noticias/noticias.html',
			controller: 'noticiasCtrl'
		})
		.when('/cuentas/:pag',{
			templateUrl: 'cuentas/cuentas.html',
			controller: 'cuentasCtrl'
		})
		.otherwise({
			redirectTo: '/'
		})

}]);


// ================================================
//   Filtros
// ================================================
app.filter( 'quitarletra', function(){

	return function(palabra){
		if( palabra ){
			if( palabra.length > 1)
				return palabra.substr(1);
			else
				return palabra;
		}
	}
})

.filter( 'mensajecorto', function(){

	return function(mensaje){
		if( mensaje ){
			if( mensaje.length > 35)
				return mensaje.substr(0,35) + "...";
			else
				return mensaje;
		}
	}
})
