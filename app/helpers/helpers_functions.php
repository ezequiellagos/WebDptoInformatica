<?php defined('BASEPATH') or exit('No se permite el acceso directo');

// Para redireccionar la página
if(!function_exists('redirect')){
	function redirect($page){
		header('location: ' . ROUTE_URL . $page);
	}
}

// Limpiar input de caracteres especiales y comillas. Los reemplaza pero no  los elimina
if(!function_exists('escapeCharacters')){
	function escapeCharacters($string){
		return htmlspecialchars(trim($string), ENT_COMPAT | ENT_QUOTES);
	}
}