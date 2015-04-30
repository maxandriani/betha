<?php
require './config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>[preview] Max Andriani</title>
<style type="text/css">
body {
	margin: 0;
	padding: 0;
}

.preview {
	width: 100%;
	min-width: 1200px;
	height: 3000px;
	display: bock;
	background: url(./images/bgs/bg.clone.png) top center no-repeat;
}

.preview a {
	display: block;
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
}
</style>
</head>
<body>
	<div class="preview">
		<a href="<?php the_url('#/iptu/') ?>"></a>
	</div>
</body>
</html>