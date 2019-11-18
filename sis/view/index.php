<?php require_once '../controller/login.controller.php';  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta lang="ES">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<title>:: Iniciar Sesión ::</title>
	<link rel="stylesheet" type="text/css" href="app/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="app/css/login.style.css">
	<script src="app/js/jquery.js"></script>
	<script src="app/js/bootstrap.js"></script>
	<script src="app/js/login.jquery.js"></script>

    <style>
        body{
            background: url(app/img/<?= IMG_FOUND; ?>.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>
    <body >
	   <div class="container" id="body-log">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 main" id="side">
                <div class="col-sm-6 left-side">
                    <h1>Bienvenido a la intranet de su web</h1>
                    <br>
                    <p>
                        Desde el momento que ingrese, toda transacción que realice es almacenada, se recomienda verificar los cambios antes de ser guardados.
                    </p>
                    <div class="space-log"></div>
                    <p><small>Desarrollado por <?= EMP_NAME; ?></small></p>
                    <div class="btn-link-log">
                        <a class="btn fb" href="<?= EMP_FB; ?>" target="_blank">Visite nuestro facebook</a>
                        <a class="btn tw" href="<?= EMP_WEB; ?>" target="_blank">Visita nuestra web</a>
                    </div>
                </div>
                <div class="col-sm-6 right-side">
                    <h1>Administrador</h1>
                    <p>Ingrese sus datos de acceso</p>
                    <div class="form">
                        <form action="<?= URL; ?>" method="post">
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <input type="text" id="user" name="user" autofocus  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <div class="d-xs" id="icon-view-pass">
                                    <button class="btn btn-view-pass" type="button" id="view-pass">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        <i></i>
                                    </button>
                                </div>
                            </div>
                            <div class="text-xs-center">
                                <button type="submit" class="btn btn-deep-purple">Ingresar</button>
                            </div>
                        </form>
                        <div class="msg-log">
                            <?= $msg_login; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-redirect">
            <div class="red-logo">LIKESEASONS</div>
            <div class="text-center">
                <h3>
                    <div class="load-animate-1"></div>
                    Estamos verificando sus datos de acceso. <br>En breve será redirigido a la página principal.
                </h3>
            </div>
        </div>
    </body>
</html>
