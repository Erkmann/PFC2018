<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/formUp.css" type="text/css"> </head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="#">TCC</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <a class="btn navbar-btn ml-2 text-white btn-secondary">
                <i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp;Login</a>
        </div>
    </div>
</nav>

<?php if (isset($_GET['rota']) AND $_GET['rota'] == "liga"){
echo "<div class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <form class=\"bg-light\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label>Nome Liga</label>
                        <input type=\"text\" name=\"nome\" class=\"form-control\" placeholder=\"Nome\">
                    </div>
                    <div class=\"form-group\">
                        <label>Esporte da Liga</label>
                        <select name=\"esporteLiga\">
                            <option>Nome 1</option>
                            <option>Nome 2</option>
                        </select>
                    </div>
                    <div class=\"form-group\">
                        <label>Historia da Liga</label>
                        <input name=\"historia\" type=\"text\" class=\"form-control\" placeholder=\"Historia\">
                    </div>
                    <div class=\"form-group\">
                        <label>Data de Fundação</label>
                        <input name=\"fundacao\" type=\"text\" class=\"form-control\" placeholder=\"Quando foi Fundada\">
                    </div>
                    <div class=\"form-group\">
                        <label>País de Origem</label>
                        <input name=\"pais\" type=\"text\" class=\"form-control\" placeholder=\"País de Origem\">
                    </div>
                    <div class=\"form-group\">
                        <label>Regulamento</label>
                        <input name=\"regulamento\" type=\"text\" class=\"form-control\" placeholder=\"Regulamento\">
                    </div>

                    <div class=\"form-group\">
                        <input type=\"file\" name=\"icone\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
";
}

if(isset($_GET['rota']) AND $_GET['rota'] == "esporte"){
    echo "<div class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <form class=\"bg-light\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label>Nome Esporte</label>
                        <input type=\"text\" name=\"nome\" class=\"form-control\" placeholder=\"Nome\">
                    </div>
                    <div class=\"form-group\">
                        <label>Historia do Esporte</label>
                        <input name=\"historia\" type=\"text\" class=\"form-control\" placeholder=\"Historia\">
                    </div>
                    <div class=\"form-group\">
                        <label>Numero de Praticantes no Mundo</label>
                        <input name=\"numPraticantes\" type=\"text\" class=\"form-control\" placeholder=\"Número de Praticantes\">
                    </div>
                    <div class=\"form-group\">
                        <label>Regulamento</label>
                        <input name=\"regulamento\" type=\"text\" class=\"form-control\" placeholder=\"Regulamento\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"file\" name=\"icone\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>";
}

if(isset($_GET['rota']) AND $_GET['rota'] == "equipe"){
    echo "<div class=\"py-5 bg-light\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <form class=\"bg-light\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
                    <div class=\"form-group\">
                        <label>Nome Equipe</label>
                        <input type=\"text\" name=\"nome\" class=\"form-control\" placeholder=\"Nome\">
                    </div>
                    <div class=\"form-group\">
                        <label>Numero de Torcedores</label>
                        <input name=\"numeroTorcedores\" type=\"text\" class=\"form-control\" placeholder=\"Numero de Torcedores\">
                    </div>
                    <div class=\"form-group\">
                        <label>Data de Fundação</label>
                        <input name=\"fundacao\" type=\"text\" class=\"form-control\" placeholder=\"Quando foi Fundada\">
                    </div>
                    <div class=\"form-group\">
                        <label>Títulos</label>
                        <input name=\"titulos\" type=\"text\" class=\"form-control\" placeholder=\"Títulos\">
                    </div>
                    <div class=\"form-group\">
                        <input type=\"file\" name=\"icone\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>";
}

if(isset($_GET['rota']) AND $_GET['rota'] == "craque"){
    include_once 'forms/formAddCraque.php';
}
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>