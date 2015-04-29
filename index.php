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
						<a href="<?php the_url('#/') ?>"
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
					<a class="btn btn-default btn-icon btn-servidor"
						ng-click="iptuGrid.funcaoNaoImplementada()"
						href="<?php the_url("#/servidor/login") ?>">Acesso do servidor</a>
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
						<li><a href="#/iptu">IPTU</a></li>
						<li><a href="#/iss/">ISS</a></li>
						<li><a href="#/certidoesNegativas/">Certidões Negativas</a></li>
						<li><a href="#/guias">Guias</a></li>
						<li><a href="#/alvaras">Alvarás</a></li>
						<li><a href="#/validacao">Validação de documentos</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>

	</aside>
	<!--// Main Navigation Block -->

	<div class="container" ng-view>

		<!-- iptu-index -->

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
	<script src="<?php the_url('js/services/modal.js') ?>"></script>
	<script src="<?php the_url('js/app.js') ?>"></script>
	<script src="<?php the_url('js/routes.js') ?>"></script>
	<script
		src="<?php the_url('js/controllers/iptu-grid-controller.js') ?>"></script>
	<script src="<?php the_url('js/controllers/modal-confirm.js') ?>"></script>
	<script src="<?php the_url('js/directives/iptu-grid.js') ?>"></script>

</body>
</html>