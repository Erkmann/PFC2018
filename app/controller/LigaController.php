<?php

require_once __DIR__."/../crud/CrudLiga.php";
require_once __DIR__."/../crud/CrudUsuario.php";
require_once __DIR__."/../crud/CrudComentarLiga.php";
require_once __DIR__."/../crud/CrudComentarLiga.php";



if ($_GET['rota'] == 'ligas'){
    $crud = new CrudLiga();
    $ligas = $crud->getLigas();
    require_once "../view/viewLigas.php";

}elseif ($_GET['rota'] == 'ver'){
    $crudU = new CrudUsuario();
    $crud = new CrudLiga();
    $liga = $crud->getLiga($_GET['id']);
    $equipes = $crud->getEquipes($_GET['id']);
    $esporte = $crud->getEsporteLiga($liga);
    $curtidas = $crud->contadorCurtidas($liga);
    $comentarios = $crud->getComentariosPorLigaLimitado($liga);
    $comentariosArrayObj = [];
    $nomes = [];
    foreach ($comentarios as $comentario){
        $id_usuario = $comentario->getIdUsuario();
        $id_liga = $comentario->getIdLiga();
        $txt_comentario = $comentario->getTxtComentario();
        $dt_comentario = $comentario->getDtComentario();
        $id_comentario = $comentario->getIdComentario();
        $usuario_comentario = $crudU->getUsuario($id_usuario);
        $nome = $usuario_comentario->getNomeUsuario();
        $nomes[] = $nome;
        $comentarioObj = new ComentarLiga($id_liga, $id_usuario, $txt_comentario);
        $comentarioObj->setDtComentario($dt_comentario);
        $comentarioObj->setIdComentario($id_comentario);

        $comentariosArrayObj[] = $comentarioObj;
        //$comentariosArrayObj = array_reverse($comentariosArrayObj, true);
        //TODO MOSTRAR POR PRIMEIRO OS COMENTÁRIOS MAIS ATUAIS



//        $usuarios = [];
//        foreach ($usuarios as $user){
//            $user = new CrudUsuario();
//            $user->getDadosUserLogado($id_usuario);
//            $usuarios[] = $user;
//            echo $usuarios[0];
//        }
    }

    require_once "../view/liga.php";
}

elseif ($_GET['rota'] == 'editar'){

    $l = new CrudLiga();
    $ligaV = $l->getLiga($_GET['id']);
    if ($_FILES['icone']['size'] > 0){
        include_once '../view/gravaupload.php';
    $ligaN = new Liga($_POST['nome'], $_POST['historia'], $_POST['fundacao'], $_POST['regulamento'], $_POST['pais'], $_GET['id'], $_POST['esporte'], "../../assets/images/".$nomearq);}
    else {$ligaN = new Liga($_POST['nome'], $_POST['historia'], $_POST['fundacao'], $_POST['regulamento'], $_POST['pais'], $_GET['id'], $_POST['esporte'], $ligaV->getIconLiga());}
    $l->updateLiga($ligaN);

    header('location: UsuarioController.php?rota=getUsers');
}

elseif ($_GET['rota'] == 'cadastrar'){
    include_once '../view/gravaupload.php';
    $l = new CrudLiga();
    $ligaN = new Liga($_POST['nome'], $_POST['historia'], $_POST['fundacao'], $_POST['regulamento'], $_POST['pais'], null, $_POST['esporte'], "../../assets/images/".$nomearq);

    $l->insertLiga($ligaN);

    header('location: UsuarioController.php?rota=getUsers');
}





?>