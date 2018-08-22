<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class UsuarioModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getUsuarioById($id)
	{
		$this->db->query("SELECT * FROM usuario WHERE id = :id");
		$this->db->bind(':id', $id);
		return $this->db->record();
	}

	public function getUsuarioByEmail($email)
	{
		$this->db->query("SELECT * FROM usuario WHERE email = :email");
		$this->db->bind(':email', $email);
		return $this->db->record();
	}

	public function getUsuarios()
	{
		$this->db->query("SELECT nombre, apellido, email, fecha_creacion, fecha_modificacion FROM usuario");
		return $this->db->records();
	}

	public function addUsuario($data)
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

	public function updateUsuario($data)
	{
		$this->db->query('UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :email WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':nombre', $data['nombre']);
		$this->db->bind(':apellido', $data['apellido']);
		$this->db->bind(':email', $data['email']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}

	public function updatePassword($data)
	{
		$this->db->query('UPDATE usuario SET password = :password WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':password', $data['password']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}

	public function deleteUsuario($id)
	{
		$this->db->query('DELETE FROM usuario WHERE id = :id');
		$this->db->bind(':id', $id);

		if ($this->db->execute())
			return true;
		else
			return false;
	}
}