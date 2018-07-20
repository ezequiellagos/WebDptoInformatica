<?php 

/**
 * 
 */
class Home extends Controller
{
	
	function __construct()
	{
		// $this->articuloModelo = $this->model('Ejemplo_Articulo');
	}

	public function index()
	{
		// $articulos = $this->articuloModelo->getArticulos();

		$data = [
			'titulo' => 'Bienvenido',
		];

		$this->view('inc/header');
		$this->view('home/inicio', $data);
		$this->view('inc/footer');
	}
}
