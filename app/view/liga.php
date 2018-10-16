<?php session_start();
    ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../assets/liga.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            var verificadorBotao = 0;
            var num_curtidas = $("#numCurtidas").html();
            var id_usuario = $("#b").html();
            var id_liga = $("#a").html();
            var text_comentario = $("#txt_comentario_feito").html();
            var dt_comentario = $("#dt_comentario").html();
            var user_comentario = $("#id_user_comentario").html();
            var id_comentario = $("#id_comentario").html();


            $.get("CurtirController.php",
                {
                    rota: "corLiga",
                    id_usuario: id_usuario,
                    id_liga: id_liga
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
                        rota: "curtirLiga",
                        numClicks: verificadorBotao,
                        id_usuario: id_usuario,
                        id_liga: id_liga

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
                        rota: "comentarLiga",
                        id_liga: id_liga,
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
        @import url("https://fonts.googleapis.com/css?family=Fredoka+One");
        @import url('../../assets/fonts/FredokaOne-Regular.ttf');
        @import url("https://fonts.googleapis.com/css?family=Alfa+Slab+One");
        @import url('../../assets/fonts/AlfaSlabOne-Regular.ttf');

        .curtido{
            background-color: #12bbad ;
        }

        #close_icon{
            margin-left: 90%;
        }

        #linha_separa_comentarios{
            width: 100%;
            height: 0.3%;
            background-color: #827674;
        }
        .cabecalho{
            background-color: #E4F0E4;
            font-family:  cursive;
            width: 80%;
        }

        .chamada_comentario{
            font-family: cursive;
        }


    </style>

</head>

<body>

  <?php
  if (isset($_SESSION)) {
      $tipo = $_SESSION['tipo'];
  }
  if (isset($_SESSION["tipo"]) AND $_SESSION['tipo'] != '2') {
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
        <div class="col-md-4 ">
          <img class="img-fluid d-block rounded-circle mx-auto" style="width: 350px; height: 350px;" src="<?= $liga->getIconLiga();?>"> </div>
        <div class="col-md-6 offset-md-1">
          <h3 class="display-1"><?= $liga->getNomeLiga() ?></h3>
          <p class="lead">Fundação: <?= $liga->getFundacao() ?>
            <br>País: <?= $liga->getPais() ?></p>
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
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
          <div class="col-md-3">
              <a class="btn btn-primary w-50 mx-5 text-center p-1
margin_vertical_1" href="#equipes">Equipes</a>
          </div>
        <div class="col-md-3">
          <a class="btn btn-primary w-50 text-center p-1 mx-5
margin_vertical_1" href="#regulamento">Regulamento</a>
        </div>
        <div class="col-md-3">
          <a class="btn btn-primary w-50 mx-5 text-center text-capitalize p-1
margin_vertical_1" href="#historia">Historia</a>
        </div>
          <div class="col-md-3">
              <a class="btn btn-primary w-50 mx-5 text-center text-capitalize p-1
margin_vertical_1" href="#esporte">Esporte</a>
          </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a name="equipes">
            <h1 class="">Equipes</h1>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5 bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <p class=""><?php foreach ($equipes as $equipe):?>
                          <a href="TimeController.php?rota=ver&id=<?= $equipe->getIdEquipe(); ?>"><?= $equipe->getNomeEquipe(); ?></a><br>
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
          <a name="regulamento">
            <h1 class="">Regulamento</h1>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5 bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <p class=""><?= $liga->getRegulamento() ?></p>
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
          <p class=""><?= $liga->getHistoria() ?> </p>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <a name="esporte">
                      <h1 class="">Esporte</h1>
                  </a>
              </div>
          </div>
      </div>
  </div>

  <div class="py-5 bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <p class="">
                          <a href="EsporteController.php?rota=ver&id=<?= $esporte->getIdEsporte(); ?>"><?= $esporte->getNomeEsporte(); ?></a><br>
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
  <div class="py-5 bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="chamada_comentario">COMENTÁRIOS</h1>
              </div>
          </div>
      </div>
  </div>
  <?php foreach ($comentariosArrayObj as $comentario): ?>

  <div id = "comentarios" class="py-5">
      <div class="container">
          <a id="exclui_comentario" href="ComentarioController.php?rota=excluir_comentario_liga&id_usuario=<?= $_SESSION['id'] ?>&id_comentario=<?= $comentario->getIdComentario()?>&txt_comentario=<?= $comentario->getTxtComentario()?>&id_liga=<?= $comentario->getIdLiga() ?>&dt_comentario=<?= $comentario->getDtComentario() ?>"><img id="close_icon" src="../../assets/images/close_icon.png" width="20px"></a>
          <a id="edita_comentario" href="ComentarioController.php?rota=edita_comentario_liga&id_usuario=<?= $_SESSION['id']?>&id_comentario=<?= $comentario->getIdComentario()?>&txt_comentario=<?= $comentario->getTxtComentario()?>&id_liga=<?= $comentario->getIdLiga()?>&dt_comentario=<?= $comentario->getDtComentario() ?>"><img id="update_icon" src="../../assets/images/update_icon.png" width="20px"></a>
          <div class="row">
              <div class="col-md-12">
                  <p id="id_user_comentario" class=" lead text-left">USUÁRIO: <?php $usuarioComentario = $crudU->getUsuario($comentario->getIdUsuario()); echo $usuarioComentario->getNomeUsuario()?></p>
                  <p id="date_comentario" class=" lead text-left">DATA: <?= $comentario->getDtComentario() ?> </p><br>
                  <p id="text_comentario" class="cabecalho lead text-left">TEXTO: <?= $comentario->getTxtComentario() ?> </p>
                  <p id="id_comentario" class="text-hide"><?= $comentario->getIdComentario() ?></p>
                  <p id="txt_comentario_feito" class="text-hide"><?= $comentario->getTxtComentario() ?> </p>

              </div>
          </div>
      </div>
  </div>
  <div id="linha_separa_comentarios"></div>

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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="../../assets/scripts/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>