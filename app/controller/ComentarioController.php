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
        $resRotaL = $d->verificaInput($rota);
        $resIdUserL = $d->verificaInput($id_usuario);
        $resIdLigaL = $d->verificaInput($id_liga);
        $resTxtComentarioL = $d->verificaInput($txt_comentario);

        if ($resRotaL != $rota OR $resIdUserL != $id_usuario OR $resIdLigaL != $id_liga OR $resTxtComentarioL != $txt_comentario){
          echo 'Caracteres Improprios, revise suas entradas!';
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
         $resRotaE = $d->verificaInput($rota);
         $resIdUserE = $d->verificaInput($id_usuario);
         $resIdEsporteE = $d->verificaInput($id_esporte);
         $resTxtComentarioE = $d->verificaInput($txt_comentario);


        if ($resRotaE != $rota OR $resIdUserE != $id_usuario OR $resIdEsporteE != $id_esporte OR $resTxtComentarioE != $txt_comentario){
            echo 'erro';
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

        $d = new Dicionario();
         $resRotaEq = $d->verificaInput($rota);
         $resIdUserEq = $d->verificaInput($id_usuario);
         $resIdEquipeEq = $d->verificaInput($id_equipe);
         $resTxtComentarioEq = $d->verificaInput($txt_comentario);



        if ($resRotaEq != $rota OR $resIdUserEq != $id_usuario OR $resIdEquipeEq != $id_equipe OR $resTxtComentarioEq != $txt_comentario){
            echo 'erro1';
            die();
        }

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

        $d = new Dicionario();
         $resRotaC = $d->verificaInput($rota);
         $resIdUserC = $d->verificaInput($id_usuario);
         $resIdCraqueC = $d->verificaInput($id_craque);
         $resTxtComentarioC = $d->verificaInput($txt_comentario);

        if ($resRotaC != $rota OR $resIdUserC != $id_usuario OR $resIdCraqueC != $id_craque OR $resTxtComentarioC != $txt_comentario){
            echo 'erro';
            die();
        }

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