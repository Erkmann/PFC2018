<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/admin.css" type="text/css"> </head>

<body>
<?php

if (isset($_SESSION['tipo'])){$tipo = $_SESSION['tipo'];}

if(isset($_SESSION['tipo']) AND $tipo != '2'){
    require_once "navLoged.php";
}
elseif (!isset($_SESSION['tipo'])){
    require_once "navUnloged.php";
}
elseif(isset($_SESSION['tipo']) AND $tipo == '2'){
    require_once "navLogedAdmin.php";
}?>

<div class="py-5 mx-auto text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-1">Sobre</h1>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-muted">O site se apresenta uma enciclopédia de forma a guiar usuários novatos na questão de informações sobre determinado esporte, liga, times e atletas. <br> No menu principal são apresentadas as 4 opções citadas acima, onde o usuário opta por sua categoria na qual deseja explorar. Além disso, o menu também sugere uma opção de cada categoria na sua parte inferior. <br>

                    Estão disponíveis para o usuário, sobre os esportes: sua história, o número de praticantes, regras, ídolos deste esporte e ligas. <br>

                    Estão disponíveis para o usuário, sobre as ligas: sua história, ano de fundação, regulamento, equipes que participam, país onde é disputada, ídolos desta liga e esporte na qual ela pertence.<br>

                    Estão disponíveis para o usuário, sobre os times: liga que pertence, ano de fundação, títulos conquistados, localização e maior ídolo.<br>

                    Estão disponíveis para o usuário, sobre os atletas: ano de nascimento, ano de morte, títulos conquistados e equipes que fez parte.<br>

                    O site possibilita, além das informações, as opções de like e comentários sobre todas as suas categorias, que ficam visíveis em suas respectivas páginas. Para essas funções estarem disponíveis para o usuário, ele deve se cadastrar e, posteriormente fazer o login, no site. Para o acesso a informação, login e cadastro não são necessários.
                </h3>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-bottom: 29%"></div>
<?php  require_once "../view/footer.html"?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>

