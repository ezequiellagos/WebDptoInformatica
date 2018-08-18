<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class InvestigacionController extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index()
	{
		$data = [
			'active' => 'investigacion',
			'title' => 'Investigaciones',
		];
		
		$this->view('Inicio/investigacion', $data);
	}
}
