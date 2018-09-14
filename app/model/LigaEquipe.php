<?php


class LigaEquipe
{

    private $id_associativa;
    private $id_liga;
    private $id_equipe;

    public function __construct($id_associativa, $id_liga, $id_equipe)
    {
        $this->id_associativa = $id_associativa;
        $this->id_liga = $id_liga;
        $this->id_equipe = $id_equipe;
    }

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