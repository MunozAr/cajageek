<?php 
require_once './common/config.php';
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
    $color  = '';
    $tamano = '';
    $tituloColores = '';
    $scriptTamano = '';
    $scriptColor = '';
    if($tamanoDetalle){
        $tituloTamano = '<dt>Tamaño(s): </dt>';
        $tamanosProducto = explode(",", $tamanoDetalle);
        $preciosProducto = explode(",", $preciosDetalle);
        for($j = 0; $j <count($tamanosProducto); $j++){
            $tamano .= '
                <input type="radio" id="tamano-'.$j.'" class="inputTamano" name="tamano-option" value="'.$tamanosProducto[$j].'" data-tamano-precio="'.$preciosProducto[$j].'">
                <label for="tamano-'.$j.'" class="btnLabel btn-sm btn-default-outline">
                    '.$tamanosProducto[$j].'
                </label>
                ';
                $scriptTamano = '
                $(".inputTamano").click(function(){
                    var tamano =  "";
                    var precio = "";
                    if ($(this).is(":checked"))
                    {
                        tamano = $(this).val();
                        precio = $(this).attr("data-tamano-precio");
                        $(".num").text(precio);
                    }
                });
            ';
        
        }
    }
    if($coloresDetalle){
        $tituloColores = '<dt>Color(es)</dt>';
        $coloresProducto = explode(",", $coloresDetalle);
        for($i = 0; $i <count($coloresProducto); $i++){
            $color .= '
            <input type="radio" id="color-'.$i.'" class="inputColor" name="color-option" value="'.$coloresProducto[$i].'" data-option-id="option-1">
            <label for="color-'.$i.'" class="btnLabel btn-sm btn-default-outline">
                '.$coloresProducto[$i].'
            </label>
            ';
        }
        $scriptColor = '
        $(".inputColor").click(function(){
            var color =  "";
            if ($(this).is(":checked"))
            {
                color = $(this).val();
            }
        });
        ';
    }

}else{
    $nameProducto = '';
    $idProducto = '';
}
$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>