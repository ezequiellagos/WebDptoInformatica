<?php

// Para redireccionar la página
function redirect($page){
	header('location: ' . ROUTE_URL . $page);
}