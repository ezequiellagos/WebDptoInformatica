<?php defined('BASEPATH') or exit('No se permite el acceso directo');

// Nombre del sitio
define('NAME_SITE', 'Departamento de Computación e Informática - UPLA');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('FOLDER_PATH', '/WebDptoInformatica/');
define('ROUTE_URL', 'http://localhost' . FOLDER_PATH);

define('PATH_CONTROLLERS', ROOT . FOLDER_PATH . 'app/controllers/');
define('PATH_MODELS', ROOT . FOLDER_PATH . 'app/models/');
define('PATH_VIEWS', ROOT . FOLDER_PATH . 'app/views/');
define('PATH_HELPERS', ROOT . FOLDER_PATH . 'app/helpers/');
define('PATH_CORE', ROOT . FOLDER_PATH . 'app/core/');

define('PATH_CSS', ROOT . FOLDER_PATH . 'public/css/');

// Base de Datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'depto_informatica');
define('DB_DRIVER', 'mysql');
define('DB_CHARSET', 'UTF8');


// Desarrollo
error_reporting(E_ALL);

// Produccion
// error_reporting(0);

