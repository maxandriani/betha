/**
 * Angular Citizen Application
 */

angular.module("citizenApp").config(function ($routeProvider, $controllerProvider) {

	$routeProvider.when('/', {
		//redirectTo: '/clone.php',
		templateUrl: 'views/global/not-implemented.html',
		controller: function(){
	        window.location.href = CONFIG.url + 'clone.php';
	    }
    });
	
	$routeProvider.when('/iptu/', {
    	templateUrl: 'views/pages/iptu/login.html',
    	controller: 'IptuLoginController',
    	controllerAs: 'login'
    });
	
	$routeProvider.when('/iptu/listar/:docType/:doc', {
    	templateUrl: 'views/pages/iptu/index.html',
    	controller: 'IptuGridController',
    	controllerAs: 'iptuGrid'
    });
	
	$routeProvider.when('/iss/', {
    	templateUrl: 'views/global/not-implemented.html',
    	controller: 'NotImplementedController'
    });
	
	$routeProvider.when('/certidoesNegativas/', {
		templateUrl: 'views/global/not-implemented.html',
    	controller: 'NotImplementedController'
    });
	
	$routeProvider.when('/guias/', {
		templateUrl: 'views/global/not-implemented.html',
    	controller: 'NotImplementedController'
    });
	
	$routeProvider.when('/alvaras/', {
		templateUrl: 'views/global/not-implemented.html',
    	controller: 'NotImplementedController'
    });
	
	$routeProvider.when('/validacao/', {
		templateUrl: 'views/global/not-implemented.html',
    	controller: 'NotImplementedController'
    });
    
    $routeProvider.otherwise({
    	redirectTo: '/'
    });
});