<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 20/07/2018
 * Time: 09:51
 */
require_once __DIR__."/../model/ComentarLiga.php";
require_once __DIR__."/../database/Conexao.php";

class CrudComentarLiga
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insert_comentario_liga(ComentarLiga $c){
        $sql = "INSERT INTO `comentar_liga`(`id_liga`, `id_usuario`, `txt_comentario`) VALUES ('{$c->getIdLiga()}', '{$c->getIdUsuario()}', '{$c->getTxtComentario()}')";
        $this->conexao->exec($sql);

    }

    /**
     * @param ComentarLiga $c
     */
    public function delete_comentario_liga(ComentarLiga $c)
    {
        $sql = "DELETE FROM `comentar_liga` WHERE `id_comentario` = '{$c->getIdComentario()}'";
        $this->conexao->exec($sql);
    }

    public function update_comentario_liga(ComentarLiga $c)
    {
        $sql = "UPDATE `comentar_liga` SET `txt_comentario`= '{$c->getTxtComentario()}',`dt_comentario`= CURRENT_TIMESTAMP WHERE `id_comentario` =  '{$c->getIdComentario()}'";
        $this->conexao->exec($sql);

    }

    public function getComentariosPorLigaLimitado(ComentarLiga $c)
    {
        $sql = "SELECT * FROM `comentar_liga` WHERE `id_liga` = '{$c->getIdLiga()}' ORDER BY `comentar_liga`.`dt_comentario` DESC LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {
            $id_comentario = $comentario['id_comentario'];
            $id_liga = $comentario['id_liga'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentario->setIdComentario($id_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }

    public function getComentariosPorLigaTotal(ComentarLiga $c)
    {
        $sql = "SELECT * FROM `comentar_liga` WHERE `id_liga` = '{$c->getIdLiga()}' ORDER BY `dt_comentario` desc LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {

            $id_comentario = $comentario['id_comentario'];
            $id_liga = $comentario['id_liga'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
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

    }

    public function getComentarioById(ComentarLiga $l)
    {
        $sql = "SELECT `id_comentario`,`id_liga`,`id_usuario`,`txt_comentario`,`dt_comentario` FROM `comentar_liga` WHERE id_comentario = '{$l->getIdComentario()}'";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $id_comentario = $resultado['id_comentario'];
        $id_liga = $resultado['id_liga'];
        $id_usuario = $resultado['id_usuario'];
        $txt_comentario = $resultado['txt_comentario'];
        $dt_comentario = $resultado['dt_comentario'];

        $comentario = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
        $comentario->setIdComentario($id_comentario);
        $comentario->setDtComentario($dt_comentario);

        return $comentario;
    }

}


//Teste

$a = new ComentarLiga(1, 11, "Blá");
$a->setIdComentario(23);
$b = new CrudComentarLiga();
$c = $b->update_comentario_liga($a);
//print_r($c);