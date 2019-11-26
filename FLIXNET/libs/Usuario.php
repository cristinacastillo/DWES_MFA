<?php

	// Antonio José Sánchez Bujaldón
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Usuario
	{
		private $idUsu ;
		private $email ;
		private $nombre ;
		private $apellidos ;
		private $fec_nacimiento ;
		private $foto ;
		private $es_admin ;

		/**
		 */
		public function __construct() { }

	    /**
	     * @return mixed
	     */
	    public function getIdUsu()
	    {
	        return $this->idUsu;
	    }

	    /**
	     * @param mixed $idUsu
	     *
	     * @return self
	     */
	    public function setIdUsu($idUsu)
	    {
	        $this->idUsu = $idUsu;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }

	    /**
	     * @param mixed $email
	     *
	     * @return self
	     */
	    public function setEmail($email)
	    {
	        $this->email = $email;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    /**
	     * @param mixed $nombre
	     *
	     * @return self
	     */
	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getApellidos()
	    {
	        return $this->apellidos;
	    }

	    /**
	     * @param mixed $apellidos
	     *
	     * @return self
	     */
	    public function setApellidos($apellidos)
	    {
	        $this->apellidos = $apellidos;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getFecNacimiento()
	    {
	        return $this->fec_nacimiento;
	    }

	    /**
	     * @param mixed $fec_nacimiento
	     *
	     * @return self
	     */
	    public function setFecNacimiento($fec_nacimiento)
	    {
	        $this->fec_nacimiento = $fec_nacimiento;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getFoto()
	    {
	        return $this->foto;
	    }

	    /**
	     * @param mixed $foto
	     *
	     * @return self
	     */
	    public function setFoto($foto)
	    {
	        $this->foto = $foto;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getEsAdmin()
	    {
	        return $this->es_admin;
	    }

	    /**
	     * @param mixed $es_admin
	     *
	     * @return self
	     */
	    public function setEsAdmin($es_admin)
	    {
	        $this->es_admin = $es_admin;

	        return $this;
	    }

	    /**
	     */
	    public function __toString()
	    {
	    	return $this->nombre." ".$this->apellidos ;
	    }
	}
	