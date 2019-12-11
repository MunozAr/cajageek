<?php

switch(URL){
  case 'producto.php':
    $idBtnAdd = 'callFormRight-2';
    $filenameBtnAdd = 'producto-form.php';
    $venderAccion = 'display:none';
  break;
  case 'banner.php':
    $idBtnAdd = 'callFormRight-2';
    $filenameBtnAdd = 'banner-form.php';
    $venderAccion = 'display:none';
  break;
  case 'categoria.php':
    $idBtnAdd = 'callFormRight-2';
    $filenameBtnAdd = 'banner-form.php';
    $venderAccion = 'display:none';
  break;
  case 'tipo.php':
    $idBtnAdd = 'callFormRight-2';
    $filenameBtnAdd = 'banner-form.php';
    $venderAccion = 'display:none';
  break;
  case 'departamento.php':
    $idBtnAdd = 'callFormRight-2';
    $filenameBtnAdd = 'departamento-form.php';
    $venderAccion = '';
  break;
}



?>

<header>
  <section class="header-1" style="background: rgba(141, 194, 229, 1);">
    <div class="col-xs-2 hidden-xs">

    </div>
    <div class="col-xs-6 col-md-8">
      <center>
        <a class="" href="inicio.php">
          <img src="app/img/logoCajeGeek.png">
        </a>
      </center>
    </div>
    <div class="col-xs-6 col-md-2">
      <div class="" style="color:#fff;padding-top: 4px;">
        <i class="fa fa-user "></i> <?= $head_nombre_usuario; ?></i>
      </div>
    </div>

  </section>
</header>


<nav class="navbar navbar-inverse top-bar navbar-fixed-top" style="box-shadow: 0px 0px 4px black;">
  <!--div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <i class="fa fa-cog" style="color"></i>
    </button>
    <div class="icon-m" id="icon-m" style="">
      <span class="menu-icon" id="menu-icon">
          <i class="fa fa-bars" aria-hidden="true" id="chang-menu-icon"></i>
    </span>
    </div>
    </div -->
    <div class="nav navbar-right " id="myNavbar">
        <ul class="nav navbar-nav col-xs-12">
        <li class="op-menu">
            <a href="inicio.php" class="btn btn-danger">
              Inicio
            </a>
          </li>
          <li class="op-menu">
            <button type="button" class="btn-no hidden-xs" id="<?= $idBtnAdd; ?>">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Agregar
            </button>
          </li>
          <li class="op-menu">
            <button type="submit" form="principal-form" class="btn-no visible-xs" formaction="<?= $filenameBtnAdd; ?>" name="btn-op-form" value="agregar-form">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Agregar
            </button>
          </li>
          <li class="op-menu" style="<?= $venderAccion; ?>">
              <button type="submit" form="principal-form" name="btn-op-2" value="vender-exe/<?= $btn_op; ?>//<?= $page; ?>" class="btn-no" title="Vender Seleccionados">
                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                Vender
              </button>
          </li>
          <li class="op-menu">
              <button type="submit" form="principal-form" name="btn-op-2" value="desactivar-exe/<?= $btn_op; ?>//<?= $page; ?>" class="btn-no" title="Desactivar seleccionados">
                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                Desactivar
              </button>
          </li>
          <li class="op-menu">
              <button type="submit" form="principal-form" name="btn-op-2" value="eliminar-exe/<?= $btn_op; ?>//<?= $page; ?>" class="btn-no" title="Eliminar seleccionados">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Eliminar
              </button>
          </li>
          <li class="op-menu">
            <button type="button" class="btn-no" id="btn-view-des">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              Ver desactivados
            </button>
          </li>
          <li class="op-menu">
            <a id="buscador" style="cursor: pointer;">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              Buscador
            </a>
          </li>
          <li class="op-menu hidden">
            <a>
              <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
              Ver en Web
            </a>
          </li>
          <li class="op-menu">
            <a id="opciones" style="cursor: pointer;">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              Otras Opciones
            </a>
          </li>
        </ul>
    </div>
  </div>
</nav>

<section class="buscador form-g" id="buscador">
      <input type="text" class="form-control" name="txt-search" form="principal-form" placeholder="Escriba el nombre que desea buscar" value="<?= $txt_search; ?>" id="input-search">
      <div class="input-group-btn btn-emerg text-right">
        <button disabled type="submit" form="principal-form" class="btn btn-success btn-search" name="btn-op" value="buscar-exe" id="btn-search">
          Buscar
        </button>
        <button type="button" class="btn btn-danger btn-search" id="close-search">
          Cerrar
        </button>
      </div>
</section>

<section class="opciones form-g">
    <div class="col-xs-12 sec-btn-op">
      <a href="contactenos.php" class="btn btn-primary form-control text-left" id="info-hdc" name="session-close" value="session-close" style="border-radius:0px;">
        <i class="fa fa-envelope"></i>
        Contáctenos LIKESEASONS
      </a>
    </div>
    <div class="col-xs-12  sec-btn-op">
      <form action="<?= URL; ?>" method="POST">
        <button class="btn btn-primary form-control" name="session-close" value="session-close" style="color:#fff;">
          <i class="fa fa-power-off"></i>
          Cerrar sesión
        </button>
      </form>
    </div>
    <div class="col-xs-12 text-right">
      <button type="button" class="btn btn-danger btn-opciones" id="close-opciones">
        Cerrar
      </button>
    </div>
</section>
