<?php 
require_once './models/general.class.php';
require_once './models/view.class.php';
require_once './models/modules.class.php';
$datos_producto  = new Datos();
if(isset($_GET['name'])){
    $nameProducto = $_GET['name'];
    $idProducto = (int) $_GET['id'];
    $identificadorProducto = $_GET['identifier'];
    $productoDetalle = $datos_producto->productoxId($idProducto);
    $descripcionDetalle = $productoDetalle[0]['pdetalle_descripcion'];
    $coloresDetalle = $productoDetalle[0]['pdetalle_colores'];
    $tamanoDetalle = $productoDetalle[0]['pdetalle_tamanos'];
    $preciosDetalle = $productoDetalle[0]['pdetalle_precios'];
    $fotosDetalle = $productoDetalle[0]['pdetalle_fotos'];
    $color  = '';
    $tamano = '';
    $foto = '';
    $tituloColores = '';
    $scriptTamano = '';
    $scriptColor = '';
    if($tamanoDetalle){
        $tituloTamano = '<dt>Tamaño(s): </dt>';
        $tamanosProducto = explode(",", $tamanoDetalle);
        $preciosProducto = explode(",", $preciosDetalle);
        for($j = 0; $j <count($tamanosProducto); $j++){
            $tamano .= '
                <input type="radio" id="tamano-'.$j.'" class="inputTamano" name="tamano-option" onclick="handleTamano(this);"  value="'.$tamanosProducto[$j].'" data-tamanoprecio="'.$preciosProducto[$j].'">
                <label for="tamano-'.$j.'" class="btnLabel btn-sm btn-default-outline">
                    '.$tamanosProducto[$j].'
                </label>
                ';
                $scriptTamano = '
                function handleTamano(myRadio) {
                    datos.tamano = myRadio.value;
                    datos.precio = myRadio.dataset.tamanoprecio;
                    document.getElementById("num").innerHTML = datos.precio;
                }
            ';
        
        }
    }
    if($coloresDetalle){
        $tituloColores = '<dt>Color(es)</dt>';
        $coloresProducto = explode(",", $coloresDetalle);
        for($i = 0; $i <count($coloresProducto); $i++){
            $color .= '
            <input type="radio" id="color-'.$i.'" class="inputColor" name="color-option" onclick="handleColor(this);"  value="'.$coloresProducto[$i].'" data-option-id="option-1">
            <label for="color-'.$i.'" class="btnLabel btn-sm btn-default-outline">
                '.$coloresProducto[$i].'
            </label>
            ';
        }
        $scriptColor = '
        function handleColor(myRadio) {
            datos.color = myRadio.value;
        } 
        ';
    }
    if($fotosDetalle){
        $fotosProducto = explode(",", $fotosDetalle);
        for($f = 0; $f <count($fotosProducto); $f++){
            $foto .= '
            <div class="swiper-slide swiper-lazy swiper-lazy-loaded" style="background-image:url(./assets/img/detalle/'.$fotosProducto[$f].')"></div>
            ';
        }
    }

}else{
    $nameProducto = '';
    $idProducto = '';
}
$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>