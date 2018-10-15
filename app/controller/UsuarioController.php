<?php

require_once __DIR__.'/../crud/CrudUsuario.php';
require_once __DIR__.'/../crud/CrudEquipe.php';
require_once __DIR__.'/../crud/CrudLiga.php';
require_once __DIR__.'/../crud/CrudLigaEquipe.php';
require_once __DIR__.'/../crud/CrudCraques.php';
require_once __DIR__.'/../crud/CrudCraqueEquipe.php';
require_once __DIR__.'/../crud/CrudEsporte.php';
require_once __DIR__.'/../crud/CrudPesquisa.php';
require_once __DIR__.'/../model/Email.php';

function formularioCadastro(){
    //abir a tela
    include_once '../view/cadastro.php';

}

function cadastrar(){

    $usuario = new Usuario($_POST['usuario'],$_POST['senha'], $_POST['email']);
    $crudUsuario = new CrudUsuario();
    $crudUsuario->cadastrarUsuario($usuario);

    $id = $crudUsuario->getId($_POST['email'], $_POST['senha']);

    $subject = 'Email de Confirmacao!';
    $message = "Para confirmar seu Email acesse: "."http://localhost/GitHub/PFC2018/app/controller/UsuarioController.php?rota=verificar&id=".$id;

    $email = new Email($_POST['email'], $subject, $message);
    $email->sendEmail();

    include_once '../view/alertaV.php';
}

function formularioLogin(){

    require_once '../view/login.php';

}

function chamarVerificarLogin(){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $a = new CrudUsuario();
    $res = $a->verificaLogin($email, $senha);

    if ($res != "nao" and is_object($res)){
        session_start();
        $id = $res->getIdUsuario();
        $_SESSION['nome'] = $res->getNomeUsuario();
        $_SESSION['tipo'] = $res->getIdTipoUsuario();
        $_SESSION['id']   = $id;

        header('Location: HomeController.php?rota=logado');
    }
    elseif ($res == "nao"){
        header('location: alertaController.php?rota=login');

    }


}

function getUsers(){
    $c = new CrudUsuario();
    $a = $c->getUsuarios();
    $t = new CrudEquipe();
    $l = new CrudLiga();
    $cr = new CrudCraques();
    $e = new CrudEsporte();

    $ligas = $l->getLigas();
    $equipes = $t->getEquipes();
    $craques = $cr->getAtletas();
    $esportes = $e->buscarEsportes();


    include_once '../view/admin.php';
}


function editar(Usuario $usuario){
    $c = new CrudUsuario();
    $c->editar_usuario($usuario);
    header ('location: UsuarioController.php?rota=getUsers');
}

function logout(){
    session_start();
    session_destroy();
    header('location: HomeController.php');
}

function deletar($id){

    $c = new CrudUsuario();
    $c->deletarUsuario($id);
    header ('location: UsuarioController.php?rota=getUsers');

}

function changePassword($email,$id){
    $c = new CrudUsuario();
    $user = $c->getUsuarioByEmail($email);

    if ($id != $user->getIdPass()){
        die('Nao eh seu usuario!');
    }

    include_once "../view/forms/changePassword.php";

}

function attSenha($senha, $id){

    $c = new CrudUsuario();
    $c->updateSenha($senha,$id);
    header('location: HomeController.php');
}

function reeenviarEmailConfirmacao($id, $email){
    $subject = 'Email de Confirmacao!';
    $message = "Para confirmar seu Email acesse: "."http://localhost/GitHub/PFC2018/app/controller/UsuarioController.php?rota=verificar&id=".$id;

    $emailE = new Email($email, $subject, $message);
    $emailE->sendEmail();

}

function pesquisa($termo){
    $c = new CrudPesquisa();
    $resultado = $c->pesquisa($termo);

    include_once '../view/resultadoPesquisa.php';

}

if ($_GET['rota'] == "cadastrar"){
    formularioCadastro();
} elseif ($_GET['rota'] == "editar" AND isset($_GET['id'])){
    $c = new CrudUsuario();
    $usuario = $c->getUsuario($_GET['id']);
    include_once "../view/formEdituser.php";

} elseif ($_GET['rota'] == 'realizar_cadastro'){
    cadastrar();
} elseif ($_GET['rota'] == 'logar'){
    formularioLogin();
} elseif ($_GET['rota'] == 'esportes'){
    cadastrar();
}
elseif ($_GET['rota'] == 'verificaLogin'){
    chamarVerificarLogin();
}
elseif ($_GET['rota'] == "logout"){
    logout();

}
elseif ($_GET['rota'] == "getUsers"){
    getUsers();
}
elseif ($_GET['rota'] == "deletar" AND  isset($_GET['id'])){
    deletar($_GET['id']);
}
elseif ($_GET['rota'] == "editar2" AND isset($_GET['id'])){
    $u = new Usuario($_POST['usuario'], $_POST['senha'], $_POST['email'],null,$_GET['id']);
    editar($u);
}
elseif ($_GET['rota'] == "deletarE" AND  isset($_GET['id'])){
    $a = new CrudEsporte();
    $a->deleteEsporte($_GET['id']);
    header ('location: UsuarioController.php?rota=getUsers');
}
elseif ($_GET['rota'] == "deletarL" AND  isset($_GET['id'])){
    $a = new CrudLiga();
    $liga = $a->getLiga($_GET['id']);

    $a->deleteLiga($liga->getIdLiga());
    header ('location: UsuarioController.php?rota=getUsers');
}
elseif ($_GET['rota'] == "deletarCr" AND  isset($_GET['id'])){
    $a = new CrudCraques();
    $a->deleteCraque($_GET['id']);
    header ('location: UsuarioController.php?rota=getUsers');
}

elseif ($_GET['rota'] == "deletarT" AND  isset($_GET['id'])){
    $a = new CrudEquipe();
    $a->deleteEquipe($_GET['id']);
    header ('location: UsuarioController.php?rota=getUsers');
}

elseif($_GET['rota'] == "editarEform"   and isset($_GET['id'])){
    $e = new CrudEsporte();
    $esporte = $e->buscarEsporte($_GET['id']);
    include_once "../view/forms/formAttEsporte.php";


}

elseif($_GET['rota'] == "editarLform"   and isset($_GET['id'])){
    $es = new CrudEsporte();
    $esportes = $es->buscarEsportes();
    $e = new CrudLiga();
    $liga = $e->getLiga($_GET['id']);
    include_once "../view/forms/formAttLiga.php";


}

elseif ($_GET['rota'] == 'editarCform' and isset($_GET['id'])){
    $c = new CrudCraques();
    $cr = $c->getAtleta($_GET['id']);
    $e = new CrudEquipe();
    $equipes = $e->getEquipes();
    $ec = new CrudCraqueEquipe();
    $equipesJa = $ec->getEquipesDeUmCraque($_GET['id']);

    include "../view/forms/formAttCraque.php";

}

elseif ($_GET['rota'] == 'editarEqform' and isset($_GET['id'])){
    $c = new CrudEquipe();
    $equipe = $c->getEquipe($_GET['id']);
    $l = new CrudLiga();
    $ligas = $l->getLigas();
    $el = new CrudLigaEquipe();
    $ligasJa = $el->getLigasDeUmTime($_GET['id']);


    include_once "../view/forms/formAttEquipe.php";

}

elseif($_GET['rota'] == 'cadastrarEq'){
    $c = new CrudLiga();
    $ligas = $c->getLigas();
    require_once "../view/forms/formAddEquipe.php";
}

elseif($_GET['rota'] == 'cadastrarL'){
    $c = new CrudEsporte();
    $esportes = $c->buscarEsportes();
    require_once "../view/forms/formAddLiga.php";
}

elseif($_GET['rota'] == 'cadastrarEs'){
    require_once "../view/forms/formAddEsporte.php";
}


elseif ($_GET['rota'] == 'cadastroForm'){
    include_once "../view/forms/formAddCraque.php";
}

elseif ($_GET['rota'] == 'about'){
    include_once "../view/about.php";
}

elseif ($_GET['rota'] == 'verificar'){
    $c = new CrudUsuario();
    $c->verificarUserEmail($_GET['id']);

include_once "../view/alertaVd.php";
}

elseif ($_GET['rota'] == 'changePass'){
    changePassword($_GET['email'],$_GET['id']);
}

elseif ($_GET['rota'] == 'chamarCh'){
    include_once "../view/forms/email.php";
}

elseif ($_GET['rota'] == 'enviarEmailCh'){
    $c = new CrudUsuario();
    $user = $c->getUsuarioByEmail($_POST['email']);

    if ($user->getVerificado() != 1){
        include_once "../view/alertaEV.php";
        die();
    }

    $idP = $c->updateIdPass($user->getIdUsuario());

    $subject = 'Alterar Senha';
    $message = "Para alterar sua senha acesse: "."http://localhost/GitHub/PFC2018/app/controller/UsuarioController.php?rota=changePass&id=".$idP."&email=".$_POST['email'];

    $email = new Email($_POST['email'], $subject, $message);
    $email->sendEmail();

    include_once "../view/alertaECh.php";

}

elseif ($_GET['rota'] == 'attSenha'){
    attSenha($_POST['senha'], $_GET['id']);
}

elseif ($_GET['rota'] == 'resendVal'){
    reeenviarEmailConfirmacao($_GET['id'], $_GET['email']);
    include_once '../view/alertaH.php';
}

elseif ($_GET['rota'] == 'chPass'){
    include_once "../view/forms/changePassL.php";
}

elseif ($_GET['rota'] == 'attSenhaL'){
    attSenha($_POST['senha'],$_GET['id']);
}

elseif ($_GET['rota'] == 'pesquisa'){
    pesquisa($_POST['termo']);
}

