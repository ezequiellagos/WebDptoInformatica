<?php
defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class LoginModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getLogin($email)
	{
		$this->db->query("SELECT email, password FROM usuario WHERE email = :email");
		$this->db->bind(':email', $email);
		return $this->db->record();
	}
}