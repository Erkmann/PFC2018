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

if (isset($_SESSION)){$tipo = $_SESSION['tipo'];}

if(isset($_SESSION) AND $tipo != '2'){
    require_once "../view/navLoged.php";
}
elseif (!isset($_SESSION)){
    require_once "../view/navUnloged.php";
}
elseif(isset($_SESSION) AND $tipo == '2'){
    require_once "../view/navLogedAdmin.php";
}?>



<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post"  action="LigaController.php?rota=editar&id=<?= $liga->getIdLiga() ?>" enctype="multipart/form-data" class="w-50 mx-auto">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" value="<?= $liga->getNomeLiga() ?>" placeholder="Nome da Liga" name="nome"> </div>
                    <div class="form-group">
                        <label>Historia</label>
                        <input type="text" class="form-control" value="<?= $liga->getHistoria() ?>" placeholder="Historia da Liga" name="historia"> </div>
                    <div class="form-group">
                        <label>Funcação</label>
                        <input type="text" class="form-control" value="<?= $liga->getFundacao() ?>" placeholder="Fundacao" name="fundacao"> </div>
                    <div class="form-group">
                        <label>Regras</label>
                        <input type="text" class="form-control" value="<?= $liga->getRegulamento() ?>" placeholder="Regulamento" name="regulamento"> </div>
                    <div class="form-group">
                        <label>País</label>
                        <input type="text" class="form-control" value="<?= $liga->getPais() ?>" placeholder="País" name="pais"> </div>
                    <div class="form-group">
                        <input value="" type="file" name="icone">
                    </div>
                    <div class="form-group">
                        <label>Esporte</label>
                        <select name="esporte" class="form-control">
                            <option value="<?=$liga->getIdEsporte() ?>" selected=""><?php $esp = $es->buscarEsporte($liga->getIdEsporte());  echo $esp->getNomeEsporte() ?></option>
                            <?php foreach ($esportes as $esporte):?>
                                <option value="<?= $esporte->getIdEsporte() ?>"><?= $esporte->getNomeEsporte() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>