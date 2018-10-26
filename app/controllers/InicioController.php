<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class InicioController extends Controller
{
	
	public function __construct()
	{
		$this->notificacionModel = $this->model('Notificacion');
		$this->session = $this->helper('Session');
	}

	public function index()
	{
		$data = [
			'active' => 'inicio',
			'title' => 'Departamento de Computación e Informática',
			'notificaciones' => (array) $this->notificacionModel->getNotificaciones(),
		];

		$this->view('Inicio/inicio', $data);
	}
}
