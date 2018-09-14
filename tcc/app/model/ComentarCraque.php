<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 24/07/2018
 * Time: 17:43
 */

class ComentarCraque
{
    private $id_craque;
    private $id_usuario;
    private $txt_comentario;
    private $dt_comentario;
    private $id_comentario = null;

    public function __construct($id_craque, $id_usuario, $txt_comentario)
    {
        $this->setIdCraque($id_craque);
        $this->setIdUsuario($id_usuario);
        $this->setTxtComentario($txt_comentario);
    }

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
    public function getTxtComentario()
    {
        return $this->txt_comentario;
    }

    /**
     * @param mixed $txt_comentario
     */
    public function setTxtComentario($txt_comentario)
    {
        $this->txt_comentario = $txt_comentario;
    }

    /**
     * @return mixed
     */
    public function getDtComentario()
    {
        return $this->dt_comentario;
    }

    /**
     * @param mixed $dt_comentario
     */
    public function setDtComentario($dt_comentario)
    {
        $this->dt_comentario = $dt_comentario;
    }

    /**
     * @return null
     */
    public function getIdComentario()
    {
        return $this->id_comentario;
    }

    /**
     * @param null $id_comentario
     */
    public function setIdComentario($id_comentario)
    {
        $this->id_comentario = $id_comentario;
    }
}