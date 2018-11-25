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
                <form method="post"  action="EsporteController.php?rota=cadastrar" enctype="multipart/form-data" class="w-50 mx-auto">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" placeholder="Nome do Esporte" name="nome"> </div>
                    <div class="form-group">
                        <label>Historia</label>
                        <input type="text" class="form-control" placeholder="Historia do Esporte" name="historia"> </div>
                    <div class="form-group">
                        <label>Numero de Praticantes</label>
                        <input type="text" class="form-control" placeholder="Numero de Praticantes" name="numParticipantes"> </div>
                    <div class="form-group">
                        <label>Regras</label>
                        <input type="text" class="form-control" placeholder="Regras" name="regras"> </div>
                    <div class="form-group">
                        <input type="file" name="icone">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php  require_once "../view/footer.html"?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>