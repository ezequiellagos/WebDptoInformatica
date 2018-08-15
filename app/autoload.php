<?php 
// Constante para verificar el acceso correcto a los archivos
define('BASEPATH', true);

// Cargar variables globales
require_once 'config/config.php';

// Composer dependencias
require_once 'vendor/autoload.php';

// Cargar helpers que no son clases
require_once PATH_HELPERS . 'helpers_functions.php';

// Cargar librerias
spl_autoload_register(function($class){
	if(is_file(PATH_HELPERS . "{$class}.php")){
		require_once PATH_HELPERS . "{$class}.php";
	}

	if(is_file(PATH_CORE . "{$class}.php")){
		require_once PATH_CORE . "{$class}.php";
	}

	if(is_file(PATH_CONTROLLERS . "{$class}.php")){
		require_once PATH_CONTROLLERS . "{$class}.php";
	}
});
