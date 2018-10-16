<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="HomeController.php">GME</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">

            <a class="btn navbar-btn ml-2 text-white btn-secondary" href="../controller/RankingController.php?rota=ranking"><i class="fa d-inline fa-lg"></i>Ranking</a>

            <a class="btn navbar-btn ml-2 text-white btn-secondary mx-1" href="UsuarioController.php?rota=logar"><i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp;Login</a>
            <a class="btn navbar-btn ml-2 text-white btn-secondary" href="UsuarioController.php?rota=cadastrar"><i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp;Cadastrar</a>
            <form method="post" action="../controller/UsuarioController.php?rota=pesquisa" class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2 form-control-sm w-50 mx-1" type="text" name="termo" placeholder="Pesquise"> <button class="btn my-2 my-sm-0 btn-outline-success" type="submit">Search</button> </form>
            <a class="btn btn-default navbar-btn" href="../controller/UsuarioController.php?rota=about">
                <i class="fa fa-question fa-fw"></i>
            </a>

        </div>
    </div>
</nav>