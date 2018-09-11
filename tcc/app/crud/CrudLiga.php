<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 16/04/18
 * Time: 16:26
 */

require_once __DIR__ . "/../model/Liga.php";
require_once __DIR__ . "/../database/Conexao.php";
require_once __DIR__ . "/../model/Equipe.php";
require_once __DIR__ . "/../model/ComentarLiga.php";
require_once __DIR__ . "/../crud/CrudUsuario.php";

class CrudLiga
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getRandomId()
    {
        $sql = "SELECT * FROM ligas ORDER BY id_liga";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $c = count($resultado);
        $random = rand(0, $c - 1);

        $liga = $resultado[$random]['id_liga'];
        return $liga;
    }

    public function cadastrarLiga(Liga $liga)
    {
        $sql = "INSERT INTO `ligas` (`id_liga`, `historia`, `fundacao`, `regulamento`, `pais`, `esporte_id_esporte`, `nome_liga`) VALUES (NULL, '{$liga->getHistoria()}', '{$liga->getFundacao()}', '{$liga->getRegulamento()}', '{$liga->getPais()}', '{$liga->getIdEsporte()}', '{$liga->getNomeLiga()}');";
        $this->conexao->exec($sql);

        try {
            $this->conexao->exec($sql);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function getLigas()
    {
        $sql = "SELECT * FROM ligas";

        $consulta = $this->conexao->query($sql);

        $ligas = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $arrayLigas = array();

        foreach ($ligas as $liga) {
            $id = $liga['id_liga'];
            $historia = $liga['historia'];
            $fundacao = $liga['fundacao'];
            $regulamento = $liga['regulamento'];
            $pais = $liga['pais'];
            $id_esporte = $liga['esporte_id_esporte'];
            $nome_liga = $liga['nome_liga'];
            $iconeLiga = $liga['icon_liga'];

            $ligaNova = new Liga($nome_liga, $historia, $fundacao, $regulamento, $pais, $id, $id_esporte, $iconeLiga);
            $arrayLigas[] = $ligaNova;
        }

        return $arrayLigas;
    }

    public function getLiga($id)
    {
        $sql = "SELECT * FROM ligas WHERE id_liga =" . "{$id}";
        $liga = $consulta = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $ligaObjeto = new Liga($liga['nome_liga'], $liga['historia'], $liga['fundacao'], $liga['regulamento'], $liga['pais'], $liga['id_liga'], $liga['esporte_id_esporte'], $liga['icon_liga']);
        return $ligaObjeto;

    }

    public function getEquipes($id)
    {
        $sql = "SELECT equipes.nome_equipe, equipes.id_equipe, equipes.titulos, equipes.fundacao, equipes.numero_torcedores, equipes.icon_equipe FROM `equipes`, ligas, equipes_ligas WHERE equipes_ligas.id_equipe = equipes.id_equipe AND equipes_ligas.id_liga = ligas.id_liga AND equipes_ligas.id_liga = {$id}";
        $equipes = $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $equipesObjs = array();

        foreach ($equipes as $equipe) {
            $nome = $equipe['nome_equipe'];
            $id = $equipe['id_equipe'];
            $titulos = $equipe['titulos'];
            $fundacao = $equipe['fundacao'];
            $num_torcedores = $equipe['numero_torcedores'];
            $foto = $equipe['icon_equipe'];

            $equipeObj = new Equipe($id, $titulos, $fundacao, $nome, $num_torcedores, $foto);

            $equipesObjs[] = $equipeObj;
        }

        return $equipesObjs;
    }

    public function insertLiga(Liga $liga)
    {
        $sql = "INSERT INTO `ligas`(`id_liga`, `historia`, `fundacao`, `regulamento`, `pais`, `esporte_id_esporte`, `nome_liga`, `icon_liga`) VALUES ('{$liga->getIdLiga()}','{$liga->getHistoria()}','{$liga->getFundacao()}','{$liga->getRegulamento()}','{$liga->getPais()}','{$liga->getIdEsporte()}','{$liga->getNomeLiga()}','{$liga->getIconLiga()}')";
        $this->conexao->exec($sql);

    }

    public function updateLiga(Liga $liga)
    {
        $sql = "UPDATE `ligas` SET `id_liga`= '{$liga->getIdLiga()}',`historia`= '{$liga->getHistoria()}',`fundacao`= '{$liga->getFundacao()}',`regulamento`= '{$liga->getRegulamento()}',`pais`= '{$liga->getPais()}',`esporte_id_esporte`= '{$liga->getIdEsporte()}',`nome_liga` = '{$liga->getNomeLiga()}',`icon_liga`= '{$liga->getIconLiga()}' WHERE `id_liga`= '{$liga->getIdLiga()}'";
        $this->conexao->exec($sql);
    }


    public function deleteLiga($id)
    {
        $sqll = "DELETE FROM comentar_liga WHERE id_liga = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM curtir_ligas WHERE id_liga = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM equipes_ligas WHERE id_liga = '{$id}'";
        $this->conexao->exec($sqll);
        $sql = "DELETE FROM `ligas` WHERE `id_liga` = '{$id}'";
        $this->conexao->exec($sql);

    }


//TODO Testar Delete, depois de deletar as associativas

    public function contadorCurtidas(Liga $l)
    {
        $sql = "SELECT COUNT(`id_liga`) as qtd_curtidas FROM `curtir_ligas` WHERE id_liga = '{$l->getIdLiga()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];

        return $qtd_c;
    }

    public function getComentariosPorLigaLimitado(Liga $c)
    {
        $sql = "SELECT * FROM `comentar_liga` WHERE `id_liga` = '{$c->getIdLiga()}' LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {

            $id_liga = $comentario['id_liga'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }


    public function get_ids_ligas_curtidas()
    {
        $sql1 = "SELECT DISTINCT curtir_ligas.id_liga FROM `curtir_ligas`";
        $consulta = $this->conexao->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

        $ids = [];
        foreach ($consulta as $a){
            $ids[] = $a['id_liga'];
        }
        return $ids;



    }

    public function get_ids_ligas_todas()
    {
        $sql = "SELECT ligas.id_liga FROM `ligas`";

        $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ids = [];
        foreach ($consulta as $a){
            $ids[] = $a['id_liga'];
        }
        return $ids;
    }

    public function ranking()
    {
        $sql = "SELECT ligas.id_liga, `nome_liga`, COUNT(curtir_ligas.id_liga) AS qtd_curtidas FROM `curtir_ligas`, `ligas` WHERE ligas.id_liga = curtir_ligas.id_liga GROUP BY curtir_ligas.id_liga";
        $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $equipes = array();
        foreach ($consulta as $item){
            $qtd_curtidas = $item['qtd_curtidas'];
            $nome_liga = $item['nome_liga'];
            $id_liga = $item['id_liga'];


            $ligas[] = ["nome_liga" => $nome_liga,
                "qtd_curtidas" => $qtd_curtidas, "id_liga" => $id_liga] ;

        }

        $ids_geral = $this->get_ids_ligas_todas();
        $ids_curtidos = $this->get_ids_ligas_curtidas();

        foreach ($ids_geral as $idG){

            if(!in_array($idG, $ids_curtidos)){
                $sql = "SELECT * FROM ligas WHERE id_liga = {$idG}";
                $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultado as $res) {
                    $res['qtd_curtidas'] = 0;
                    $ligas[] = [
                        "nome_liga" => $res['nome_liga'], "qtd_curtidas" => $res['qtd_curtidas'], "id_liga" => $res['id_liga']
                    ];
                }
            }

        }


        return $ligas;


    }

}

//teste

//$liga = new Liga('LIGA DOS CHAMPIONE', 'Uma grande liga...', '1000-05-19', 'Só jogar', 'Tunísia', 2, 1, 'assets');
//print_r($liga);
//$crud = new CrudLiga();
//$ids = $crud->ranking();
//print_r($ids);
//$crud->deleteLiga(2);
//$liga = $crud->getLiga(2);
//$ligas = $crud->getLigas();
//print_r($ligas);

//teste getEquipes

//$crud = new CrudLiga();
//$ligas = $crud->getEquipes(1);
//print_r($ligas);
//
//$l = new CrudLiga();
//$a = new Liga("A", "um dia...", "revindustrial", "joga e pronto", "Brasil", "", 1, "b");
//PEDIR AJUDA PARA PROFESSOR INSERIR$l->insertLiga($a);
//$ligas = $l->getLigas();
//print_r($ligas);
//$l->insertLigaEquipe(2, 8);