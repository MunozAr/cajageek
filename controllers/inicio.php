<?php 
require_once './models/general.class.php';
require_once './models/view.class.php';
require_once './models/modules.class.php';


$datos  = new Datos();
    $categoryName = '';
    $categoryId = '';
    $estructuraTiposPorCategoria = '';
    //$randomProductos = $datos->getDataToCategories();


/*Categorias Slider*/
$arrayCategorias = $datos->getCategories();
$categoriaComponente  = '';
foreach($arrayCategorias as $categoria){
    $categoriaComponente .= $categoria;
}







$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>