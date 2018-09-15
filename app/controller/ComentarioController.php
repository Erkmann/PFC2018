<?php

if(!isset($_SESSION["tipo"]))
{
    session_start();
}
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/07/2018
 * Time: 10:55
 */
require_once __DIR__."/../crud/CrudComentarLiga.php";
require_once __DIR__."/../crud/CrudComentarEsporte.php";
require_once __DIR__."/../crud/CrudComentarEquipe.php";
require_once __DIR__."/../crud/CrudComentarCraque.php";

//TODO UM X PARA EXCLUIR O COMENTÁRIO, E UMA CHAVEZINHA PARA ATUALIZAR

if ($_GET['rota'] == 'comentarLiga') {
    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_liga = $_GET['id_liga'];
        $txt_comentario = $_GET['txt_comentario'];

        $crud = new CrudComentarLiga();
        $comentario = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
        $numComentariosExatos = $crud->getComentarioExato($comentario);
        $crud->insert_comentario_liga($comentario);

    }else{
        echo "Faça login ou cadastre-se";
    }
}

if ($_GET['rota'] == 'comentarEsporte') {
    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_esporte = $_GET['id_esporte'];
        $txt_comentario = $_GET['txt_comentario'];

        $crud = new CrudComentarEsporte();
        $comentario = new ComentarEsporte( $id_usuario, $id_esporte, $txt_comentario);
        //$numComentariosExatos = $crud->getComentarioExato($comentario);
        //try {
            //TODO PQ N CADASTRA O COMENTÁRIO
            $crud->insert_comentario_esporte($comentario);
        //}catch (Exception $e) {
        //    echo 'Caught exception: ',  $e->getMessage(), "\n";
        //}
    }else{
        echo "Faça login ou cadastre-se";
    }
}

if ($_GET['rota'] == 'comentarEquipe') {
    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_equipe = $_GET['id_time'];
        $txt_comentario = $_GET['txt_comentario'];

        $crud = new CrudComentarEquipe();
        $comentario = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
        //$numComentariosExatos = $crud->getComentarioExato($comentario);
        $crud->insert_comentario_equipe($comentario);

    }else{
        echo "Faça login ou cadastre-se";
    }
}

if ($_GET['rota'] == 'comentarCraque') {
    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_craque = $_GET['id_craque'];
        $txt_comentario = $_GET['txt_comentario'];

        $crud = new CrudComentarCraque();
        $comentario = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
        //$numComentariosExatos = $crud->getComentarioExato($comentario);
        $crud->insert_comentario_craque($comentario);

    }else{
        echo "Faça login ou cadastre-se";
    }
}

if ($_GET['rota'] == 'exclui_comentario_esporte'){
    echo "a";
    if (isset($_SESSION['tipo'])){
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_craque = $_GET['id_craque'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];


    //TODO CONTINUAR

    }

}