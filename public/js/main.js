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

