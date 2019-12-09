<?php

// DATOS DE CONEXIÓN A BD
define('HOST', 'localhost');
/*define('DATA_BASE', 'adminmad_cms_lamuralla');
define('USER_DB', 'adminmad_emails');
define('PASS_DB','M@:v3r!cK');*/
define('DATA_BASE', 'cajageek');
define('USER_DB', 'root');
define('PASS_DB','root');
// fin

// DATOS GENERALES
define('URL',basename($_SERVER['REQUEST_URI']));
define('SYS','externo');//opciones: promperu ó externo
// fin

//DATOS SEND MAIL
define("MAIL_SECURE","ssl");
define("MAIL_HOST","mail.beerlandfactory.com");
define("MAIL_PORT","465");
define("MAIL_USER","paginaweb@beerlandfactory.com");
define("MAIL_USER_PASS","hdc2016%");
define("MAIL_ALTBODY","Mensaje de Intranet - La Muralla");

//FIN

// DATOS DE EMPRESA QUE DESARROLLA
define('EMP_NAME', 'LIKESEASONS');
define('EMP_SLOGAN', 'United by Creativity');
define('EMP_FB','https://www.facebook.com/likeseasons/');
define('EMP_WEB','https://likeseasons.com/');
// fin

// ANIMACIÓN INICIAL
define('BACKGROUND_GO', '#fff');
define('EMP_NAME_GO', '<b>CAJAGEEK</b>');
define('EMP_SLOGAN_GO', 'Caja Geek');
define('BACKGROUND_END', 'rgba(141, 194, 229, 1)');
define('COLOR_GO', 'rgba(141, 194, 229, 1)');
define('COLOR_END', '#fff');
define('FONT_SIZE', '50px');
define('TIME_REDIRECT','3000');
// fin


// DATOS DE CLIENTE
define('CLI_NAME', 'CAJA GEEK');
// fin


// DATOS PARA LOGIN
define('SUPER_USER', '');
define('SUPER_PASS', '');
define('ADMIN_USER', 'admin_cajageek');
define('ADMIN_PASS', 'cajageek_2019%');
define('TIPO_LOG', 'log_estatico'); # valores : 'log_estatico' ó 'log_dinamico'

#nombre de las sesiones que se crean para poder usarlas.
define('SES_ADMIN', 'ses-admin');# estáticos
define('SES_SUPERADMIN', 'ses-superadmin');# estáticos
define('SES_DATA', 'ses-data');# general->guarda datos de usuario

#nombres de usuario para sesiones estáticas
define('SES_USER_NAME','Administrador');
$bg = mt_rand(2,4);
define('IMG_FOUND','fondo'.$bg); # nombre de imagen de fondo de login
// fin




?>
