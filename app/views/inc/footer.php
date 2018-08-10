	
	<footer class="text-muted fondo ">
		<div class="container flex-row fondo">
			<p class="float-right fondo">
				<a href="#">Subir</a>
			</p>
			<a href="#"><img src="<?= ROUTE_URL ?>img/instagram.jpg" alt="" width="95" class="rounded-circle"></a>	
			<a href="#"><img src="<?= ROUTE_URL ?>img/facebook.jpg" alt="" width="125"class="rounded-circle"></a>
			<a href="#"><img src="<?= ROUTE_URL ?>img/twitter.png" alt="" width="55"class="rounded-circle"></a>
		</div>
	</footer>


	<script src="<?= ROUTE_URL ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= ROUTE_URL ?>js/popper-umd-1.12.6.js"></script>
	<script src="<?= ROUTE_URL ?>js/bootstrap-material-design.min.js"></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<!-- Another JS -->
	<?php if (isset($js) AND !empty($js)): ?>
		<?php foreach ($js as $value): ?>
			<link rel="stylesheet" type="text/css" href="<?= ROUTE_URL ?>js/<?= $value ?>.js">
		<?php endforeach ?>
	<?php endif ?>

	<script src="<?= ROUTE_URL ?>js/main.js"></script>

	</body>
</html>