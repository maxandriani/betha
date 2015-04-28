<?php
require './config.php';

?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8" />
<title>Betha: Serviços ao cidadão</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php the_url('css/bootstrap.min.css') ?>">

<!-- Optional theme -->
<link rel="stylesheet"
	href="<?php the_url('css/bootstrap-theme.min.css') ?>">

<link rel="stylesheet" href="css/betha.css" type="text/css" />

<!-- Latest compiled and minified JavaScript -->
<script src="<?php the_url('js/vendor/jquery/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php the_url('js/vendor/bootstrap/bootstrap.min.js') ?>"></script>

<script src="<?php the_url('js/vendor/angular/angular.min.js') ?>"></script>
<script src="<?php the_url('js/vendor/angular/angular-route.min.js') ?>"></script>
<script
	src="<?php the_url('js/vendor/angular/angular-resource.min.js') ?>"></script>
<script src="<?php the_url('js/app.js') ?>"></script>

<script type="text/javascript">
	var CONFIG = {};
	CONFIG.url = "<?php the_url(); ?>";
	CONFIG.restUrl = "<?php the_url('rest-app'); ?>";
</script>
</head>

<body ng-app="citizenApp">
	<h1>Jonas</h1>
</body>
</html>