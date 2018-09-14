<?php
    if(!isset($_SESSION)){
        session_start();
    }
    ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../assets/esporte.css" type="text/css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            var verificadorBotao = 0;
            var num_curtidas = $("#numCurtidas").html();
            var id_usuario = $("#a").html();
            var id_esporte = $("#b").html();

            $.get("CurtirController.php",
                {
                    rota: "corEsporte",
                    id_usuario: id_usuario,
                    id_esporte: id_esporte
                },
                function (data) {
                    $("#c").html(data);
                    var c = $("#c").html();
                    if (c == 1){
                        $("#like").addClass("curtido");

                    }
                    if (c == 0){
                        $("#like").removeClass("curtido");
                    }
                });

            $("#like").click(function () {
                verificadorBotao = verificadorBotao + 1;
                //alert(verificadorBotao);

                $.get("CurtirController.php",
                    {
                        rota: "curtirEsporte",
                        numClicks: verificadorBotao,
                        id_usuario: id_usuario,
                        id_esporte: id_esporte

                    },
                    function (data) {
                        $("#numCurtidas").html(data);
                        $("#like").toggleClass("curtido");

                    })

            })

            $("#numCurtidasD").click(function () {
                alert("Cadastre-se ou faça login");
            })

            $("#submit_comentario").click(function () {
                var txt_comentario = $("#txt_comentario").val();

                $.get("ComentarioController.php",
                    {
                        rota: "comentarEsporte",
                        id_esporte: id_esporte,
                        id_usuario: id_usuario,
                        txt_comentario: txt_comentario
                    },
                    function (data) {
                        if (data == "Faça login ou cadastre-se") {
                            //var resultado = data;
                            alert(data);


                        }else{
                            //var comentarios = $("#comentarios").html();
                            location.reload();

                        }


                    }

                )
            })
        })
    </script>

    <style>
        .curtido{
            background-color: #12bbad ;
        }
    </style>
</head>

<body>
  <?php //require_once __DIR__."/../controller/EsporteController.php"?>
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
        <div class="col-md-4   ">
          <img class="d-block mx-auto img-fluid rounded-circle" style="width: 350px; height: 350px;" src="<?= $esporte->getIconEsporte();?>"> </div>
        <div class="col-md-7 offset-md-1">
          <h1 class="display-1 text-capitalize"><?= $esporte->getNomeEsporte()?></h1>
          <p class="lead">Número de Praticantes: <?= $esporte->getNumPraticantes(); ?></p>
            <?php if (isset($_SESSION) and isset($_SESSION['tipo'])){
                echo "<a id=\"like\" class=\"btn btn-secondary\" href=\"#\">
                <i class=\"fa fa-fw fa-thumbs-o-up\"></i>Likes <p id=\"numCurtidas\">$curtidas</p></a>";
            }elseif (!isset($_SESSION) or !isset($_SESSION['tipo'])){
                echo "<a id='numCurtidasD' class=\"btn btn-secondary\" href=\"#\">
                <i class=\"fa fa-fw fa-thumbs-o-up\"></i>Likes <p id='numCurtidas'>$curtidas</p></a>";
            }
            ?>
            <p id="a" class="text-hide"><?= $_GET['id']?></p>
            <p id="b" class="text-hide"><?= $_SESSION['id']?></p>
            <p id="c" class="text-hide"></p>
          <div>



          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <a class="btn mx-5 btn-primary w-50 text-capitalize text-white text-center
margin_vertical_1" href="#regras">Regras</a>
        </div>
        <div class="col-md-4">
          <a class="btn btn-primary w-50 text-center mx-5
margin_vertical_1" href="#historia">História</a>
        </div>
        <div class="col-md-4">
          <a class="btn btn-primary mx-5 w-50
margin_vertical_1" href="#ligas">Ligas</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a name="regras">
            <h1 class="">Regras</h1>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="text-dark"><?= $esporte->getRegras(); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a name="historia">
            <h1 class="">História</h1>
          </a>
        </div>
      </div>

    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class=""><?= $esporte->getHistoria(); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a name="ligas">
            <h1 class="">Ligas</h1>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class=""><?php foreach ($ligass as $l):?>
            <a href="LigaController.php?rota=ver&id=<?= $l->getIdLiga(); ?>"><?= $l->getNomeLiga(); ?></a><br>
            <?php endforeach;?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <label>Deixe seu comentário</label>
                  <input id="txt_comentario" type="text" class="form-control" placeholder="Digite seu comentário">
                  <input type="submit" id="submit_comentario"  class="btn btn-primary">
              </div>
          </div>
      </div>
  </div>
  <?php foreach ($comentariosArrayObj as $comentario): ?>

      <div id = "comentarios" class="py-5 bg-info">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <?php        $usuarioComentario = $crudU->getUsuario($comentario->getIdUsuario()); echo $usuarioComentario->getNomeUsuario()?>

                      <p class="lead text-left"> <?= $comentario->getDtComentario() ?> <br>
                          <?= $comentario->getTxtComentario() ?>
                      </p>

                  </div>
              </div>
          </div>
      </div>
  <?php endforeach;?>

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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>