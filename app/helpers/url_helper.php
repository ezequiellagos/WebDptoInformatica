<?php

// Para redireccionar la página
if(!function_exists('redirect')){
	function redirect($page){
		header('location: ' . ROUTE_URL . $page);
	}
}
