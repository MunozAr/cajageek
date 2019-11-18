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
if(isset($_POST['proyecto_id'])){
	$proyecto_id = htmlspecialchars($_POST['proyecto_id']);
}

if(isset($_POST['proyecto_nombre'])){
	$proyecto_nombre = htmlspecialchars($_POST['proyecto_nombre']);
}
if(isset($_POST['proyecto_distrito'])){
	$proyecto_distrito = htmlspecialchars($_POST['proyecto_distrito']);
}
if(isset($_POST['proyecto_date'])){
	$proyecto_date = htmlspecialchars($_POST['proyecto_date']);
}
/*Imagen de Proyecto*/
$newproyecto = date("YmdHis");
$maxsize = 5000 * 6000;
$newfile_img = $newproyecto.'.jpg';

$img_temp = $_FILES['proyecto_imagen']['tmp_name'];

if(isset($_FILES['proyecto_imagen']['tmp_name']) && $_FILES['proyecto_imagen']['tmp_name']!=''){
	if (!empty($_FILES['proyecto_imagen']['name'])) {
		if ($_FILES['proyecto_imagen']['size'] <= $maxsize) {
			$productoURL = "app/img/proyectos/";
			if (!move_uploaded_file($_FILES['proyecto_imagen']['tmp_name'], $productoURL . $newfile_img));
			@unlink("app/img/proyectos/".$proyecto_imagen_c);
			$proyecto_imagen = $newfile_img;
		}else{
			//$proyecto_imagen = $_POST['proyecto_imagen_c'];
		}
	}
}else{
	$proyecto_imagen = $_POST['proyecto_imagen_c'];
}

/*PROYECTO-DEPARTAMENTO*/

if(isset($_POST['departamento_id'])){
	$departamento_id = htmlspecialchars($_POST['departamento_id']);
}

if(isset($_POST['departamento_nombre'])){
	$departamento_nombre = htmlspecialchars($_POST['departamento_nombre']);
}
if(isset($_POST['departamento_metraje'])){
	$departamento_metraje = htmlspecialchars($_POST['departamento_metraje']);
}
if(isset($_POST['departamento_caracteristicas'])){
	$departamento_caracteristicas = htmlspecialchars($_POST['departamento_caracteristicas']);
}
/*Imagen de Departamento*/
$newdepartamento = date("YmdHis");
$maxsize = 5000 * 6000;
$newfile_img = $newdepartamento.'.jpg';

$img_temp = $_FILES['departamento_imagen']['tmp_name'];

if(isset($_FILES['departamento_imagen']['tmp_name']) && $_FILES['departamento_imagen']['tmp_name']!=''){
	if (!empty($_FILES['departamento_imagen']['name'])) {
		if ($_FILES['departamento_imagen']['size'] <= $maxsize) {
			$productoURL = "app/img/departamentos/";
			if (!move_uploaded_file($_FILES['departamento_imagen']['tmp_name'], $productoURL . $newfile_img));
			@unlink("app/img/departamentos/".$departamento_imagen_c);
			$departamento_imagen = $newfile_img;
		}else{
		//	$departamento_imagen = $_POST['departamento_imagen_c'];
		}
	}
}else{
	$departamento_imagen =  $_POST['departamento_imagen_c'];
}

if(isset($_POST['departamento_estado'])){
	$departamento_estado = htmlspecialchars($_POST['departamento_estado']);
}


?>
