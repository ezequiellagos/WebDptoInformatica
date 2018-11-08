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
					$response = getCaptcha($_POST['g-recaptcha-response']);
					if ($response->success === true && $response->score > 0.5) {
						if (!empty($_POST['tema']) && !empty($_POST['mensaje'])) {
							$this->modelNotificacion->addNotificacion([
								'tema' => $_POST['tema'],
								'mensaje' => $_POST['mensaje'],
								'usuario_id' => $this->session->get('id'),
							]);

							$data['status'] = "success";
							$data['message'] = $this->message('notification_created');
						}else{
							$data['message'] = $this->message('fields_required');
						}
					}elseif ($response->success == 'error') {
						$data['message'] = $this->message('server_captcha_error');
					}else{
						$data['message'] = $this->message('robot_error');
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
					$response = getCaptcha($_POST['g-recaptcha-response']);
					if ($response->success == true && $response->score > 0.5) {
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
					}elseif ($response->success == 'error') {
						$data['message'] = $this->message('server_captcha_error');
					}else{
						$data['message'] = $this->message('robot_error');
					}
				}
					
				$this->view('Dashboard/actualizarNotificacion', $data);
				
				break;

			case 'delete':
				$data['page'] = 'notificacion_delete';
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$response = getCaptcha($_POST['g-recaptcha-response']);
					if ($response->success == true && $response->score > 0.5) {
						if ($this->modelNotificacion->deleteNotificacion($id)) {
							$data['status'] = "success";
							$data['message'] = "Notificación $id eliminada";
							// redirect('Dashboard/Notificacion/');
						}else{
							$data['message'] = "Error al eliminar la notificación";
						}
					}elseif ($response->success == 'error') {
						$data['message'] = $this->message('server_captcha_error');
					}else{
						$data['message'] = $this->message('robot_error');
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
				# code...
				break;

			case 'read':
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


		$this->view('Dashboard/crearNoticia', $data);
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

			case 'read':
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

			case 'read':
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

			case 'read':
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

		

		$this->view('Dashboard/crearUsuario', $data);
	}
}
