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

// Crea y asigna variables que vienen desde $_POST con el mismo nombre
if (!function_exists('loadPost')) {
	function loadPost($expected = []) {
		foreach($expected as $key){
			if(!empty($_POST[$key])){
				${key}=$_POST[$key];
			}
			else{
				${key}=NULL;
			}
		}
	}
}