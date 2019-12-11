<?php require_once '../controller/tipo.controller.php'; ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta lang="ES">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>::Módulo de Categorias::</title>
    <link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">
    <link rel="stylesheet" type="text/css" href="../lib/fileinput/css/fileinput.css">
    <script src="app/js/jquery.js"></script>
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    <script type="text/javascript" src="../lib/fileinput/js/plugins/piexif.js"></script>
    <script type="text/javascript" src="../lib/fileinput/js/fileinput.js"></script>
    <script type="text/javascript" src="../lib/fileinput/js/locales/fr.js"></script>
    <script type="text/javascript" src="../lib/fileinput/js/locales/es.js"></script>
    <script src="app/js/bootstrap.js"></script>

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
          </div>
        </div>

      <!-- RIGHT -->
        <div class="right-container <?= $body; ?>" id="right-container" style="padding-bottom:0px;">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12">
                <center>
                  <h3>
                    <b><?= $htmlTitulo; ?></b>
                  </h3>
                </center>
                <center>
                  <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <?= $msg; ?>
                  </div>
                </center>
                <div class="col-xs-12 section-home" style="padding-bottom:50px;">
                  <center>
                    <form class="" action="<?= URL; ?>" method="post" enctype="multipart/form-data">
                      <div class="container bg-form">

                        <div class="col-xs-12">
                            <div class="text-form text-just">
                              <h4>
                                <b>
                                  <?= $título_form; ?>
                                </b>
                              </h4>
                              <p>
                                Toda transacción que realice es almacenada,
                                se recomienda verificar los datos antes de ser guardados.
                              </p>
                            </div>
                        </div>
                        <br><br><br><br><br><br>

                 
                        <div class="col-xs-12 col-md-12 np">
                          <div class="obj-form2">
                            <!-- inputs form -->
                            <div class="col-xs-12 col-md-12 np">
                              
                              <div class="col-md-12">
                                <div class="section-input">
                                  <label>Nombre:</label>
                                  <input type="text" class="form-control" name="tipo_nombre" value="<?= $tipo_nombre; ?>">
                                </div>
                              </div>
                              <div class="col-xs-12">
                              <div class="section-input">
                                <label>Detalle del tipo de artículo:</label>
                                <textarea id="summernote1" type="text" class="form-control prod-txta" name="tipo_detalle" value=""><?= htmlspecialchars_decode($tipo_detalle); ?></textarea>
                                <small></small>

                              </div>
                            </div>
                            
                            
                            <!-- fin -->


                            <!-- hidden obj -->
                            <input type="hidden"  autocomplete="off" name="tipo_id" value="<?= $tipo_id; ?>">


                            <input type="hidden"  autocomplete="off" value="<?= $btn_op_text; ?>/<?= $btn_op; ?>/<?= $valor_filtro; ?>/<?= $valor_pagina; ?>">

                              <div class="section-btn text-right">
                                <div class="col-xs-12 sec-btn-add">
                                  <button type="submit" name="btn-op-2" value="<?= $btn_op_text; ?>/<?= $btn_op; ?>/<?= $valor_filtro; ?>/<?= $valor_pagina; ?>" class="btn btn-success">
                                    Guardar <span class="glyphicon glyphicon-saved" style="font-size:14px;"></span>
                                  </button>

                                  <button type="button" class="btn btn-danger" onclick="document.location=('tipo.php');">
                                    Regresar <span class="glyphicon glyphicon-remove" style="font-size:14px;"></span>
                                  </button>
                                </div>
                              </div>

                          </div>
                        </div>
                      </div>
                    </form>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <footer></footer>
    <script src="app/js/app.js"></script>
  </body>

</html>
