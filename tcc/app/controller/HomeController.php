<?php

require_once __DIR__.'/../crud/CrudEsporte.php';
require_once __DIR__.'/../crud/CrudUsuario.php';
require_once __DIR__.'/../crud/CrudLiga.php';
require_once __DIR__.'/../crud/CrudEquipe.php';
require_once __DIR__.'/../crud/CrudCraques.php';

function logado(){
    session_start();

    $e = new CrudEsporte();
    $esporteA = $e->getRandomId();
    $esporte = $e->buscarEsporte($esporteA);

    $l = new CrudLiga();
    $ligaA = $l->getRandomId();
    $liga = $l->getLiga($ligaA);

    $eq = new CrudEquipe();
    $equipeA = $eq->getRandomId();
    $equipe = $eq->getEquipe($equipeA);

    $c = new CrudCraques();
    $craqueA = $c->getRandomId();
    $craque = $c->getAtleta($craqueA);

    include_once '../view/index.php';
}

function naoLogado(){

    $e = new CrudEsporte();
    $esporteA = $e->getRandomId();
    $esporte = $e->buscarEsporte($esporteA);

    $l = new CrudLiga();
    $ligaA = $l->getRandomId();
    $liga = $l->getLiga($ligaA);

    $e = new CrudEquipe();
    $equipeA = $e->getRandomId();
    $equipe = $e->getEquipe($equipeA);

    $c = new CrudCraques();
    $craqueA = $c->getRandomId();
    $craque = $c->getAtleta($craqueA);


    include_once '../view/index.php';
}

if (isset($_GET['rota']) and $_GET['rota'] == "logado"){
    logado();
}
elseif(!isset($_GET['rota'])){
    naoLogado();
}