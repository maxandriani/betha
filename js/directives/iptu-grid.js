/**
 * Angular Citizen Application
 */

angular.module("citizenApp").directive("iptuGridLoop", function(){
	// Jonas Brtoher
	return {
		restrict: 'A',
		templateUrl: 'views/pages/iptu/item-iptu.html'
	}
});

angular.module("citizenApp").directive("iptuParcelasLoop", function(){
	// Jonas Brtoher
	return {
		restrict: 'A',
		templateUrl: 'views/pages/iptu/item-parcela.html'
	}
});

angular.module("citizenApp").directive("globalSummary", function(){
	// Jonas Brtoher
	return {
		restrict: 'A',
		templateUrl: 'views/global/global-summary.html'
	}
});