/**
 * Angular Citizen Application
 */

var app = angular.module("citizenApp", ['ngRoute']);

var appCtrl = app.controller("LargeAppController", function(){});


app.config(function ($routeProvider, $controllerProvider) {
    // save references to the providers

    app.registerCtrl = $controllerProvider.register,

    $routeProvider.when('/', {
    	templateUrl: 'views/prefeitura.php'
    });
    
    $routeProvider.when('/iptu', {
    	templateUrl: 'views/iptu-login.html'
    });
    
    $routeProvider.when('/iptu/listar', {
    	templateUrl: 'views/iptu-citizen.html'
    });
    
    $routeProvider.when('/arrecadacao/', {
    	templateUrl: 'views/incomming-taxes.html'
    });
    
    $routeProvider.otherwise({redirectTo: '/'});
});