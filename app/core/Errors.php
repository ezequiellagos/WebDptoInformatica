<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class Errors
{
	private $loader;
	private $twig;
	private $varGlobals;
	
	public function __construct()
	{
		// Se configura el motor de plantillas
		$this->loader = new Twig_Loader_Filesystem( PATH_VIEWS );
		$this->twig = new Twig_Environment($this->loader, []);

		// Se añaden las variables globales definidas por la aplicación
		$this->varGlobals = get_defined_constants(true);
		$this->twig->addGlobal('app', $this->varGlobals['user']);

	}

	public function controllerNotFound()
	{
		echo $this->twig->render('errors/404' . '.twig', []);
	}

	public function methodNotFound()
	{
		echo $this->twig->render('errors/404' . '.twig', []);
		die();
	}
}
