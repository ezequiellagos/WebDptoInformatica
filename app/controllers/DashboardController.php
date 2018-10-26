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

	public function crearNotificacion()
	{
		$data = [
			'active' => 'notificacion',
			'message' => '',
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['tema']) && !empty($_POST['mensaje'])) {
				$this->modelNotificacion = $this->model('Notificacion');
			
				$this->modelNotificacion->addNotificacion([
					'tema' => $_POST['tema'],
					'mensaje' => $_POST['mensaje'],
					'usuario_id' => $this->session->get('id'),
				]);

				$data['message'] = "Notificación enviada";
			}
		}
		
		$this->view('Dashboard/crearNotificacion', $data);
	}

	public function crearNoticia()
	{
		$data = [
			'active' => 'noticia',
		];
		$this->view('Dashboard/crearNoticia', $data);
	}

	public function agregarDocumentos()
	{
		$data = [
			'active' => 'documento',
		];
		$this->view('Dashboard/crearDocumento', $data);
	}

	public function calendarioAcademico()
	{
		$data = [
			'active' => 'calendario',
		];
		$this->view('Dashboard/calendarioAcademico', $data);
	}

	public function crearUsuario()
	{
		$data = [
			'active' => 'usuario',
		];
		$this->view('Dashboard/crearUsuario', $data);
	}
}
