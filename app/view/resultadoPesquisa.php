<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/viewEsportes.css" type="text/css">
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



if(isset($_SESSION['tipo']) AND $_SESSION['tipo'] != '2'){
    require_once "navLoged.php";
}
elseif (!isset($_SESSION['tipo'])){
    require_once "navUnloged.php";
}
elseif(isset($_SESSION) AND $_SESSION['tipo'] == '2'){
    require_once "navLogedAdmin.php";
}?>

<div class="cabecalho text-center py-5">
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-md-10">
                <p class="lead text-dark">Resultados para sua pesquisa!</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if (!isset($resultado[0][0]) AND !isset($resultado[1][0]) AND !isset($resultado[2][0]) AND !isset($resultado[3][0])){ ?>
                        <tr>
                            <td><?= 'Nenhum Resultado Encontrado!' ?></td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($resultado as $res):?>
                        <?php foreach ($res as $r):?>
                            <tr>
                                <td><a href="../controller/<?= $r['tipo'] ?>Controller.php?rota=ver&id=<?= $r['id'] ?>"><?= $r['nome'] ?></a></w></td>
                                <td><?= $r['tipo'] ?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 29%"></div>
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