<?php 
require_once './common/config.php';
require_once './models/general.class.php';
require_once './models/view.class.php';
require_once './models/modules.class.php';


$datos  = new Datos();

if(isset($_GET['categoria']) && isset($_GET['id'])){
    $categoryName = $_GET['categoria'];
    $categoryId = (int)$_GET['id'];
    $arrayDataToCategory = $datos->getDataToCategories($categoryId);
    print_r($arrayDataToCategory);
}else{
    $categoryName = '';
    $categoryId = '';
}

$arrayCategorias = $datos->getCategories();
$countCategorias = count($arrayCategorias);
$categoria  = '';
for($i=0; $i<$countCategorias;$i++){
    $categoria .= $arrayCategorias[$i];
}





$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>