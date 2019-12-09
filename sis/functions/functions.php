<?php

function arr_theme()
{
	$themes = array(
		'theme1' => array(
			'theme_name'		=>	'Default'
			,'bg_head'			=>	'rgba(141, 194, 229, 1)'
			,'bg_btn_hover' 	=>	'#ccc'
			,'bg_drop_head' 	=>	'gray'
			,'bg_body' 			=>	'#eee'
			,'bg_btn' 			=>	'#000'
			,'bg_form' 			=>	'#fff'
			,'txt_head' 		=>	'#fff'
			,'txt_drop_head' 	=>	'#fff'
			,'txt_btn' 			=>	'#fff'
			,'bg_border'		=>	'#424242'
			,'bg_scrollbar'		=>	'rgba(141, 194, 229, 1)'
			,'bg_scroll_thumb'	=>	'#000'
			,'bg_btn_home'		=>	'rgba(141, 194, 229, 1)'
			,'bg_btn_homehover'	=>	'#b1b1b1'
			,'txt_btn_home'		=>	'#fff'
			,'txt_btn_homehover'=>	'#000'
			,'txt_form'			=>	'#000'
			,'bg_head_list'		=>	'rgba(141, 194, 229, 1)'
			),
		'theme2' => array(
			'theme_name'		=>	'Retro'
			,'bg_head'			=>	'#024959'
			,'bg_btn_hover' 	=>	'#037e8c'
			,'bg_drop_head' 	=>	'#037e8c'
			,'bg_body' 			=>	'#fff'
			,'bg_btn' 			=>	'#024959'
			,'bg_form' 			=>	'#5f5448'
			,'txt_head' 		=>	'#fff'
			,'txt_drop_head' 	=>	'#fff'
			,'txt_btn' 			=>	'#fff'
			,'bg_border'		=>	'#424242'
			,'bg_scrollbar'		=>	'#5f5448'
			,'bg_scroll_thumb'	=>	'#f24c27'
			,'bg_btn_home'		=>	'#85a596'
			,'bg_btn_homehover'	=>	'#f0e7c0'
			,'txt_btn_home'		=>	'#fff'
			,'txt_btn_homehover'=>	'#000'
			,'txt_form'			=>	'#fff'
			,'bg_head_list'		=>	'#f24c27'
			),
		'theme3' => array(
			'theme_name'		=>	'Garden'
			,'bg_head' 			=>	'#3b8d61'
			,'bg_btn_hover' 	=>	'#39bca4'
			,'bg_drop_head' 	=>	'#39bca4'
			,'bg_body' 			=>	'#f1eeda'
			,'bg_btn' 			=>	'#3b8d61'
			,'bg_form' 			=>	'#4c565e'
			,'txt_head' 		=>	'#fff'
			,'txt_drop_head' 	=>	'#fff'
			,'txt_btn'			=>	'#fff'
			,'bg_border'		=>	'#424242'
			,'bg_scrollbar'		=>	'#114454'
			,'bg_scroll_thumb'	=>	'#94bf6e'
			,'bg_btn_home'		=>	'#acb35c'
			,'bg_btn_homehover'	=>	'#d1da70'
			,'txt_btn_home'		=>	'#fff'
			,'txt_btn_homehover'=>	'#000'
			,'txt_form'			=>	'#fff'
			,'bg_head_list'		=>	'#94bf6e'
			),
		'theme4' => array(
			'theme_name'		=>	'Jetta'
			,'bg_head' 			=>	'#742e46'
			,'bg_btn_hover' 	=>	'#c12c42'
			,'bg_drop_head' 	=>	'#c12c42'
			,'bg_body' 			=>	'#d8c19f'
			,'bg_btn' 			=>	'#742e46'
			,'bg_form' 			=>	'#6b8d7c'
			,'txt_head' 		=>	'#fff'
			,'txt_drop_head' 	=>	'#fff'
			,'txt_btn' 			=>	'#fff'
			,'bg_border'		=>	'#424242'
			,'bg_scrollbar'		=>	'#2d2c41'
			,'bg_scroll_thumb'	=>	'#fcfcf9'
			,'bg_btn_home'		=>	'#c12c42'
			,'bg_btn_homehover'	=>	'#f36f5e'
			,'txt_btn_home'		=>	'#fff'
			,'txt_btn_homehover'=>	'#000'
			,'txt_form'			=>	'#fff'
			,'bg_head_list'		=>	'#c12c42'
			)
	);
	return $themes;
}

function param_theme()
{
	$arr_theme = arr_theme();
	$cant_elements = count($arr_theme);
	$htmlOptionTheme = '';
	$selected = '';
	for($i=1;$i<=$cant_elements;$i++){
		$htmlOptionTheme .= '<option value="'.$i.'"	>'.$arr_theme['theme'.$i]['theme_name'].'</option>';
	}
	return $htmlOptionTheme;
}

function theme_view($op)
{

	$arr_theme = arr_theme();

	$cssTheme = '
	  body{
	  	background-color: '.$arr_theme['theme'.$op]['bg_body'].' !important;
	  }

	  body::-webkit-scrollbar{
	  	background-color: '.$arr_theme['theme'.$op]['bg_scrollbar'].';
	  }

	  body::-webkit-scrollbar-thumb{
	  	background-color: '.$arr_theme['theme'.$op]['bg_scroll_thumb'].';
	  }


	  .top-bar{
	    background-color: '.$arr_theme['theme'.$op]['bg_head'].';
	  }

	  .navbar-inverse .navbar-nav > li > a:hover
	  ,.navbar-inverse .navbar-nav > li > a:focus
	  ,.navbar-inverse .navbar-nav > li > a
	  ,.navbar-inverse .navbar-nav > li > a{
	    color: '.$arr_theme['theme'.$op]['txt_head'].' !important;
	  }

	  .top-bar .form-control{
	    background-color: '.$arr_theme['theme'.$op]['bg_drop_head'].';
	    color: '.$arr_theme['theme'.$op]['txt_drop_head'].';
	  }

	  .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus{
	    background-color: '.$arr_theme['theme'.$op]['bg_drop_head'].' !important;
	  }

	  .btn-g{
	    background-color: '.$arr_theme['theme'.$op]['bg_btn'].';
	    color: '.$arr_theme['theme'.$op]['txt_btn'].';
	  }

	  .btn-g:hover{
	    background-color: '.$arr_theme['theme'.$op]['bg_btn_hover'].';
	  }

	  .form-g{
	    background-color: '.$arr_theme['theme'.$op]['bg_form'].';
	    color: '.$arr_theme['theme'.$op]['txt_form'].';
	  }

	  .form-g legend{
	  	color: '.$arr_theme['theme'.$op]['txt_form'].';
	  }

	  .all-border-xs{
	  	border: 1px solid '.$arr_theme['theme'.$op]['bg_border'].';
	  }

	  .all-border-md{
	  	border: 3px solid '.$arr_theme['theme'.$op]['bg_border'].';
	  }

	  .all-border-lg{
	  	border: 5px solid '.$arr_theme['theme'.$op]['bg_border'].';
	  }

	  .btn-home{
	  	background: '.$arr_theme['theme'.$op]['bg_btn_home'].';
	  	color: '.$arr_theme['theme'.$op]['txt_btn_home'].';
	  }
	  .btn-home:hover{
	  	background: '.$arr_theme['theme'.$op]['bg_btn_homehover'].';
	  	color: '.$arr_theme['theme'.$op]['txt_btn_homehover'].';
	  }

      .left-sidebar{
        background-color: '.$arr_theme['theme'.$op]['bg_head'].';
      }

      .heading-list{
      	background: '.$arr_theme['theme'.$op]['bg_head_list'].' !important;
      }

	';

	return $cssTheme;
}

// REDIRECT JAVASCRIPT
function script_redirect($direction,$duration)
{
	$htmlRedirect = '
			<script>
                setTimeout(function(){ $( location ).attr("href", "'.$direction.'"); }, '.$duration.');
			</script>
	';
	return $htmlRedirect;
}

// Genera botones en inicio
function btn_link_home($data)
{
	$cant = count($data);
	$html_btn_home='';
	for($i=0;$i<$cant;$i++){
		$icon = $data[$i][0];
		$titulo = $data[$i][1];
		$link = $data[$i][2];
        $visible = $data[$i][3];

		$html_btn_home .= '
                <div class="col-xs-12 col-sm-6 col-lg-4 sec-btn-home '.$visible.'">
                    <a href="'.$link.'">
                        <div class="btn-home">
                            <span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>
                            <br>
                            '.$titulo.'
                        </div>
                    </a>
                </div>
		';
	}

	return $html_btn_home;
}

function menu_view($data)
{
	$cant = count($data);
	$html_btn_home='';
	for($i=0;$i<$cant;$i++){
		$icon = $data[$i][0];
		$titulo = $data[$i][1];
		$link = $data[$i][2];
        $visible = $data[$i][3];

        $btn_static = '
           <li class="panel block">
		      <a id="panel1" href="inicio.php" data-toggle="collapse" data-target="#menu1" class="collapsed">
                <i class="fa fa-home"></i>
			     Inicio
		      </a>
	       </li>';

        $menu .= '
            <li class="panel '.$visible.'">
		      <a id="panel1" href="'.$link.'" data-toggle="collapse" data-target="#menu1" class="collapsed">
		      	<span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>
			     '.$titulo.'
		      </a>
	       </li>
        ';
	}

	return $btn_static.$menu;
}

// html botones de cambio activado/desactivado
function get_btn_state($op,$txt_link)
{
	if($op==1){
		$html_btn_state = '
			<button type="submit" id="btn-check-1" name="btn-op-2" value="desactivate-all" class="btn btn-sm btn-danger" disabled>
				<i class="fa fa-remove"></i> Desactivar '.$txt_link.' seleccionadas
			</button>
		';
	}else if($op==2){
		$html_btn_state = '
			<button type="submit" id="btn-check-1" name="btn-op-2" value="activate-all" class="btn btn-sm btn-success" disabled>
				<i class="fa fa-check"></i> Activar '.$txt_link.' seleccionadas
			</button>
		';
	}else{
		$html_btn_state = '';
	}

	return $html_btn_state;
}

//scroll to - redirige a un punto de la página
function scrollTo($id)
{
	$html_scroll = '
		<script>
			$(document).ready(function() {
				var posicion_boton = $("#'.$id.'").offset().top;
				$("html, body").animate({scrollTop:posicion_boton+"px"},1500);
			});
		</script>
	';

	return $html_scroll;
}

// ALERTA tipo MODAL - ***FALTA IMPLEMENTAR***
function alert_modal($op,$msg)
{

	$alert = '
		<script>
			alert("jejeje");
		</script>
	';

	return $alert;
}

// ALERTA tipo TEXTO
function alert_text($op,$msg)
{

	if($op == 'success'){
		$class_msg = 'success';
	}else if($op == 'info'){
		$class_msg = 'info';
	}else if($op == 'warning'){
		$class_msg = 'warning';
	}else if($op == 'danger'){
		$class_msg = 'danger';
	}else if($op == 'default'){
		$class_msg = 'default';
	}

	$html_text='
		<div class="col-xs-12 np">
			<div class="alert alert-'.$class_msg.'" role="alert">
			'.$msg.'
			</div>
		</div>
	';

	return $html_text;
}

function time_alert_text($op,$tiempo,$msg)
{

	if($op == 'success'){
		$class_msg = 'success';
	}else if($op == 'info'){
		$class_msg = 'info';
	}else if($op == 'warning'){
		$class_msg = 'warning';
	}else if($op == 'danger'){
		$class_msg = 'danger';
	}else if($op == 'default'){
		$class_msg = 'default';
	}

	$t = $tiempo/1000;


	$html_text='
				<div class="alert alert-'.$class_msg.'" id="time-alert">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <!--div class="sec-close-alert hidden-xs" style="font-size:11px;">En <span id="seg-alert">'.$t.'</span> seg. se cerrará este mensaje.</div-->
				    '.$msg.'
				</div>
				<script>
					var tiempo = '.$tiempo.';
					var tiempo2 = tiempo/4;

					$("#time-alert").fadeTo(tiempo, tiempo2).slideUp(tiempo2, function(){
					    $("#time-alert").slideUp(tiempo2);
					});

					$("#seg-alert").html(tiempo/1000);
				</script>
	';

	return $html_text;
}

// HTML para PAGINADOR simple
function paginador($cant_tot,$limit,$pag)
{
	$list_pag = '';
	$active = '';
	$aux_pag=$pag+1;

	$numPag = ceil($cant_tot/$limit);

	for($i=1;$i<=$numPag;$i++){
		if($aux_pag==$i){
			$active = 'btn-active';
		}else{
			$active = '';
		}
		$list_pag .= '
				<li>
					<button type="submit" class="'.$active.'" name="btn-pag" value="'.$i.'">'.$i.'</button>
				</li>
		';
	}

	return $list_pag;
}


function getYouTubeId($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}

?>
