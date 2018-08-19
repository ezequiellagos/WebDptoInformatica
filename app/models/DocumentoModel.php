<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class DocumentoModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getDocumentos()
	{
		$this->db->query("SELECT * FROM documento WHERE activo = :activo");
		$this->db->bind(':activo', 1);
		return $this->db->records();
	}

	public function addDocumento($data)
	{
		$this->db->query('INSERT INTO documento (nombre, descripcion, url) VALUES (:nombre, :descripcion, :url)');
		$this->db->bind(':nombre', $data['nombre']);
		$this->db->bind(':descripcion', $data['descripcion']);
		$this->db->bind(':url', $data['url']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}
}