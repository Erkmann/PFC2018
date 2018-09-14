<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 23/07/2018
 * Time: 20:12
 */

class ComentarEsporte
{
    private $id_esporte;
    private $id_usuario;
    private $txt_comentario;
    private $dt_comentario;
    private $id_comentario = null;

    public function __construct($id_esporte, $id_usuario, $txt_comentario)
    {
        $this->setIdEsporte($id_esporte);
        $this->setIdUsuario($id_usuario);
        $this->setTxtComentario($txt_comentario);
    }

    /**
     * @return mixed
     */
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