<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class InicioController extends Controller
{
	
	public function __construct()
	{
		// $this->articuloModelo = $this->model('Ejemplo_Articulo');
	}

	public function index()
	{
		// $articulos = $this->articuloModelo->getArticulos();

		$data = [
			'active' => 'inicio',
			'title' => 'Departamento de Computación e Informática',
		];

		$this->view('Inicio/inicio', $data);
	}
}
