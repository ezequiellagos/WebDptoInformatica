<?php defined('BASEPATH') or exit('No se permite el acceso directo');

/**
 * Conexión a la base de datos
 */
class DBConnect
{
	private $host    = DB_HOST;
	private $user    = DB_USER;
	private $pass    = DB_PASS;
	private $name    = DB_NAME;
	private $driver  = DB_DRIVER;
	private $charset = DB_CHARSET;

	private $dbh;
	private $stmt;
	private $error;

	public function __construct()
	{
		$dsn = $this->driver . ':host=' . $this->host . ';dbname=' . $this->name . ';charset=' . $this->charset;
		$options = array(
			PDO::ATTR_PERSISTENT => true, // para evitar fallos dejar en false
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			// $this->dbh->exec('set names utf8');
		} catch (PDOException $e) {
			if (APP_DEGUB) {
				$this->error = $e->getMessage();
				echo "<pre>";
				echo $this->error;
				echo "<br>";
				echo "<br>";
				echo $e;
				echo "</pre>";
			} else {
				echo "Ocurrio un error con la base de datos. Porfavor contacte con el administrador";
				echo "<br><a href='".ROUTE_URL."'>Volver</a>";
				die();
			}
		}
	}

	// Prepara consulta
	public function query($sql)
	{
		$this->stmt = $this->dbh->prepare($sql);
	}

	// Vincula la consulta con bind
	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	// Ejecuta la consulta
	public function execute()
	{
		try {
			return $this->stmt->execute();
		} catch (PDOException $e) {
			if (APP_DEGUB) {
				echo "<pre>";
				echo $e;
				echo "</pre>";
				return false;
			} else {
				echo "<p>Alguien rompió algo! No se preocupe, no fue usted. <br> Porfavor comuníquese con el administrador del sitio</p>";
				return false;
			}
			
			
		}	
	}

	// Obtiene registros
	public function records()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// Obtiene un solo registro
	public function record()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	// Obtiene cantidad de registros
	public function rowCount()
	{
		return $this->stmt->rowCount();
	}
}