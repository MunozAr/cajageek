<?php 
require_once './models/general.class.php';
require_once './models/view.class.php';
require_once './models/modules.class.php';


$datos  = new Datos();

$categoryName = '';
$categoryId = '';
$estructuraTiposPorCategoria = '';
if(isset($_GET['categoria']) && isset($_GET['id'])){
    $categoryName = $_GET['categoria'];
    $categoryId = (int)$_GET['id'];
    $arrayDataToCategory = $datos->getDataToCategories($categoryId);
    $JSONproductosCategoria = json_encode($arrayDataToCategory,JSON_UNESCAPED_UNICODE);
    /*$tituloTipo = '';
    $estructuraTiposPorCategoria  = '';
    $estructuraComponentes  = '';
    foreach($arrayDataToCategory as $row){
        if($row['componentes'] != null){ 
            $tituloTipo = $row['datos']['titulo_tipo'];
            $estructuraComponentes = '';
            foreach($row['componentes'] as $componente){
                $estructuraComponentes .= $componente;
            }
            $estructuraTiposPorCategoria .= $tituloTipo.$estructuraComponentes;
        }
    }*/
}

$arrayCategorias = $datos->getCategories();
$categoriaComponente  = '';
foreach($arrayCategorias as $categoria){
    $categoriaComponente .= $categoria;
}







$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>