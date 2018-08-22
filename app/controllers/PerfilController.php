<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class PerfilController extends Controller
{
	public $messageInfo;
	public $messageStatus;
	public $messageControl;
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
		$this->session->validate('');

		$this->model = $this->model('Usuario');
	}

	public function index()
	{
		$result = $this->model->getUsuarioById($this->session->get('id'));

		$data = [
			'active' => 'perfil',
			'messageInfo' => $this->messageInfo,
			'messageStatus' => $this->messageStatus,
			'messageControl' => $this->messageControl,

			'nombre' => $result->nombre,
			'apellido' => $result->apellido,
			'email' => $result->email,
		];
		
		$this->view('Dashboard/perfil', $data);
	}

	public function updatePassword()
	{
		if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
			$this->index();
		}

		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$repeat_new_pass = $_POST['repeat_new_pass'];
		
		$this->messageControl = 'cambiarPassword';
		$this->messageStatus = 'danger';
		$result = $this->model->getUsuarioById($this->session->get('id'));
			
		if (!empty($new_pass) AND (strcmp($new_pass, $repeat_new_pass) === 0)) {
			if (password_verify($old_pass, $result->password)) {
				$new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

				if ($this->model->updatePassword(['id' => $this->session->get('id'), 'password' => $new_pass])) {
					$this->messageInfo = 'Contraseña Actualizada';
					$this->messageStatus = 'success';
				}else{
					$this->messageInfo = 'Error al Actualizar Contraseña';
				}
			}else{
				$this->messageInfo = 'Contraseña Errónea';
			}
		}else{
			$this->messageInfo = 'Contraseñas No Coinciden';
		}

		$this->index();

	}

	public function updateUser()
	{
		if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
			$this->index();
		}

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];

		$this->messageControl = 'cambiarDatos';
		$this->messageStatus = 'danger';

		if (!empty($nombre) AND !empty($apellido) AND !empty($email)) {
			if ($this->model->updateUsuario(['id' => $this->session->get('id'), 'nombre' => $nombre, 'apellido' => $apellido, 'email' => $email])) {
				$this->messageInfo = 'Datos Actualizados';
				$this->messageStatus = 'success';
			}else{
				$this->messageInfo = 'Error al Actualizar Datos';
			}
		}else{
			$this->messageInfo = 'Faltan Campos Obligatorios';
		}

		$this->index();
	}
}
