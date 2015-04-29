angular.module("citizenApp").controller('ModalConfirm', ['$scope', 'close', 'title', 'message', function($scope, close, title, message) {

	$scope.title = title;
	$scope.message = message;
	$scope.label = 'Confirmar';
	
	$scope.close = function(result) {
		close(result, 500); // close, but give 500ms for bootstrap to animate
	};

}]);