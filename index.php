<?php
require './config.php';

?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Betha: Serviços ao cidadão</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php the_url('css/bootstrap.min.css') ?>">

<link rel="stylesheet" href="<?php the_url('css/betha.css') ?>"
	type="text/css" />
<link rel="stylesheet"
	href="<?php the_url('css/betha-portobelo.css') ?>" type="text/css">

<script type="text/javascript">
	var CONFIG = {};
	CONFIG.url = "<?php the_url(); ?>";
	CONFIG.restUrl = "<?php the_url('rest-app'); ?>";
</script>
</head>

<body ng-app="citizenApp">

	<!-- Header -->
	<header class="navbar navbar-default header">

		<!-- City identification wrap block 
				this block was necessary to create a break point between identification elements and the navbar -->
		<div class="container">

			<!-- City Hall Header -->
			<div class="header-city header-porto-belo row">

				<div class="col-sm-10 block-identification">

					<!-- City brand -->
					<div class="city-brand">
						<a href="<?php the_url() ?>"
							title="Prefeitura Municipal de Porto Belo"><img
							alt="Brasão da Prefeitura Municipal de Porto Belo"
							src="<?php the_image_url('brands/brand.portobelo.jpg')?>"></a>
					</div>
					<!-- // City brand -->

					<!-- City name -->
					<div class="city-name">
						<h1>
							<small>Prefeitura Municipal de</small> <span>Porto Belo - SC</span>
						</h1>
					</div>
					<!-- City name -->

					<!-- System-name -->
					<div class="system-name">
						<h2>Serviços ao cidadão</h2>
					</div>
					<!-- System-name -->

				</div>
				<!-- // Block identification -->

				<!-- City login navbar -->
				<nav class="col-sm-2 navbar-login">
					<a class="icon icon-servidor" href="<?php the_url("/#/login") ?>">Acesso
						do servidor</a>
				</nav>
				<!-- // City login navbar -->

			</div>
			<!-- // City Hall Header -->

		</div>
		<!-- // City identification block -->

	</header>
	<!-- // header -->

	<!-- Main Navigation Block -->
	<aside class="block-mainnav">

		<!-- Static navbar -->
		<nav class="navbar navbar-static-top navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Abrir menu</span>

						<!-- Text -->
						<span class="pull-right">Abrir Menu</span>

						<!-- Icons -->
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#/iptu">IPTU</a></li>
						<li><a href="#/iss">ISS</a></li>
						<li><a href="#/certidoesNegativas">Certidões Negativas</a></li>
						<li><a href="#/guias">Guias</a></li>
						<li><a href="#/alvaras">IPTU</a></li>
						<li><a href="#/validacaoDeDocumentos">Validação de documentos</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>

	</aside>
	<!--// Main Navigation Block -->

	<div class="container">

		<!-- breadcrumb -->
		<div class="block-breadcrumb">
			<h2 class="page-title">Emitir Guias de IPTU</h2>
		</div>
		<!-- // breadcrumb -->

		<!-- Grid tools -->
		<div class="block-gridtools row">

			<!-- left tools -->
			<div class="col-sm-6 block-contribuinte">
				<button class="btn btn-contribuinte">Alterar</button>
				<div class="info">
					Exibindo guias de IPTU em aberto para o contribuínte<br> <span>Maxmiliano
						Reipert Andriani</span>
					</p>
				</div>
			</div>

			<!-- filters -->
			<ul class="col-sm-6 gridtools-list">
				<li><a href="#" class="btn btn-download">Baixar todas as guias</a></li>
				<li><a href="#" class="btn btn-download">Baixar guias selecionadas</a></li>
				<li><select class="btn btn-anobase" name="iptu-ano-base">
						<option value="2015" selected>Ano base: 2015</option>
						<option value="2015">Ano base: 2014</option>
				</select></li>
			</ul>
		</div>
		<!-- // Grid tools -->

		<!-- grid -->
		<ul class="block-grid">
			<li class="grid-item">
				<!-- Grid-item content -->
				<div class="grid-item-cintent">

					<!-- controll tools -->
					<div class="control-tools">
						<!-- check -->
						<input type="checkbox" name="check-grid-item[]" value="1">

						<!-- expand -->
						<a href="#" class="expand expand-icon expanded"
							title="Exibir parcelas"></a>
					</div>

					<!-- imóvel info -->
					<div class="grid-cell cell-imovel">

						<!-- thumb -->
						<img class="thumb" alt="Foto da fachada do imóvel"
							src="<?php the_url('images/thumbs/thumb.imovel.png') ?>">

						<!-- Imóvel cell -->
						<div class="cell-header">Imóvel</div>

						<!-- Imóvel -->
						<div class="cell-value">Rua David Cota, nº 134</div>

					</div>

					<!-- Inscricao imobiliária -->
					<div class="grid-cell cell-inscricaoimobiliaria">

						<!-- Imóvel cell -->
						<div class="cell-header">Inscrição imobiliária</div>

						<!-- Imóvel -->
						<div class="cell-value">01.01.017.0720.002.0001</div>

					</div>

					<!-- Ano -->
					<div class="grid-cell cell-year">

						<!-- Imóvel cell -->
						<div class="cell-header">Inscrição imobiliária</div>

						<!-- Imóvel -->
						<div class="cell-value">01.01.017.0720.002.0001</div>

					</div>

					<!-- Status -->
					<div class="grid-cell cell-status status-good">

						<!-- Imóvel cell -->
						<div class="cell-header">Situação</div>

						<!-- Imóvel -->
						<div class="cell-value">Vencido</div>

					</div>

					<!-- Ano -->
					<div class="grid-cell cell-total status-good">

						<!-- Imóvel cell -->
						<div class="cell-header">Total</div>

						<!-- Imóvel -->
						<div class="cell-value">R$ 2.000,00</div>

					</div>

					<!-- tools content -->
					<ul class="grid-cell cell-tools">
						<li>
							<button class="btn btn-parcelas">
								<span class="expanded">Ocultar parcelas</span><span
									class="collapsed">Exibir parcelas</span>
							</button>
						</li>
						<li>
							<button class="btn btn-download"></button>
						</li>
					</ul>
					<!-- // tools content -->
				</div> <!-- // Grid-item content --> <!-- Extended -->
				<div class="grid-extended row">

					<!-- Information -->
					<div class="col-sm-4 iptu-information">
						<h4 class="title">Dados de cobrança</h4>

						<ul class="list iptu-data">
							<li class="list-item"><strong>Área do terreno:</strong> 279,65 m²</li>
							<li class="list-item"><strong>Área total construída:</strong>
								124,66 m²</li>
							<li class="list-item"><strong>Área construída da unidade:</strong>
								26,81 m²</li>
							<li class="list-item"><strong>Imposto predial:</strong> R$ 122,43</li>
							<li class="list-item"><strong>Imposto territorial:</strong> R$
								29,47</li>
						</ul>
					</div>
					<!-- // Information -->

					<!-- Parcelas -->
					<div class="col-sm-8 iptu-parcelas">
						<h4 class="title">Parcelas</h4>

						<table class="table table-parcelas">
							<tbody>
								<tr>
									<td class="table-cell parcela"><input type="checkbox"
										name="parcela[]" value="1"></td>
									<td class="cell-size-1 number">01</td>
									<td class="item-size-2 date">20/05/2015</td>
									<td class="item-size-2 value">R$ 2.000,00</td>
									<td class="item-size-2 status">Pago</td>
									<td class="item-size-1 right print"><a href="#"
										title="Baixar esta parcela"></a></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="4">Total</td>
									<td colspan="2">R$ 2.000,00</td>
								</tr>
							</tfoot>
						</table>


						<button class="btn">Baixar parcelas selecionadas</button>						
						<?php
						/*
						 * ?><ul class="list parcelas">
						 * <li class="list-item parcela">
						 * <input type="checkbox"
						 * name="parcela[]" value="1">
						 * <div class="item-size-1 number">01</div>
						 * <div class="item-size-2 date">20/05/2015</div>
						 * <div class="item-size-2 value">R$ 2.000,00</div>
						 * <div class="item-size-2 status">Pago</div>
						 * <div class="item-size-1 right print">
						 * <a href="#" title="Baixar esta parcela"></a>
						 * </div></li>
						 * </ul>
						 * <?php
						 */
						?>
					
					
					
					
					</div>
					<!-- // Parcelas -->

				</div> <!-- // Extended -->
			</li>
		</ul>
		<!-- // grid -->

	</div>
	<!-- /container -->

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php the_url('js/vendor/jquery/jquery-2.1.3.min.js') ?>"></script>
	<script src="<?php the_url('js/vendor/bootstrap/bootstrap.min.js') ?>"></script>

	<script src="<?php the_url('js/vendor/angular/angular.min.js') ?>"></script>
	<script
		src="<?php the_url('js/vendor/angular/angular-route.min.js') ?>"></script>
	<script
		src="<?php the_url('js/vendor/angular/angular-resource.min.js') ?>"></script>
	<script src="<?php the_url('js/app.js') ?>"></script>

</body>
</html>