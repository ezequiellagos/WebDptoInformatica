<?php 

// Cargar variables globales
require_once 'config/config.php';

// Cargar helpers que no son clases
require_once PATH_HELPERS . 'url_helper.php';
require_once PATH_HELPERS . 'clean_input_helper.php';

// Cargar librerias
spl_autoload_register(function($class){
	if(is_file(PATH_HELPERS . "{$class}.php")){
		require_once PATH_HELPERS . "{$class}.php";
	}

	if(is_file(PATH_LIBRARIES . "{$class}.php")){
		require_once PATH_LIBRARIES . "{$class}.php";
	}
});