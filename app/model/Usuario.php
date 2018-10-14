<?php

require_once __DIR__.'/../database/Conexao.php';

class Usuario
{
    private $id_usuario;
    private $nome_usuario;
    private $id_tipo_usuario;
    private $email;
    private $senhaUsuario;
    private $id_pass;
    private $verificado;

    public function __construct($nome_usuario, $senhaUsuario, $email,  $id_tipo_usuario = 1, $id_usuario = null){

        $this->setIdUsuario($id_usuario);
        $this->setNomeUsuario($nome_usuario);
        $this->setIdTipoUsuario($id_tipo_usuario);
        $this->setSenhaUsuario($senhaUsuario);
        $this->setEmail($email);

    }

    /**
     * @return mixed
     */
    public function getVerificado()
    {
        return $this->verificado;
    }

    /**
     * @param mixed $verificado
     */
    public function setVerificado($verificado)
    {
        $this->verificado = $verificado;
    }

    /**
     * @return mixed
     */
    public function getIdPass()
    {
        return $this->id_pass;
    }

    /**
     * @param mixed $id_pass
     */
    public function setIdPass($id_pass)
    {
        $this->id_pass = $id_pass;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }

    /**
     * @param mixed $senhaUsuario
     */
    public function setSenhaUsuario($senhaUsuario)
    {
        $this->senhaUsuario = $senhaUsuario;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getNomeUsuario()
    {
        return $this->nome_usuario;
    }

    /**
     * @param mixed $nome_usuario
     */
    public function setNomeUsuario($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdTipoUsuario()
    {
        return $this->id_tipo_usuario;
    }

    /**
     * @param mixed $id_tipo_usuario
     */
    public function setIdTipoUsuario($id_tipo_usuario)
    {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }





}



