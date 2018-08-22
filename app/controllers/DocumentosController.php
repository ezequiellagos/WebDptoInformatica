<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class DocumentosController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
	}

	public function index()
	{
		$data = [
			'active' => 'documentos',
			'title' => 'Documentos',
		];
		
		$this->view('Inicio/documentos', $data);
	}
}
