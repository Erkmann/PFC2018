<hmtl>
    <head>
        <body>
            <?php require_once  __DIR__. '/../controller/EsporteController.php' ?>
            <p>Nome: <?= $esporte->getNomeEsporte() ?></p>
            <p>História: <?= $esporte->getHistoria() ?></p>
            <p>Número de Praticantes: <?= $esporte->getNumPraticantes() ?></p>
            <p>Regras: <?= $esporte->getRegras() ?></p>
        </body>
    </head>
</hmtl>