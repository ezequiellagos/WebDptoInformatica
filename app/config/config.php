<?php
// Constante para verificar el acceso correcto a los archivos
define('BASEPATH', true);

// Nombre del sitio
define('NAME_SITE', 'Departamento de Computación e Informática - UPLA');


// Ruta aplicación | al parecer no se esta usando, deberia desaparecer en un futuro
define('ROUTE_APP', str_replace('\\', '/', dirname(dirname(__FILE__))) . "/");


define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('FOLDER_PATH', '/WebDptoInformatica/');
define('ROUTE_URL', 'http://localhost' . FOLDER_PATH);

define('PATH_CONTROLLERS', ROOT . FOLDER_PATH . 'app/controllers/');
define('PATH_MODELS', ROOT . FOLDER_PATH . 'app/models/');
define('PATH_VIEWS', ROOT . FOLDER_PATH . 'app/views/');
define('PATH_HELPERS', ROOT . FOLDER_PATH . 'app/helpers/');
define('PATH_LIBRARIES', ROOT . FOLDER_PATH . 'app/libraries/');

// Base de Datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'depto_informatica');
define('DB_DRIVER', 'mysql');
define('DB_CHARSET', 'UTF8');
