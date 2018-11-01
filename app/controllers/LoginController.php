<?php defined('BASEPATH') or exit('No se permite el acceso directo');

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
		$this->session = $this->helper('Session');
	}

	public function index($param = '')
	{
		$this->js('https://www.google.com/recaptcha/api.js?render='.RECAPTCHA_SITE_KEY);
		$data = [
			'errorMessage' => '',
			'email'        => '',
			'page' => 'login',
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['email'] = $_POST['email'];
			$pass          = $_POST['password'];

			$response = getCaptcha($_POST['g-recaptcha-response']);
			if ($response->success === true && $response->score > 0.5) {
				if ( $this->verifyEmpty($data['email'], $pass) )
				{
					$data['errorMessage'] = $this->message('email_password_required');
				}else{
					$result = $this->model->getLogin($data['email']);
					if (!$result)
						$data['errorMessage'] = $this->message('email_invalid');
					else{
						if (!password_verify($pass, $result->password))
							$data['errorMessage'] = $this->message('data_incorrect');
						else{
							// iniciar sesion
							$this->session->start();
							$this->session->add('email', $result->email);
							$this->session->add('id', $result->id);
							$this->session->add('sessionActive', true);
							redirect('Dashboard/');
						}
					}
				}
			}elseif ($response->success == 'error') {
				$data['errorMessage'] = $this->message('server_captcha_error');
			}else{
				$data['errorMessage'] = $this->message('robot_error');
			}
		}
		
		$this->view('Login/login', $data);
	}

	public function verifyEmpty($email, $pass)
	{
		return empty($email) OR empty($pass);
	}

	public function logout()
	{
		$this->session->close();
		redirect('');
	}

	public function signup()
	{
		# code...
	}

	public function hashPassword($pass)
	{
		return password_hash($pass, PASSWORD_DEFAULT);
	}

}