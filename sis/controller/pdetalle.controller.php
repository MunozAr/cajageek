<?php
session_start();

// Obligatorios
include '../common/config.php';
include '../functions/functions.php';
require '../post/post.php';//Si se va a trabajar con envio de datos.
require_once '../models/general.class.php';// clases general query
require_once '../models/view.class.php';// clase que genera las vistas
require_once '../models/modules.class.php';//
$gen = new generalQuery();
require '../models/login.class.php';// clases login
include '../common/login_validate.php';// archivo que valida la sesion de usuario
include '../common/theme.php';// archivo que actualiza el tema.


// Inicia objeto de clase
$obj = new DetalleProducto();

//Datos Generales x Archivo
$type_sys = SYS;
$htmlTitulo = 'Módulo de Detalle de Productos';


// Inicializa variable.
$hidden = '';
$block = '';
$visible = '';
$msg = '';
$htmlOptionsCategoria = '';




//Cantidad de registros por página
    $limit = 15;

##########################  MENU  ######################################

    $arg_btn_home = array(
        //array('icono','titulo','link','hidden/block')
        array('th'  ,'<br>Módulo de<br> Banners'   ,'banner.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Categorias'   ,'categoria.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Tipos'   ,'tipo.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Productos'   ,'producto.php'    , "block")
        ,array('th'  ,'<br>Módulo de<br> Detalles de Productos'   ,'producto_detalle.php'    , "block")
    );

    $htmlBtnHome = btn_link_home($arg_btn_home);
    $htmlMenu = menu_view($arg_btn_home);

##########################  FIN-MENU  ##################################




// @Section-1 :> Eventos de BD: update,delete,insert | todas las vistas

// @Section-1 :> Eventos de BD: update,delete,insert | todas las vistas
    #Funcionalidades de botón
    if($btn_op_2!=''){
        switch($btn_op_2){
            case 'activar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->cambiarEstado(1,$check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se han activado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;

            case 'desactivar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->cambiarEstado(2,$check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se han desactivado <b>'.$count_check.'</b> registros.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;

            case 'eliminar-exe':
                for($i=0;$i<$count_check;$i++){
                    $result = $obj->eliminar($check_selected[$i]);
                }

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se han eliminado <b>'.$count_check.'</b> registros.');
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
                    $pdetalle_descripcion
                    ,$pdetalle_caracteristicas
                    ,$pdetalle_fotos
                    ,$pdetalle_tamanos
                    ,$pdetalle_colores
                    ,$pdetalle_precios
                    ,$producto_id
                    );

                $result = $obj->agregar($arg);

                if($result == 1){
                    $msg = time_alert_text('success',2000,'Se guardaron los datos correctamente.');
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;

            case 'modificar-exe':
                $arg = array(
                        'id' => $pdetalle_id
                        ,'fields' => array(
                            $pdetalle_descripcion
                            ,$pdetalle_caracteristicas
                            ,$pdetalle_fotos
                            ,$pdetalle_tamanos
                            ,$pdetalle_colores
                            ,$pdetalle_precios
                            ,$producto_id
                        )
                    );
                   
                $result = $obj->editar($arg);

                if($result == 1){
                    $msg = time_alert_text('success',3000,'Se guardaron los datos correctamente.En breve será redireccionado...');
                    $msg.= script_redirect('producto.php',3000);
                }else{
                    $msg = alert_text('danger','Hubo un error, informar a los encargados.');
                }
            break;
        }
    }
// @Fin-Section


// @Section-2 :> Eventos de BD: select y otros | vistas externa

    #Implementar
    #Funcionalidades de botón/$selectTipo
    if($btn_op_form!=''){
        switch($btn_op_form){
            case 'agregar-form':
                $btn_op_text = 'agregar-exe';
                $título_form = 'Agregar nuevo registro';

            break;
            case 'modificar-form':
                $btn_op_text = 'modificar-exe';

                //obtenemos datos actuales para modificar:

                $result = $obj->listarxId($btn_id);

                foreach($result as $col){
                   $pdetalle_id = $col['pdetalle_id'];
                   $pdetalle_descripcion =  $col['pdetalle_descripcion'];
                   $pdetalle_caracteristicas =  $col['pdetalle_caracteristicas'];
                   $pdetalle_fotos =  $col['pdetalle_fotos'];
                   $pdetalle_tamanos =  $col['pdetalle_tamanos'];
                   $pdetalle_colores =  $col['pdetalle_colores'];
                   $pdetalle_precios =  $col['pdetalle_precios'];
                   $producto_id =  $col['producto_id'];
                }

                $título_form = 'Modificar: <b style="color: #EB2929;"> ID: '.$pdetalle_id.' Producto ID: '.$producto_id.'/ Identificador: '.$producto_identificador.'</b>';

            break;
        }
    }
// @Fin-Section


// @Section-3 :> Eventos de BD: select y otros casos generales/globales | todas las vistas

    #Funcionalidades generales/globales (aplica como default ante cualquier evento)

    //Listado de Categorias
    $selectProductos = array(
        'option'            => 'group'
        ,'select-name'      => 'producto_id'
        ,'select-required'  => '1'
        ,'selected-value'   => $producto_id
        ,'btn-name'         => 'btn-op'
        ,'btn-text'         => ''
    );
    $listaProductos = $obj->listaProductos($selectProductos);

    //Listado de usuarios activos
    $htmlDinamicList_1 = $obj->listaActivos($limit,$page,$btn_op);

    //Listado de usuarios no-activos

// @Fin-Section


// @Section-4 :>  Eventos de BD: select y otros que ejecutan por encima de otros($btn_op_2) | todas las vistas
    #Funcionalidades de listado
    if($btn_op!=''){
        switch($btn_op){
            // Opciones de ejecucion
            case 'buscar-exe':
                    $htmlDinamicList_1 = $obj->buscar($txt_search,$btn_op);
            break;
        }

    }
// @Fin-Section




?>
