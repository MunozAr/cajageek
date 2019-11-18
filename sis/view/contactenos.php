<?php require_once '../controller/contactenos.controller.php'; ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta lang="ES">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>::Contáctenos::</title>
    <link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">
    <script src="app/js/jquery.js"></script>
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

            /*overflow: hidden; */
        } 
        
    </style>
  </head>

  <body id="scene-1">

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
              <div class="col-xs-12">
                <center>
                  <h1>
                    <b>Contáctenos</b>
                  </h1>
                </center>

                <br>
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                  <?= $msg; ?>
                </div>
                <br>

                <div class="col-xs-12 col-md-6 col-md-offset-3 section-home form-contact">
                      <div class="col-xs-12">
                        <p>
                          <big>
                            Si quiere contactarse con nosotros, es muy simple,  solo tiene que llenar el formulario o llamarnos al (511) 719 7160. Con gusto le atenderemos.
                          </big>
                        </p>
                      </div>
                      <form action="<?= URL; ?>" method="post" enctype='multipart/form-data'>

                        <div class="col-xs-12 col-md-12 text-center sec-contact-form">
                          <br><br>
                         <b>1. Elija el asunto:</b>
                         <br><br>
                         <select name="contact-asunto" class="form-control" id="select-c" required>
                           <option value="Consulta">Consulta</option>
                           <option value="Reporte de errores">Reporte de errores</option>
                           <option value="Mayor Informacíon">Mayor Informacíon</option>
                           <option value="Otro">Otro</option>
                         </select>  
                        </div>

                        <div class="col-xs-12 col-md-12 text-center sec-contact-form" id="scene-2">
                          <br><br>
                          <b>2. Detallenos su mensaje:</b>
                          <br><br>
                          <textarea name="contact-mensaje" class="form-control msg-contac" placeholder="Escriba aquí" id="select-t" required></textarea>
                        </div>

                        <div class="col-xs-12 col-md-12 text-center sec-contact-form" id="scene-3">
                          <br><br>
                          <b>3. Si necesita adjunar algun archivo, puede hacerlo aqui: </b>
                          <br><br>
                          <input name="contact-archivo" type="file" class="form-control" name="">
                          
                          <div class="text-left">
                            <small><strong>Nota:</strong> solo puede adjuntar maximo de 20MB </small>                            
                          </div>
                        </div>

                        <div class="col-xs-12 col-md-12 text-center btn-contact sec-contact-btn-form" id="scene-4">
                          <br><br>
                          <b>4. Envianos el mensaje: </b>
                          <br><br>
                          <button type="submit" class="btn-lg">Enviar</button>
                          <button type="reset" class="btn-lg">Limpiar</button>
                        </div>

                        <center>
                          <button type="button" id="subir-top">
                            <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>                           
                          </button>
                        </center>

                      </form>
                </div>
              </div>
            </div>          
          </div>
        </div>
    </div>
    
    <footer>
      <center class="foot">
        <a href="https://agenciahdc.com/" target="_blank"><small>Desarrollado por HDC</small></a>
      </center>
      <?php include '../modules/form_mask.php'; ?>  
    </footer>


<script type="text/javascript">
$("#subir").click(function(){
  //obtenemos la posición en la que se encuentra el botón
  var posicion_boton2 = $("#scene-1").offset().top;

  //hacemos scroll hasta el botón
  $("html, body").animate({scrollTop:posicion_boton2+"px"});
})


$('#select-c').change(function(){
  var posicion_boton2 = $("#scene-2").offset().top;
  $("html, body").animate({scrollTop:posicion_boton2+"px"},1500); 
});


$('#select-t').change(function(){
  var posicion_boton2 = $("#scene-3").offset().top;
  $("html, body").animate({scrollTop:posicion_boton2+"px"},1500); 
});

$('#subir-top').click(function(){
  var posicion_boton2 = $("#scene-1").offset().top;
  $("html, body").animate({scrollTop:posicion_boton2+"px"},1100); 
});

</script>


  </body>

</html>