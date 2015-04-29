/**
 * Angular Citizen Application
 */

angular.module("citizenApp").config(function ($routeProvider, $controllerProvider) {

	$routeProvider.when('/', {
		redirectTo: '/iptu/listar/'
    });
	
	$routeProvider.when('/iptu/', {
    	templateUrl: 'views/pages/iptu/login.html'
    });
	
	$routeProvider.when('/iptu/listar/', {
    	templateUrl: 'views/pages/iptu/index.html',
    	controller: 'IptuGridController',
    	controllerAs: 'iptuGrid'
    });
	
	$routeProvider.when('/iss/', {
    	templateUrl: 'views/pages/iss/index.html'
    });
	
	$routeProvider.when('/certidoesNegativas/', {
    	templateUrl: 'views/pages/certidoes/index.html'
    });
	
	$routeProvider.when('/guias/', {
    	templateUrl: 'views/pages/guias/index.html'
    });
	
	$routeProvider.when('/alvaras/', {
    	templateUrl: 'views/pages/alvaras/index.html'
    });
	
	$routeProvider.when('/validacao/', {
    	templateUrl: 'views/pages/validacao/index.html'
    });
    
    $routeProvider.otherwise({
    	redirectTo: '/'
    });
});