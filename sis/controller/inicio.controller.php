<?php
session_start();
error_reporting(0);
// Obligatorios
include '../common/config.php';
include '../functions/functions.php';
require '../post/post.php';//Si se va a trabajar con envio de datos.

require_once '../models/general.class.php';// clases general query
$gen = new generalQuery();
require '../models/login.class.php';// clases login
include '../common/login_validate.php';// archivo que valida la sesion de usuario
include '../common/theme.php';// archivo que actualiza el tema.


// LOGIN
/*echo '<br><br><br><br><br><br>';
echo 'nombre -> '.$nombre_usuario.'<br>';
echo 'opcion -> '.$user_op.'<br>';
echo 'area   -> '.$user_tipo.'<br>';
*/


//Datos Generales x Archivo
$type_sys = SYS;
$htmlTitulo = 'Bienvenido '.$nombre_usuario;

// Inicializa variable.
$hidden = '';
$block = '';
$msg = '';


$hidden = 'hidden';
$block = 'block';


##########################  MENU  ######################################

    $arg_btn_home = array(
        //array('icono','titulo','link','hidden/block')
        array('th'  ,'<br>Módulo de<br> Banners'   ,'banner.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Categorias'   ,'categoria.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Tipos'   ,'tipo.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Productos'   ,'producto.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Detalles de Productos'   ,'producto_detalle.php'    , "block")
    );

    $htmlBtnHome = btn_link_home($arg_btn_home);
    $htmlMenu = menu_view($arg_btn_home);

##########################  FIN-MENU  ##################################



?>
