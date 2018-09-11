<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 23/03/18
 * Time: 14:56
 */

require_once __DIR__.'/../database/Conexao.php';
require_once __DIR__.'/../model/Esporte.php';
require_once __DIR__.'/../model/Liga.php';
require_once __DIR__.'/../crud/CrudLiga.php';
require_once __DIR__.'/../model/ComentarEsporte.php';


class CrudEsporte
{
    private $conexao;

    /**
     * CrudEsportes constructor.
     */
    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function getRandomId(){
        $sql = "SELECT * FROM esportes ORDER BY id_esporte";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $c = count($resultado);
        $random = rand(0,$c - 1);

        $esporte = $resultado[$random]['id_esporte'];
        return $esporte;
    }

    public function buscarEsportes(){
        $consulta = "SELECT * FROM esportes order by nome_esporte asc";

        $esportes = $this->conexao->query($consulta)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($esportes as $esporte){
            $id = $esporte['id_esporte'];
            $nome = $esporte['nome_esporte'];
            $historia = $esporte['historia'];
            $num_praticantes = $esporte['num_praticantes'];
            $regras = $esporte['regras'];

            $esporte = new Esporte($nome, $historia, $num_praticantes, $regras, $id, $esporte['icon_esporte']);
            $lista_esportes[] = $esporte;
        }

        return $lista_esportes;
    }

    public function buscarEsporte($id){
        $consulta = "SELECT * FROM esportes WHERE id_esporte =".$id;

        $esporte_banco = $this->conexao->query($consulta)->fetch(PDO::FETCH_ASSOC);

        $obj_esporte = new Esporte($esporte_banco['nome_esporte'], $esporte_banco['historia'], $esporte_banco['num_praticantes'], $esporte_banco['regras'], $esporte_banco['id_esporte'], $esporte_banco['icon_esporte']);

        return $obj_esporte;

    }


    public function buscarLigas($id){
        $sql = "SELECT * FROM ligas, esportes WHERE esporte_id_esporte = id_esporte AND id_esporte =".$id;
        $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $a = array();
        foreach ($res as $r){
            $liga = new Liga($r['nome_liga'], $r['historia'], $r['fundacao'], $r['regulamento'], $r['pais'], $r['id_liga'], $r['esporte_id_esporte'], $r['icon_esporte']);
            $a[] = $liga;
        }
        return $a;
    }

    public function insertEsporte(Esporte $esporte){
        $sql = "INSERT INTO `esportes` (`nome_esporte`, `historia`, `id_esporte`, `num_praticantes`, `regras`, `icon_esporte`) VALUES ('{$esporte->getNomeEsporte()}', '{$esporte->getHistoria()}', NULL, '{$esporte->getNumPraticantes()}', '{$esporte->getRegras()}', '{$esporte->getIconEsporte()}');";
        $this->conexao->exec($sql);
    }

    public function updateEsporte(Esporte $esporte){
        $sql = "UPDATE `esportes` SET `nome_esporte`= '{$esporte->getNomeEsporte()}',`historia`= '{$esporte->getHistoria()}', `num_praticantes`= '{$esporte->getNumPraticantes()}',`regras`= '{$esporte->getRegras()}',`icon_esporte`= '{$esporte->getIconEsporte()}' WHERE `id_esporte`= '{$esporte->getIdEsporte()}'";
        try{$this->conexao->exec($sql);}catch(Exception $e){echo "Erro: ".$e->getMessage();}
    }

    public function deleteEsporte($id){

            $c = new CrudLiga();
            $equipes = $c->getLigas();
        foreach ($equipes as $e){
            if ($e->getIdEsporte() == $id){
                $c->deleteLiga($e->getIdLiga());
            }
        }



        $sqll = "DELETE FROM comentar_esportes WHERE id_esporte = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM curtir_esportes WHERE id_esporte = '{$id}'";
        $this->conexao->exec($sqll);



        $sql = "DELETE FROM `esportes` WHERE id_esporte = {$id}";
        $this->conexao->exec($sql);
    }

    public function contadorCurtidasPorEsporte(Esporte $e){
        $sql = "SELECT COUNT(`id_esporte`) as qtd_curtidas FROM `curtir_esportes` WHERE id_esporte = '{$e->getIdEsporte()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];

        return $qtd_c;
    }


     public function getComentariosPorEsporteLimitado(Esporte $e)
     {
         $sql = "SELECT * FROM `comentar_esportes` WHERE `id_esporte` = '{$e->getIdEsporte()}' ORDER BY `comentar_esportes`.`dt_comentario` DESC LIMIT 5";
         $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

         $comentariosArrayObj = [];
         foreach ($comentarios as $comentario) {
             $id_comentario = $comentario['id_comentario'];
             $id_esporte = $comentario['id_esporte'];
             $id_usuario = $comentario['id_usuario'];
             $txt_comentario = $comentario['txt_comentario'];
             $dt_comentario = $comentario['dt_comentario'];

             $comentario = new ComentarEsporte($id_esporte, $id_usuario, $txt_comentario);
             $comentario->setDtComentario($dt_comentario);
             $comentario->setIdComentario($id_comentario);
             $comentariosArrayObj[] = $comentario;
         }
         return $comentariosArrayObj;
     }

     public function get_ids_esportes_curtidos()
     {
         $sql1 = "SELECT DISTINCT curtir_esportes.id_esporte FROM `curtir_esportes`";
         $consulta = $this->conexao->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

         $ids = [];
         foreach ($consulta as $a){
             $ids[] = $a['id_esporte'];
         }
         return $ids;



     }

     public function get_ids_todos_esportes()
     {
         $sql = "SELECT esportes.id_esporte FROM `esportes`";

         $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

         $ids = [];
         foreach ($consulta as $a){
             $ids[] = $a['id_esporte'];
         }
         return $ids;
     }

     public function ranking()
     {
         $sql = "SELECT esportes.id_esporte, `nome_esporte`, COUNT(curtir_esportes.id_esporte) AS qtd_curtidas FROM `curtir_esportes`, `esportes` WHERE esportes.id_esporte = curtir_esportes.id_esporte GROUP BY esportes.id_esporte";
         $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

         //$esportes = array();
         foreach ($consulta as $item){
             $qtd_curtidas = $item['qtd_curtidas'];
             $nome_esporte = $item['nome_esporte'];
             $id_esporte = $item['id_esporte'];


                $esportes[] = ["nome_esporte" => $nome_esporte,
                 "qtd_curtidas" => $qtd_curtidas, "id_esporte" => $id_esporte] ;

         }

         $ids_geral = $this->get_ids_todos_esportes();
         $ids_curtidos = $this->get_ids_esportes_curtidos();

         foreach ($ids_geral as $idG){

             if(!in_array($idG, $ids_curtidos)){
                 $sql = "SELECT * FROM esportes WHERE id_esporte = {$idG}";
                 $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                 foreach ($resultado as $res) {
                     $res['qtd_curtidas'] = 0;
                     $esportes[] = [
                         "nome_esporte" => $res['nome_esporte'], "qtd_curtidas" => $res['qtd_curtidas'], "id_esporte" => $res['id_esporte']
                     ];
                 }
             }

         }


         return $esportes;


     }


}

 //$c = new CrudEsporte();
 //$ids = $c->ranking();
 //print_r($ids);
// //$e = $c->getRandomId();
// //echo $e;

// ////$a = new Esporte("AD", "muita", "3mil", "j jogar", 5, "../../assets/cavs512.png");
// //$c = new CrudEsporte();
// //$c->deleteEsporte(4);
