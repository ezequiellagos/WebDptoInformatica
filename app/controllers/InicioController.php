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
			'nombre' => '',
		];

		$this->view('Inicio/inicio', $data);
	}	

	public function academicos()
	{

		$data = [
			'nombre' => '',
		];

		$this->view('Inicio/academico', $data);
	}
}
