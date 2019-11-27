<?php 
require_once '../common/config.php';
require_once '../models/general.class.php';
require_once '../models/view.class.php';
require_once '../models/modules.class.php';

$datos  = new Datos();

if(isset($_POST['limit']) && isset($_POST['offset'])){
    $arrayProducts = $datos->get_AllProducts((int)$_POST['limit'],(int)$_POST['offset']);
    foreach($arrayProducts as $product){
        echo $listProduct = '
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 tamanoShowProducto">
            <a href="producto.php?name='.$product['producto_nombre'].'&id='.$product['producto_id'].'&identifier='.$product['producto_identificador'].'">
                <div class="card">
                    <img class="card-img" src="./assets/img/productos/'.$product['producto_foto'].'" alt="'.$product['producto_nombre'].' - CajaGeek">
                    <div class="card-body">
                        <h4 class="card-title">
                        '.$product['producto_nombre'].'
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Identificador: '.$product['producto_identificador'].'
                        </h6>
                        <p class="card-text">
                            
                        </p>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success">
                                <h5 class="mt-4">
                                    Desde: S/'.$product['producto_precio'].'
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        ';
    }
}else{
    echo  'Valores no ingresados';
}
?>