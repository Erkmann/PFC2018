<?php


session_start();
require_once __DIR__. "/../crud/CrudCraques.php";
require_once __DIR__. "/../crud/CrudCraqueEquipe.php";
require_once __DIR__. "/../crud/CrudEquipe.php";
require_once __DIR__. "/../crud/CrudEsporte.php";
require_once __DIR__. "/../crud/CrudUsuario.php";
require_once __DIR__. "/../crud/CrudComentarCraque.php";
$rota = $_GET['rota'];

if ($_GET['rota'] == "atletas"){
    $c = new CrudCraques();
    $craques = $c->getAtletas();

    include_once "../view/viewAtletas.php";
}
if ($rota == 'ver'){
    $id = $_GET['id'];
    $crudU = new CrudUsuario();
    $c = new CrudCraques();
    $craque = $c->getAtleta($id);
    $equipes = $c->getEquipes($id);
    $curtidas = $c->contadorCurtida($craque);
    $comentarios = $c->getComentariosPorCraqueLimitado($craque);
    $comentariosArrayObj = [];
    $nomes = [];
    foreach ($comentarios as $comentario){
        $id_usuario = $comentario->getIdUsuario();
        $id_craque = $comentario->getIdCraque();
        $txt_comentario = $comentario->getTxtComentario();
        $dt_comentario = $comentario->getDtComentario();
        $usuario_comentario = $crudU->getUsuario($id_usuario);
        $nome = $usuario_comentario->getNomeUsuario();
        $nomes[] = $nome;
        $comentarioObj = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
        $comentarioObj->setDtComentario($dt_comentario);

        $comentariosArrayObj[] = $comentarioObj;
        //TODO MOSTRAR POR PRIMEIRO OS COMENTÁRIOS MAIS ATUAIS



//        $usuarios = [];
//        foreach ($usuarios as $user){
//            $user = new CrudUsuario();
//            $user->getDadosUserLogado($id_usuario);
//            $usuarios[] = $user;
//            echo $usuarios[0];
//        }
    }
    include_once "../view/atleta.php";
}
if ($rota == 'cadastrar'){
    include_once '../view/gravaupload.php';
    $c = new Craque(null,$_POST['nome'],$_POST['morte'], $_POST['nascimento'], $_POST['titulos'], $_POST['numJogos'], "../../assets/images/".$nomearq);
    $q = new CrudCraques();
    $q->insertCraque($c);
    $qq = new CrudCraqueEquipe();
    $id = $q->getAtletabyIcon("../../assets/images/".$nomearq);
    foreach ($_POST['equipes'] as $e) {
        $a = new CraqueEquipe(null, $id['id_craques'], $e);
        $qq->insertCraqueEquipe($a);
    }
    header('location: UsuarioController.php?rota=getUsers');

}

if ($_GET['rota'] == "cadastro"){
    require_once "../view/formUp.php?rota=craque";
}

if ($_GET['rota'] == 'editar'){



    $c = new CrudCraques();
    $craqueV = $c->getAtleta($_GET['id']);

    if ($_FILES['icone']['size'] > 0){
        include_once '../view/gravaupload.php';
    $craqueN = new Craque($_GET['id'], $_POST['nome'], $_POST['morte'], $_POST['nascimento'], $_POST['titulos'], $_POST['num_jogos'], "../../assets/images/".$nomearq);}

    else {$craqueN = new Craque($_GET['id'], $_POST['nome'], $_POST['morte'], $_POST['nascimento'], $_POST['titulos'], $_POST['num_jogos'], $craqueV->getIconCraque());}

    $c->updateCraque($craqueN);

    $cA = new CrudCraqueEquipe();

    $cA->deleteUpdt($_GET['id']);

    foreach ($_POST['select'] as $post){
        $assoc = new CraqueEquipe(null, $_GET['id'], $post);
        $cA->insertCraqueEquipe($assoc);
    }

    header('location: UsuarioController.php?rota=getUsers');

}
