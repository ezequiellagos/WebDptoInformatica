<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class SignupModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function addUser($data)
	{
		$this->db->query('INSERT INTO usuario (nombre, apellido, email, password) VALUES (:nombre, :apellido, :email, :password)');

		$this->db->bind(':nombre', $data['nombre']);
		$this->db->bind(':apellido', $data['apellido']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':password', $data['password']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}
}