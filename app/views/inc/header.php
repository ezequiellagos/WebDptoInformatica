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
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>css/main.css">

	<link rel="shortcut icon" href="http://www.upla.cl/portada/wp-content/uploads/2015/05/favicon.ico" />

	<title><?= NAME_SITE ?></title>

</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="<?= ROUTE_URL ?>img/upla.png" width="60" height="60">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	<div class="row">
		<div class="col-10">
	<ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= ROUTE_URL ?>inicio/Academicos.php">Academicos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Departamento</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Alumnos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Carrera
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Ingenieria Informatica</a>
          <a class="dropdown-item" href="#">Ingenieria Estadistica</a>
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#">investigacion</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Documentos</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
      </li>
    </ul>
		</div>
		<div class="col-2">
			<button type="button" class="btn btn-outline-dark">Iniciar sesion</button>
		</div>
	</div>

  </div>
</nav>
	
	
	