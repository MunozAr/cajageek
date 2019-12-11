<?php
//Variable de validacion de contenido post
$data_post = 0;


// LOGIN
$post_usuario = '';
$post_password = '';
if(isset($_POST['user']) && isset($_POST['password'])){
	$post_usuario = htmlspecialchars($_POST['user']);
	$post_password = md5(htmlspecialchars($_POST['password']));
}


// Id como valor de un botón
if(isset($_POST['btn-op-form'])){
	$arr3 = explode('/',$_POST['btn-op-form']);
	$btn_op_form = $arr3[0];
	$btn_id = $arr3[1];
	$btn_id_2 = $arr3[1];
}


if(isset($_POST['btn-id']) && $_POST['btn-id']!=''){
	$btn_id = $_POST['btn-id'];
}

//OTHER
$btn_op='';
if(isset($_POST['btn-op'])){
	$arr0 = explode('/',$_POST['btn-op']);
	$btn_op = $arr0[0];
}else{
	$btn_op = '';
}


//paginador
$page=0;
if(isset($_POST['btn-pag'])){

	$arr = explode('/',$_POST['btn-pag']);

	$page = $arr[0]-1;

	if($arr[1]!=''){
		$btn_op = $arr[1];
	}
}


$btn_op_2='';
if(isset($_POST['btn-op-2'])){
	//$btn_op_2 = $_POST['btn-op-2'];
	$arr2 = explode('/',$_POST['btn-op-2']);
	$btn_op_2 = $arr2[0];
	$btn_op = $arr2[1];
	$valor_filtro = $arr2[2];
	$valor_pagina = $arr2[3];

	if($valor_filtro!=''){
		$tipo_usuario_id = $valor_filtro;
	}

	if($valor_pagina!=''){
		$page = $valor_pagina;
	}
}


$btn_save = '';
if(isset($_POST['btn-save'])){
	$btn_save = $_POST['btn-save'];
}else{
	$btn_save = '';
}


$txt_search='';
if(isset($_POST['txt-search'])){
	if($_POST['txt-search']!=''){
		$txt_search = $_POST['txt-search'];
	}
}


//checks
$count_check_register = 0;
if(isset($_POST["check-id"])){
	$check_selected=$_POST["check-id"];
	$count_check = count($check_selected);
}





/*
* ---------------------------------------------
* Datos post de formularios (agregar/modificar)
* ---------------------------------------------
*/


/*
*
* @module
* CONTÁCTENOS
*
*/

if(isset($_POST['contact-asunto'])){
	$contact_asunto = htmlspecialchars($_POST['contact-asunto']);
}

if(isset($_POST['contact-mensaje'])){
	$contact_mensaje = htmlspecialchars($_POST['contact-mensaje']);
}

if(isset($_POST['contact-archivo'])){
	$contact_archivo = htmlspecialchars($_POST['contact-archivo']);
}




/*
*
* @module
* USUARIOS
*
*/


//Filtros
#Módulo usuario :: filtro por tipo usuario
if(isset($_POST['tipo_usuario'])){
	$data_post = 1;
	$tipo_usuario_id = htmlspecialchars($_POST['tipo_usuario']);
}else{
	$data_post = 0;
}

//Formulario
if(isset($_POST['usuario_id'])){
	$usuario_id = htmlspecialchars($_POST['usuario_id']);
}

if(isset($_POST['tipo_usuario'])){
	$tipo_usuario = htmlspecialchars($_POST['tipo_usuario']);
}

if(isset($_POST['usuario_nombre'])){
	$usuario_nombre = htmlspecialchars($_POST['usuario_nombre']);
}

if(isset($_POST['usuario_user'])){
	$usuario_user = htmlspecialchars($_POST['usuario_user']);
}

if(isset($_POST['usuario_pass'])){
	$usuario_pass = htmlspecialchars($_POST['usuario_pass']);
}

if(isset($_POST['usuario_pass_new']) && $_POST['usuario_pass_new']!=''){
	$usuario_pass = md5(htmlspecialchars($_POST['usuario_pass_new']));
}

/*
*
* @module
* CATEGORÍA
*
*/

/*CAPTRUA DE IMAGENES*/

/*Ejemplo de subida de imagen imagen3 Portafolio-detalle*/
/*$newnom3 = date("YmdHis");
$maxsize3 = 5000 * 6000;
$newfile_img3 = $newnom3.'3.jpg';

$img_temp = $_FILES['subcategoria_imagen3']['tmp_name'];

if(isset($_FILES['subcategoria_imagen3']['tmp_name']) && $_FILES['subcategoria_imagen3']['tmp_name']!=''){
	if (!empty($_FILES['subcategoria_imagen3']['name'])) {
		if ($_FILES['subcategoria_imagen3']['size'] <= $maxsize3) {
			$productoURL = "app/img/portafoliodetalle/";
			if (!move_uploaded_file($_FILES['subcategoria_imagen3']['tmp_name'], $productoURL . $newfile_img3));
			@unlink("app/img/portafoliodetalle/".$subcategoria_imagen3_c);
			$subcategoria_imagen3 = $newfile_img3;
		}else{
			//$subcategoria_imagen3 = $_POST['subcategoria_imagen3_c'];
		}
	}
}else{
	$subcategoria_imagen3 = $subcategoria_imagen3_c;
}*/

/*
*
* @module
*BLOG
*	*/

/*PROYECTO*/
if(isset($_POST['producto_id'])){
	$producto_id = htmlspecialchars($_POST['producto_id']);
}

if(isset($_POST['producto_nombre'])){
	$producto_nombre = htmlspecialchars($_POST['producto_nombre']);
}
if(isset($_POST['producto_identificador'])){
	$producto_identificador = htmlspecialchars($_POST['producto_identificador']);
}
if(isset($_POST['producto_precio'])){
	$producto_precio = htmlspecialchars($_POST['producto_precio']);
}
if(isset($_POST['producto_descuento'])){
	$producto_descuento = htmlspecialchars($_POST['producto_descuento']);
}
if(isset($_POST['categoria_id'])){
	$categoria_id = htmlspecialchars($_POST['categoria_id']);
}
if(isset($_POST['tipo_id'])){
	$tipo_id = htmlspecialchars($_POST['tipo_id']);
}
if(isset($_POST['producto_activo'])){
	$producto_activo = htmlspecialchars($_POST['producto_activo']);
}
/*Imagen de Proyecto*/
$newproyecto = date("YmdHis");
$maxsize = 5000 * 6000;
$newfile_img = $newproyecto.'.jpg';

$img_temp = $_FILES['producto_foto']['tmp_name'];

if(isset($_FILES['producto_foto']['tmp_name']) && $_FILES['producto_foto']['tmp_name']!=''){
	if (!empty($_FILES['producto_foto']['name'])) {
		if ($_FILES['producto_foto']['size'] <= $maxsize) {
			$productoURL = "../../assets/img/productos/";
			if (!move_uploaded_file($_FILES['producto_foto']['tmp_name'], $productoURL . $newfile_img));
			@unlink("../../assets/img/productos/".$producto_foto_c);
			$producto_foto = $newfile_img;
		}else{
			//$producto_foto = $_POST['producto_foto_c'];
		}
	}
}else{
	$producto_foto = $_POST['producto_foto_c'];
}

/*BANNERS*/

if(isset($_POST['banner_id'])){
	$banner_id = htmlspecialchars($_POST['banner_id']);
}

if(isset($_POST['banner_nombre'])){
	$banner_nombre = htmlspecialchars($_POST['banner_nombre']);
}
if(isset($_POST['banner_link'])){
	$banner_link = htmlspecialchars($_POST['banner_link']);
}
if(isset($_POST['banner_activo'])){
	$banner_activo = htmlspecialchars($_POST['banner_activo']);
}
/*Imagen de Departamento*/
$newbanner = date("YmdHis");
$maxsize = 5000 * 6000;
$newfile_img = $newbanner.'.jpg';

$img_temp = $_FILES['banner_imagen']['tmp_name'];

if(isset($_FILES['banner_imagen']['tmp_name']) && $_FILES['banner_imagen']['tmp_name']!=''){
	if (!empty($_FILES['banner_imagen']['name'])) {
		if ($_FILES['banner_imagen']['size'] <= $maxsize) {
			$productoURL = "../../assets/img/banners/";
			if (!move_uploaded_file($_FILES['banner_imagen']['tmp_name'], $productoURL . $newfile_img));
			@unlink("../../assets/img/banners/".$banner_imagen_c);
			$banner_imagen = $newfile_img;
		}else{
		//	$banner_imagen = $_POST['banner_imagen_c'];
		}
	}
}else{
	$banner_imagen =  $_POST['banner_imagen_c'];
}


/*CATEGORIAS*/

if(isset($_POST['categoria_id'])){
	$categoria_id = htmlspecialchars($_POST['categoria_id']);
}

if(isset($_POST['categoria_nombre'])){
	$categoria_nombre = htmlspecialchars($_POST['categoria_nombre']);
}
if(isset($_POST['categoria_detalle'])){
	$categoria_detalle = htmlspecialchars($_POST['categoria_detalle']);
}
if(isset($_POST['categoria_activo'])){
	$categoria_activo = htmlspecialchars($_POST['categoria_activo']);
}
if(isset($_POST['categoria_fecha'])){
	$categoria_fecha = htmlspecialchars($_POST['categoria_fecha']);
}
/*Imagen de Departamento*/
$newcategory = date("YmdHis");
$maxsize = 5000 * 6000;
$newfile_img = $newcategory.'.jpg';

$img_temp = $_FILES['categoria_foto']['tmp_name'];

if(isset($_FILES['categoria_foto']['tmp_name']) && $_FILES['categoria_foto']['tmp_name']!=''){
	if (!empty($_FILES['categoria_foto']['name'])) {
		if ($_FILES['categoria_foto']['size'] <= $maxsize) {
			$productoURL = "../../assets/img/categorias/";
			if (!move_uploaded_file($_FILES['categoria_foto']['tmp_name'], $productoURL . $newfile_img));
			@unlink("../../assets/img/categorias/".$categoria_foto_c);
			$categoria_foto = $newfile_img;
		}else{
		//	$categoria_foto = $_POST['categoria_foto_c'];
		}
	}
}else{
	$categoria_foto =  $_POST['categoria_foto_c'];
}


/*TIPOS*/
if(isset($_POST['tipo_id'])){
	$tipo_id = htmlspecialchars($_POST['tipo_id']);
}

if(isset($_POST['tipo_nombre'])){
	$tipo_nombre = htmlspecialchars($_POST['tipo_nombre']);
}
if(isset($_POST['tipo_detalle'])){
	$tipo_detalle = htmlspecialchars($_POST['tipo_detalle']);
}
if(isset($_POST['tipo_activo'])){
	$tipo_activo = htmlspecialchars($_POST['tipo_activo']);
}
if(isset($_POST['tipo_fecha'])){
	$tipo_fecha = htmlspecialchars($_POST['tipo_fecha']);
}

/*TIPOS*/
if(isset($_POST['pdetalle_id'])){
	$pdetalle_id = htmlspecialchars($_POST['pdetalle_id']);
}
if(isset($_POST['pdetalle_descripcion'])){
	$pdetalle_descripcion = htmlspecialchars($_POST['pdetalle_descripcion']);
}
if(isset($_POST['pdetalle_caracteristicas'])){
	$pdetalle_caracteristicas = htmlspecialchars($_POST['pdetalle_caracteristicas']);
}
if(isset($_POST['pdetalle_fotos'])){
	$pdetalle_fotos = htmlspecialchars($_POST['pdetalle_fotos']);
}
if(isset($_POST['pdetalle_tamanos'])){
	$pdetalle_tamanos = htmlspecialchars($_POST['pdetalle_tamanos']);
}
if(isset($_POST['pdetalle_colores'])){
	$pdetalle_colores = htmlspecialchars($_POST['pdetalle_colores']);
}
if(isset($_POST['pdetalle_precios'])){
	$pdetalle_precios = htmlspecialchars($_POST['pdetalle_precios']);
}
if(isset($_POST['pdetalle_fecha'])){
	$pdetalle_fecha = htmlspecialchars($_POST['pdetalle_fecha']);
}




?>
