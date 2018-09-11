<html>
<head>



</head>
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
<?php require_once '../controller/EsporteController.php'; ?>
<ul>
    <li><?php foreach ($lista_esportes as $esporte): ?>

        <div class="col-md-3">
            <a href="?rota=ver&id=<?= $esporte->getIdEsporte()?>"><?= $esporte->getNomeEsporte(); ?></a>
        </div>

        <?php endforeach; ?></li>
</ul>


<div class="text-white bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="text-center text-white">©</p>
            </div>
        </div>
    </div>
</div>
</body>


</html>

