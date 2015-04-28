<?php
session_cache_limiter ( false );
session_start ();

define ( 'ERROR_INVALID_DATA_TYPE', 'Formato de dados inválido, veja nossa documentação para maiores informações' );
define ( 'ERROR_IPTU_NOT_FOUND', 'Não encontramos IPTUs vinculados a esse documento, for favor, verifique os valores informados e tente novamente' );
define ( 'ERROR_USERNAME_NOT_FOUND', 'Não encontramos servidores vinculados ao nome de usuário informado, for favor, verifique e tente novamente' );
define ( 'ERROR_WORNG_INSCRICAOIMOBILIARIA_VALUE', 'A Inscrição imobiliária informada parece estar com a escrita incorreta, por favor, verifique e tente novamente' );
define ( 'ERROR_WORNG_CPF_VALUE', 'O CPF informado parece estar com a escrita incorreta, por favor, verifique e tente novamente' );
define ( 'ERROR_WORNG_CNPJ_VALUE', 'O CNPJ informado parece estar com a escrita incorreta, por favor, verifique e tente novamente' );
define ( 'ERROR_WORNG_USERNAME_VALUE', 'O Usuário informado parece estar com a escrita incorreta, por favor, verifique e tente novamente' );
define ( 'ERROR_WORNG_PASSWORD_VALUE', 'Senha incorreta' );
define ( 'ERROR_WORNG_ENTIDADE_VALUE', 'Entidade não encontrada' );

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader ();

require 'jsonApi/JsonApiMiddleware.php';
require 'jsonApi/JsonApiView.php';

$slim_config = array ();
$slim_config ['debug'] = true; // Set debug true for development version | production = false
$app = new \Slim\Slim ( $slim_config );

$app->view ( new \JsonApiView () );
$app->add ( new \JsonApiMiddleware () );

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

/*
 * Não farei integração com banco de dados por se tratar de um teste, então assumirei que esse array será meu data soure
 */
$dataSource = array (
		'cpf' => '06169363975',
		'cnpj' => '11811397000118',
		'inscricaoImobiliaria' => '010101707200020001',
		'entidade' => '1',
		'iptu_list' => array (),
		'servidor' => array (
				'ID' => '1',
				'user' => 'jonas.brother',
				'pass' => md5 ( 'jonas.pass' ),
				'name' => 'Jonas Brother' 
		) 
);

// Populando IPTUs
for($i = 0; $i < 5; $i ++) {
	$iptu = array (
			'ID' => $i,
			'name' => 'Jonas Brother',
			'endereco' => 'Rua David Cota',
			'numero' => rand ( 100, 300 ),
			'ano' => '2015',
			'status_code' => rand ( 1, 3 ),
			'status' => '',
			'area' => 279.65,
			'area_construida' => 124.65,
			'area_unidade' => 26.81,
			'imposto_predial' => rand ( 200, 2000 ),
			'imposto_territorial' => rand ( 100, 1000 ),
			'thumbnail' => '/images/thumbs/imovel.jpg',
			'parcelas' => array () 
	);
	
	$vr_total = $iptu ['imposto_predial'] + $iptu ['imposto_territorial'];
	
	$vr_parcelas = floor ( ($vr_total) / 3 );
	
	for($i2 = 0; $i2 < 3; $i2 ++) {
		$pacela = array (
				'numero' => $i2,
				'valor' => $vr_parcelas,
				'data' => '',
				'status' => 1 
		);
		
		// calculando primeira parcela
		if ($i2 == 0) {
			$pacela ['valor'] = (($vr_total - ($vr_parcelas * 3)) + $vr_parcelas);
		}
		
		// Calculando datas...
		switch ($iptu ['status_code']) {
			case 1 :
				// Em dia
				if ($i2 == 0) {
					$data = new DateTime ();
					$data->setTimestamp ( strtotime ( "-1 month" ) );
					$status = 2;
				} elseif ($i2 == 1) {
					$data = new DateTime ();
					$status = 1;
				} else {
					$data = new DateTime ();
					$data->setTimestamp ( strtotime ( "+1 month" ) );
					$status = 1;
				}
				
				$pacela ['data'] = $data->getTimestamp () * 1000;
				$pacela ['status'] = $status;
				break;
			
			default :
				// Atrazado
				if ($i2 == 0) {
					$data = new DateTime ();
					$data->setTimestamp ( strtotime ( "-3 month" ) );
				} elseif ($i2 == 1) {
					$data = new DateTime ();
					$data->setTimestamp ( strtotime ( "-2 month" ) );
				} else {
					$data = new DateTime ();
					$data->setTimestamp ( strtotime ( "-1 month" ) );
				}
				
				$pacela ['data'] = $data->getTimestamp () * 1000;
				$pacela ['status'] = $iptu ['status_code'];
				break;
		}
		
		$iptu ['parcelas'] [] = $pacela;
	}
	
	$dataSource ['iptu_list'] [] = $iptu;
}

$response = new stdClass ();
$response->statusCode = 200;
$response->responseData = array (
		'message' => 'Welcome',
		'data' => new stdClass () 
);

// GET route
$app->get ( '/', function () use($app) {
	$app->render ( 401, array (
			'msg' => 'Você não tem permissão para acessar esse endereço!' 
	) );
} );

$app->post ( '/users/', function () use($app, $response, $dataSource) {
	
	try {
		$username = (! isset ( $_POST ['user'] )) ? strip_tags ( $_POST ['user'] ) : '';
		$password = (! isset ( $_POST ['user'] )) ? strip_tags ( $_POST ['password'] ) : '';
		
		if (! ($username == $dataSource ['servidor'] ['user'] && $password == $dataSource ['servidor'] ['pass'])) {
			throw new Exception ( ERROR_WORNG_PASSWORD_VALUE, 500 );
		}
		
		$data_user = new stdClass ();
		$data_user->name = $dataSource ['servidor'] ['name'];
		$data_user->user = $dataSource ['servidor'] ['user'];
		$data_user->ID = $dataSource ['servidor'] ['ID'];
		
		$response->responseData ['data'] = $data_user;
	} catch ( Exception $e ) {
		$response->statusCode = $e->getCode ();
		$response->responseData ['message'] = $e->getMessage ();
	} finally {
		$app->render ( $response->statusCode, $response->responseData );
	}
} );

// API IPTU Group
$app->group ( '/iptu', function () use($app, $response, $dataSource) {
	
	$app->get ( '/', function () use($app) {
		$app->render ( 500, array (
				'msg' => 'Você precisa informar um tipo de documento e seu respectivo valor: /inscricaoImobiliaria/{{value}}' 
		) );
	} );
	
	// Get iptu with param :type and value :value
	$app->get ( '/:type/:value', function ($type, $value) use($app, $response, $dataSource) {
		
		try {
			// 200 OK
			// 302 Found
			// 401 Unauthorized
			// 404 Not Found
			// 500 Internal Error
			
			switch ($type) {
				case 'inscricaoImobiliaria' :
					// Código de inscrição estadual
					$ie_pattern = "/([\d]{2}\.?[\d]{2}\.?[\d]{3}\.?[\d]{4}\.?[\d]{3}\.?)([\d]{1,4})/";
					if (! preg_match ( $ie_pattern, $value, $final )) {
						throw new Exception ( ERROR_WORNG_INSCRICAOIMOBILIARIA_VALUE, 500 );
					}
					
					$replacement = '';
					
					for($i = 0; $i < (4 - (strlen ( $final [2] ))); $i ++) {
						$replacement = '0' . $replacement;
					}
					
					$replacement .= $final [2];
					$inscricao_imobiliaria = preg_replace ( $ie_pattern, '$1', $value );
					$inscricao_imobiliaria .= $replacement;
					$inscricao_imobiliaria = preg_replace ( "/\./", '', $inscricao_imobiliaria );
					
					if ($inscricao_imobiliaria != $dataSource ['inscricaoImobiliaria']) {
						throw new Exception ( ERROR_IPTU_NOT_FOUND, 404 );
					}
					
					$response->responseData ['data'] = $dataSource ['iptu_list'];
					
					break;
				
				case 'cpf' :
					// Documento CPF only numbers
					$cpf_pattern = "/[\d]{3}[\.\-]?[\d]{3}[\.\-]?[\d]{3}[\.\-]?[\d]{2}/";
					if (! preg_match ( $cpf_pattern, $value, $final )) {
						throw new Exception ( ERROR_WORNG_CPF_VALUE, 500 );
					}
					
					$cpf = preg_replace ( "/[\.\-]/", '', $value );
					
					if ($cpf != $dataSource ['cpf']) {
						throw new Exception ( ERROR_IPTU_NOT_FOUND, 404 );
					}
					
					$response->responseData ['data'] = $dataSource ['iptu_list'];
					break;
				
				case 'cnpj' :
					// Documento CNPJ only numbers
					$cnpj_pattern = "/[\d]{2}[\.\-]?[\d]{3}[\.\-]?[\d]{3}[\.\-\/]?[\d]{4}[\.\-]?[\d]{2}/";
					if (! preg_match ( $cnpj_pattern, $value, $final )) {
						throw new Exception ( ERROR_WORNG_CNPJ_VALUE, 500 );
					}
					
					$cnpj = preg_replace ( "/[\.\-\/]/", '', $value );
					
					if ($cnpj != $dataSource ['cnpj']) {
						throw new Exception ( ERROR_IPTU_NOT_FOUND, 404 );
					}
					
					$response->responseData ['data'] = $dataSource ['iptu_list'];
					break;
				
				case 'entidade' :
					// ID da prefeitura
					$entidade_pattern = "/[\d]{1,}/";
					if (! preg_match ( $entidade_pattern, $value, $final )) {
						throw new Exception ( ERROR_WORNG_ENTIDADE_VALUE, 500 );
					}
					
					if ($value != $dataSource ['entidade']) {
						throw new Exception ( ERROR_IPTU_NOT_FOUND, 404 );
					}
					
					$response->responseData ['data'] = $dataSource ['iptu_list'];
					break;
				
				default :
					throw new Exception ( ERROR_INVALID_DATA_TYPE, 500 );
			}
		} catch ( Exception $e ) {
			$response->statusCode = $e->getCode ();
			$response->responseData ['message'] = $e->getMessage ();
		} finally {
			$app->render ( $response->statusCode, $response->responseData );
		}
	} );
} );

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run ();
