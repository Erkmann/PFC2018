<?php

require_once __DIR__."/../database/Conexao.php";
require_once __DIR__ ."/../model/CraqueEquipe.php";


class CrudCraqueEquipe
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertCraqueEquipe(CraqueEquipe $craqueEquipe)
    {
        $sql2 = "INSERT INTO equipes_craques(id_equipe, id_craques) VALUES ('{$craqueEquipe->getIdEquipe()}', '{$craqueEquipe->getIdCraque()}')";
        $this->conexao->exec($sql2);
    }

    public function deleteCraqueEquipe(CraqueEquipe $craqueEquipe)
    {
        $sql = "DELETE FROM `equipes_craques` WHERE id_associativa = '{$craqueEquipe->getIdAssociativa()}'";
        $this->conexao->exec($sql);

    }

    public function updateCraqueEquipe(CraqueEquipe $craqueEquipe)

    {
        $sql = "UPDATE `equipes_craques` SET `id_equipe`= '{$craqueEquipe->getIdEquipe()}',`id_craques`= '{$craqueEquipe->getIdCraque()}' WHERE id_associativa = '{$craqueEquipe->getIdAssociativa()}'";
        $this->conexao->exec($sql);
    }

    public function getCraquesEquipes()
    {
        $sql = "SELECT * FROM `equipes_craques`";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $craqueEquipeArray = array();
        foreach ($resultado as $res) {
            $id_assoc = $res['id_associativa'];
            $id_equipe = $res['id_equipe'];
            $id_craque = $res['id_craques'];
            $craqueEquipeObj = new CraqueEquipe("$id_assoc", "$id_craque", "$id_equipe");
            $craqueEquipeArray[] = $craqueEquipeObj;
        }

        return $craqueEquipeArray;
    }

    public function deleteUpdt($id){
        $sql = "delete from equipes_craques where id_craques = '{$id}'";
        $this->conexao->exec($sql);
    }

    public function getEquipesDeUmCraque($id){
        $sql = "select * from equipes_craques WHERE id_craques = '{$id}'";
        $equipes = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $aa = new CrudEquipe();
        $craquesA = array();

        foreach($equipes as $equipe){
            $a = $aa->getEquipe($equipe['id_equipe']);
            $craquesA[] = $a;
        }

        return $craquesA;
    }


public function getCraqueEquipePorEquipe(CraqueEquipe $craqueEquipe)
{

    $sql = "SELECT `id_equipe`, `id_craques`, `id_associativa` FROM `equipes_craques` WHERE `id_equipe` = '{$craqueEquipe->getIdEquipe()}'";

    $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $craqueEquipeArray = array();
    foreach ($resultado as $res) {
        $id_assoc = $res['id_associativa'];
        $id_equipe = $res['id_equipe'];
        $id_craque = $res['id_craques'];
        $craqueEquipeObj = new CraqueEquipe("$id_assoc", "$id_craque", "$id_equipe");
        $craqueEquipeArray[] = $craqueEquipeObj;
    }

    return $craqueEquipeArray;

}

public function getCraqueEquipePorCraque(CraqueEquipe $craqueEquipe)
{

    $sql = "SELECT id_associativa, `id_equipe`, `id_craques` FROM `equipes_craques` WHERE `id_craques` = {$craqueEquipe->getIdCraque()}";
    $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $craqueEquipeArray = array();
    foreach ($resultado as $res) {
        $id_associativa = $res['id_associativa'];
        $id_equipe = $res['id_equipe'];
        $id_craque = $res['id_craques'];
        $craqueEquipeObj = new CraqueEquipe("$id_associativa", "$id_craque", "$id_equipe");
        $craqueEquipeArray[] = $craqueEquipeObj;
    }

    return $craqueEquipeArray;

}




}

//$c = new CrudCraqueEquipe();

//Teste DeleteCraqueEquipe
//$c->deleteCraqueEquipe(8, 1);

//Teste Insert
//$a = new CraqueEquipe("", 1, 1);
//$d = new CrudCraqueEquipe();
//$d->deleteCraqueEquipe($c);
//$d->updateCraqueEquipe($c);
//$d->insertCraqueEquipe($a);

// Teste Update
//$c->updateCraqueEquipe(8, 6, 8, 1);

//Teste getCraquesEquipes
//$r = $c->getCraqueEquipePorCraque($a);
//print_r($r);


//$b = $d->getCraqueEquipePorCraque($a);
//print_r($b);
//TODO
//Não Permitir doisn registros iguais ex:(8,6)