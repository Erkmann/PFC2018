<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 20/03/18
 * Time: 16:06
 */

class Esporte
{

    private $id_esporte;
    private $nome_esporte;
    private $historia;
    private $num_praticantes;
    private $regras;
    private $icon_esporte;


    public function __construct($nome_esporte, $historia, $num_praticantes, $regras, $id_esporte = null, $icone)
    {
        $this->setIdEsporte($id_esporte);
        $this->setNomeEsporte($nome_esporte);
        $this->setHistoria($historia);
        $this->setNumPraticantes($num_praticantes);
        $this->setRegras($regras);
        $this->setIconEsporte($icone);

    }

    /**
     * @return mixed
     */
    public function getIconEsporte()
    {
        return $this->icon_esporte;
    }

        /**
     * @param mixed $icon_esporte
     */
    public function setIconEsporte($icon_esporte)
    {
        $this->icon_esporte = $icon_esporte;
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
    public function getNomeEsporte()
    {
        return $this->nome_esporte;
    }


    public function setNomeEsporte($nome_esporte){
        //garantir alguma coisa, executar a a verificacao de alguam regra
        $this->nome_esporte = $nome_esporte;
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
    public function getNumPraticantes()
    {
        return $this->num_praticantes;
    }

    /**
     * @param mixed $num_praticantes
     */
    public function setNumPraticantes($num_praticantes)
    {
        $this->num_praticantes = $num_praticantes;
    }

    /**
     * @return mixed
     */
    public function getRegras()
    {
        return $this->regras;
    }

    /**
     * @param mixed $regras
     */
    public function setRegras($regras)
    {
        $this->regras = $regras;
    }






}