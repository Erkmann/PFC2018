<html>
    <head>
        <body>
            <?php require_once __DIR__. '/../controller/LigaController.php' ?>

            <ul>
                <li><?php foreach ($ligas as $liga): ?>

                        <div class="col-md-3">
                            <a href="?rota=ver&id=<?= $liga->getIdLiga()?>"><?= $liga->getNomeLiga(); ?></a>
                        </div>

                    <?php endforeach; ?></li>
            </ul>


        </body>
    </head>
</html>