<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class DocumentosController extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index()
	{
		$data = [
			'active' => 'documentos',
		];
		
		$this->view('Inicio/documentos', $data);
	}
}
