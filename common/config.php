<?php

header("Content-type:text/html; charset=utf-8");
define("SLASH", "/");
define("SLASH_SUP", "../");

$path = array(
    "controllers" => "controllers" . SLASH,
    "css" => "assets/css" . SLASH,
    "img" => "assets/img" . SLASH,
    "js" => "assets/js" . SLASH,
    "module" => "module" . SLASH,
    "layouts" => "layouts" . SLASH,
    "views" => "views" . SLASH,
    "common" => "common" . SLASH
);


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

// DATOS DE EMPRESA QUE DESARROLLA
define('EMP_NAME', 'LIKESEASONS');
define('EMP_SLOGAN', 'United by Creativity');
define('EMP_FB','https://www.facebook.com/likeseasons/');
define('EMP_WEB','https://likeseasons.com/');
// fin

?>