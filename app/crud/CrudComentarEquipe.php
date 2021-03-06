<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 24/07/2018
 * Time: 16:52
 */
require_once __DIR__."/../model/ComentarEquipe.php";
require_once __DIR__."/../database/Conexao.php";
class CrudComentarEquipe
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insert_comentario_equipe(ComentarEquipe $e){
        $sql = "INSERT INTO `comentar_equipes`(`id_equipe`, `id_usuario`, `txt_comentario`) VALUES ('{$e->getIdEquipe()}', '{$e->getIdUsuario()}', '{$e->getTxtComentario()}')";
        $this->conexao->exec($sql);

    }

    /**
     * @param ComentarLiga $c
     */
    public function delete_comentario_equipe(ComentarEquipe $e)
    {
        $sql = "DELETE FROM `comentar_equipes` WHERE `id_comentario` = '{$e->getIdComentario()}'";
        $this->conexao->exec($sql);
    }

    public function update_comentario_equipe(ComentarEquipe $e)
    {
        $sql = "UPDATE `comentar_equipes` SET `txt_comentario`= '{$e->getTxtComentario()}',`dt_comentario`= CURRENT_TIMESTAMP WHERE `id_comentario` =  '{$e->getIdComentario()}'";
        $this->conexao->exec($sql);

    }

    public function getComentariosPorEquipeLimitado(ComentarEquipe $e)
    {
        $sql = "SELECT * FROM `comentar_equipes` WHERE `id_equipe` = '{$e->getIdEquipe()}' ORDER BY `comentar_equipes`.`dt_comentario` DESC LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {
            $id_comentario = $comentario['id_comentario'];
            $id_equipe = $comentario['id_equipe'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentario->setIdComentario($id_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }

    public function getComentariosPorEquipeTotal(ComentarEquipe $e)
    {
        $sql = "SELECT * FROM `comentar_equipes` WHERE `id_equipe` = '{$e->getIdEquipe()}' ORDER BY `dt_comentario` desc LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {

            $id_comentario = $comentario['id_comentario'];
            $id_equipe = $comentario['id_equipe'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentario->setIdComentario($id_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }



    public function getComentarioById(ComentarEquipe $e)
    {
        $sql = "SELECT `id_comentario`,`id_equipe`,`id_usuario`,`txt_comentario`,`dt_comentario` FROM `comentar_equipes` WHERE id_comentario = '{$e->getIdComentario()}'";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $id_comentario = $resultado['id_comentario'];
        $id_equipe = $resultado['id_equipe'];
        $id_usuario = $resultado['id_usuario'];
        $txt_comentario = $resultado['txt_comentario'];
        $dt_comentario = $resultado['dt_comentario'];

        $comentario = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
        $comentario->setIdComentario($id_comentario);
        $comentario->setDtComentario($dt_comentario);

        return $comentario;
    }
}
//$b = new ComentarEquipe(1, 1, "Bláb");
//$b->setIdComentario(1);
//$a = new CrudComentarEquipe();
//$c = $a->getComentarioById($b);
//print_r($c);