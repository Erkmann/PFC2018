<?php

class CraqueEquipe
{

    private $id_craque;
    private $id_equipe;
    private $id_associativa = null;

    public function __construct($id_associativa, $id_craque, $id_equipe)
    {

        $this->setIdAssociativa($id_associativa);
        $this->setIdCraque($id_craque);
        $this->setIdEquipe($id_equipe);

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



}