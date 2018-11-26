<?php session_start()?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/admin.css" type="text/css"> </head>

<body>
<?php

if (isset($_SESSION)){$tipo = $_SESSION['tipo'];}

if(isset($_SESSION) AND $tipo != '2'){
    require_once "navLoged.php";
}
elseif (!isset($_SESSION)){
    require_once "navUnloged.php";
}
elseif(isset($_SESSION) AND $tipo == '2'){
    require_once "navLogedAdmin.php";
}?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" class="active nav-link" id="tabfourbt" data-toggle="tab" data-target="#tabone">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabfourbt" href="" data-toggle="tab" data-target="#tabtwo" >Esporte</a>
                    </li>
                    <li class="nav-item">
                        <a href="" id="tabfourbt" class="nav-link" data-toggle="tab" data-target="#tabthree" >Ligas</a>
                    </li>
                    <li class="nav-item">
                        <a href="" id="tabfourbt" class="nav-link" data-toggle="tab" data-target="#tabfour">Atletas</a>
                    </li>
                    <li class="nav-item">
                        <a href="" id="tabfourbt" class="nav-link" data-toggle="tab" data-target="#tabfive" ">Times</a>
                    </li>

                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="tabone" role="tabpanel">

                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Email</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($a as $aa):?>

                                <tr>
                                    <td><?php echo $aa->getIdUsuario();?></td>
                                    <td><?php echo $aa->getNomeUsuario();?></td>
                                    <td><?php echo $aa->getEmail();?></td>
                                    <td>
                                        <a href="UsuarioController.php?rota=deletar&id=<?= $aa->getIdUsuario() ?>" class="btn  btn-danger">Excluir</a>
                                        <a href="UsuarioController.php?rota=editar&id=<?= $aa->getIdUsuario() ?>" class="btn  btn-primary">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="tabone" role="tabpanel">
                        <p class="">
                            <br>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Esporte</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($esportes as $ee): ?>
                                <tr>
                                    <td><?= $ee->getIdEsporte() ?></td>
                                    <td><?= $ee->getNomeEsporte() ?></td>
                                    <td>
                                        <a href="../controller/UsuarioController.php?rota=deletarE&id=<?=$ee->getIdEsporte();?>" class="btn btn-danger">Excluir</a>
                                        <a href="../controller/UsuarioController.php?rota=editarEform&id=<?=$ee->getIdEsporte();?>" class="btn btn-primary">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <a href="../controller/UsuarioController.php?rota=cadastrarEs" class="btn btn-outline-primary">Adicionar Esporte</a>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabthree" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Liga</th>
                                    <th>Esporte da Liga</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($ligas as $li): ?>
                                <tr>
                                    <td><?= $li->getIdLiga() ?></td>
                                    <td><?= $li->getNomeLiga() ?></td>
                                    <td><?php $es = $e->buscarEsporte($li->getIdEsporte()); echo $es->getNomeEsporte(); ?></td>
                                    <td>
                                        <a href="../controller/UsuarioController.php?rota=deletarL&id=<?=$li->getIdLiga();?>" class="btn btn-danger">Excluir</a>
                                        <a href="../controller/UsuarioController.php?rota=editarLform&id=<?=$li->getIdLiga();?>" class="btn btn-primary">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <a href="../controller/UsuarioController.php?rota=cadastrarL" class="btn btn-outline-primary">Adicionar Liga</a>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabfour" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Atleta</th>
                                    <th>Nascimento</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($craques as $cra): ?>
                                <tr>
                                    <td><?= $cra->getIdCraque() ?></td>
                                    <td><?= $cra->getNomeCraque() ?></td>
                                    <td><?= $cra->getnascimento() ?></td>
                                    <td>
                                        <a href="../controller/UsuarioController.php?rota=deletarCr&id=<?=$cra->getIdCraque();?>" class="btn btn-danger ">Excluir</a>
                                        <a href="../controller/UsuarioController.php?rota=editarCform&id=<?=$cra->getIdCraque();?>" class="btn btn-primary">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <a href="UsuarioController.php?rota=cadastroForm" class="btn btn-outline-primary">Adicionar Atleta</a>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabfive" role="tabpanel">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Times</th>
                                    <th>Numero de Torcedores</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($equipes as $ti): ?>
                                <tr>
                                    <td><?= $ti->getIdEquipe() ?></td>
                                    <td><?= $ti->getNomeEquipe() ?></td>
                                    <td><?= $ti->getNumeroTorcedores() ?></td>
                                    <td>
                                        <a href="UsuarioController.php?rota=deletarT&id=<?=$ti->getIdEquipe();?>" class="btn btn-danger">Excluir</a>
                                        <a href="../controller/UsuarioController.php?rota=editarEqform&id=<?=$ti->getIdEquipe();?>" class="btn btn-primary">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <a href="../controller/UsuarioController.php?rota=cadastrarEq" class="btn btn-outline-primary">Adicionar Time</a>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-bottom: 300px"></div>

<?php  require_once "../view/footer.html"?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>