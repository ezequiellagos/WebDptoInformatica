<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class SignupController extends Controller
{
	private $model;
	private $session;
	
	public function __construct()
	{
		$this->model = $this->model('Signup');
		$this->session = new Session();
	}

	public function index($param = '')
	{
		$data = [
			'errorMessage' => '',
			'email'        => '',
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['email'] = $_POST['email'];
			$pass          = $_POST['password'];

			if ( $this->verifyEmpty($data['email'], $pass) )
				$data['errorMessage'] = "El email y password son obligatorios";
			else{
				$result = $this->model->getLogin($data['email']);
				if (!$result)
					$data['errorMessage'] = "Email no válido";
				else{
					if (!password_verify($pass, $result->password))
						$data['errorMessage'] = "Datos incorrectos";
					else{
						// iniciar sesion
						$this->session->start();
						$this->session->add('email', $result->email);
						
						// redirect('Dashboard/');
						// header('location: /mvc2/main');
					}
				}
					
			}
		}
		
		$this->view('inc/header');
		$this->view('Signup/signup', $data);
		$this->view('inc/footer');
	}

	public function verifyEmpty($email, $pass)
	{
		return empty($email) OR empty($pass);
	}

	public function hashPassword($pass)
	{
		return password_hash($pass, PASSWORD_DEFAULT);
	}

}