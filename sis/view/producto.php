<?php require_once '../controller/producto.controller.php'; ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta lang="ES">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>::Módulo de Productos::</title>
    <link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    <script src="app/js/jquery.js"></script>
    <script src="app/js/bootstrap.js"></script>
    <script src="app/js/summernote.js"></script>
    <script src="app/js/app.js"></script>
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
                    <?= $htmlMenu; ?>
                </ul>
            </form>
          </div>
        </div>

      <!-- RIGHT -->
        <div class="right-container <?= $body; ?>" id="right-container">
          <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                  <center class="title-pag">
                    <h3>
                      <b><?= $htmlTitulo; ?></b>
                    </h3>
                    <?= $vf; ?>
                  </center>
                  <div class="col-xs-12 section-home">
                    <center>
                        <form class="" id="principal-form" action="<?= URL; ?>" method="post">
                          <center>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                              <?= $msg; ?>
                            </div>
                          </center>

                          <div class="text-left hidden">
                            <select  name="producto_categoria_select" id="producto_categoria_select">
                              <option selected disabled>Seleccionar</option>
                              <?= $htmlOptionsCategoria; ?>
                            </select>

                            <select  name="producto_subcategoria_select" id="producto_subcategoria_select">

                            </select>

                            <button class="btn btn-success">
                              Filtrar
                            </button>
                          </div>

                          <div class="form-conten">
                            <?= $htmlDinamicList_1; ?>
                          </div>
                        </form>
                    </center>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Formulario para agregar/modificar -->
    <div class="section-float-form section-usuario-form-2">
      <form action="<?= URL; ?>" method="POST" enctype="multipart/form-data">
        <div class="col-xs-12">
          <div class="text-form text-just">
            <h4>
              <b>
                Agregar nuevo registro
              </b>
            </h4>
            <p>
              Toda transacción que realice es almacenada,
              se recomienda verificar los datos antes de ser guardados. <span class="glyphicon glyphicon-thumbs-up" style="color:blue;"></span>
            </p>
          </div>
          
          <div class="obj-form">         
            <div class="section-input">
              <label>Ingrese Nombre</label>
                <input type="text" class="form-control" name="producto_nombre" required>
            </div>
            <div class="section-input">
              <label>Ingrese Identificiador:</label>
              <input type="text" class="form-control" name="producto_identificador" required>
            </div>
            <div class="section-input">
              <label>Subir Imagen:</label>
              <input type="file" class="form-control btn-success" name="producto_foto" id="producto_foto" accept="image/*" value="" required>
                <small><b>Nota:</b> Medidas recomendadas: 552x552</small>
            </div>
            <div class="section-input">
              <label>Ingrese Precio:</label>
              <input type="text" class="form-control" name="producto_precio" required>
            </div>
            <div class="section-input">
              <label>Ingrese Descuento</label>
              <input type="text" class="form-control" name="producto_descuento" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="section-input">
                <label>Elija la Categoría del Producto</label>
                <?= $listaCategorias; ?>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="section-input">
                <label>Elija el Tipo del Producto</label>
                <?= $listaTipos; ?>
              </div>
          </div>
            
            <!-- hidden obj -->
            <div class="section-input">
              <button type="submit" name="btn-op-2" value="agregar-exe/<?= $btn_op; ?>/<?= $valor_filtro; ?>/<?= $valor_pagina; ?>" class="btn btn-success btn-save">
                Guardar <span class="glyphicon glyphicon-saved"></span>
              </button>
              <br><br><br>
              <button type="button" class="btn btn-danger btn-close-form" id="closeFormRight-2">
                Ocultar <span class="glyphicon glyphicon-chevron-right"></span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <footer>
        <section class="view-desactivados" id="view-desactivados">
            <div class="container table-des">
                <form action="<?= URL; ?>" method="post">
                    <div class="section-table">
                      <?= $htmlDinamicList_2; ?>
                    </div>

                    <div class="btn-section text-right">
                        <button type="submit" class="btn btn-success" name="btn-op-2" value="activar-exe/<?= $btn_op; ?>/<?= $proyecto_id; ?>/<?= $page; ?>">
                          <span class="glyphicon glyphicon-ok" aria-hidden="true" style="font-size:14px;"></span>
                          Activar
                        </button>

                        <button type="button" class="btn btn-danger" id="close-view-des">
                          Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </footer>
    <script src="app/js/app.js"></script>
  </body>

</html>
