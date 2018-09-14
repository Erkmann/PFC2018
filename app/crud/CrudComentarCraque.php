<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 24/07/2018
 * Time: 17:46
 */
require_once __DIR__."/../database/Conexao.php";
require_once __DIR__."/../model/ComentarCraque.php";
class CrudComentarCraque
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insert_comentario_craque(ComentarCraque $c){
        $sql = "INSERT INTO `comentar_craques`(`id_craques`, `id_usuario`, `txt_comentario`) VALUES ('{$c->getIdCraque()}', '{$c->getIdUsuario()}', '{$c->getTxtComentario()}')";
        $this->conexao->exec($sql);

    }

    /**
     * @param ComentarLiga $c
     */
    public function delete_comentario_craque(ComentarCraque $c)
    {
        $sql = "DELETE FROM `comentar_craques` WHERE `id_comentario` = '{$c->getIdComentario()}'";
        $this->conexao->exec($sql);
    }

    public function update_comentario_craque(ComentarCraque $c)
    {
        $sql = "UPDATE `comentar_craques` SET `txt_comentario`= '{$c->getTxtComentario()}',`dt_comentario`= CURRENT_TIMESTAMP WHERE `id_comentario` =  '{$c->getIdComentario()}'";
        $this->conexao->exec($sql);

    }

    public function getComentariosPorCraqueLimitado(ComentarCraque $c)
    {
        $sql = "SELECT * FROM `comentar_craques` WHERE `id_craques` = '{$c->getIdCraque()}' ORDER BY `comentar_craques`.`dt_comentario` DESC LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {
            $id_comentario = $comentario['id_comentario'];
            $id_craque = $comentario['id_craques'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentario->setIdComentario($id_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }

    public function getComentariosPorCraqueTotal(ComentarCraque $c)
    {
        $sql = "SELECT * FROM `comentar_craques` WHERE `id_craques` = '{$c->getIdCraque()}' ORDER BY `dt_comentario` desc LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {

            $id_comentario = $comentario['id_comentario'];
            $id_craque = $comentario['id_craques'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
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
}

//$a = new ComentarCraque(1, 1, "Que craquee");
//$a->setIdComentario(1);
//$b = new CrudComentarCraque();
//$c = $b->getComentariosPorCraqueTotal($a);
//print_r($c);