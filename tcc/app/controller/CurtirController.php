<?php
require_once __DIR__."/../crud/CrudCurtirEsporte.php";
require_once __DIR__."/../crud/CrudCurtirLiga.php";
require_once __DIR__."/../crud/CrudCurtirEquipe.php";
require_once __DIR__."/../crud/CrudCurtirCraque.php";

if ($_GET['rota'] == "corEsporte"){
    $id_usuario = $_GET['id_usuario'];
    $id_esporte = $_GET['id_esporte'];
    $curtir = 1;

    $a = new Curtir_esporte($id_usuario, $id_esporte, $curtir);
    $b = new CrudCurtirEsporte();
    $c = $b->contadorCurtidasExata($a);

    echo $c;
}

if ($_GET['rota'] == "curtirEsporte")
    if(isset($_GET['id_usuario'])){
        $id_usuario = $_GET['id_usuario'];
        $id_esporte = $_GET['id_esporte'];
        $rota = $_GET['rota'];
        $numClicks = $_GET['numClicks'];
        $curtir = 1;

        $a = new Curtir_esporte($id_usuario, $id_esporte, $curtir);
        $b = new CrudCurtirEsporte();
        $c = $b->contadorCurtidasExata($a);
        if ($c == 0){
            $b->insertCurtirEsporte($a);
            $d = $b->contadorCurtidasPorEsporte($a);
            echo $d;
        }
        elseif ($c != 0){
            $b->deleteCurtirEsporte($a);
            $e = $b->contadorCurtidasPorEsporte($a);
            echo $e;
        }
        else{
            echo "Cadastre-se ou Faça o login";
        }
    }

if ($_GET['rota'] == "corLiga"){
    $id_usuario = $_GET['id_usuario'];
    $id_liga = $_GET['id_liga'];
    $curtir = 1;

    $a = new Curtir_liga($id_liga, $id_usuario, $curtir);
    $b = new CrudCurtirLiga();
    $c = $b->contadorCurtidasExatas($a);

    echo $c;
}

if ($_GET['rota'] == "curtirLiga") {
    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $id_liga = $_GET['id_liga'];
        $rota = $_GET['rota'];
        $numClicks = $_GET['numClicks'];
        $curtir = 1;

        $a = new Curtir_liga($id_liga, $id_usuario, $curtir);
        $b = new CrudCurtirLiga();
        $c = $b->contadorCurtidasExatas($a);
        if ($c == 0) {
            $b->insertCurtirLiga($a);
            $d = $b->contadorCurtidas($a);
            echo $d;
        } elseif ($c == 1) {
            $b->deleteCurtirLiga($a);
            $e = $b->contadorCurtidas($a);
            echo $e;
        } else {
            echo "Cadastre-se ou Faça o login";
        }
    }
}

if ($_GET['rota'] == "corTime"){
    $id_usuario = $_GET['id_usuario'];
    $id_time = $_GET['id_time'];
    $curtir = 1;

    $a = new Curtir_equipe($id_time, $id_usuario, $curtir);
    $b = new CrudCurtirEquipe();
    $c = $b->contadorCurtidasExatas($a);

    echo $c;
}

if ($_GET['rota'] == "curtirTime") {
    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $id_time = $_GET['id_time'];
        $rota = $_GET['rota'];
        $numClicks = $_GET['numClicks'];
        $curtir = 1;

        $a = new Curtir_equipe($id_time, $id_usuario, $curtir);
        $b = new CrudCurtirEquipe();
        $c = $b->contadorCurtidasExatas($a);
        if ($c == 0) {
            $b->insertCurtirEquipe($a);
            $d = $b->contadorCurtidas($a);
            echo $d;
        } elseif ($c == 1) {
            $b->deleteCurtirEquipe($a);
            $e = $b->contadorCurtidas($a);
            echo $e;
        } else {
            echo "Cadastre-se ou Faça o login";
        }
    }
}

if ($_GET['rota'] == "corCraque"){
    $id_usuario = $_GET['id_usuario'];
    $id_craque = $_GET['id_craque'];
    $curtir = 1;

    $a = new Curtir_craque($id_craque, $id_usuario, $curtir);
    $b = new CrudCurtirCraque();
    $c = $b->contadorCurtida($a);

    echo $c;
}

if ($_GET['rota'] == "curtirCraque") {
    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $id_craque = $_GET['id_craque'];
        $rota = $_GET['rota'];
        $numClicks = $_GET['numClicks'];
        $curtir = 1;

        $a = new Curtir_craque($id_craque, $id_usuario, $curtir);
        $b = new CrudCurtirCraque();
        $c = $b->verificador($a);
        if ($c == 0) {
            $b->insertCurtirCraque($a);
            $d = $b->contadorCurtida($a);
            echo $d;
        } elseif ($c == 1) {
            $b->deleteCurtirCraque($a);
            $e = $b->contadorCurtida($a);
            echo $e;
        } else {
            echo "Cadastre-se ou Faça o login";
        }
    }
}