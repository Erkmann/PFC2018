<?php
session_start();

require_once "../crud/CrudEquipe.php";
require_once "../crud/CrudLiga.php";
require_once "../crud/CrudUsuario.php";
require_once "../crud/CrudLigaEquipe.php";
$rota = $_GET['rota'];

if ($rota == "times"){
    $c = new CrudEquipe();
    $equipes = $c->getEquipes();
    require_once "../view/viewTimes.php";
}elseif ($rota == "ver"){
    $crudU = new CrudUsuario();
    $c = new CrudEquipe();
    $time = $c->getEquipe($_GET['id']);
    $ligass = $c->getLigasEquipe($time);
    $craques = $c->getCraqueEquipe($time);
    $curtidas = $c->contadorCurtidas($time);
    $comentarios = $c->getComentariosPorEquipeLimitado($time);
    $comentariosArrayObj = [];
    $nomes = [];
    foreach ($comentarios as $comentario){
        $id_usuario = $comentario->getIdUsuario();
        $id_equipe = $comentario->getIdEquipe();
        $txt_comentario = $comentario->getTxtComentario();
        $dt_comentario = $comentario->getDtComentario();
        $usuario_comentario = $crudU->getUsuario($id_usuario);
        $nome = $usuario_comentario->getNomeUsuario();
        $nomes[] = $nome;
        $comentarioObj = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
        $comentarioObj->setDtComentario($dt_comentario);

        $comentariosArrayObj[] = $comentarioObj;
        //TODO MOSTRAR POR PRIMEIRO OS COMENTÁRIOS MAIS ATUAIS



    }
    require_once '../view/time.php';
}


if ($rota == 'editar'){

    $c= new CrudEquipe();

    $timeV = $c->getEquipe($_GET['id']);
    if ($_FILES['icone']['size'] > 0){
        include_once '../view/gravaupload.php';
    $timeN = new Equipe($_GET['id'], $_POST['titulos'], $_POST['fundacao'], $_POST['nome'], $_POST['num_torcedores'], "../../assets/images/".$nomearq);}
    else{$timeN = new Equipe($_GET['id'], $_POST['titulos'], $_POST['fundacao'], $_POST['nome'], $_POST['num_torcedores'], $timeV->getIconEquipe());}

    $c->updateEquipe($timeN);
    $cA = new CrudLigaEquipe();

    $cA->deleteUpdt($_GET['id']);

    foreach ($_POST['select'] as $post){
        $assoc = new LigaEquipe(null, $post, $_GET['id']);
        $cA->insertLigaEquipe($assoc);
    }

    header('location: UsuarioController.php?rota=getUsers');

}

elseif ($_GET['rota'] == 'cadastrar'){

    include_once '../view/gravaupload.php';
    $c = new CrudEquipe();
    $eqN = new Equipe(null, $_POST['titulos'], $_POST['fundacao'], $_POST['nome'], $_POST['num_torcedores'], "../../assets/images/".$nomearq);

    $c->insertEquipe($eqN);
    $cA = new CrudLigaEquipe();

    $equipes = $c->getEquipes();

    foreach ($equipes as $eq){
        if ($eq->getIconEquipe() == $eqN->getIconEquipe()){
            foreach ($_POST['select'] as $post){
                $assoc = new LigaEquipe(null, $post, $eq->getIdEquipe());
                $cA->insertLigaEquipe($assoc);
            }
        }
    }



    header('location: UsuarioController.php?rota=getUsers');

}
