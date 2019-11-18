<?php 
session_start();

// Obligatorios
include '../common/config.php';
include '../functions/functions.php';
require '../post/post.php';//Si se va a trabajar con envio de datos.
require_once '../models/general.class.php';// clases general query
$gen = new generalQuery(); 
require_once '../models/view.class.php';// clase que genera las vistas 
require_once '../models/modules.class.php';// 
require '../models/login.class.php';// clases login
include '../common/login_validate.php';// archivo que valida la sesion de usuario
include '../common/theme.php';// archivo que actualiza el tema.

// LOGIN
/*echo '<br><br><br><br><br><br>';
echo '-> '.$nombre_usuario.'<br>';
echo '-> '.$user_op.'<br>';
echo '-> '.$user_tipo.'<br>';*/


// Inicia objeto de clase
$obj = new Usuario();

//Datos Generales x Archivo
$type_sys = SYS;
$htmlTitulo = 'Módulo de usuarios ';


// Inicializa variable.
$hidden = '';
$block = '';
$visible = '';

$msg = '';



//Cantidad de registros por página
    $limit = 12;

##########################  MENU  ######################################

    // $htmlMenu = file_get_contents($moduleMenu);
    // Variables comúnes
    $hidden = 'hidden';
    $block = 'block';
    $body = 'block';


    //SUPERADMIN 
    # Menu
    $usuario_visible = 
    $empresa_visible = 
    $servicio_visible = 
    $proyecto_visible = 
    $cliente_visible = 
    $insumo_visible = 
    $seguimiento_visible =  
    $tarea_visible = 'block';


    $arg_btn_home = array(
        //array('icono','titulo','link','hidden/block')
         array('user'  ,'Usuarios'   ,'usuario.php'    ,$usuario_visible)
        ,array('fire'  ,'Empresa'    ,'empresa.php'    ,$empresa_visible)
        ,array('bell'  ,'Servicios'  ,'servicio.php'   ,$servicio_visible)
        ,array('list'  ,'Proyectos'  ,'proyecto.php'   ,$proyecto_visible)
        ,array('star'  ,'Clientes'   ,'cliente.php'    ,$cliente_visible)
        ,array('cloud' ,'Insumos'    ,'insumo.php'     ,$insumo_visible)
        ,array('search','Seguimiento','seguimiento.php',$seguimiento_visible)
        ,array('book'  ,'Tareas'     ,'tarea.php'      ,$tarea_visible)
    );

    #menu
    $htmlMenu = menu_view($arg_btn_home);
##########################  FIN-MENU  ##################################




// @Section-1 :> Eventos de BD: update,delete,insert | todas las vistas

    #Funcionalidades de botón
    if($btn_op_2!=''){
        switch($btn_op_2){
            case 'activar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->cambiarEstado(1,$check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',4000,'Se han activado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
            
            case 'desactivar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->cambiarEstado(2,$check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',4000,'Se han desactivado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
                
            case 'eliminar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->eliminar($check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',4000,'Se han eliminado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;

            case 'listar-exe':
                echo '<br><br><br><br>';
                echo $limit.' - '.$page.' - '.$btn_op;
            break;
            
            case 'agregar-exe':

                $arg = array(
                         $tipo_usuario_id
                        ,$usuario_nombre
                        ,$usuario_user
                        ,$usuario_pass
                    );

                $result = $obj->agregar($arg);

                if($result == 1){
                    $msg = time_alert_text('success',4000,'Se guardaron los datos correctamente.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;

            case 'modificar-exe':
                $arg = array(
                        'id' => $usuario_id
                        ,'fields' => array(
                                 $tipo_usuario_id
                                ,$usuario_nombre
                                ,$usuario_user
                                ,$usuario_pass
                        )
                    );
                $result = $obj->editar($arg);

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se guardaron los datos correctamente.En breve será redireccionado...');
                    $msg.= script_redirect('usuario.php',3000);
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
        }      
    }
// @Fin-Section


// @Section-2 :> Eventos de BD: select y otros | vistas externa
    #Funcionalidades de botón/redirección
    if($btn_op_form!=''){      
        switch($btn_op_form){
            case 'agregar-form':
                $btn_op_text = 'agregar-exe';
                $título_form = 'Agregar nuevo usuario';

            break;
            case 'modificar-form':
                $btn_op_text = 'modificar-exe';

                //obtenemos datos actuales para modificar:
                $usuario_id = $btn_id;
                $result = $obj->listarUsuarioActual($btn_id);
                foreach($result as $col){
                    $usuario_id = $col['usuario_id'];
                    $usuario_nombre = $col['usuario_nombre'];
                    $usuario_user = $col['usuario_user'];
                    $usuario_pass = $col['usuario_pass'];
                    $tipo_usuario_id = $col['tipo_usuario_id'];
                }

                $título_form = 'Modificar nuevo usuario: <b style="color: #EB2929;">'.$usuario_user.'</b>';
   
            break;
        }    
    }
// @Fin-Section


// @Section-3 :> Eventos de BD: select y otros casos generales/globales | todas las vistas

    #Funcionalidades generales/globales (aplica como default ante cualquier evento)

    //Listado de tipos de usuario group[html: select]
    $selectOption = array(
        'option'            => 'group'
        ,'select-name'      => 'tipo_usuario'
        ,'select-required'  => ''
        ,'selected-value'   => $tipo_usuario_id
        ,'btn-name'         => 'btn-op'
        ,'btn-value'        => 'filtrar-exe'
        ,'btn-text'         => 'Filtrar'
        ,'btn-type'         => 'primary'
    );
    $tipoUsuarioSelect = $obj->listaTiposUsuario($selectOption);

    //Listado de usuarios activos 
    $htmlDinamicList_1 = $obj->listaActivos($limit,$page,$btn_op);

    //Listado de usuarios no-activos   
    $htmlDinamicList_2 = $obj->listaDesactivados($limit,$page,$btn_op);


    //Listado de tipos de usuario simple[html: select]
    $selectOptionSimple = array(
        'option'            => 'simple'
        ,'select-name'      => 'tipo_usuario'
        ,'select-required'  => '1'
        ,'selected-value'   => $tipo_usuario_id
        ,'btn-name'         => ''
        ,'btn-value'        => ''
        ,'btn-text'         => ''
        ,'btn-type'         => ''
    );
    $tipoUsuarioSelectSimple = $obj->listaTiposUsuario($selectOptionSimple);

// @Fin-Section


// @Section-4 :>  Eventos de BD: select y otros que ejecutan por encima de otros($btn_op_2) | todas las vistas
    #Funcionalidades de listado
    if($btn_op!=''){
        switch($btn_op){   
            // Opciones de ejecucion  
            case 'buscar-exe':
                    $htmlDinamicList_1 = $obj->buscarUsuario($txt_search,$btn_op);
            break;
                
            case 'filtrar-exe':
                if($data_post==1){
                    //Listado de usuarios activos       
                    $htmlDinamicList_1 = $obj->listaFiltroxTipoUsuario($tipo_usuario_id,$limit,$page,$btn_op);
                    $htmlDinamicList_2 = $obj->listaDesactivadosxTipoUsuario($tipo_usuario_id,'','',$btn_op);
                }else{
                    $msg = time_alert_text('danger',3000,'Tiene que seleccionar una opción para filtrar.');
                }

            break;       
        }

    }
// @Fin-Section




?>