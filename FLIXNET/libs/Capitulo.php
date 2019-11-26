<?php

	// Antonio José Sánchez Bujaldón
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Capitulo
	{
		private $idCap ;
		private $idSer ;
		private $capitulo ;
		private $temporada ;
		private $titulo ;
		private $argumento ;
		private $duracion ;

		/**
		 */
		public function __construct() { }

	    /**
	     * @return mixed
	     */
	    public function getIdCap()
	    {
	        return $this->idCap;
	    }

	    /**
	     * @param mixed $idCap
	     *
	     * @return self
	     */
	    public function setIdCap($idCap)
	    {
	        $this->idCap = $idCap;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getIdSer()
	    {
	        return $this->idSer;
	    }

	    /**
	     * @param mixed $idSer
	     *
	     * @return self
	     */
	    public function setIdSer($idSer)
	    {
	        $this->idSer = $idSer;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCapitulo()
	    {
	        return $this->capitulo;
	    }

	    /**
	     * @param mixed $capitulo
	     *
	     * @return self
	     */
	    public function setCapitulo($capitulo)
	    {
	        $this->capitulo = $capitulo;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getTemporada()
	    {
	        return $this->temporada;
	    }

	    /**
	     * @param mixed $temporada
	     *
	     * @return self
	     */
	    public function setTemporada($temporada)
	    {
	        $this->temporada = $temporada;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getTitulo()
	    {
	        return $this->titulo;
	    }

	    /**
	     * @param mixed $titulo
	     *
	     * @return self
	     */
	    public function setTitulo($titulo)
	    {
	        $this->titulo = $titulo;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getArgumento()
	    {
	        return $this->argumento;
	    }

	    /**
	     * @param mixed $argumento
	     *
	     * @return self
	     */
	    public function setArgumento($argumento)
	    {
	        $this->argumento = $argumento;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDuracion()
	    {
	        return $this->duracion;
	    }

	    /**
	     * @param mixed $duracion
	     *
	     * @return self
	     */
	    public function setDuracion($duracion)
	    {
	        $this->duracion = $duracion;

	        return $this;
	    }
	}
	