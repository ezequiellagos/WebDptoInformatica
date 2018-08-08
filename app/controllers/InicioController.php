<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class InicioController extends Controller
{
	
	function __construct()
	{
		// $this->articuloModelo = $this->model('Ejemplo_Articulo');
	}

	public function index()
	{
		// $articulos = $this->articuloModelo->getArticulos();

		$data = [
			'nombre' => 'Javier Castillo',
		];

		$this->view('inc/header');
		$this->view('Inicio/inicio', $data);
		$this->view('inc/footer');
	}	

	public function academico()
	{
		// $articulos = $this->articuloModelo->getArticulos();

		$data = [
			'nombre' => 'Javier Castillo',
		];

		$this->view('inc/header');
		$this->view('Inicio/academico', $data);
		$this->view('inc/footer');
	}
}
