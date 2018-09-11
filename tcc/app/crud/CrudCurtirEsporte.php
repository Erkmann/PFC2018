<?php


require_once __DIR__."/../database/Conexao.php";
require_once __DIR__."/../model/Curtir_esporte.php";
class CrudCurtirEsporte
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertCurtirEsporte(Curtir_esporte $e){

        $sql = "INSERT INTO `curtir_esportes`(`id_esporte`, `id_usuario`, `curtir`) VALUES ('{$e->getIdEsporte()}', '{$e->getIdUsuario()}', '{$e->getCurtir()}')";
        $this->conexao->exec($sql);

    }

    public function deleteCurtirEsporte(Curtir_esporte $e){
        $sql = "DELETE FROM `curtir_esportes` WHERE `id_esporte` = '{$e->getIdEsporte()}' AND `id_usuario` = '{$e->getIdUsuario()}'";
        $this->conexao->exec($sql);
    }

    public function updateCurtirEsporte(Curtir_esporte $e){
        $sql = "UPDATE `curtir_esportes` SET `curtir`= '{$e->getCurtir()}' WHERE `id_esporte` = '{$e->getIdEsporte()}' AND `id_usuario` = '{$e->getIdUsuario()}'";
        $this->conexao->exec($sql);
    }


    public function getCurtirEsporte(){
        $sql = "SELECT * FROM `curtir_esportes`";
        $c = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);



        foreach ($c as $a){
            $id_usuario = $a['id_usuario'];
            $id_esporte = $a['id_esporte'];
            $curtir = $a['curtir'];
            $dt_curtir = $a['dt_curtir'];
            $curtirEsporteObj = new Curtir_esporte($id_esporte, $id_usuario, $curtir);
            $curtirEsporteObj->setDtCurtir($dt_curtir);
            $curtirEsporteArray[] = $curtirEsporteObj;

        }

        return $curtirEsporteArray;

    }

    public function contadorCurtidasPorEsporte(Curtir_esporte $e){
        $sql = "SELECT COUNT(`id_esporte`) as qtd_curtidas FROM `curtir_esportes` WHERE id_esporte = '{$e->getIdEsporte()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        
        $qtd_c = $c['qtd_curtidas'];

        return $qtd_c;
    }

    public function contadorCurtidasExata(Curtir_esporte $e){
        $sql = "SELECT COUNT(`id_esporte`) as qtd_curtidas FROM `curtir_esportes` WHERE id_esporte = '{$e->getIdEsporte()}' AND id_usuario = '{$e->getIdUsuario()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        
        $qtd_c = $c['qtd_curtidas'];

        return $qtd_c;
    }




}

//TESTES

//$a = new Curtir_esporte(1, 3, 1);
//$c = new CrudCurtirEsporte();
//$a = $c->contadorCurtidasPorEsporte($a);
//print_r($a);