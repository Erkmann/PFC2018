<?php require_once __DIR__. "/../../crud/CrudEquipe.php"; $e = new CrudEquipe(); $equipes = $e->getEquipes(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/attEsporte.css" type="text/css"> </head>

<body>

<?php

if (isset($_SESSION['tipo'])){$tipo = $_SESSION['tipo'];}

if(isset($_SESSION) AND $tipo != '2'){
    require_once "../view/navLoged.php";
}
elseif (!isset($_SESSION)){
    require_once "../view/navUnloged.php";
}
elseif(isset($_SESSION) AND $tipo == '2'){
    require_once "../view/navLogedAdmin.php";
}?>
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="bg-light" method="post" action="../controller/CraqueController.php?rota=cadastrar" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nome Craque</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label>Morte (se nao morreu deixe em branco)</label>
                        <input name="morte" type="text" class="form-control" placeholder="Quando morreu">
                    </div>
                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input name="nascimento" type="text" class="form-control" placeholder="Quando Nasceu">
                    </div>
                    <div class="form-group">
                        <label>Títulos</label>
                        <input name="titulos" type="text" class="form-control" placeholder="Títulos">
                    </div>
                    <div class="form-group">
                        <label>Número de Jogos</label>
                        <input name="numJogos" type="text" class="form-control" placeholder="Numero de Jogos">
                    </div>
                    <div class="form-group">
                        <input type="file" name="icone">
                    </div>
                    <label>Equipes em que Participou</label>
                    <div class="form-group">
                    <?php foreach ($equipes as $eq):?>
                        <input type="checkbox" value="<?= $eq->getIdEquipe();?>" name="equipes[]"><?= $eq->getNomeEquipe();?><br>
                    <?php endforeach; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="container" style="margin-bottom: 15em"></div>
<?php  require_once "../view/footer.html"?>
</body>
</html>
