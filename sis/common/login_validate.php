<?php 
    // DATOS LOGIN
        $log = new Login();
        $log->validateSession();

        // Datos usuario - view
        $nombre_usuario = $_SESSION[SES_DATA]['user_name'];
        $tipo_nombre_usuario = $_SESSION[SES_DATA]['type_user_name'];
        $user_op = $_SESSION[SES_DATA]['user_op'];
        $user_tipo = $_SESSION[SES_DATA]['user_tipo'];
        $user_nick = $_SESSION[SES_DATA]['user_nick'];

        $head_nombre_usuario = $user_nick.' :: '.$nombre_usuario;

        if (isset($_POST['session-close'])) {
            if($_POST['session-close']=='session-close'){
                session_destroy();
                echo script_redirect('../end.php','1000');
            }
        }

    // FIN DATOS LOGIN
?>