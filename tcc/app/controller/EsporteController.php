<?php

session_start();

require_once __DIR__. '/../crud/CrudEsporte.php';
require_once __DIR__. '/../crud/CrudUsuario.php';
require_once __DIR__. '/../crud/CrudComentarEsporte.php';

function telas_individuais_esportes($id){
    $crudU = new CrudUsuario();
    $crud = new CrudEsporte();
    $esporte = $crud->buscarEsporte($id);
    $curtidas = $crud->contadorCurtidasPorEsporte($esporte);
    $ligas = new CrudEsporte();
    $ligass = $ligas->buscarLigas($esporte->getIdEsporte());
    $comentarios = $crud->getComentariosPorEsporteLimitado($esporte);
    $comentariosArrayObj = [];
    $nomes = [];
    foreach ($comentarios as $comentario) {
        $id_usuario = $comentario->getIdUsuario();
        $id_esporte = $comentario->getIdEsporte();
        $txt_comentario = $comentario->getTxtComentario();
        $dt_comentario = $comentario->getDtComentario();
        $usuario_comentario = $crudU->getUsuario($id_usuario);
        $nome = $usuario_comentario->getNomeUsuario();
        $nomes[] = $nome;
        $comentarioObj = new ComentarEsporte($id_esporte, $id_usuario, $txt_comentario);
        $comentarioObj->setDtComentario($dt_comentario);

        $comentariosArrayObj[] = $comentarioObj;
        //TODO MOSTRAR POR PRIMEIRO OS COMENTÁRIOS MAIS ATUAIS
    }
    include_once '../view/esporte.php';

}

function tela_esportes(){
    $esportes = new CrudEsporte();
    $lista_esportes = $esportes->buscarEsportes();
    require_once '../view/viewEsportes.php';
}



if ($_GET['rota'] == 'ver'){
    $id = $_GET['id'];
    telas_individuais_esportes($id);
}elseif ($_GET['rota'] == 'esportes'){
    tela_esportes();

}elseif ($_GET['rota'] == 'corEsportes'){
    $id = $_GET['id'];
    $id = $_GET['id'];
}
elseif ($_GET['rota'] == 'editar'){

    $c = new CrudEsporte();
    $esporteA = $c->buscarEsporte($_GET['id']);
    if ($_FILES['icone']['size'] > 0){
        include_once '../view/gravaupload.php';
        $eN = new Esporte($_POST['nome'], $_POST['historia'],  $_POST['numParticipantes'], $_POST['regras'], $_GET['id'], "../../assets/images/".$nomearq);}

    else { $eN = new Esporte($_POST['nome'], $_POST['historia'],  $_POST['numParticipantes'], $_POST['regras'], $_GET['id'], $esporteA->getIconEsporte());}

    $c->updateEsporte($eN);
    header('location: UsuarioController.php?rota=getUsers');

}

elseif ($_GET['rota'] == 'cadastrar'){
    include_once '../view/gravaupload.php';
    $c = new CrudEsporte();
    $eN = new Esporte($_POST['nome'], $_POST['historia'],  $_POST['numParticipantes'], $_POST['regras'], null, "../../assets/images/".$nomearq);
    $c->insertEsporte($eN);
    header('location: UsuarioController.php?rota=getUsers');

}