<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class DashboardController extends Controller
{
	
	public function __construct()
	{
		
	}

	public function index()
	{
		$data = [
			'active' => 'contacto',
		];
		
		$this->view('Dashboard/index', $data);
	}
}
