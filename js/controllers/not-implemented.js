/**
 * Angular Citizen Application
 */

angular.module("citizenApp").controller("NotImplementedController", ['$scope', function($scope){
	
	var hash = window.location.hash;
	var menu = hash.split('/');
	$scope.page_title = 'Página ' + menu[1] + ' não foi implementada';
	
}]);