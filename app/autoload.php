<?php 

// Cargar variables globales
require_once 'config/config.php';

// Cargar helpers
require_once 'helpers/url_helper.php';

// Cargar librerias
spl_autoload_register(function($nameClass){
	require_once 'libraries/' . $nameClass . '.php';
});