<?php 
defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class LoginController extends Controller
{
	private $model;
	private $session;
	
	public function __construct()
	{
		$this->model = $this->model('Login');
		$this->session = new Session();
	}

	public function index($param = '')
	{

		var_dump($this->session->getStatus());

		$data = [
			'errorMessage' => '',
			'email'        => '',
		];
		$this->view('inc/header');
		$this->view('Login/login', $data);
		$this->view('inc/footer');
	}

	public function login()
	{
		$email        = $_POST['email'];
		$pass         = $_POST['password'];
		$errorMessage = '';

		var_dump($this->verify($email, $pass));

		if ( $this->verify($email, $pass) )
			$errorMessage = "El email y password son obligatorios";
		else{
			$result = $this->model->getLogin($email);
			if (!$result)
				$errorMessage = "Email no válido";
			else{
				if (!password_verify($pass, $result->password))
					$errorMessage = "Datos incorrectos";
				else{
					// iniciar sesion
					$this->session->start();
					$this->session->add('email', $result->email);
					
					// redirect('Dashboard/');
					// header('location: /mvc2/main');
				}
			}
				
		}

		$data = [ 'errorMessage' => $errorMessage, 'email' => $email ];
		$this->view('inc/header');
		$this->view('Login/login', $data);
		$this->view('inc/footer');
	}

	public function verify($email, $pass)
	{
		return empty($email) OR empty($pass);
	}

	public function logout()
	{
		$this->session->close();
		redirect('');
	}

	public function signIn()
	{
		# code...
	}

	public function hashPassword($pass)
	{
		return password_hash($pass, PASSWORD_DEFAULT);
	}

}