<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class AlumnosController extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index()
	{
		$data = [
			'active' => 'alumnos',
			'title' => 'Alumnos',
		];
		
		$this->view('Inicio/alumnos', $data);
	}
}