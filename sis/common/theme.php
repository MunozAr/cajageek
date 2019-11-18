<?php 
// DESARROLLO MÁSCARA


	//ACTUALIZA TEMA
	if(isset($_POST['update-theme'])){
		if($_POST['update-theme']=='op-mask'){
			if($_POST['tema_op']!=''){

				$arg = array(
				        'tables'=>array(
				            //array('tabla')
				            array('tema')
				        ),
				        'fields'=>array(
				            //array('campo','valor')
				            array('tema_opcion',$_POST['tema_op'])
				        ),
				        'conditional'=>array(
							array('','tema_id','1')
							,array('and','tema_activo','1')
				        )
				);

				$gen -> setUpdateArg($arg);
				$gen -> updateData();
			}
		}		
	}

	//OBTIENE TEMA
    $arg = array(
                    'tables'=>array(
                        //array('campo','alias')
                        array('tema','t')
                    ),
                    'fields'=>array(
                        //vacio = all(*)
                        //array('alias.campo')
                        array('t.tema_id')
                        ,array('t.tema_opcion')
                    )
    );


    $gen->setSelectArg($arg);

	$result = $gen->selectData();

	foreach($result as $col){
		$op_tema = $col['tema_opcion'];
	}
	$tm = $op_tema;

	// DEFINIMOS EL ESTILO DE TEMA
	$styleMask = theme_view($tm);

// FIN DESARROLLO MÁSCARA
 ?>