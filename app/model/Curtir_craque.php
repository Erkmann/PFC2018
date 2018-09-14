<?php

class Curtir_craque
{
    private $id_craque;
    private $id_usuario;
    private $curtir;
    private $dt_curtir;

    public function __construct($id_craque, $id_usuario, $curtir)
    {
        $this->id_craque = $id_craque;
        $this->id_usuario = $id_usuario;
        $this->curtir = $curtir;

    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getIdCraque()
    {
        return $this->id_craque;
    }

    /**
     * @param mixed $id_craque
     */
    public function setIdCraque($id_craque)
    {
        $this->id_craque = $id_craque;
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