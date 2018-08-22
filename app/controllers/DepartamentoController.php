<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class DepartamentoController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
	}

	public function index()
	{
		$data = [
			'active' => 'departamento',
			'title' => 'Departamento',
		];
		
		$this->view('Inicio/departamento', $data);
	}
}
