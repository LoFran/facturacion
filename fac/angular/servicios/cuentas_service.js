var app = angular.module('facturacionApp.cuentas',[]);

app.factory('Cuentas', ['$http', '$q', function($http, $q){

	var self = {

		guardar: function( datos ){

			var d = $q.defer();

			//console.log("datos desde el cuentas_service: ", datos);

			$http.post('php/cuentas/post.cuentasguardar.php' , datos )
				.success(function ( respuesta ){

					//console.log(respuesta.err);
					//console.log(respuesta.Mensaje);

					d.resolve(respuesta);

				});

			return d.promise;

		}



	};


	return self;

}])
