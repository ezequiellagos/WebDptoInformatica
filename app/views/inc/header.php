<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="id=edge">

	<!-- Tipografía Universidad de Playa Ancha -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900">

	<!-- Material for Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>css/bootstrap-material-design.min.css">

	<!-- Another CSS -->
	<?php if (isset($css) AND !empty($css)): ?>
		<?php foreach ($css as $value): ?>
			<link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>css/<?= $value ?>.css">
		<?php endforeach ?>
	<?php endif ?>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>css/main.css">

	<link rel="shortcut icon" href="http://www.upla.cl/portada/wp-content/uploads/2015/05/favicon.ico" />

	<title><?= NAME_SITE ?></title>

</head>
<body>
	