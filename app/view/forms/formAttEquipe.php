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
                <form method="post" enctype="multipart/form-data"  action="TimeController.php?rota=editar&id=<?= $equipe->getIdEquipe() ?>" class="w-50 mx-auto">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" value="<?= $equipe->getNomeEquipe() ?>" placeholder="Nome da Equipe" name="nome"> </div>
                        <div class="form-group">
                        <label>Fundação</label>
                        <input type="text" class="form-control" value="<?= $equipe->getFundacao() ?>" placeholder="Fundacao" name="fundacao"> </div>
                    <div class="form-group">
                        <label>Numero de Torcedores</label>
                        <input type="text" class="form-control" value="<?= $equipe->getNumeroTorcedores() ?>" placeholder="Numero de Torcedores" name="num_torcedores"> </div>
                    <div class="form-group">
                        <label>Títulos</label>
                        <input type="text" class="form-control" value="<?= $equipe->getTitulos() ?>" placeholder="Titulos" name="titulos"> </div>
                    <div class="form-group">
                        <input  type="file" name="icone">
                    </div>
                    <div class="form-group">
                        <label>Ligas da Equipe</label>
                        <br>
                            <?php foreach ($ligas as $liga){
                                $contagem = 0;
                                foreach ($ligasJa as $ligaJ){
                                    if ($ligaJ->getIdLiga() == $liga->getIdLiga()){
                                        $contagem += 1;
                                    }
                                }

                                if ($contagem == 0){
                                    echo "<input type=\"checkbox\" name=\"select[]\" value=\"".$liga->getIdLiga()."\">".$liga->getNomeLiga()."<br>";
                                }

                                else {
                                    echo "<input type=\"checkbox\" checked name=\"select[]\" value=\"".$liga->getIdLiga()."\">".$liga->getNomeLiga()."<br>";
                                }

                            }?>






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