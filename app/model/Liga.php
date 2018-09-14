<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 20/03/18
 * Time: 16:03
 */

class Liga
{

    private $id_liga;
    private $nome_liga;
    private $historia;
    private $fundacao;
    private $regulamento;
    private $pais;
    private $id_esporte;
    private $icon_liga;



    public function __construct($nome_liga, $historia, $fundacao, $regulamento, $pais, $id_liga = null, $id_esporte, $icone)
    {

        $this->setNomeLiga($nome_liga);
        $this->setHistoria($historia);
        $this->setFundacao($fundacao);
        $this->setRegulamento($regulamento);
        $this->setPais($pais);
        $this->setIdLiga($id_liga);
        $this->setIdEsporte($id_esporte);
        $this->setIconLiga($icone);
    }

    /**
     * @return mixed
     */
    public function getNomeLiga()
    {
        return $this->nome_liga;
    }

    /**
     * @param mixed $nome_liga
     */
    public function setNomeLiga($nome_liga)
    {
        $this->nome_liga = $nome_liga;
    }

    /**
     * @return mixed
     */
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
    public function getHistoria()
    {
        return $this->historia;
    }

    /**
     * @param mixed $historia
     */
    public function setHistoria($historia)
    {
        $this->historia = $historia;
    }

    /**
     * @return mixed
     */
    public function getFundacao()
    {
        return $this->fundacao;
    }

    /**
     * @param mixed $fundacao
     */
    public function setFundacao($fundacao)
    {
        $this->fundacao = $fundacao;
    }

    /**
     * @return mixed
     */
    public function getRegulamento()
    {
        return $this->regulamento;
    }

    /**
     * @param mixed $regulamento
     */
    public function setRegulamento($regulamento)
    {
        $this->regulamento = $regulamento;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
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
    public function getIconLiga()
    {
        return $this->icon_liga;
    }

    /**
     * @param mixed $icon_liga
     */
    public function setIconLiga($icon_liga)
    {
        $this->icon_liga = $icon_liga;
    }




}