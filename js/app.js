/**
 * Angular Citizen Application
 */

// Start Angular
angular.module("citizenApp", ['ngRoute', 'angularModalService']);

// Custom filters
angular.module("citizenApp").filter('numberFixedLen', function () {
    return function(a,b){
        return(1e4+a+"").slice(-b)
    }
});

function ErrorControll(){
	var errors = new Array();
	
	this.setError = function(message, code, error){
		errors.push({
			message: message,
			code: code,
			error: error
		})
	};
	
	this.getErrors = function(){
		return errors;
	};
	
	this.showErrors = function(){
		// implement UI
		errors.forEach(function(error, id){
			alert(error.message);
		});
	};

	this.log = function(){
		console.log(errors);
	};
	
}

var ERROR = new ErrorControll();
