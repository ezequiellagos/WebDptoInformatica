<?php defined('BASEPATH') or exit('No se permite el acceso directo');

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

	public function addUser($data)
	{
		$this->db->query('INSERT INTO usuarios (nombre, email, telefono) VALUES (:nombre, :email, :telefono)');

		$this->db->bind(':nombre', $data['nombre']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':telefono', $data['telefono']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}
}