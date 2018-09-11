<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 19/06/18
 * Time: 13:51
 */

require_once __DIR__."/../model/LigaEquipe.php";
require_once __DIR__."/../database/Conexao.php";

class CrudLigaEquipe
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }


    public function insertLigaEquipe(LigaEquipe $l){
        $sql = "INSERT INTO `equipes_ligas` (`id_equipe`, `id_liga`) VALUES ('{$l->getIdEquipe()}', '{$l->getIdLiga()}');";
        $this->conexao->exec($sql);
    }

    public function deleteLigaEquipe(LigaEquipe $l){
        $sql = "DELETE FROM `equipes_ligas` WHERE id_associativa = '{$l->getIdAssociativa()}'";
        $this->conexao->exec($sql);
    }

    public function updateLigaEquipe(LigaEquipe $l){
        $sql = "UPDATE `equipes_ligas` SET `id_associativa`= '{$l->getIdAssociativa()}',`id_equipe`= '{$l->getIdEquipe()}',`id_liga`= '{$l->getIdLiga()}' WHERE id_associativa = '{$l->getIdAssociativa()}'";
        $this->conexao->exec($sql);
    }

    public function getLigaEquipePorLiga(LigaEquipe $ligaEquipe){

        $sql = "SELECT id_associativa, `id_equipe`, `id_liga` FROM `equipes_ligas` WHERE `id_liga` = '{$ligaEquipe->getIdLiga()}'";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ligaEquipeArray = [];
        foreach ($resultado as $res){
            $id_associativa = $res['id_associativa'];
            $id_equipe = $res['id_equipe'];
            $id_liga = $res['id_liga'];

            $ligaEquipeObj = new LigaEquipe($id_associativa, $id_liga, $id_equipe);
            $ligaEquipeArray[] = $ligaEquipeObj;
        }
        return $ligaEquipeArray;

        //TODO TRANSFORMAR EM OBJETO;


    }

    public function getLigaEquipePorEquipe(LigaEquipe $ligaEquipe){

        $sql = "SELECT id_associativa, `id_equipe`, `id_liga` FROM `equipes_ligas` WHERE `id_equipe` = '{$ligaEquipe->getIdEquipe()}'";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ligaEquipeArray = [];
        foreach ($resultado as $res){
            $id_associativa = $res['id_associativa'];
            $id_equipe = $res['id_equipe'];
            $id_liga = $res['id_liga'];

            $ligaEquipeObj = new LigaEquipe($id_associativa, $id_liga, $id_equipe);
            $ligaEquipeArray[] = $ligaEquipeObj;
        }
        return $ligaEquipeArray;

        //TODO TRANSFORMAR EM OBJETO;


    }

    public function deleteUpdt($id){
        $sql = "delete from equipes_ligas where id_equipe = '{$id}'";
        $this->conexao->exec($sql);
    }

    public function getLigasDeUmTime($id){
        $sql = "select * from equipes_ligas WHERE id_equipe = '{$id}'";
        $ligas = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $aa = new CrudLiga();
        $ligasA = array();

        foreach($ligas as $liga){
            $a = $aa->getLiga($liga['id_liga']);
            $ligasA[] = $a;
        }

        return $ligasA;
    }


    public function getLigaEquipe(){

        $sql = "SELECT * FROM `equipes_ligas`";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ligaEquipeArray = [];
        foreach ($resultado as $res){
            $id_associativa = $res['id_associativa'];
            $id_equipe = $res['id_equipe'];
            $id_liga = $res['id_liga'];

            $ligaEquipeObj = new LigaEquipe($id_associativa, $id_liga, $id_equipe);
            $ligaEquipeArray[] = $ligaEquipeObj;
        }
        return $ligaEquipeArray;

        //TODO TRANSFORMAR EM OBJETO;


    }






}

// CONCLUÍDO

//teste
//$le = new LigaEquipe(4, 2, 8);
//$crud = new CrudLigaEquipe();
//$ligaEquipe = $crud->getLigaEquipe();
//print_r($ligaEquipe);
//$a = $crud->getLigaEquipePorLiga(1);
//print_r($a);
