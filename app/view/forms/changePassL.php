<?php if(isset($_GET['erro'])){
    require_once "../controller/alertaController.php?rota=email";
}

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/cadastro.css" type="text/css">

    <script>
        function validarSenha(form){
            senha = document.formulario.senha.value;
            senhaRepetida = document.formulario.repetir_senha.value;
            if (senha != senhaRepetida){
                alert("Repita a senha corretamente");
                document.formulario.repetir_senha.focus();
                return false;
            }
        }
    </script>

</head>

<body class="">
<?php

if (isset($_SESSION['tipo'])){$tipo = $_SESSION['tipo'];}

if(isset($_SESSION['tipo']) AND $tipo != '2'){
    require_once "../view/navLoged.php";
}
elseif (!isset($_SESSION['tipo'])){
    require_once "../view/navUnloged.php";
}
elseif(isset($_SESSION['tipo']) AND $tipo == '2'){
    require_once "../view/navLogedAdmin.php";
}?>
<div class="container" style="margin-bottom: 3%"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6  offset-md-3">
            <form class="formulario" name="formulario" onsubmit="return validarSenha(this);" action="../controller/UsuarioController.php?rota=attSenhaL&id=<?=$_GET['id']?>" method="post">
                <div class="form-group"> <label>Sua nova Senha</label>
                    <input type="password" name="senha" class="form-control senha" placeholder="Senha"> </div>
                <div class="form-group"> <label>Confirme sua nova senha</label>
                    <input type="password" name="repetir_senha" class="form-control repetir_senha" placeholder="Repita a Senha"> </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
</div>
<div class="container" style="margin-bottom: 26%"></div>
<?php  require_once "../view/footer.html"?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>