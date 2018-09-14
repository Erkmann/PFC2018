<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 03/07/18
 * Time: 14:04
 */
require_once __DIR__."/../database/Conexao.php";
require_once __DIR__."/../model/Curtir_equipe.php";

class CrudCurtirEquipe
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertCurtirEquipe(Curtir_equipe $e){

        $sql = "INSERT INTO `curtir_equipe`(`id_equipe`, `id_usuario`, `curtir`) VALUES ('{$e->getIdEquipe()}', '{$e->getIdUsuario()}', '{$e->getCurtir()}')";
        $this->conexao->exec($sql);

    }

    public function deleteCurtirEquipe(Curtir_equipe $e){
        $sql = "DELETE FROM `curtir_equipe` WHERE `id_equipe` = '{$e->getIdEquipe()}' AND `id_usuario` = '{$e->getIdUsuario()}'";
        $this->conexao->exec($sql);
    }

    public function updateCurtirEquipe(Curtir_equipe $e){
        $sql = "UPDATE `curtir_equipe` SET `curtir`= '{$e->getCurtir()}'WHERE `id_usuario` = '{$e->getIdUsuario()}' AND `id_equipe` = '{$e->getIdEquipe()}'";
        $this->conexao->exec($sql);
    }

    public function getCurtirEquipe(){
        $sql = "SELECT * FROM `curtir_equipe`";
        $c = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);



        foreach ($c as $a){
            $id_usuario = $a['id_usuario'];
            $id_equipe = $a['id_equipe'];
            $curtir = $a['curtir'];
            $dt_curtir = $a['dt_curtir'];
            $curtirEquipeObj = new Curtir_equipe($id_equipe, $id_usuario, $curtir);
            $curtirEquipeObj->setDtCurtir($dt_curtir);
            $curtirEquipeArray[] = $curtirEquipeObj;

        }

        return $curtirEquipeArray;

    }

    //NÃO PARECEU NECESSÁRIO

//    public function getCurtirEquipePorEquipe(Curtir_equipe $e){
//        $sql = "SELECT * FROM curtir_equipe WHERE id_equipe = '{$e->getIdEquipe()}'`";
//        $c = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//
//
//        foreach ($c as $a){
//            $id_associativa = $a['id_associativa'];
//            $id_usuario = $a['id_usuario'];
//            $id_equipe = $a['id_equipe'];
//            $curtir = $a['curtir'];
//            $dt_curtir = $a['dt_curtir'];
//            $curtirEquipeObj = new Curtir_equipe($id_associativa, $id_equipe, $id_usuario, $curtir);
//            $curtirEquipeObj->setDtCurtir($dt_curtir);
//            $curtirEquipeArray[] = $curtirEquipeObj;
//
//        }
//
//        return $curtirEquipeArray;
//
//    }

    public function contadorCurtidas(Curtir_equipe $e){
        $sql = "SELECT COUNT(`id_equipe`) as qtd_curtidas FROM `curtir_equipe` WHERE id_equipe = '{$e->getIdEquipe()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];
        return $qtd_c;
    }


    public function contadorCurtidasExatas(Curtir_equipe $e){
        $sql = "SELECT COUNT(`id_equipe`) as qtd_curtidas FROM `curtir_equipe` WHERE id_equipe = '{$e->getIdEquipe()}' AND id_usuario = '{$e->getIdUsuario()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];
        return $qtd_c;
    }



}

//TESTES

//$a = new Curtir_equipe(1, 11, 0);
//$c = new CrudCurtirEquipe();
//$b = $c->contadorCurtidasExatas($a);
//print_r($b);

