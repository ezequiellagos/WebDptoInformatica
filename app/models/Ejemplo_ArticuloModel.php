<?php

/**
 * 
 */
class Ejemplo_ArticuloModel extends DBConnect
{
	private $db;
	
	function __construct()
	{
		$this->db = new DBConnect();
	}

	public function getArticulos()
	{
		$this->db->query("SELECT * FROM articulo");
		return $this->db->records();
	}
}