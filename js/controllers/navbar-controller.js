/**
 * Angular Citizen Application
 */

angular.module("citizenApp").controller("NavbarController", ['$scope', function( $scope ){
	
	var controller = this;
	
	this.currentMenu = '';
	
	this.isMenu = function(mask){
		
		var hash = window.location.hash;
		var reg = new RegExp(mask);
		
		return (reg.test(hash));
		
	}
	
	this.update = function(){
		
		this.currentMenu = '';
		var hash = window.location.hash;
		var menu = hash.split('/');
		this.currentMenu = menu[1];
		
	};
	
	$scope.$on("$routeChangeSuccess", function () {
		controller.update();
	})
	
	this.update();
	
}]);