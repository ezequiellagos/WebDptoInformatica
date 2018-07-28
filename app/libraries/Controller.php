<?php 
defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class Controller
{
	// Cargar model
	public function model($model)
	{
		require_once PATH_MODELS . "{$model}.php";
		return new $model();
	}

	// Cargar view
	public function view($view, $data = [])
	{
		if (file_exists(PATH_VIEWS . "${view}.php")) {
			extract($data);
			require_once PATH_VIEWS . "${view}.php";
		}else{
			die('La vista no existe');
		}
	}
}