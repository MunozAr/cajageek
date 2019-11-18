<?php
session_start();

// Obligatorios
include '../common/config.php';
include '../functions/functions.php';
require '../post/post.php';//Si se va a trabajar con envio de datos.

require_once '../models/general.class.php';// clases general query
$gen = new generalQuery();
require '../models/login.class.php';// clases login
include '../common/login_validate.php';// archivo que valida la sesion de usuario
include '../common/theme.php';// archivo que actualiza el tema.

require '../models/sendmail.class.php';

$sendmail = new SendMail();


//Datos Generales x Archivo
$type_sys = SYS;
$htmlTitulo = 'Bienvenido '.$nombre_usuario;

// Inicializa variable.
$hidden = '';
$block = '';
$msg = '';


$hidden = 'hidden';
$block = 'block';


##########################  MENU  ######################################

    $arg_btn_home = array(
        //array('icono','titulo','link','hidden/block')
        array('th'  ,'<br>Módulo de<br> Proyectos'   ,'proyecto.php'    , "block")
        ,array('list-alt'  ,'<br>Módulo de<br> Departamentos'    ,'departamentos.php'    , "block")
    );

    $htmlBtnHome = btn_link_home($arg_btn_home);
    $htmlMenu = menu_view($arg_btn_home);

##########################  FIN-MENU  ##################################



if($contact_asunto != '' and $contact_mensaje != ''){

	$argMail = array(
		"title" => "INTRANET - LA MURALLA"
		,"bg" => "#a7bb3c"
		,"url" => "/../modules/mailing_html.php"
		,"head-table" => array(
			 "ASUNTO"
			,"MENSAJE"
		)
		,"AddAddress"=>array("hola@likeseasons.com")
		,"body-table" => array(
			 $contact_asunto
			,$contact_mensaje
		)
	);


	//Receptor
	$mailR = array("AddAddress"=>array("hola@likeseasons.com"));
	$sendmail->setMailRecep($mailR);
	//Asunto
	$sendmail->setMailSubject("Contáctenos: intranet-".$contact_asunto);
	//Emisor
	$sendmail->setMailFrom("LAMURALLA::INTRANET");

	$arrFile = array(
		"file_tmp_name" => $_FILES["contact-archivo"]["tmp_name"]
		,"file_name" => $_FILES["contact-archivo"]["name"]
	);

	//Clase que genera mail
	$result = $sendmail->sendMail($argMail,$arrFile);

	if($result == 1){
 		$msg = time_alert_text('success',4000,'Su mensaje se ha enviado correctamente. En breve se estarán comunicando con usted.');
        $msg.= script_redirect('contactenos.php',4000);
	}
}


?>
