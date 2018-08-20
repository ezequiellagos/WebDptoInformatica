<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class AcademicosController extends Controller
{
	
	public function __construct()
	{
		$this->academicoModel = $this->model('Academico');
	}

	public function index()
	{
		$resultado = $this->academicoModel->getAcademicos();

		$data = [
			'active' => 'academicos',
			'title' => 'Académicos',
			'academicos' => $resultado,
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
		];
		$this->view('Inicio/academico', $data);
	}
}
