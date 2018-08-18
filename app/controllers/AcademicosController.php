<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class AcademicosController extends Controller
{
	
	public function __construct()
	{

	}

	public function index()
	{
		$data = [
			'active' => 'academicos',
			'title' => 'Académicos',
		];

		$this->view('Inicio/academicos', $data);
	}
}
