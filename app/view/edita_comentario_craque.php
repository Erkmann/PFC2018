<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/esporte.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="">
<?php
if (isset($_SESSION)) {
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
<div class="py-5">
    <div class="container">
        <div class="row">
            <p id="id_comentario" class="text-hide"><?= $comentario_real->getIdComentario() ?></p>
            <p id="id_usuario" class="text-hide"><?= $comentario_real->getIdUsuario() ?></p>
            <p id="id_craque" class="text-hide"><?= $comentario_real->getIdCraque() ?></p>
            <p id="dt_comentario" class="text-hide"><?= $comentario_real->getDtComentario() ?></p>

        </div>
        <div class="col-md-6  offset-md-3">
            <div class="form-group">
                <label>Comentário</label>
                <input type="text" value="<?= $comentario_real->getTxtComentario() ?>" class="form-control" id="txt" ></div>



            <a id="botao_edita"> <button type="submit" class="btn btn-primary">Enviar</button></a>

        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 24%"></div>
<div class="text-white bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="text-center text-white">©</p>
            </div>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" style=""></script>
<script>
$("#botao_edita").click(function () {
    var txt = $("#txt").val();
    var id_comentario = $("#id_comentario").html();
    var id_usuario = $("#id_usuario").html();
    var id_craque = $("#id_craque").html();
    //var dt_comentario $("#dt_comentario").html();

    $.get("ComentarioController.php",
        {
            rota: "fimEditarCraque",
            id_comentario: id_comentario,
            texto: txt,
            id_usuario: id_usuario,
            id_craque: id_craque

        }, function (data){
            window.history.back();

        }

    )
})
</script>

</body>

</html>