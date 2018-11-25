<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/viewEsportes.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script>-->
<!--        $('#pesquisa').keyup(function () {-->
<!--            var nomeFiltro = $(this).val().toLowerCase();-->
<!--            $('table tbody').find('tr').each(function () {-->
<!--                var conteudoCelula = $(this).find('td:first').text();-->
<!--                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;-->
<!--                $(this).css('display', corresponde ? '':'none');-->
<!--            })-->
<!--        })-->
<!--    </script>-->

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
                    <p class="lead text-dark">Abaixo, você encontra algumas sugestões de times e seleções que podem-lhe interessar!</p>
                </div>
            </div>
        </div>
    </div>
<div class="py-5">
    <div class="container">
        <div class="row">
<!--            <div class="col-md-12">-->
<!--                <form class="form-inline" action="">-->
<!--                    <div class="input-group"> <input type="text" id="pesquisa" class="form-control" placeholder="Filtro pelo Nome">-->
<!--                        <div class="input-group-append"> <button class="btn btn-primary" type="button"><i class="fa fa-search-->
<!-- fa-fw"></i></button> </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
            <div class="col-md-12">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($equipes as $t):?>
                        <tr>
                            <td><a href="../controller/TimeController.php?rota=ver&id=<?= $t->getIdEquipe();?>"><?= $t->getNomeEquipe();?></a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <?php  require_once "../view/footer.html"?>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>