<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class PerfilController extends Controller
{
	
	public function __construct()
	{
		$this->session = $this->helper('Session');
		$this->session->validate('');
	}

	public function index()
	{

		$data = [
			'active' => 'perfil',
		];
		
		$this->view('Dashboard/perfil', $data);
	}
}
