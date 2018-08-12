{% extends 'template/base.php' %}

{% block menu %}{% endblock %}

{% block footer%}{% endblock %}

{% block content %}
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
								<form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST" action="{{ app.ROUTE_URL }}Login/">
									<div class="form-group">
										<label for="email">Correo</label>
										<input type="text" class="form-control form-control-lg rounded-0" name="email" id="email" value="{{ email }}" required="">
										<div class="invalid-feedback">No olvide colocar su correo</div>
									</div>
									<div class="form-group">
										<label for="">Contraseña</label>
										<input type="password" name="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
										<div class="invalid-feedback">No olvide colocar su contraseña</div>
									</div>
									<div class="form-group">
										<div class="alert alert-danger" id="msgAlertLogin" role="alert">{{ errorMessage }}</div>
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
{% endblock %}

