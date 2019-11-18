<?php 

if(isset($_GET['categoria'])){
    $categoryName = $_GET['categoria'];
}else{
    $categoryName = '';
}
$view = $path['views'].basename($_SERVER['PHP_SELF']);
require $path['layouts'].'template.php';
?>