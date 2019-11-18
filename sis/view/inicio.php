<?php require_once '../controller/inicio.controller.php'; ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta lang="ES">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>::Inicio::</title>
    <link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">
    <link rel="stylesheet" type="text/css" href="app/css/summernote.css">
    <script src="app/js/jquery.js"></script>
    <script src="app/js/summernote.js"></script>
    <script src="app/js/bootstrap.js"></script>
    <script src="app/js/app.js"></script>
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>

    <style type="text/css">
      /* TEMA */
      <?= $styleMask; ?>

        body{
            background: url(app/img/fondo-home.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
  </head>

  <body>

    <?php include 'tpl/header.php'; ?>

    <div class="wrapper" id="wrapper">
      <!-- LEFT -->
        <div class="left-container" id="left-container">
          <div class="hide-sidebar" id="show-nav">
            <form method="POST">
                <ul id="side" class="side-nav">
                    <?= $htmlMenu;/*$menu;*/ ?>
                </ul>
            </form>
            <!--div class="link-hdc">
              <small>
                Desarrollado por <a href="<?= EMP_WEB; ?>" target="_blank"><?= EMP_NAME; ?></a>
              </small>
            </div-->
          </div>
        </div>

      <!-- RIGHT -->
        <div class="right-container" id="right-container">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-8">
                <ul class="list-inline pull-right mini-stat">
                  <?= $htmlInfoCant; ?>
                </ul>
              </div>
            </div>
              <br><br>
            <div class="row">
                <div class="col-xs-12">
                  <center>
                    <h1>
                      <b><?= $htmlTitulo; ?></b>
                    </h1>
                  </center>

                  <br><br><br><br>

                  <div class="col-xs-12 section-home">
                      <p><big>Elija el área al que desea ingresar:</big></p>
                    <center>
                    <?= $htmlBtnHome; ?>
                    </center>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <footer>
      <center class="foot">
        <a href="https://likeseasons.com/" target="_blank"><small>Desarrollado por LIKESEASONS</small></a>
      </center>
      <?php include '../modules/form_mask.php'; ?>
    </footer>

  </body>

</html>
