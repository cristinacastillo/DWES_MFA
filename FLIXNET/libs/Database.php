<?php

	// Antonio José Sánchez Bujaldón
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Database 
	{
		private $host = "localhost" ;

		private $dbName ;
		private $dbUser ;
		private $dbPass ;

		private $sqli = null ;
		private $result = null ;
		private static $instance = null ;

		/**
		 * @param $dbu  - usuario
		 * @param $dbp  - contraseña
		 * @param $dbn  - nombre de la base de datos
		 */
		private function __construct($dbu, $dbp, $dbn) 
		{
			$this->dbUser = $dbu ;
			$this->dbPass = $dbp ;
			$this->dbName = $dbn ;

			//
			$this->connect() ;
		}

		/**
		 * destructor de la clase
		 */
		public function __destruct()
		{
			$this->sqli->close() ;
		}

		/**
		 * utilizamos el patrón de diseño SINGLETON que nos permitirá
		 * tener una única instancia de la clase DATABASE.
		 *
		 * @param $dbu 
		 * @param $dbp
		 * @param $dbn
		 */
		public static function getInstance($dbu, $dbp, $dbn)
		{
			// si no existe instancia la creamos
			if (Database::$instance==null) 
				Database::$instance = new Database($dbu, $dbp, $dbn) ;

			// devolvemos la instancia
			return Database::$instance ;
		}

		/*
		 * hacemos privado el método para evitar clonaciones
		 */
		private function __clone() { }

		/**
		 * Establecer una conexión con el motor de bases de datos
		 */
		private function connect()
		{
			// conectamos
			$this->sqli = new mysqli($this->host, $this->dbUser, $this->dbPass) 
						  or die("ERROR: Ha fallado la conexión con la base de datos.") ; 

			// elegimos la base de datos
			$this->sqli->select_db($this->dbName) ;

			// seleccionar el tipo de codificación
			$this->sqli->set_charset("utf8") ;
		}

		/**
		 * realizamos una consulta y devolvemos: true si la consulta
		 * se ha hecho con éxito y/o hay resultado; false en otro caso.
		 * 
		 * @param $sql
		 * @return 
		 */
		public function query($sql):bool
		{
			// lanzamos la consulta
			$this->result = $this->sqli->query($sql) 
								or die("ERROR: se ha producido un error de acceso a la base de datos") ;

			// devolvemos TRUE cuando:
			// - hacemos un SELECT y obtenemos resultado
			// - hacemos un INSERT, UPDATE, DELETE correctamente
			// 
			// devolvemos FALSE cuando:
			// - se produce un error en la consulta
			if (is_object($this->result))
				return ($this->result->num_rows > 0) ;

			// si no es un objeto
			return $this->result ;
		}

		/**
		 * devuelve el resultado de la consulta en formato
		 * de objeto.
		 *
		 * @param $cls (optativo, valor por defecto stdClass)
		 * @return
		 */
		public function getObject($cls = "StdClass")
		{
			if (is_null($this->result)) return null ;

			// si tenemos un resultado, lo devolvemos
			return $this->result->fetch_object($cls) ;
		}

		/**
		 */
		public function getAll()
		{
			if (is_null($this->result)) return null ;

			// si tenemos un resultado, devolvemos un array con todos
			// los registros que se hayan encontrado.
			return $this->result->fetch_all(MYSQLI_ASSOC) ;
		}

		/**
		 * @return int
		 */
		public function getNumRows():int
		{
			return $this->result->num_rows ; 
		}

		/**
		 * Cuando el objeto se deserializa, conectamos de nuevo
		 * con el motor de base de datos.
		 */
		public function __wakeup()
		{
			$this->connect() ;
		}

	}












