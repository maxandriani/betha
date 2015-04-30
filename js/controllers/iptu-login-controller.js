/**
 * Angular Citizen Application
 */

angular.module("citizenApp").controller("IptuLoginController", ['$http', '$scope', '$filter', 'ModalService', function($http, $scope, $filter, ModalService){
	// Jonas Brtoher
	var controller = this;
	
	$scope.currentDocumentType = 'cpf';
	$scope.currentDocumentValue = '';
	$scope.page_title = 'Emitir carnês de IPTU';
	
	$scope.doc = {};
	$scope.ERROR = {
			EMPTY_CPF: false,
			EMPTY_CNPJ: false,
			EMPTY_INSCRICAOIMOBILIARIA: false,
	};
	
	$scope.accessWithCpf = function(value){
		if (!angular.isUndefined(value)){
			value = '' + value;
			value = value.replace(/\D/g, '');
			controller.checkDocument(value, 'cpf');
			$scope.ERROR.EMPTY_CPF = false;
		} else {
			$scope.ERROR.EMPTY_CPF = true;
		}
	}
	
	$scope.accessWithCnpj = function(value){
		if (!angular.isUndefined(value)){
			value = '' + value;
			value = value.replace(/\D/g, '');
			controller.checkDocument(value, 'cnpj');
			$scope.ERROR.EMPTY_CNPJ = false;
		} else {
			$scope.ERROR.EMPTY_CNPJ = true;
		}
	}
	
	$scope.accessWithInscricaoImobiliaria = function(value){
		if (!angular.isUndefined(value)){
			value = '' + value;
			value = value.replace(/\D/g, '');
			controller.checkDocument(value, 'inscricaoImobiliaria');
			$scope.ERROR.EMPTY_INSCRICAOIMOBILIARIA = false;
		} else {
			$scope.ERROR.EMPTY_INSCRICAOIMOBILIARIA = true;
		}
	}
	
	this.buildRestUrl = function(){
		return restUrl = CONFIG.restUrl + '/iptu/' + $scope.currentDocumentType + '/' + $scope.currentDocumentValue + '/';
	}
	
	this.checkDocument = function(doc, docType){
		
		$scope.currentDocumentType = docType;
		$scope.currentDocumentValue = doc;
		
		try{
			$http({
				method: 'get',
				url: controller.buildRestUrl()
			}).success(function(data){
				if (!data.error){
					window.location.hash="#/iptu/listar/"+docType+"/"+doc+"/"
				} else {
					controller.showError(data.message);
				}
			}).error(function(data){
				controller.showError(data.message);
			});
		} catch(e){
			if ($scope.ERROR[e.message]){
				$scope.ERROR[e.message] = true;
			} else {
				controller.showError(e.message);
			}
		}
		
	};
	
	this.showError = function( msg ){
    	ModalService.showModal({
  	      templateUrl: "views/global/modal-error.html",
  	      controller: "ModalConfirm",
  	      inputs: {
  	    	title: 'Erro',
  	  		message: msg
  	  		}
  	    }).then(function(modal) {
  	      modal.element.modal();
  	      modal.close.then(function(result) {
  	    	  // do nothing
  	      });
  	    });
    };
    
    this.showWarning = function( msg ){
    	ModalService.showModal({
  	      templateUrl: "views/global/modal-warning.html",
  	      controller: "ModalConfirm",
  	      inputs: {
  	    	title: 'Erro',
  	  		message: msg
  	  		}
  	    }).then(function(modal) {
  	      modal.element.modal();
  	      modal.close.then(function(result) {
  	    	  // do nothing
  	      });
  	    });
    };
	
}]);