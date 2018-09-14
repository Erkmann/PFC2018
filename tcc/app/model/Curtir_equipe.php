<?php

class Curtir_equipe
{
    private $id_equipe;
    private $id_usuario;
    private $curtir;
    private $dt_curtir;

    public function __construct($id_equipe, $id_usuario, $curtir)
    {
        $this->id_equipe = $id_equipe;
        $this->id_usuario = $id_usuario;
        $this->curtir = $curtir;

    }

    /**
     * @return mixed
     */
    public function getIdEquipe()
    {
        return $this->id_equipe;
    }

    /**
     * @param mixed $id_equipe
     */
    public function setIdEquipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;
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
    public function getIdAssociativa()
    {
        return $this->id_associativa;
    }

    /**
     * @param mixed $id_associativa
     */
    public function setIdAssociativa($id_associativa)
    {
        $this->id_associativa = $id_associativa;
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
