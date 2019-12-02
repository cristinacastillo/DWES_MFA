<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo

class Adopcion
{
    private $idUsu;
    private $idPer;
    private $nombre;




    public function __construct()
    { }


    /**
     * @return mixed
     */
    public function getIdUsu()
    {
        return $this->idUsu;
    }

    /**
     * @param mixed idUsu
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
    public function getIdPer()
    {
        return $this->idPer;
    }

    /**
     * @param mixed idPer
     * 
     * @return self
     */
    public function setidPer($idPer)
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
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed fecha
     * 
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}
