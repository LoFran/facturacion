var app = angular.module('facturacionApp.usuarios',[]);

//console.log("facturacionApp.usuarios");

app.factory('Usuarios', ['$http', '$q', function($http, $q){

	var self = {

		configOpta:{},
		cargarUsuarios: function(){

			var d = $q.defer();

			//$http.get('configuracion.json')
			$http.get('php/clientes/get.usuario.php')
				.success(function(data){
					//console.log("data: ",data);
					self.configOpta = data;
					//console.log("configOpta: ",data.gls_rol);
					d.resolve();
				})
				.error(function(){

					d.reject();
					console.error("No se pudo cargar el archivo de configuración");

				});

			return d.promise;
		}



	};


	return self;

}])
