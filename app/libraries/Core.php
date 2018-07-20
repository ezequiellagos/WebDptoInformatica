<?php 

/* 
	Mapear la url del navegador
	1.- Controlador
	2.- Método
	3.- Prámetro
	Ej: Controlador/Metodo/Parametro
 */
	
/**
 * 
 */
class Core
{
	protected $controladorActual = 'home';
	protected $metodoActual = 'index';
	protected $parametros = [];

	public function __construct()
	{
		$url = $this->getUrl();
		
		// Busca si el controlador existe
		if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
			// si existe queda por defecto
			$this->controladorActual = ucwords($url[0]);
			unset($url[0]);
		}

		// Requerir controller
		require_once '../app/controllers/' . $this->controladorActual . '.php';
		$this->controladorActual = new $this->controladorActual;

		// Verificar el método
		if (isset($url[1])) {
			if (method_exists($this->controladorActual, $url[1])) {
				$this->metodoActual = $url[1];
				unset($url[1]);
			}
		}

		// Obtener parametros
		$this->parametros = $url ? array_values($url) : [];

		// callback con parametros array
		call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

	}

	public function getUrl()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}