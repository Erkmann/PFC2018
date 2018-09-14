<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 10/07/18
 * Time: 13:44
 */
require_once __DIR__."/../database/Conexao.php";
require_once __DIR__."/../model/Curtir_liga.php";
class CrudCurtirLiga
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertCurtirLiga(Curtir_liga $l){

        $sql = "INSERT INTO `curtir_ligas`(`id_liga`, `id_usuario`, `curtir`) VALUES ('{$l->getIdLiga()}', '{$l->getIdUsuario()}', '{$l->getCurtir()}')";
        $this->conexao->exec($sql);

    }

    public function deleteCurtirLiga(Curtir_liga $l){
        $sql = "DELETE FROM `curtir_ligas` WHERE `id_liga` = '{$l->getIdLiga()}' AND `id_usuario` = '{$l->getIdUsuario()}'";
        $this->conexao->exec($sql);
    }

    public function updateCurtirLiga(Curtir_liga $l){
        $sql = "UPDATE `curtir_ligas` SET `curtir`= '{$l->getCurtir()}' WHERE `id_liga` = '{$l->getIdLiga()}' AND `id_usuario` = '{$l->getIdUsuario()}'";
        $this->conexao->exec($sql);
    }

    public function getCurtirLiga(){
        $sql = "SELECT * FROM `curtir_ligas`";
        $c = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);



        foreach ($c as $a){
            $id_usuario = $a['id_usuario'];
            $id_liga = $a['id_liga'];
            $curtir = $a['curtir'];
            $dt_curtir = $a['dt_curtir'];
            $curtirLigaObj = new Curtir_liga($id_liga, $id_usuario, $curtir);
            $curtirLigaObj->setDtCurtir($dt_curtir);
            $curtirLigaArray[] = $curtirLigaObj;

        }

        return $curtirLigaArray;

    }

    public function contadorCurtidas(Curtir_liga $l){
        $sql = "SELECT COUNT(`id_liga`) as qtd_curtidas FROM `curtir_ligas` WHERE id_liga = '{$l->getIdLiga()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];

        return $qtd_c;
    }

    public function contadorCurtidasExatas(Curtir_liga $l){
        $sql = "SELECT COUNT(`id_liga`) as qtd_curtidas FROM `curtir_ligas` WHERE id_liga = '{$l->getIdLiga()}' AND id_usuario = '{$l->getIdUsuario()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];

        return $qtd_c;
    }




}

//TESTE

//$l = new Curtir_liga(1, 102, 1);
//$c = new CrudCurtirLiga();
//$a = $c->contadorCurtidasExatas($l);
//echo $a;
