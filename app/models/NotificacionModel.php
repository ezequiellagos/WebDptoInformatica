<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class NotificacionModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getNotificacionById($id)
	{
		$this->db->query("SELECT * FROM notificacion WHERE id = :id");
		$this->db->bind(':id', $id);
		return $this->db->record();
	}

	public function getNotificaciones()
	{
		$this->db->query("SELECT * FROM notificacion");
		return $this->db->records();
	}

	public function addNotificacion($data)
	{
		$this->db->query('INSERT INTO notificacion (mensaje, tema) VALUES (:mensaje, :tema)');
		$this->db->bind(':mensaje', $data['mensaje']);
		$this->db->bind(':tema', $data['tema']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}

	public function updateNotificacion($data)
	{
		$this->db->query('UPDATE notificacion SET mensaje = :mensaje, tema = :tema WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':mensaje', $data['mensaje']);
		$this->db->bind(':tema', $data['tema']);

		if ($this->db->execute())
			return true;
		else
			return false;
	}

	public function deleteNotificacion($id)
	{
		$this->db->query('DELETE FROM notificacion WHERE id = :id');
		$this->db->bind(':id', $id);

		if ($this->db->execute())
			return true;
		else
			return false;
	}
}