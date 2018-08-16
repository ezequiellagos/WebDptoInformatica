<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class CarreraController extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index()
	{

		$data = [
			'active' => 'inicio',
		];

		$this->view('Inicio/inicio', $data);
	}

	public function informatica()
	{
		$data = [
			'active' => 'carreras',
		];

		$this->view('Inicio/informatica', $data);
	}

	public function estadistica()
	{
		$data = [
			'active' => 'carreras',
		];
		
		$this->view('Inicio/estadistica', $data);
	}
}
