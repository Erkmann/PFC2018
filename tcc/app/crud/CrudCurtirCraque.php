<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 26/06/18
 * Time: 08:48
 */
require_once __DIR__."/../database/Conexao.php";
require_once __DIR__."/../model/Curtir_craque.php";
class CrudCurtirCraque
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertCurtirCraque(Curtir_craque $c){

        $sql = "INSERT INTO `curtir_craques`(`id_usuario`, `id_craques`, `curtir`) VALUES ('{$c->getIdUsuario()}', '{$c->getIdCraque()}' , '{$c->getCurtir()}')";
        $this->conexao->exec($sql);
    }

    public function deleteCurtirCraque(Curtir_craque $c){
        $sql = "DELETE FROM `curtir_craques` WHERE `id_usuario` = '{$c->getIdUsuario()}' AND `id_craques` = '{$c->getIdCraque()}'";
        $this->conexao->exec($sql);
    }

    public function updateCurtirCraque(Curtir_craque $c){
        $sql = "UPDATE `curtir_craques` SET curtir= '{$c->getCurtir()}' WHERE `id_usuario` = '{$c->getIdUsuario()}' AND `id_craques` = '{$c->getIdCraque()}'";

        $this->conexao->exec($sql);
    }

    public function getCurtirCraque(){
        $sql = "SELECT * FROM `curtir_craques`";
        $c = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $curtirCraqueArray = [];

        foreach ($c as $a){
            $id_usuario = $a['id_usuario'];
            $id_craques = $a['id_craques'];
            $curtir = $a['curtir'];
            $dt_curtir = $a['dt_curtir'];

            $curtirCraqueObj = new Curtir_craque($id_craques, $id_usuario, $curtir);
            $curtirCraqueObj->setDtCurtir($dt_curtir);
            $curtirCraqueArray[] = $curtirCraqueObj;

        }

        return $curtirCraqueArray;

    }



    public function contadorCurtida(Curtir_craque $c){
        $sql = "SELECT COUNT(`id_craques`) AS qtd_curtir FROM `curtir_craques` WHERE id_craques = '{$c->getIdCraque()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c["qtd_curtir"];
        return $qtd_c;
    }

    public function verificador(Curtir_craque $c){
        $sql = "SELECT COUNT(`id_craques`) AS ocorrencia_curtida FROM `curtir_craques` WHERE `id_craques` = '{$c->getIdCraque()}' AND id_usuario = '{$c->getIdUsuario()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c["ocorrencia_curtida"];
        return $qtd_c;
    }




}


//Teste

//$curtirCraque = new Curtir_craque(2, 91, 1);
//$c = new CrudCurtirCraque();
//$c->updateCurtirCraque($curtirCraque);
//$c->updateCurtirCraque($curtirCraque);
//$a = $c->contadorCurtida($curtirCraque);
//echo $a;

//$a = $c->getCurtirCraque();
//print_r($a);