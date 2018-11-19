<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * 
 */
class NoticiaModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getNoticiaById($id)
	{
		$this->db->query("SELECT * FROM noticia WHERE id = :id");
		$this->db->bind(':id', $id);
		return $this->db->record();
	}

	public function getNoticiaBySlug($slug)
	{
		$this->db->query("SELECT * FROM noticia WHERE slug = :slug");
		$this->db->bind(':slug', $slug);
		return $this->db->record();
	}

	public function getNoticias()
	{
		$this->db->query("SELECT * FROM noticia");
		return $this->db->records();
	}

	public function addNoticia($data)
	{
		$this->db->query('INSERT INTO noticia (titulo, cuerpo, url_imagen, slug, usuario_id,categoria_id) VALUES (:titulo, :cuerpo, :url_imagen, :slug, :usuario_id, :categoria_id)');
		$this->db->bind(':titulo', $data['titulo']);
		$this->db->bind(':cuerpo', $data['cuerpo']);
		$this->db->bind(':url_imagen', $data['url_imagen']);
		$this->db->bind(':slug', $data['slug']);
		$this->db->bind(':usuario_id', $data['usuario_id']);
		$this->db->bind(':categoria_id', $data['categoria_id']);

		return $this->db->execute();
	}

	public function updateNoticia($data)
	{
		$this->db->query('UPDATE noticia SET titulo = :titulo, cuerpo = :cuerpo, url_imagen = :url_imagen, slug = :slug WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':titulo', $data['titulo']);
		$this->db->bind(':cuerpo', $data['cuerpo']);
		$this->db->bind(':url_imagen', $data['url_imagen']);
		$this->db->bind(':slug', $data['slug']);

		return $this->db->execute();
	}

	public function deleteNoticia($id)
	{
		$this->db->query('DELETE FROM noticia WHERE id = :id');
		$this->db->bind(':id', $id);

		return $this->db->execute();
	}
}