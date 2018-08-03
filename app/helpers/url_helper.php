<?php defined('BASEPATH') or exit('No se permite el acceso directo');

// Para redireccionar la página
if(!function_exists('redirect')){
	function redirect($page){
		header('location: ' . ROUTE_URL . $page);
	}
}
