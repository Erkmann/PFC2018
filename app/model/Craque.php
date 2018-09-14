<?php

class Craque
{

    private $id_craque;
    private $nome_craque;
    private $morte;
    private $nascimento;
    private $titulos;
    private $numero_jogos;
    private $icon_craque;


    public function __construct($id, $nome, $morte, $nascimento, $titulos, $jogos, $icone)
    {

        $this->setIdCraque($id);
        $this->setNomeCraque($nome);
        $this->setMorte($morte);
        $this->setNascimento($nascimento);
        $this->setTitulos($titulos);
        $this->setNumeroJogos($jogos);
        $this->setIconCraque($icone);

    }

    /**
     * @return mixed
     */
    public function getIconCraque()
    {
        return $this->icon_craque;
    }

    /**
     * @param mixed $icon_craque
     */
    public function setIconCraque($icon_craque){
        $this->icon_craque = $icon_craque;
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
    public function getNomeCraque()
    {
        return $this->nome_craque;
    }

    /**
     * @param mixed $nome_craque
     */
    public function setNomeCraque($nome_craque)
    {
        $this->nome_craque = $nome_craque;
    }

    /**
     * @return mixed
     */
    public function getMorte()
    {
        return $this->morte;
    }

    /**
     * @param mixed $morte
     */
    public function setMorte($morte)
    {
        $this->morte = $morte;
    }

    /**
     * @return mixed
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * @param mixed $nascimento
     */
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }

    /**
     * @return mixed
     */
    public function getTitulos()
    {
        return $this->titulos;
    }

    /**
     * @param mixed $titulos
     */
    public function setTitulos($titulos)
    {
        $this->titulos = $titulos;
    }

    /**
     * @return mixed
     */
    public function getNumeroJogos()
    {
        return $this->numero_jogos;
    }

    /**
     * @param mixed $numero_jogos
     */
    public function setNumeroJogos($numero_jogos)
    {
        $this->numero_jogos = $numero_jogos;
    }

    /**
     * @return mixed
     */




}