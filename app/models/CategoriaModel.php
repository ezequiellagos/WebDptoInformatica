<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class CategoriaModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getCategoriaById($id)
	{
		$this->db->query("SELECT * FROM categoria WHERE id = :id");
		$this->db->bind(':id', $id);
		return $this->db->record();
	}

	public function getCategorias()
	{
		$this->db->query("SELECT * FROM categoria");
		return $this->db->records();
	}

	public function addCategoria($data)
	{
		$this->db->query('INSERT INTO categoria (nombre, descripcion) VALUES (:nombre, :descripcion)');
		$this->db->bind(':nombre', $data['nombre']);
		$this->db->bind(':descripcion', $data['descripcion']);

		return $this->db->execute();
	}

	public function updateCategoria($data)
	{
		$this->db->query('UPDATE categoria SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':nombre', $data['nombre']);
		$this->db->bind(':descripcion', $data['descripcion']);

		return $this->db->execute();
	}

	public function deleteCategoria($id)
	{
		$this->db->query('DELETE FROM categoria WHERE id = :id');
		$this->db->bind(':id', $id);

		return $this->db->execute();
	}
}