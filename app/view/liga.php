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
                if (txt_comentario == ''){
                    alert('Campo em Branco!');
                }

                else{

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


                        }if(data == 'Caracteres Improprios, revise suas entradas!'){
                            //var comentarios = $("#comentarios").html();
                            // location.reload();
                            alert('Caracteres Improprios, revise suas entradas!');
                        }

                        else {

                            location.reload();
                        }


                    }

            )}
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

        .cabecalho{
            background-color: #E4F0E4;
            font-family:  cursive;
            width: 100%;
        }

        .chamada_comentario{
            font-family: cursive;
        }

        .conteudo{
            padding: 10px 20px 10px 20px;
        }

        .contentI{
            box-shadow: 0px 0px 12px #888888;
            padding: 10px 0 10px 0 ;
            border-radius: 0.5em;
        }

        .contentB{
            padding: 0.6em 0 0.5em 0;
            margin-bottom: 0;
        }

        .h1{
            text-align: center;
        }

        h1{
            text-align: center;
        }

        .p{
            text-align: center;
        }

        #txt_comentario{
            margin-bottom: 0.5em;
        }

        #exclui_comentario{
            margin-top: 100px !important;
        }

        .text-hide{
            height: 0;
            width: 0;
        }

        .comentario{
            box-shadow: 0 0 12px #888888;
            margin-top: -0.3em;
        }

        .contentC{
            padding: 10px 10px 10px 10px;
        }

        .btns{
            margin-top: 0.05em;
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
  <div class="py-2">
    <div class="container inico contentI">
      <div class="row linha">
        <div class="col-md-6 ">
          <img class="img-fluid d-block imagemPerfil rounded-circle mx-auto" style="width: 350px; height: 350px;" src="<?= $liga->getIconLiga();?>"> </div>
        <div class="col-md-6">
          <h2 class="display-1 text-capitalize"><?= $liga->getNomeLiga() ?></h2>
          <p class="lead">Fundação: <?= $liga->getFundacao() ?>
            <br>Localização: <?= $liga->getPais() ?></p>
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


  <div class="py-1">
    <div class="container">
      <div class="row contentB">
          <div class="col-md-3">
              <a class="btn btns btn-primary w-50 mx-5 text-center
" href="#equipes">Equipes</a>
          </div>
        <div class="col-md-3">
          <a class="btn btns btn-primary w-50 text-center  mx-5
" href="#regulamento">Regulamento</a>
        </div>
        <div class="col-md-3">
          <a class="btn btns btn-primary w-50 mx-5 text-center text-capitalize
" href="#historia">Historia</a>
        </div>
          <div class="col-md-3">
              <a class="btn btns btn-primary w-50 mx-5 text-center text-capitalize
" href="#esporte">Esporte</a>
          </div>
      </div>
    </div>
  </div>

    <div class="container py-2">

      <div class="row contentI">
        <div class="col-md-3 conteudo">
          <a name="equipes">
            <h1 class="">Equipes</h1>
          </a>

              <p class=""><?php foreach ($equipes as $equipe):?>
                      <a href="TimeController.php?rota=ver&id=<?= $equipe->getIdEquipe(); ?>"><?= $equipe->getNomeEquipe(); ?></a><br>
                  <?php endforeach;?>
              </p>
          </div>


        <div class="col-md-3 conteudo">
          <a name="regulamento">
            <h1 class="">Regulamento</h1>
          </a>
            <p class=""><?= $liga->getRegulamento() ?></p>
          </div>

        <div class="col-md-3 conteudo">
          <a name="historia">
            <h1 class="">História</h1>
          </a>

          <p class=""><?= $liga->getHistoria() ?> </p>
      </div>



              <div class="col-md-3 conteudo">
                  <a name="esporte">
                      <h1 class="">Esporte</h1>
                  </a>



                  <p class="p">
                          <a class="" href="EsporteController.php?rota=ver&id=<?= $esporte->getIdEsporte(); ?>"><?= $esporte->getNomeEsporte(); ?></a><br>
                  </p>

      </div>
  </div>
  </div>
  <div class="py-5">
      <div class="container">
          <div class="row">
              <div class="col-md-4 contentC contentI">
                  <label>Deixe seu comentário</label>
                  <input id="txt_comentario" type="text" class="form-control" placeholder="Digite seu comentário">
                  <input type="submit" id="submit_comentario"  class="btn btn-primary">
              </div>
          </div>
      </div>
  </div>

  <div class="">
      <div class="container">
          <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                  <h1 class="chamada_comentario">COMENTÁRIOS</h1>
              </div>
              <div class="col-md-4"></div>
          </div>
      </div>
  </div>
  <?php foreach ($comentariosArrayObj as $comentario): ?>
      <div class="container">
  <div id = "comentarios" class="py-1">
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 comentario">
          <div class="row">
              <div class="col-md-12">

                  <p id="id_comentario" class="text-hide"><?= $comentario->getIdComentario() ?></p>
                  <p id="txt_comentario_feito" class="text-hide"><?= $comentario->getTxtComentario() ?> </p>

                  <p id="text_comentario" class="cabecalho lead text-left">TEXTO: <?= $comentario->getTxtComentario() ?> </p>

                  <p id="id_user_comentario" class="  text-left"> <?php $usuarioComentario = $crudU->getUsuario($comentario->getIdUsuario()); echo $usuarioComentario->getNomeUsuario()?></p>
                  <p id="date_comentario" class="  text-left"> <?= $comentario->getDtComentario() ?> </p><br>



                  <div class="row py-1 col-12"><div class="col-6"><a id="exclui_comentario" href="ComentarioController.php?rota=excluir_comentario_liga&id_usuario=<?= $_SESSION['id'] ?>&id_comentario=<?= $comentario->getIdComentario()?>&txt_comentario=<?= $comentario->getTxtComentario()?>&id_liga=<?= $comentario->getIdLiga() ?>&dt_comentario=<?= $comentario->getDtComentario() ?>"><img id="close_icon" src="../../assets/images/close_icon.png" width="20px"></a>
                      </div>
                      <div class="col-6"><a id="edita_comentario" href="ComentarioController.php?rota=edita_comentario_liga&id_usuario=<?= $_SESSION['id']?>&id_comentario=<?= $comentario->getIdComentario()?>&txt_comentario=<?= $comentario->getTxtComentario()?>&id_liga=<?= $comentario->getIdLiga()?>&dt_comentario=<?= $comentario->getDtComentario() ?>"><img id="update_icon" src="../../assets/images/update_icon.png" width="20px"></a>
                      </div>
              </div>
          </div>
          </div>
              <div class="col-md-2"></div>
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