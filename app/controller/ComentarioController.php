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
require_once __DIR__.'/../model/Dicionario.php';

//TODO UM X PARA EXCLUIR O COMENTÁRIO, E UMA CHAVEZINHA PARA ATUALIZAR

if ($_GET['rota'] == 'comentarLiga') {
    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_liga = $_GET['id_liga'];
        $txt_comentario = $_GET['txt_comentario'];

        $d = new Dicionario();
        $resRota = $d->verificaInput($rota);
        $resIdUser = $d->verificaInput($id_usuario);
        $resIdLiga = $d->verificaInput($id_liga);
        $resTxtComentario = $d->verificaInput($txt_comentario);
        if ($resRota == false OR $resIdUser == false OR $resIdLiga == false OR $resTxtComentario == false){
            include_once '../view/alertaSql.php';
            die();
        }
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

        $d = new Dicionario();
        $resRota = $d->verificaInput($rota);
        $resIdUser = $d->verificaInput($id_usuario);
        $resIdEsporte = $d->verificaInput($id_esporte);
        $resTxtComentario = $d->verificaInput($txt_comentario);
        if ($resRota == false OR $resIdUser == false OR $resIdEsporte == false OR $resTxtComentario == false){
            echo "NAO PODE";
            die();
        }

        $crud = new CrudComentarEsporte();
        $comentario = new ComentarEsporte($id_esporte, $id_usuario, $txt_comentario);
        //print_r($comentario);

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

if ($_GET['rota'] == 'excluir_comentario_esporte'){

    if (isset($_SESSION['tipo'])){
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_esporte = $_GET['id_esporte'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];
        $comentarioSolicitado = new ComentarEsporte($id_esporte, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);

        //print_r($comentarioSolicitado);

        $crud = new CrudComentarEsporte();
        $comentario_real = $crud->getComentarioByIdObject($comentarioSolicitado);




        if ($comentario_real == $comentarioSolicitado){
            $crud->delete_comentario_esporte($comentario_real);
            header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());
        }
        else{
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    }
    else{
        include_once "../view/alert_comentario_deslogado.html";
    }

}


if ($_GET['rota'] == 'excluir_comentario_liga') {

    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_liga = $_GET['id_liga'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];
        $comentarioSolicitado = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);


        $crud = new CrudComentarLiga();
        $comentario_real = $crud->getComentarioById($comentarioSolicitado);


        if ($comentario_real == $comentarioSolicitado) {
            $crud->delete_comentario_liga($comentario_real);
            header('Location: LigaController.php?rota=ver&id='.$comentarioSolicitado->getIdLiga());
        } else {
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    } else {
        include_once "../view/alert_comentario_deslogado.html";
    }
}

if ($_GET['rota'] == 'excluir_comentario_time') {

    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_equipe = $_GET['id_equipe'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];
        $comentarioSolicitado = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);


        $crud = new CrudComentarEquipe();
        $comentario_real = $crud->getComentarioById($comentarioSolicitado);

        if ($comentario_real == $comentarioSolicitado) {
            $crud->delete_comentario_equipe($comentario_real);
            header('Location: TimeController.php?rota=ver&id='.$comentarioSolicitado->getIdEquipe());
        } else {
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    } else {
        include_once "../view/alert_comentario_deslogado.html";
    }
}

if ($_GET['rota'] == 'excluir_comentario_craque') {

    if (isset($_SESSION['tipo'])) {
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_craque = $_GET['id_craque'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];
        $comentarioSolicitado = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);

        $crud = new CrudComentarCraque();
        $comentario_real = $crud->getComentarioById($comentarioSolicitado);

        if ($comentario_real == $comentarioSolicitado) {
            $crud->delete_comentario_craque($comentario_real);
            header('Location: CraqueController.php?rota=ver&id='.$comentarioSolicitado->getIdCraque());
        } else {
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    } else {
        include_once "../view/alert_comentario_deslogado.html";
    }
}

if ($_GET['rota'] == 'edita_comentario_esporte'){

    if (isset($_SESSION['tipo'])){
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_esporte = $_GET['id_esporte'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];

        $comentarioSolicitado = new ComentarEsporte($id_esporte, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);




        $crud = new CrudComentarEsporte();
        $comentario_real = $crud->getComentarioByIdObject($comentarioSolicitado);


        if ($comentario_real == $comentarioSolicitado){
//            $crud->update_comentario_esporte($comentario_real);
            include_once "../view/edita_comentario_esporte.php";
            //header('Location: ../view/edita_comentario_esporte.php');
        }
        else{
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    }
    else{
        include_once "../view/alert_comentario_deslogado.html";
    }

}

if ($_GET['rota'] == 'fimEditar'){
    $id_comentario = $_GET['id_comentario'];
    $txt_comentario = $_GET['texto'];
    $id_usuario = $_GET['id_usuario'];
    $id_esporte = $_GET['id_esporte'];


    $comentario = new ComentarEsporte($id_esporte, $id_usuario, $txt_comentario);
    $comentario->setIdComentario($id_comentario);
    print_r($comentario);
    $crud = new CrudComentarEsporte();
    $comentario = $crud->update_comentario_esporte($comentario);
//    header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());
}

if ($_GET['rota'] == 'edita_comentario_liga'){

    if (isset($_SESSION['tipo'])){
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_liga = $_GET['id_liga'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];

        $comentarioSolicitado = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);


        $crud = new CrudComentarLiga();
        $comentario_real = $crud->getComentarioById($comentarioSolicitado);

        if ($comentario_real == $comentarioSolicitado){
//            $crud->update_comentario_esporte($comentario_real);
            include_once "../view/edita_comentario_liga.php";
            //header('Location: ../view/edita_comentario_esporte.php');
        }
        else{
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    }
    else{
        include_once "../view/alert_comentario_deslogado.html";
    }

}

if ($_GET['rota'] == 'fimEditarLiga'){
    $id_comentario = $_GET['id_comentario'];
    $txt_comentario = $_GET['texto'];
    $id_usuario = $_GET['id_usuario'];
    $id_liga = $_GET['id_liga'];


    $comentario = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
    $comentario->setIdComentario($id_comentario);
    $crud = new CrudComentarLiga();
    $comentario = $crud->update_comentario_liga($comentario);

//    header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());
}

if ($_GET['rota'] == 'edita_comentario_time'){

    if (isset($_SESSION['tipo'])){
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_time = $_GET['id_equipe'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];

        $comentarioSolicitado = new ComentarEquipe($id_time, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);


        $crud = new CrudComentarEquipe();
        $comentario_real = $crud->getComentarioById($comentarioSolicitado);


        if ($comentario_real == $comentarioSolicitado){
//            $crud->update_comentario_esporte($comentario_real);
            include_once "../view/edita_comentario_time.php";
            //header('Location: ../view/edita_comentario_esporte.php');
        }
        else{
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    }
    else{
        include_once "../view/alert_comentario_deslogado.html";
    }

}

if ($_GET['rota'] == 'fimEditarTime'){
    $id_comentario = $_GET['id_comentario'];
    $txt_comentario = $_GET['texto'];
    $id_usuario = $_GET['id_usuario'];
    $id_time = $_GET['id_time'];


    $comentario = new ComentarEquipe($id_time, $id_usuario, $txt_comentario);
    $comentario->setIdComentario($id_comentario);
    $crud = new CrudComentarEquipe();
    $comentario = $crud->update_comentario_equipe($comentario);

//    header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());
}

if ($_GET['rota'] == 'edita_comentario_craque'){

    if (isset($_SESSION['tipo'])){
        $rota = $_GET['rota'];
        $id_usuario = $_GET['id_usuario'];
        $id_craque = $_GET['id_craque'];
        $txt_comentario = $_GET['txt_comentario'];
        $id_comentario = $_GET['id_comentario'];
        $dt_comentario = $_GET['dt_comentario'];

        $comentarioSolicitado = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
        $comentarioSolicitado->setIdComentario($id_comentario);
        $comentarioSolicitado->setDtComentario($dt_comentario);


        $crud = new CrudComentarCraque();
        $comentario_real = $crud->getComentarioById($comentarioSolicitado);

        if ($comentario_real == $comentarioSolicitado){
//            $crud->update_comentario_esporte($comentario_real);
            include_once "../view/edita_comentario_craque.php";
            //header('Location: ../view/edita_comentario_esporte.php');
        }
        else{
            //header("Location: ../view/alert_comentario.html?id=<?= $comentario_real->getIdEsporte() ");
            include_once "../view/alert_comentario.html";
            //header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());

            //echo("Esse comentário não foi feito por você");
        }
    }
    else{
        include_once "../view/alert_comentario_deslogado.html";
    }

}

if ($_GET['rota'] == 'fimEditarCraque'){
    $id_comentario = $_GET['id_comentario'];
    $txt_comentario = $_GET['texto'];
    $id_usuario = $_GET['id_usuario'];
    $id_craque = $_GET['id_craque'];


    $comentario = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
    $comentario->setIdComentario($id_comentario);
    $crud = new CrudComentarCraque();
    $comentario = $crud->update_comentario_craque($comentario);

//    header('Location: EsporteController.php?rota=ver&id='.$comentarioSolicitado->getIdEsporte());
}