<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class CarreraController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
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
			'title' => 'Ingeniería Informática',
		];

		$this->view('Inicio/informatica', $data);
	}

	public function estadistica()
	{
		$data = [
			'active' => 'carreras',
			'title' => 'Ingeniería en Estadística',
		];
		
		$this->view('Inicio/estadistica', $data);
	}
}
