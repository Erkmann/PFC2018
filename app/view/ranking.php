<?php

if(!isset($_SESSION)){
session_start();
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../assets/ranking.css" type="text/css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Anton');
        @import url('../../assets/fonts/Anton-Regular.ttf');

        .cabecalho{
            background-color: #E4F0E4;
            font-family: 'Anton', sans-serif;
        }
    </style>



</head>

<body>
<?php
if (isset($_SESSION['tipo'])) {
    $tipo = $_SESSION['tipo'];
}
if (isset($_SESSION["tipo"]) AND $tipo != '2') {
    require_once "navLoged.php";
} elseif (!isset($_SESSION["tipo"])) {
    require_once "navUnloged.php";
} elseif (isset($_SESSION) AND $_SESSION["tipo"] == '2') {
    require_once "navLogedAdmin.php";
}


?>
<div class="cabecalho text-center py-5">
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-md-10">
                <p class="lead text-dark">Abaixo, você encontra o ranking dos esportes, ligas, times, e atletas mais curtidos pelos usuários.</p>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">

                    <li class="nav-item">
                        <a class="active nav-link" id="tabfourbt" href="" data-toggle="tab" data-target="#tabtwo" >Esporte</a>
                    </li>
                    <li class="nav-item">
                        <a href="" id="tabfourbt" class="nav-link" data-toggle="tab" data-target="#tabthree" >Ligas</a>
                    </li>
                    <li class="nav-item">
                        <a href="" id="tabfourbt" class="nav-link" data-toggle="tab" data-target="#tabfour">Atletas</a>
                    </li>
                    <li class="nav-item">
                        <a href="" id="tabfourbt" class="nav-link" data-toggle="tab" data-target="#tabfive" ">Times</a>
                    </li>

                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="tabtwo" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Esporte</th>
                                    <th>Curtidas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($esportes as $ee): ?>

                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><a href="EsporteController.php?rota=ver&id=<?= $ee['id_esporte']?>"><?= $ee['nome_esporte'] ?></a></td>

                                        <td>
                                            <?= $ee['qtd_curtidas'] ?>
                                            <!--<a href="../controller/UsuarioController.php?rota=deletarE&id=<?php//$ee['id_esporte'];?>" class="btn btn-danger">Excluir</a>
                                            <a href="../controller/UsuarioController.php?rota=editarEform&id=<?php //$ee['id_esporte'];?>" class="btn btn-primary">Editar</a>-->
                                        </td>
                                    </tr>
                                <?php $i += 1; endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tabthree" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Nome da Liga</th>
                                    <th>Curtidas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($ligas as $ll): ?>

                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><a href="LigaController.php?rota=ver&id=<?= $ll['id_liga']?>"><?= $ll['nome_liga'] ?></a></td>

                                        <td>
                                            <?= $ll['qtd_curtidas'] ?>
                                            <!--<a href="../controller/UsuarioController.php?rota=deletarE&id=<?php//$ee['id_esporte'];?>" class="btn btn-danger">Excluir</a>
                                            <a href="../controller/UsuarioController.php?rota=editarEform&id=<?php //$ee['id_esporte'];?>" class="btn btn-primary">Editar</a>-->
                                        </td>
                                    </tr>
                                    <?php $i += 1; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabfour" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Nome do Atleta</th>
                                    <th>Curtidas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($craques as $cc): ?>

                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><a href="CraqueController.php?rota=ver&id=<?= $cc['id_craque']?>"><?= $cc['nome_craques'] ?></a></td>

                                        <td>
                                            <?= $cc['qtd_curtidas'] ?>
                                            <!--<a href="../controller/UsuarioController.php?rota=deletarE&id=<?php//$ee['id_esporte'];?>" class="btn btn-danger">Excluir</a>
                                            <a href="../controller/UsuarioController.php?rota=editarEform&id=<?php //$ee['id_esporte'];?>" class="btn btn-primary">Editar</a>-->
                                        </td>
                                    </tr>
                                    <?php $i += 1; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabfive" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Nome da equipe</th>
                                    <th>Curtidas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($equipes as $ee): ?>

                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><a href="TimeController.php?rota=ver&id=<?= $ee['id_equipe']?>"><?= $ee['nome_equipe'] ?></a></td>

                                        <td>
                                            <?= $ee['qtd_curtidas'] ?>
                                            <!--<a href="../controller/UsuarioController.php?rota=deletarE&id=<?php//$ee['id_esporte'];?>" class="btn btn-danger">Excluir</a>
                                            <a href="../controller/UsuarioController.php?rota=editarEform&id=<?php //$ee['id_esporte'];?>" class="btn btn-primary">Editar</a>-->
                                        </td>
                                    </tr>
                                    <?php $i += 1; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-bottom: 23.5%"></div>

<div class="text-white bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="text-center text-white">©</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>