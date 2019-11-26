<?php

	// Antonio José Sánchez Bujaldón
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Serie
	{
		private $base_url = "https://image.tmdb.org/t/p/w200" ;

		private $idSer ;
		private $titulo ;
		private $poster ;
		private $plataforma ;
		private $genero ;
		private $fec_emision ;
		private $nacionalidad ;
		private $argumento ;

		public function __construct() { }
	
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
	    public function getPoster()
	    {
	        return $this->base_url.$this->poster;
	    }

	    /**
	     * @param mixed $poster
	     *
	     * @return self
	     */
	    public function setPoster($poster)
	    {
	        $this->poster = $poster;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPlataforma()
	    {
	        return $this->plataforma;
	    }

	    /**
	     * @param mixed $plataforma
	     *
	     * @return self
	     */
	    public function setPlataforma($plataforma)
	    {
	        $this->plataforma = $plataforma;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getGenero()
	    {
	        return $this->genero;
	    }

	    /**
	     * @param mixed $genero
	     *
	     * @return self
	     */
	    public function setGenero($genero)
	    {
	        $this->genero = $genero;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getFecEmision()
	    {
	        return $this->fec_emision;
	    }

	    /**
	     * @param mixed $fec_emision
	     *
	     * @return self
	     */
	    public function setFecEmision($fec_emision)
	    {
	        $this->fec_emision = $fec_emision;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNacionalidad()
	    {
	        return $this->nacionalidad;
	    }

	    /**
	     * @param mixed $nacionalidad
	     *
	     * @return self
	     */
	    public function setNacionalidad($nacionalidad)
	    {
	        $this->nacionalidad = $nacionalidad;

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
}