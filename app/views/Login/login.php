<<<<<<< HEAD
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

	<style type="text/css">
		html, body {
		    height: 100%;
		}
	</style>

</head>
<body>

=======
>>>>>>> b6adfb55bb0cd26fb5fd0ad64cc71b4cffdcb4ee

<div class="container h-100">
	<div class="row h-100">
		<div class="col-md-12 align-self-center">
			<div class="row">
				<div class="col-md-6 mx-auto">

					<!-- form card login -->
					<div class="card rounded-0">
						<div class="card-header">
							<h3 class="mb-0">Login</h3>
						</div>
						<div class="card-body">
							<form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST" action="<?= ROUTE_URL ?>Login/">
								<div class="form-group">
									<label for="email">Correo</label>
									<input type="text" class="form-control form-control-lg rounded-0" name="email" id="email" value="<?= $email ?>" required="">
									<div class="invalid-feedback">No olvide colocar su correo</div>
								</div>
								<div class="form-group">
									<label for="">Contraseña</label>
									<input type="password" name="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
									<div class="invalid-feedback">No olvide colocar su contraseña</div>
								</div>
								<div class="form-group">
									<div class="alert alert-danger" id="msgAlertLogin" role="alert"><?= $errorMessage ?></div>
								</div>
								<button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
							</form>
						</div>
						<!--/card-block-->
					</div>
					<!-- /form card login -->

				</div>
			</div>
			<!--/row-->
		</div>
		<!--/col-->
	</div>
	<!--/row-->
</div>
<!--/container-->


<script src="<?= ROUTE_URL ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= ROUTE_URL ?>js/popper-umd-1.12.6.js"></script>
<script src="<?= ROUTE_URL ?>js/bootstrap-material-design.min.js"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script src="<?= ROUTE_URL ?>/js/main.js"></script>
<script type="text/javascript">
	$("#btnLogin").click(function(event) {
		//Fetch form to apply custom Bootstrap validation
		var form = $("#formLogin");
		if (form[0].checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
		}
		form.addClass('was-validated');
	});

	if ($('#msgAlertLogin').is(':empty')){
		$('#msgAlertLogin').hide();
	}
</script>
</body>
</html>