<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 20/03/18
 * Time: 16:02
 */

class Equipe
{

    private $id_equipe;
    private $titulos;
    private $fundacao;
    private $nome_equipe;
    private $numero_torcedores;
    private $icon_equipe;


    public function __construct($id, $titulos, $fundacao, $nome_equipe, $numero_torcedores, $icone)
    {
        $this->setIdEquipe($id);
        $this->setTitulos($titulos);
        $this->setFundacao($fundacao);
        $this->setNomeEquipe($nome_equipe);
        $this->setNumeroTorcedores($numero_torcedores);
        $this->setIconEquipe($icone);
    }

    /**
     * @return mixed
     */
    public function getIconEquipe()
    {
        return $this->icon_equipe;
    }

    /**
     * @param mixed $icon_equipe
     */
    public function setIconEquipe($icon_equipe)
    {
        $this->icon_equipe = $icon_equipe;
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
    public function getNomeEquipe()
    {
        return $this->nome_equipe;
    }

    /**
     * @param mixed $nome_equipe
     */
    public function setNomeEquipe($nome_equipe)
    {
        $this->nome_equipe = $nome_equipe;
    }

    /**
     * @return mixed
     */
    public function getNumeroTorcedores()
    {
        return $this->numero_torcedores;
    }

    /**
     * @param mixed $numero_torcedores
     */
    public function setNumeroTorcedores($numero_torcedores)
    {
        $this->numero_torcedores = $numero_torcedores;
    }



}