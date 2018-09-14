<?php

class Curtir_liga
{
    private $id_liga;
    private $id_usuario;
    private $curtir;
    private $dt_curtir;

    /**
     * @return mixed
     */

    public function __construct($id_liga, $id_usuario, $curtir)
    {
        $this->id_liga = $id_liga;
        $this->id_usuario = $id_usuario;
        $this->curtir = $curtir;


    }

    public function getIdLiga()
    {
        return $this->id_liga;
    }

    /**
     * @param mixed $id_liga
     */
    public function setIdLiga($id_liga)
    {
        $this->id_liga = $id_liga;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getCurtir()
    {
        return $this->curtir;
    }

    /**
     * @param mixed $curtir
     */
    public function setCurtir($curtir)
    {
        $this->curtir = $curtir;
    }

    /**
     * @return mixed
     */
    public function getDtCurtir()
    {
        return $this->dt_curtir;
    }

    /**
     * @param mixed $dt_curtir
     */
    public function setDtCurtir($dt_curtir)
    {
        $this->dt_curtir = $dt_curtir;
    }
}