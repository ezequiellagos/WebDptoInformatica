<?php

/**
 * 
 */
class Session
{
	private static $loginPhrase = "On";
	public $timeLogin = 600;

	public function __construct()
	{
		# code...
	}

	// Inicializa la sesión
	public function start()
	{
		session_start([
			'name' => 'DeptoInformatica',
			'cookie_secure' => false,
		]);
		$_SESSION['login']     = self::$loginPhrase;
		$_SESSION['dateLogin'] = date("Y-n-j H:i:s");
		$_SESSION["timeLogin"] = $this->timeLogin;
	}

	// Valida que la sesión este aún vigente
	public function validate()
	{
		if(isset($_SESSION['login'])){
			$dateOld = $_SESSION['dateLogin'];
			$dateNow = date("Y-n-j H:i:s");
			if($_SESSION['login'] !== self::$loginPhrase){				
				redirect('inicio');
			}else{
				$timeElapsed = (strtotime($dateNow) - strtotime($dateOld));
				if($timeElapsed >= $_SESSION['timeLogin']){
					$this->close();
					redirect('inicio');
				}else{
					$_SESSION['dateLogin'] = $dateNow;
				}
			}
		}else{
			redirect('inicio');
		}
	}

	// Agrega un elemento a la session
	public function add($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	// Retorna un elemento de la session
	public function get($key)
	{
		return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
	}

	// Retorna todos los valores de la session
	public function getAll()
	{
		return $_SESSION;
	}

	// remueve un elemento de la sesion
	public function remove($key)
	{
		if (!empty($_SESSION[$key]))
			unset($_SESSION[$key]);
	}

	// Cierra la sesion eliminando los valores
	public function close()
	{
		session_unset();
		session_destroy();
		$_SESSION = [];
	}

	// Retorna el estatus de la sesion
	public function getStatus()
	{
		return session_status();
	}
}