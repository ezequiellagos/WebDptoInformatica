<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class Controller
{
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
		if (file_exists(PATH_VIEWS . "{$view}.php")) {
			extract($data);
			require_once PATH_VIEWS . "{$view}.php";
		}else{
			die('La vista no existe');
		}
	}

	// Cargar un helper
	public function helper($helper)
	{
		$helper .= 'Helper';
		require_once PATH_HELPERS . "{$helper}.php";
		return new $helper();
	}
}