<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 24/07/2018
 * Time: 14:34
 */
require_once __DIR__."/../model/ComentarEsporte.php";
require_once __DIR__."/../database/Conexao.php";
class CrudComentarEsporte
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insert_comentario_esporte(ComentarEsporte $e){
        $sql = "INSERT INTO `comentar_esportes`(`id_esporte`, `id_usuario`, `txt_comentario`) VALUES ('{$e->getIdEsporte()}', '{$e->getIdUsuario()}', '{$e->getTxtComentario()}')";
        $this->conexao->exec($sql);

    }

    public function delete_comentario_esporte(ComentarEsporte $e)
    {
        $sql = "DELETE FROM `comentar_esportes` WHERE `id_comentario` = '{$e->getIdComentario()}'";
        $this->conexao->exec($sql);
    }

    public function update_comentario_esporte(ComentarEsporte $e)
    {
        $sql = "UPDATE `comentar_esportes` SET `txt_comentario`= '{$e->getTxtComentario()}',`dt_comentario`= CURRENT_TIMESTAMP WHERE `id_comentario` =  '{$e->getIdComentario()}'";
        $this->conexao->exec($sql);

    }

    public function getComentariosPorEsporteLimitado(ComentarEsporte $e)
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

    public function getComentariosPorEsporteTotal(ComentarEsporte $e)
    {
        $sql = "SELECT * FROM `comentar_esportes` WHERE `id_esporte` = '{$e->getIdEsporte()}' ORDER BY `comentar_esportes`.`dt_comentario`";
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

    public function getComentarioExato(ComentarLiga $c){

        $sql = "SELECT COUNT(`id_liga`) AS qtd_comentario FROM `comentar_liga` WHERE `id_liga` = '{$c->getIdLiga()}' AND `id_usuario` = '{$c->getIdUsuario()}' LIMIT 1";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $resultado['qtd_comentario'];
        return $qtd_c;

        //So far Inútil

    }
}

//$comentario = new ComentarEsporte(3, 1, "Esporte topp");
//$c = new CrudComentarEsporte();
//$c->insert_comentario_esporte($comentario);
//$a = $c->getComentariosPorEsporteLimitado($comentario);
//print_r($a);