<?php 
require_once '../common/config.php';
require_once '../models/general.class.php';
require_once '../models/view.class.php';
require_once '../models/modules.class.php';

$datos  = new Datos();
$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['todos'])){
    $arrayProducts = $datos->getProducts();
    $JSONdatos = json_encode($arrayProducts,JSON_UNESCAPED_UNICODE);
    echo $JSONdatos;
}

if(isset($data['solicitud'])){
    $arrayTipos = $datos->getTipos();
    $JSONdatos = json_encode($arrayTipos,JSON_UNESCAPED_UNICODE);
    echo $JSONdatos;
}

?>