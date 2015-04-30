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

angular.module("citizenApp").filter('inscricaoImobiliaria', function () {
    return function(a,b){
    	var v;
    	var r = /^[\d]{2}\.?[\d]{2}\.?[\d]{3}\.?[\d]{4}\.?[\d]{3}\.?[\d]{1,4}$/;
        if (b){
        	v = r.test(a);
        } else {
        	//inscricao
        	v=a.replace(/\D/g,"")                    //Remove tudo o que não é dígito
            v=v.replace(/([\d]{2})([\d]{2})([\d]{3})([\d]{4})([\d]{3})([\d]{1,4})/,"$1.$2.$3.$4.$5.$6");
        }
    	return v;
    }
});

angular.module("citizenApp").filter('cpf', function () {
    return function(a,b){
        var v;
    	var r = /^[\d]{3}[\.\-]?[\d]{3}[\.\-]?[\d]{3}[\.\-]?[\d]{2}$/;
        if (b){
        	v = r.test(a);
        } else {
        	//inscricao
        	v=a.replace(/\D/g,"")                    //Remove tudo o que não é dígito
            v=v.replace(/([\d]{3})([\d]{3})([\d]{3})([\d]{2})/,"$1.$2.$3-$4");
        }
    	return v;
    }
});

angular.module("citizenApp").filter('cnpj', function () {
    return function(a,b){
    	var v;
    	var r = /^[\d]{2}[\.\-]?[\d]{3}[\.\-]?[\d]{3}[\.\-\/]?[\d]{4}[\.\-]?[\d]{2}$/;
        if (b){
        	v = r.test(a);
        } else {
        	//inscricao
        	v=a.replace(/\D/g,"")                    //Remove tudo o que não é dígito
            v=v.replace(/([\d]{2})([\d]{3})([\d]{3})([\d]{4})([\d]{2})/,"$1.$2.$3/$4-$5");
        }
    	return v;
    }
});