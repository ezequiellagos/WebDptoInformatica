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

// reCaptcha V3 validación
if(!function_exists('getCaptcha')){
	function getCaptcha($secretKey){
		$response = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".RECAPTCHA_SECRET_KEY."&response={$secretKey}&remoteip={$_SERVER['REMOTE_ADDR']}");
		if ($response === false) {
			$response = '{"success":"error"}';
		}
		$response = json_decode($response);
		return $response;
	}
}
