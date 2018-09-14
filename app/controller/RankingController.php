<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 14/08/18
 * Time: 13:34
 */
require_once __DIR__."/../crud/CrudEsporte.php";
require_once __DIR__."/../crud/CrudLiga.php";
require_once __DIR__."/../crud/CrudCraques.php";
require_once __DIR__."/../crud/CrudEquipe.php";
$rota = $_GET['rota'];

switch ($rota){

    case "ranking":
        $crudEsporte = new CrudEsporte();
        $esportes = $crudEsporte->ranking();
        $crudLiga = new CrudLiga();
        $ligas = $crudLiga->ranking();
        $crudCraque = new CrudCraques();
        $craques = $crudCraque->ranking();
        $crudEquipe = new CrudEquipe();
        $equipes = $crudEquipe->ranking();
        //foreach ($esportes as $esporte){
        //    $nome_esporte = $esporte['nome_esporte'];
        //    $qtd_curtidas = $esporte['qtd_curtidas'];
        //}
        require_once __DIR__."/../view/ranking.php";
        break;

}
