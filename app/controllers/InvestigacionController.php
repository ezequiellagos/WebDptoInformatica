<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class InvestigacionController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
		$this->notificacionModel = $this->model('Notificacion');
	}

	public function index()
	{
		$data = [
			'active' => 'investigacion',
			'title' => 'Investigaciones',
			'notificaciones' => (array) $this->notificacionModel->getNotificaciones(),
		];
		
		$this->view('Inicio/investigacion', $data);
	}
}
