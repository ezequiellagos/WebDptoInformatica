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

	public function getAllNotificaciones()
	{
		$this->db->query("SELECT n.id, n.tema, n.mensaje, n.fecha_creacion, u.nombre, u.apellido FROM notificacion n LEFT JOIN usuario u ON n.usuario_id = u.id ORDER BY n.fecha_creacion DESC LIMIT 100");
		return $this->db->records();
	}

	public function getNotificaciones()
	{
		$this->db->query("SELECT * FROM notificacion ORDER BY fecha_creacion DESC LIMIT 10");
		return $this->db->records();
	}

	public function addNotificacion($data)
	{
		$this->db->query('INSERT INTO notificacion (mensaje, tema, usuario_id) VALUES (:mensaje, :tema, :usuario_id)');
		$this->db->bind(':mensaje', $data['mensaje']);
		$this->db->bind(':tema', $data['tema']);
		$this->db->bind(':usuario_id', $data['usuario_id']);

		return $this->db->execute();
	}

	public function updateNotificacion($data)
	{
		$this->db->query('UPDATE notificacion SET mensaje = :mensaje, tema = :tema WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':mensaje', $data['mensaje']);
		$this->db->bind(':tema', $data['tema']);

		return $this->db->execute();
	}

	public function deleteNotificacion($id)
	{
		$this->db->query('DELETE FROM notificacion WHERE id = :id');
		$this->db->bind(':id', $id);

		return $this->db->execute();
	}
}