<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class Controller
{
	private $css;
	private $js;
	private $load;

	public function __construct()
	{
		$this->css = [];
		$this->js = [];
	}

	// Cargar model
	public function model($model)
	{
		$model .= 'Model';
		require_once PATH_MODELS . "{$model}.php";
		return new $model();
	}

	// Cargar view
	public function view($view, $data = [])
	{
		// Se configura el motor de plantillas
		$loader = new Twig_Loader_Filesystem( PATH_VIEWS );
		$twig = new Twig_Environment($loader, []);

		// Se añaden las variables globales definidas por la aplicación
		$varGlobals = get_defined_constants(true);
		$twig->addGlobal('app', $varGlobals['user']);

		$data['css'] = $this->css;
		$data['js'] = $this->js;

		// Se renderiza la vista
		echo $twig->render($view . '.twig', $data);
	}

	// Cargar un helper
	public function helper($helper)
	{
		$helper .= 'Helper';
		require_once PATH_HELPERS . "{$helper}.php";
		return new $helper();
	}

	public function css($css)
	{
		$this->css[] = $css;
	}

	public function js($js)
	{
		$this->js[] = $js;
	}
}