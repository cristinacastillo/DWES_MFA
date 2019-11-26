<?php

	require_once("Database.php") ;
	require_once("Usuario.php") ;

	class Sesion
	{
		private $usuario ; 
		private $time_expire = 30000 ;				// segundos
		private static $instancia = null ;

		/**
		 */
		private function __construct() { }

		/**
		 */
		private function __clone() { }	

		/**
		 */
		public function getUsuario() 
		{
			return $this->usuario ;
		}

		/**
		 */
		public function updateUsuario(Usuario $usr) 
		{

			// 1. actualice el usuario en la base de datos
			// ...

			// 2. actualice el usuario en la sesión
			$this->usuario = $usr ;


		}

		/**
		 */
		public function close()
		{
			// vaciamos las variables de sesión
			$_SESSION = [] ;

			// destruir la sesión
			session_destroy() ;
		}

		/**
		 */
		public static function getInstance()
		{
			session_start() ;

			// comprobamos 
			if (isset($_SESSION["_sesion"])):
				self::$instancia = unserialize($_SESSION["_sesion"] ) ;
			else:
				if (self::$instancia===null) 
					self::$instancia = new Sesion() ;
			endif ;

			// devolvemos la instancia
			return self::$instancia ;
		}

		/**
		 */
		public function login(string $ema, string $pas):bool
		{
			// instanciar la clase Database
			$db = Database::getInstance("root","","flixnet") ;

			// buscamos el usuario
			//$sql  = "SELECT * FROM usuario WHERE email=:ema AND pass=MD5(:pas) ; " ;
			$sql = "SELECT * FROM usuario WHERE email='$ema' AND pass=MD5('$pas') ;" ;

			if ($db->query($sql)):

				// rescatar la información del usuario
				$this->usuario = $db->getObject("Usuario") ;

				// si el usuario es correcto, iniciamos la sesión
				// guardamos el momento (segs.) en que se inicia
				// la sesión
				$_SESSION["time"]    = time() ;
				$_SESSION["_sesion"] = serialize(self::$instancia) ;

				// la sesión se ha iniciado
				return true ;

			endif ;

			// la sesión no se ha iniciado
			return false ;
		}

		/**
		 * @return bool
		 */
		public function isExpired():bool
		{
			return (time() - $_SESSION["time"] > $this->time_expire) ;
		}

		/**
		 * @return bool
		 */
		public function isLogged():bool
		{
			return !empty($_SESSION) ;
		}

		/**
		 * @return bool
		 */
		public function checkActiveSession():bool
		{
			if ($this->isLogged())
				if (!$this->isExpired()) return true ;
			//
			return false ;
		}

		/**
		 */
		public function redirect(string $url)
		{
			header("Location: $url") ;
			die() ;
		}

		/**
		 */
		public function __sleep()
		{
			return ["usuario", "instancia"] ;
		}

	}




