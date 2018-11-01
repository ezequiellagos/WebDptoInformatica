// Start Login
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
// End Login

// Listar Notificaciones
$(document).ready(function() {
    var element = document.getElementById('listarNotificaciones');
	if (typeof(element) != 'undefined' && element != null){
		$('#listarNotificaciones').DataTable({
	    	"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},

			"order": [[ 0, "desc" ]],
	    });
	}
} );

$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var tema = button.data('tema')
  var url = button.data('url')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Eliminar notificación ' + id)
  modal.find('.modal-body').text(tema)
  modal.find('#deleteButton').attr( "action", url )
})


// reCaptcha v3
var element =  document.getElementById('g-recaptcha-response');
if (typeof(element) != 'undefined' && element != null)
{
	var page = document.getElementById('page-id').textContent;
	grecaptcha.ready(function() {
		grecaptcha.execute('6LeZlncUAAAAAO-iXhFcC8n0mzHSndLFsmBE5C2B', {action: page})
		.then(function(token) {
			element.value = token;
		});
	});
}