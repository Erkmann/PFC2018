<?php

class Curtir_esporte
{
    private $id_esporte;
    private $id_usuario;
    private $curtir;
    private $dt_curtir;

    /**
     * @return mixed
     */
    public function __construct($id_esporte, $id_usuario, $curtir)
    {
        $this->id_esporte = $id_esporte;
        $this->id_usuario = $id_usuario;
        $this->curtir = $curtir;

    }

    public function getIdEsporte()
    {
        return $this->id_esporte;
    }

    /**
     * @param mixed $id_esporte
     */
    public function setIdEsporte($id_esporte)
    {
        $this->id_esporte = $id_esporte;
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