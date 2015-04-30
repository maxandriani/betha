/**
 * Angular Citizen Application
 */

angular.module("citizenApp").directive("navbar", function(){
	// Jonas Brtoher
	return {
		restrict: 'A',
		templateUrl: 'views/global/navbar.html',
		controller: 'NavbarController',
		controllerAs: 'navbar'
	}
});

angular.module("citizenApp").directive("pageTitle", function(){
	// Jonas Brtoher
	return {
		restrict: 'A',
		templateUrl: 'views/global/page-title.html'
	}
});
