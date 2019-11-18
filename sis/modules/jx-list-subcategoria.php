<?php 
session_start();

// Obligatorios
include '../common/config.php';
require_once '../models/general.class.php';// clases general query
require_once '../models/view.class.php';// clase que genera las vistas 
require_once '../models/modules.class.php';// 
require '../models/login.class.php';// clases login
include '../common/login_validate.php';// archivo que valida la sesion de usuario

// Inicia objeto de clase
$obj = new Producto(); 

$categoria_id = $_POST['categoria_id'];

echo $obj->listaSubcategoria($categoria_id,'');

 ?>