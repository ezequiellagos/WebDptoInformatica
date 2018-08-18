<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class ContactoController extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index()
	{
		$data = [
			'active' => 'contacto',
			'title' => 'Contacto',
		];
		
		$this->view('Inicio/contacto', $data);
	}
}
