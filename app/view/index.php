<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>TCC</title>
  <meta name="description">
  <meta name="keywords">
  <meta name="author" content="">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../assets/wireframe.css">
    <link rel="stylesheet" href="../../assets/mycss.css">

    <style>
       .divfundo::before{
           content: "";
           background: url('../../assets/images/fundo.jpg');
           opacity: 0.5;
           top: 0;
           left: 0;
           bottom: 0;
           right: 0;
           position: absolute;
           z-index: -1;
           background-size: 100% 150%;
           background-repeat: no-repeat;
       }


    </style>
</head>

<body>
  <div class="collapse" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-md-7 py-4">
          <h4>About</h4>
          <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-md-3 offset-md-1 py-4">
          <h4>Contact</h4>
          <ul class="list-unstyled">
            <li>
              <a href="#" class="text-secondary">Follow on Twitter</a>
            </li>
            <li>
              <a href="#" class="text-secondary">Like on Facebook</a>
            </li>
            <li>
              <a href="#" class="text-secondary">Email me</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php



  if(isset($_SESSION['tipo']) AND $_SESSION['tipo'] != '2'){
      require_once "navLoged.php";
      }
      elseif (!isset($_SESSION['tipo'])){
      require_once "navUnloged.php";
      }
      elseif(isset($_SESSION) AND $_SESSION['tipo'] == '2'){
        require_once "navLogedAdmin.php";
      }?>
  <div class="text-center py-5 divfundo">

    <div class="container">
      <div class="row my-5 justify-content-center">
        <div class="col-md-10">
          <h1 class="text-dark" style="font-weight: bold">Bem Vindo&nbsp;</h1>
          <p class="lead text-dark" style="font-weight: bold">Abaixo, você encontra algumas sugestões de times, esportes, ligas e jogadores da qual pode se interessar!</p>
          <div class="row">
            <div class="col-md-3">
              <a class="btn m-1 w-50 text-white btn-primary" style="font-weight: bold" href="../controller/EsporteController.php?rota=esportes">Esportes</a>
            </div>
            <div class="col-md-3">
              <a class="btn m-1 w-50 text-white btn-primary" style="font-weight: bold" href="../controller/LigaController.php?rota=ligas">Ligas</a>
            </div>
            <div class="col-md-3">
              <a class="btn m-1 w-50 text-white btn-primary" style="font-weight: bold" href="../controller/TimeController.php?rota=times">Times</a>
            </div>
            <div class="col-md-3">
              <a class="btn m-1 w-50 btn-primary text-white" style="font-weight: bold" href="../controller/CraqueController.php?rota=atletas">Atletas</a>
            </div>

            <!-- Abrir PHP

            //foreach ($listaEsportes as $esporte): ?>

                <div class="col-md-3">
                    <a class="btn m-1 w-50 btn-primary text-white" href="#"></a>
                </div>
                Fechar PHP e foreach
            -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light" >
    <div class="container" style="padding-bottom: 6px; padding-top: 6px; border-spacing: 30px; background-color: #B8B8B8" >
      <div class="row">
        <div class="col-md-3 my-1">
          <div class="card">
            <img class="card-img-top img_personalizada" src="<?= $esporte->getIconEsporte(); ?>" alt="Card image cap">
            <div class="card-body">
            <p class="card-text">Seu Esporte de Hoje!</p>
              <a href="EsporteController.php?rota=ver&id=<?= $esporte->getIdEsporte(); ?>" class="btn btn-secondary text-white">Ver Mais</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-1">
          <div class="card">
            <img class="card-img-top img_personalizada" src="<?= $liga->getIconLiga(); ?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Seu(a) Torneio de Hoje!</p>
              <a href="LigaController.php?rota=ver&id=<?= $liga->getIdLiga(); ?>" class="btn btn-secondary text-white">Ver Mais
                <br> </a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 my-1">
          <div class="card">
            <img class="card-img-top img_personalizada" src="<?= $equipe->getIconEquipe(); ?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Seu Time de Hoje!</p>
              <a href="TimeController.php?rota=ver&id=<?= utf8_decode($equipe->getIdEquipe()); ?>" class="btn btn-secondary text-white">Ver Mais</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-1">
          <div class="card">
            <img class="card-img-top img_personalizada " src="../../assets/images/<?= $craque->getIconCraque(); ?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Seu(a) Craque de Hoje!</p>
              <a  href="CraqueController.php?rota=ver&id=<?= $craque->getIdCraque();?>" class="btn btn-secondary text-white">Ver Mais</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php  require_once "../view/footer.html"?>


  <!--  //TODO Remover links na pasta ao invés da internet -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>