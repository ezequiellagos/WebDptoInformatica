<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class AcademicosController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
		$this->academicoModel = $this->model('Academico');
		$this->notificacionModel = $this->model('Notificacion');
	}

	public function index()
	{
		$resultado = $this->academicoModel->getAcademicos();

		$data = [
			'active' => 'academicos',
			'title' => 'Académicos',
			'academicos' => $resultado,
			'notificaciones' => (array) $this->notificacionModel->getNotificaciones(),
		];

		$this->view('Inicio/academicos', $data);
	}

	public function academico($id = '')
	{
		if (empty($id)) {
			return $this->index();
		}
		
		$resultado = $this->academicoModel->getAcademicoById($id);

		$data = [
			'active' => 'academicos',
			'title' => $resultado->nombre,
			'academico' => $resultado,
			'notificaciones' => (array) $this->notificacionModel->getNotificaciones(),
		];
		$this->view('Inicio/academico', $data);
	}
}
