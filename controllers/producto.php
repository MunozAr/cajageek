<?php 

if(isset($_GET['name'])){
    $nameProducto = $_GET['name'];
}else{
    $nameProducto = '';
}
$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>