<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/viewEsportes.css" type="text/css"> </head>

<body>
<?php



if(isset($_SESSION['tipo']) AND $_SESSION['tipo'] != '2'){
    require_once "navLoged.php";
}
elseif (!isset($_SESSION['tipo'])){
    require_once "navUnloged.php";
}
elseif(isset($_SESSION) AND $_SESSION['tipo'] == '2'){
    require_once "navLogedAdmin.php";
}?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome Liga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ligas as $l):?>
                    <tr>
                        <td><?= $l->getIdLiga(); ?></td>
                        <td><a href="../controller/LigaController.php?rota=ver&id=<?= $l->getIdLiga();?>"><?= $l->getNomeLiga();?></a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 27%"></div>
</div><div class="text-white bg-secondary">
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