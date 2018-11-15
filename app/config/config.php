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

define('PATH_CSS', ROUTE_URL . 'css/');
define('PATH_JS', ROUTE_URL . 'js/');


// Base de Datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'depto_informatica');
define('DB_DRIVER', 'mysql');
define('DB_CHARSET', 'UTF8');


// Desarrollo
define('APP_DEGUB', true);
error_reporting(E_ALL);

// Produccion
// define('APP_DEGUB', false);
// error_reporting(0);


// reCaptcha V3
define('RECAPTCHA_SITE_KEY', '6LeZlncUAAAAAO-iXhFcC8n0mzHSndLFsmBE5C2B');
define('RECAPTCHA_SECRET_KEY', '6LeZlncUAAAAANYl3gqGKGoDMUXNHYEHTs7mM5e7');


// Mensajes
define('MESSAGES', [
	'email_password_required' => 'El email y password son obligatorios',
	'email_invalid' => 'Email no válido',
	'data_incorrect' => 'Datos incorrectos',
	'server_captcha_error' => 'Ocurrio un error con el servidor de validación. Intenta en un par de minutos.',
	'robot_error' => 'Creemos que eres un robot. Si no es así contacta con el administrador',
	'fields_required' => 'Por favor llena los campos requeridos',
	'notification_created' => 'Notificación creada',
	'' => '',
	'' => '',
]);


// Se define la zona horaria
date_default_timezone_set('America/Santiago');
