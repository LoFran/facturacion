var app = angular.module('facturacionApp.usuariosCrtl', []);

// ================================================
//   Controlador de Usuarios
// ================================================
app.controller('usuariosCtrl', ['$scope','$routeParams', 'Usuarios', function($scope, $routeParams, Usuarios){

	$scope.activar('mUsuarios','','Usuarios','listado');
	
}]);
