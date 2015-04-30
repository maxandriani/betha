/**
 * Angular Citizen Application
 */

angular.module('citizenApp').directive('cpf', ['$filter', function ($filter){ 
	return {
      require: 'ngModel',
      link: function(scope, elem, attr, model) {
          model.$parsers.unshift(function(value) {
              var valid = $filter('cpf')(value, true);
              model.$setValidity('invalid_cpf', valid);
              return valid ? value : undefined;
          });
          model.$formatters.unshift(function(value) {
              model.$setValidity('invalid_cpf', $filter('cpf')(value, true));
              return value;
          });
      }
   };
}]);

angular.module('citizenApp').directive('cnpj', ['$filter', function ($filter){ 
	   return {
	      require: 'ngModel',
	      link: function(scope, elem, attr, model) {
	          model.$parsers.unshift(function(value) {
	              var valid = $filter('cnpj')(value, true);
	              model.$setValidity('invalid_cnpj', valid);
	              return valid ? value : undefined;
	          });
	          model.$formatters.unshift(function(value) {
	              model.$setValidity('invalid_cnpj', $filter('cnpj')(value, true));
	              return value;
	          });
	      }
	   };
	}]);

angular.module('citizenApp').directive('inscricaoimobiliaria', ['$filter', function ($filter){ 
	   return {
	      require: 'ngModel',
	      link: function(scope, elem, attr, model) {
	          model.$parsers.unshift(function(value) {
	              var valid = $filter('inscricaoImobiliaria')(value, true);
	              model.$setValidity('invalid_inscricaoImobiliaria', valid);
	              return valid ? value : undefined;
	          });
	          model.$formatters.unshift(function(value) {
	              model.$setValidity('invalid_inscricaoImobiliaria', $filter('inscricaoImobiliaria')(value, true));
	              return value;
	          });
	      }
	   };
	}]);