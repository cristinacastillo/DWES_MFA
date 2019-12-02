<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo

class Perro
{
    private $idPer;
    private $nombre;
    private $raza;
    private $genero;
    private $descripcion;
    private $fec_nacimiento;
    private $foto;




    public function __construct()
    { }


    /**
     * @return mixed
     */
    public function getIdPer()
    {
        return $this->idPer;
    }

    /**
     * @param mixed idPer
     * 
     * @return self
     */
    public function setIdPer($idPer)
    {
        $this->idPer = $idPer;

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
     * @param mixed nombre
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
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * @param mixed raza
     * 
     * @return self
     */
    public function serRaza($raza)
    {
        $this->raza = $raza;

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
     * @param mixed genero
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed descripcion
     * 
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }



     /**
     * @return mixed
     */
    public function getFecNac()
    {
        return $this->fec_nacimiento;
    }

    /**
     * @param mixed fec_nacimiento
     * 
     * @return self
     */
    public function setFecNac($fec_nacimiento)
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
     * @param mixed foto
     * 
     * @return self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }


}
