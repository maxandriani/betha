/**
 * Angular Citizen Application
 */

angular.module("citizenApp").controller("IptuLoginController", ['$http', '$scope', 'ModalService', function($http, $scope, ModalService){
	// Jonas Brtoher
	var controller = this;
	
	$scope.currentDocumentType = 'cpf';
	$scope.currentDocumentValue = '';
	$scope.page_title = 'Emitir Guias de IPTU';
	
	this.buildRestUrl = function(){
		return restUrl = CONFIG.restUrl + '/iptu/' + $scope.currentDocumentType + '/' + $scope.currentDocumentValue + '/';
	}
	
	this.checkDocument = function(doc, docType){
		$http({
			method: 'get',
			url: controlle.buildRestUrl()
		}).success(function(data){
			if (!data.error){
				window.location.hash="#/iptu/"+docType+"/"+doc+"/"
			} else {
				controller.showError(data.message);
			}
		});
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