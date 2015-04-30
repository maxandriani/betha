/**
 * Angular Citizen Application
 */

angular.module("citizenApp").controller("IptuGridController", ['$http', '$scope', '$routeParams', 'ModalService', function($http, $scope, $routeParams, ModalService){
	// Jonas Brtoher
	var restUrl = CONFIG.restUrl + '/iptu/' + $routeParams.docType + '/' + $routeParams.doc + '/';
	//var restUrl = CONFIG.restUrl + '/iptu/cpf/06169363975';
	console.log(restUrl);
	
	var controller = this;
	
	this.iptuList = [];
	this.contribuinte = 'OOps';
	
	this.filterBaseYear = 2015;
	this.gridExtended = {};
	
	this.totalEmAberto = 0;
	this.totalPago = 0;
	this.saldo = 0;
	
	$scope.page_title = 'Guias de IPTU';
	
	this.checkStatusCode = function(statusCode){
		var status = '';
		
		switch(statusCode){
		case 1:
			status = 'Em dia';
			break;
			
		case 2:
			status = 'Atrasado';
			break;
			
		case 3:
			status = 'Quitado';
			break;
		}
		
		return status;
	};
	
	this.getDate = function(timestamp){
		var date = new Date();
		var dateString = '';
		date.setTime(timestamp);
		dateString += this.numberFixedLen(date.getDate(), 2);
		dateString += '/';
		dateString += this.numberFixedLen(date.getMonth()+1, 2);
		dateString += '/';
		dateString += this.numberFixedLen(date.getFullYear(), 4);
		return dateString;
	}
	
	this.numberFixedLen = function(a,b){
        return(1e4+a+"").slice(-b);
    };
    
    this.calculate = function(iptuList){
    	this.totalEmAberto = 0;
    	this.totalPago = 0;
    	this.saldo = 0;
    	
    	var that = this;
    	
    	iptuList.forEach(function(iptu, key){
    		if (iptu.status_code == 1 || iptu.status_code == 3){
    			iptu.parcelas.forEach(function(parcela, key){
    				if (parcela.status == 1 || parcela.status == 3){
    					that.totalEmAberto += parcela.valor;
    				} else if (parcela.status == 2){
    					that.totalPago += parcela.valor;
    				}
    			});
    		}
    	});
    	
    	this.saldo = this.totalEmAberto - this.totalPago;
    	
    };
    
    this.alterarContribuinte = function(){
    	this.funcaoNaoImplementada();
    }
    
    this.funcaoNaoImplementada = function(){
    	ModalService.showModal({
  	      templateUrl: "views/global/modal-confirm.html",
  	      controller: "ModalConfirm",
  	      inputs: {
  	    	title: 'Função não implementada',
  	  		message: 'Você será redirecionado para a tela de pesquisa de IPTU'
  	  		}
  	    }).then(function(modal) {
  	      modal.element.modal();
  	      modal.close.then(function(result) {
  	    	  if (result){
  	    		  window.location.hash="#/iptu/";
  	    	  }
  	      });
  	    });
    };
    
    this.baixarTodasAsGuias = function(){
    	ModalService.showModal({
  	      templateUrl: "views/global/modal-inform.html",
  	      controller: "ModalConfirm",
  	      inputs: {
  	    	title: 'Aguarde',
  	  		message: 'Estamos providenciando os arquivos'
  	  		}
  	    }).then(function(modal) {
  	      modal.element.modal();
  	      modal.close.then(function(result) {
  	    	  if (result){
  	    		  //window.location.hash="#/iptu/";
  	    	  }
  	      });
  	    });
    };
    
this.baixarGuiasSelecionadas = function(guias){
    	
    	var nguias = 0;
    	
    	for (x in guias){
    		if (guias[x]){
    			nguias++;
    		}
    	}
    	
    	if (nguias > 0){
    	
    	ModalService.showModal({
  	      templateUrl: "views/global/modal-inform.html",
  	      controller: "ModalConfirm",
  	      inputs: {
  	    	title: 'Aguarde',
  	  		message: 'Estamos providentiando os arquivos do(s) iptu(s) selecionado(S)'
  	  		}
  	    }).then(function(modal) {
  	      modal.element.modal();
  	      modal.close.then(function(result) {
  	    	  if (result){
  	    		  //window.location.hash="#/iptu/";
  	    	  }
  	      });
  	    });
    	
    	} else {
    		ModalService.showModal({
    			templateUrl: "views/global/modal-error.html",
    	  	    controller: "ModalConfirm",
    	  	    inputs: {
    	  	    	title: 'Erro',
    	  	  		message: 'Por favor selecione ao menos um IPTU para baixar'
    	  	  	}
    		}).then(function(modal) {
    			modal.element.modal();
    			modal.close.then(function(result) {
    				if (result){
    					//window.location.hash="#/iptu/";
    				}
			  });
			});
    		
    	}
    };
    
    this.baixarParcelasSelecionadas = function(guias){
    	
    	ModalService.showModal({
  	      templateUrl: "views/global/modal-inform.html",
  	      controller: "ModalConfirm",
  	      inputs: {
  	    	title: 'Aguarde',
  	  		message: 'Estamos providentiando as parcelas selecionadas'
  	  		}
  	    }).then(function(modal) {
  	      modal.element.modal();
  	      modal.close.then(function(result) {
  	    	  if (result){
  	    		  //window.location.hash="#/iptu/";
  	    	  }
  	      });
  	    });
    };
	
    this.extendIptu = function(iptu){
    	if (this.gridExtended[iptu]){
    		this.gridExtended[iptu] = false;
    	} else {
    		this.gridExtended[iptu] = true;
    	}
    	
    }    
    
	$http({
		method: 'get',
		url: restUrl
	}).success(function(data){
		if (!data.error){
			controller.contribuinte = data.data.name;
			controller.iptuList = data.data.iptuList;
			controller.calculate(controller.iptuList);
		} else {
			ModalService.showModal({
		  	      templateUrl: "views/global/modal-error.html",
		  	      controller: "ModalConfirm",
		  	      inputs: {
		  	    	title: 'Erro',
		  	  		message: data.message
		  	  		}
		  	    }).then(function(modal) {
		  	      modal.element.modal();
		  	      modal.close.then(function(result) {
		  	    	  // do nothing
		  	    	  window.location.hash="#/iptu/";
		  	      });
		  	    });
		}
	}).error(function(data){
		ModalService.showModal({
	  	      templateUrl: "views/global/modal-error.html",
	  	      controller: "ModalConfirm",
	  	      inputs: {
	  	    	title: 'Erro',
	  	  		message: data.message
	  	  		}
	  	    }).then(function(modal) {
	  	      modal.element.modal();
	  	      modal.close.then(function(result) {
	  	    	  // do nothing
	  	    	  window.location.hash="#/iptu/";
	  	      });
	  	    });
	});
	
}]);