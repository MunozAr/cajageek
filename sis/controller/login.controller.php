<?php 
session_start(); 
require_once '../models/general.class.php';
require '../models/login.class.php';
require '../post/post.php';
include '../common/config.php';
include '../functions/functions.php';

$log = new Login();

$msg_login = '';

if($post_usuario!='' && $post_password!=''){

	$log->setUsuario($post_usuario);
	$log->setPassword($post_password);

	$log->generateLogin();
	$ses_ready = $log->validateSession();
    
	if($ses_ready==1){
		$msg_login = '
			<script>
				$(document).ready(function(){
					$("#body-log").css("display","none");
					$(".bg-redirect").css("opacity","1");
					$(".bg-redirect").css("z-index","9999");
		
					setTimeout(function(){ $( location ).attr("href", "inicio.php"); }, 3000);
				});	
			</script>
		';
	}else{
		$msg_login = alert_text('danger','El inicio de sesión no es válido.');
	}
    

}else{
	$msg_login = alert_text('info','Debe completar todos los datos.');
}
 ?>