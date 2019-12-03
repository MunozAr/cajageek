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

$arrayBanners = $datos->getBanners();
$bannerComponente = '';
foreach($arrayBanners as $banner){
    $banner = '
    <div class="swiper-slide swiper-lazy swiper-lazy-loaded" style="background-image:url(./assets/img/banners/'.$banner['banner_imagen'].');">
            <a class="linkBanner" href="'.$banner['banner_link'].'">

            </a>
        </div>
    ';
    $bannerComponente .= $banner;
}

$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>