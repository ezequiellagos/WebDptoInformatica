<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class DashboardController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
		$this->session->validate('');
	}

	public function index()
	{

		$data = [
			'active' => 'inicio',
		];
		$this->view('Dashboard/index', $data);
	}

	public function Notificacion($crud = '', $id = '')
	{
		$this->modelNotificacion = $this->model('Notificacion');

		$data = [
			'active' => 'notificacion',
			'message' => '',
			'status' => 'danger',
			'page' => 'notificacion',
		];

		switch ($crud) {
			case 'create':
				$data['page'] = 'notificacion_create';
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$response = validateCaptcha($_POST['g-recaptcha-response']);
					if ($response === true) {
						if (!empty($_POST['tema']) && !empty($_POST['mensaje'])) {
							$this->modelNotificacion->addNotificacion([
								'tema' => strip_tags($_POST['tema']),
								'mensaje' => strip_tags($_POST['mensaje']),
								'usuario_id' => $this->session->get('id'),
							]);

							$data['status'] = "success";
							$data['message'] = $this->message('notification_created');
						}else{
							$data['message'] = $this->message('fields_required');
						}
					}else{
						$data['message'] = $response;
					}
				}

				$this->view('Dashboard/crearNotificacion', $data);
				break;

			case 'update':
				$data['page'] = 'notificacion_update';

				if (!empty($id) && ($_SERVER['REQUEST_METHOD'] != 'POST')) {
					$data['notificacion'] = $this->modelNotificacion->getNotificacionById($id);
					if (empty($data['notificacion'])) { redirect('Dashboard/Notificacion/'); }
					
				}else{
					$data['message'] = "No se ha seleccionado una notificación válida";
				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST' && (is_numeric($id) && !empty($id))) {
					$response = validateCaptcha($_POST['g-recaptcha-response']);
					if ($response === true) {
						if ($this->modelNotificacion->updateNotificacion([
							'id' => $id,
							'mensaje' => $_POST['mensaje'],
							'tema' => $_POST['tema'],
						])) {
							$data['status'] = "success";
							$data['message'] = "Notificación $id actualizada";
						}else{
							$data['status'] = "danger";
							$data['message'] = "Error al actualizar la notificación";
						}
					}else{
						$data['message'] = $response;
					}
				}
					
				$this->view('Dashboard/actualizarNotificacion', $data);
				
				break;

			case 'delete':
				$data['page'] = 'notificacion_delete';
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$response = validateCaptcha($_POST['g-recaptcha-response']);
					if ($response === true) {
						if ($this->modelNotificacion->deleteNotificacion($id)) {
							$data['status'] = "success";
							$data['message'] = "Notificación $id eliminada";
						}else{
							$data['message'] = "Error al eliminar la notificación";
						}
					}else{
						$data['message'] = $response;
					}
						
				}else{
					$data['status'] = "danger";
					$data['message'] = "Error al intentar eliminar la notificación";
				}
				$data['content'] = $this->modelNotificacion->getAllNotificaciones();
				$this->view('Dashboard/listarNotificaciones', $data);
				break;
			
			default:
				$data['content'] = $this->modelNotificacion->getAllNotificaciones();
				$this->view('Dashboard/listarNotificaciones', $data);
				break;
		}
		
	}

	public function Noticia($crud = '', $id = '')
	{
		$this->modelNoticia = $this->model('Noticia');

		$data = [
			'active' => 'noticia',
		];
			
		switch ($crud) {
			case 'create':
				$data['page'] = 'noticia_create';
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$response = validateCaptcha($_POST['g-recaptcha-response']);
					if ($response === true) {
						if (!empty($_POST['titulo']) && !empty($_POST['cuerpo'])) {
							$this->modelNoticia->addNoticia([
								'titulo' => strip_tags($_POST['titulo']),
								'cuerpo' => strip_tags($_POST['cuerpo']),
								'url_imagen' => '/',
								'slug' => '/',
								'usuario_id' => $this->session->get('id'),
								'categoria_id' => 2,
							]);

							$data['status'] = "success";
							$data['message'] = $this->message('notification_created');
						}else{
							$data['message'] = $this->message('fields_required');
						}
					}else{
						$data['message'] = $response;
					}
				}
				$this->view('Dashboard/crearNoticia', $data);
				break;

			case 'update':
				$data['page'] = 'noticia_update';

				if (!empty($id) && ($_SERVER['REQUEST_METHOD'] != 'POST')) {
					$data['noticia'] = $this->modelNoticia->getNoticiaById($id);
					if (empty($data['noticia'])) { redirect('Dashboard/Noticia/'); }
					
				}else{
					$data['message'] = "No se ha seleccionado una noticia válida";
				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST' && (is_numeric($id) && !empty($id))) {
					$response = validateCaptcha($_POST['g-recaptcha-response']);
					if ($response === true) {
						if ($this->modelNoticia->updateNoticia([
							'id' => $id,
							'titulo' => $_POST['titulo'],
							'cuerpo' => $_POST['cuerpo'],
							'url_imagen' => '/',
							'slug' => '/',
						])) {
							$data['status'] = "success";
							$data['message'] = "Notificación $id actualizada";
						}else{
							$data['status'] = "danger";
							$data['message'] = "Error al actualizar la notificación";
						}
					}else{
						$data['message'] = $response;
					}
				}
					
				$this->view('Dashboard/actualizarNoticia', $data);
				break;

			case 'delete':
				# code...
				break;
			
			default:
				$data['content'] = $this->modelNoticia->getNoticias();
				$this->view('Dashboard/listarNoticias', $data);
				break;
		}


	}

	public function agregarDocumentos($crud = '', $id = '')
	{
		$this->modelDocumento = $this->model('Documento');
		$data = [
			'active' => 'documento',
		];

		switch ($crud) {
			case 'create':
				# code...
				break;

			case 'update':
				# code...
				break;

			case 'delete':
				# code...
				break;
			
			default:
				# code...
				break;
		}

		$this->view('Dashboard/crearDocumento', $data);
	}

	public function calendarioAcademico($crud = '', $id = '')
	{
		$this->modelAcademico = $this->model('Academico');
		$data = [
			'active' => 'calendario',
		];

		switch ($crud) {
			case 'create':
				# code...
				break;

			case 'update':
				# code...
				break;

			case 'delete':
				# code...
				break;
			
			default:
				# code...
				break;
		}

		$this->view('Dashboard/calendarioAcademico', $data);
	}

	public function crearUsuario($crud = '', $id = '')
	{
		$this->modelUsuario = $this->model('Usuario');
		$data = [
			'active' => 'usuario',
			'message' => '',
		];

		switch ($crud) {
			case 'create':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && 
						!empty($_POST['email']) && !empty($_POST['password'])) {
						$this->modelUsuario->addUsuario([
							'nombre' => $_POST['nombre'],
							'apellido' => $_POST['apellido'],
							'email' => $_POST['email'],
							'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
						]);

						$data['message'] = "Usuario creado";
					}
				}
				break;

			case 'update':
				# code...
				break;

			case 'delete':
				# code...
				break;
			
			default:
				# code...
				break;
		}

		

		$this->view('Dashboard/crearUsuario', $data);
	}
}
