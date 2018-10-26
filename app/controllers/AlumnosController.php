<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class AlumnosController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
		$this->notificacionModel = $this->model('Notificacion');
	}

	public function index()
	{
		$data = [
			'active' => 'alumnos',
			'title' => 'Alumnos',
			'notificaciones' => (array) $this->notificacionModel->getNotificaciones(),
		];
		
		$this->view('Inicio/alumnos', $data);
	}
}
