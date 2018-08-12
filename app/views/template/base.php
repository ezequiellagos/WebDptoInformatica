{% block header %}
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="id=edge">

		{# Tipografía Universidad de Playa Ancha #}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900">

		{# Material for Bootstrap CSS #}
		<link rel="stylesheet" type="text/css" href="{{ app.ROUTE_URL }}css/bootstrap-material-design.min.css">

		{# Another CSS #}
		{% if (css is defined) and (css is not empty) %}
			{% for css in css %}
				<link rel="stylesheet" type="text/css" href="{{ app.ROUTE_URL }}css/{{ css }}.css">
			{% endfor %}
		{% endif %}

		{# Custom CSS #}
		<link rel="stylesheet" type="text/css" href="{{ app.ROUTE_URL }}css/main.css">

		<link rel="shortcut icon" href="http://www.upla.cl/portada/wp-content/uploads/2015/05/favicon.ico" />

		<title>{{ app.NAME_SITE }}</title>

	</head>
	<body>	
{% endblock %}

{% block menu %}
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">
			<img src="{{ app.ROUTE_URL }}img/upla.png" width="60" height="60">
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
							<a class="nav-link" href="{{ app.ROUTE_URL }}inicio/Academicos.php">Academicos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Departamento</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Alumnos</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carrera</a>
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
					<a href="{{ app.ROUTE_URL }}login/" class="btn btn-outline-dark">Iniciar sesión</a>
				</div>
			</div>
		</div>
	</nav>
{% endblock %}

{% block content %}{% endblock %}

{% block footer %}
	<footer class="text-muted fondo ">
		<div class="container flex-row fondo">
			<p class="float-right fondo">
				<a href="#">Subir</a>
			</p>
			<a href="#"><img src="{{ app.ROUTE_URL }}img/instagram.jpg" alt="" width="95" class="rounded-circle"></a>	
			<a href="#"><img src="{{ app.ROUTE_URL }}img/facebook.jpg" alt="" width="125"class="rounded-circle"></a>
			<a href="#"><img src="{{ app.ROUTE_URL }}img/twitter.png" alt="" width="55"class="rounded-circle"></a>
		</div>
	</footer>
{% endblock %}

{% block footer_scripts %}
		<script src="{{ app.ROUTE_URL }}js/jquery-3.3.1.min.js"></script>
		<script src="{{ app.ROUTE_URL }}js/popper-umd-1.12.6.js"></script>
		<script src="{{ app.ROUTE_URL }}js/bootstrap-material-design.min.js"></script>
		<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

		{# Another JS #}
		{% if (js is defined) and (js is not empty) %}
			{% for js in js %}
				<script src="{{ app.ROUTE_URL }}js/{{ js }}.js"></script>
			{% endfor %}
		{% endif %}

		<script src="{{ app.ROUTE_URL }}js/main.js"></script>

		</body>
	</html>
{% endblock %}