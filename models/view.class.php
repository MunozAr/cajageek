<?php

class View extends generalQuery{
    
    public function dinamicTable($tconf,$table,$arg)
    {

        // Sección 1 - Configuracion general de tabla
            $tTitle = $tconf['title'];
            $tIcon = $tconf['icon'];
            $tVisible = $tconf['visible'];
            $btn_op = $tconf['btn-op'];


        // Sección 2 - Configuración de consulta(query)

            // consulta a la BD
            $this->setSelectArg($arg['consult']);
            $result = $this->selectData();
         

        // Sección 3 - Configuración de estructura y contenido de tabla

            $htmlThead = '';
            $htmlbody = '';

            //Cabecera de Tabla
                $countThead = count($table);

                for($c=0;$c<$countThead;$c++){
                    //Table Header
                    $htmlThead .= '<th>'.$table['col-'.$c]['head'].'</th>';
                }

            
            $contReg = 0;
            foreach($result as $col){
                $contReg = $contReg+1;

                //Cuerpo de Tabla
                $htmlTd3 = '';
                $cont = 0;

                for($i=0;$i<count($table);$i++){
                    $cont=$cont+1;
                    //Estilos CSS
                    $tdStyle='';
                    $arrStyle = $table['col-'.$i]['body']['style'];
                    $typeData = $table['col-'.$i]['body']['type'];
                    $urlData = $table['col-'.$i]['body']['data']['url'];
                    $countArrStyle = count($arrStyle);

                    for($f=0;$f<$countArrStyle;$f++){
                        $tdStyle .= $arrStyle[$f][0].':'.$arrStyle[$f][1].';';
                    }

                    $arrRow = $table['col-'.$i]['body']['data']['row'];
                    $arrData = $table['col-'.$i]['body']['data'];
                    $countArrRow = count($arrRow);
                    $countArrData = count($countArrRow);

   
                // Armamos filas/columnas de Tabla.
                    $htmlTd = '';
                    $iconConect='';

                    //Tipos de Datos por Columna
                    $htmlTd2 ='';
                    switch($typeData){           
                        case 'text'://Tipo texto
                            for($r=0;$r<$countArrRow;$r++){
                                if($r==0){
                                    $iconConect='';
                                }else{
                                    $iconConect=$table['col-'.$i]['body']['data']['icon'];
                                }
                                $htmlTd2 .= $iconConect.'<span style="'.$tdStyle.'">'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'</span>';     
                            }             
                        break;


                        case 'image': //Tipo imagen
                            for($r=0;$r<$countArrRow;$r++){
                                $idModal = base64_encode($col[$table['col-'.$i]['body']['data']['row'][$r]]);
                                //Si imagen con modal o solo:
                                if($table['col-'.$i]['body']['data']['modal']==1){
                                    $htmlTd2 .= '
                                            <button type="button" class="" data-toggle="modal" data-target="#'.$idModal.'" style="border:none;background:transparent;">
                                              <img style="'.$tdStyle.'" src="'.$urlData.$col[$table['col-'.$i]['body']['data']['row'][$r]].'">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="'.$idModal.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel" style="color:#000;">
                                                        <b>'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'</b>
                                                    </h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <img class="img-responsive" style="" src="'.$urlData.$col[$table['col-'.$i]['body']['data']['row'][$r]].'">
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>                                    
                                    ';
                                }else if($table['col-'.$i]['body']['data']['modal']==0){
                                    $htmlTd2 .= '<img style="'.$tdStyle.'" src="'.$urlData.$col[$table['col-'.$i]['body']['data']['row'][$r]].'">';
                                }
                            }
                        break;

                        case 'number'://Tipo numeral
                            for($r=0;$r<$countArrRow;$r++){
                                if($r==0){
                                    $iconConect='';
                                }else{
                                    $iconConect=$table['col-'.$i]['body']['data']['icon'];
                                }
                                $htmlTd2 .= $iconConect.'<span style="'.$tdStyle.'">'.number_format($col[$table['col-'.$i]['body']['data']['row'][$r]],$table['col-'.$i]['body']['data']['decimal'],'.','').'</span>';
                            }
                        break;

                        case 'element-form': //Tipo elementos de formulario
                            for($d=0;$d<$countArrData;$d++){
                                $element = $table['col-'.$i]['body']['data']['element'];
                                $type = $table['col-'.$i]['body']['data']['type'];
                                $row = $col[$table['col-'.$i]['body']['data']['row']];
                                $btn_op = $table['col-'.$i]['body']['data']['btn-op'];
                                $class = $table['col-'.$i]['body']['data']['class'];
                                $formaction = $table['col-'.$i]['body']['data']['formaction'];
                                $name = $table['col-'.$i]['body']['data']['name'];
                                $text = $table['col-'.$i]['body']['data']['text'];
                                $icon = $table['col-'.$i]['body']['data']['icon'];
                                $id = $table['col-'.$i]['body']['data']['id'];

                                if($element=='button'){
                                    $htmlTd2 = '
                                        <button type="'.$type.'" style="'.$tdStyle.'" class="btn btn-'.$class.' btn-icon-exe" formaction="'.$formaction.'" name="'.$name.'" value="'.$btn_op.'/'.$row.'">
                                            <span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>
                                            '.$text.'
                                        </button>
                                    ';
                                }else if($element=='checkbox'){
                                    $htmlTd2 = '
                                    <div class="checkbox checkbox-info">
                                        <input id="'.$id.$row.'" type="checkbox" name="'.$name.'" class="'.$class.'" value="'.$row.'">
                                        <label for="'.$id.$row.'" title="">'.$text.'</label>
                                    </div>
                                    ';
                                }else if($element=='radio'){
                                    $htmlTd2 = '
                                    <div class="radiobutton radiobutton-info">
                                        <input id="'.$id.$row.'" type="radio" name="'.$name.'" class="'.$class.'" value="'.$row.'">
                                        <label for="'.$id.$row.'" title="">'.$text.'</label>
                                    </div>
                                    ';
                                }
                            }
                        break;

                        case 'file': //Tipo archivos
                            for($r=0;$r<$countArrRow;$r++){
                                $ext = explode('.',$col[$table['col-'.$i]['body']['data']['row'][$r]]);
                                if($ext[1]=='docx'){
                                    $doc = 'word';
                                }else if($ext[1]=='xlsx'){
                                    $doc = 'excel';
                                }else if($ext[1]=='ppt'){
                                    $doc = 'ppt';
                                }else if($ext[1]=='pdf'){
                                    $doc = 'pdf';
                                }else if($ext[1]=='zip'){
                                    $doc = 'zip';
                                }
                                $htmlTd2 .= '
                                    <a href="'.$table['col-'.$i]['body']['data']['url'].$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank" style="background: transparent;">
                                        <img style="'.$tdStyle.'" src="app/img/icon/'.$doc.'.png">
                                    </a>
                                ';
                            }
                        break;

                        case 'alert': //Tipo mensaje alerta
                            for($r=0;$r<$countArrRow;$r++){
                                $htmlTd2 .= '
                                
                                    <span class="alert alert-'.$table['col-'.$i]['body']['data']['class'].'" style="'.$tdStyle.'">'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'</span>
                                
                                ';
                            }
                        break;
                        case 'state': //Tipo estados
                            $arrValues = $table['col-'.$i]['body']['data']['values'];
                            $countArrValues = count($arrValues);
                            for($r=0;$r<$countArrRow;$r++){
                                for($v=0;$v<$countArrValues;$v++){
                                    if($arrValues[$v][0]==$col[$table['col-'.$i]['body']['data']['row'][$r]]){
                                        $htmlTd2 .= $arrValues[$v][1];
                                    }
                                }
                            }
                        break;
                        case 'video': //Tipo video de youtube
                            if($table['col-'.$i]['body']['data']['type']=='youtube'){
                                $youtube_id = '';
                                for($r=0;$r<$countArrRow;$r++){
                                    $youtube_id = getYouTubeId($col[$table['col-'.$i]['body']['data']['row'][$r]]);

                                    $htmlTd2 .= '
                                        <iframe style="'.$tdStyle.'" type="text/html" src="http://www.youtube.com/embed/'.$youtube_id.'" frameborder="0"></iframe>
                                    ';

                                }
                            }
                        break;
                        case 'social': //Tipo redes sociales
                            for($r=0;$r<$countArrRow;$r++){

                                $network = $table['col-'.$i]['body']['data']['network'];

                                if($network == 'facebook'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/facebook.png">
                                        </a>
                                    ';
                                }else if($network == 'instagram'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/instagram.png">
                                        </a>
                                    ';
                                }else if($network == 'linkedin'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/linkedin.png">
                                        </a>
                                    ';
                                }else if($network == 'google-plus'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/google-plus.png">
                                        </a>
                                    ';
                                }else if($network == 'pinterest'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/pinterest.png">
                                        </a>
                                    ';
                                }else if($network == 'twitter'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/twitter.png">
                                        </a>
                                    ';
                                }else if($network == 'youtube'){
                                    $htmlTd2 .= '
                                        <a style="background:transparent;'.$tdStyle.'" href="'.$col[$table['col-'.$i]['body']['data']['row'][$r]].'" target="_blank">
                                            <img src="app/img/icon/youtube.png">
                                        </a>
                                    ';
                                }

                            }
                        break;
                    }

                    $htmlTd3 .= '<td>'.$htmlTd2.'</td>';

                }

                $htmlTd = $htmlTd3;

                if($contReg==$countThead){
                    $trend = '</tr>';
                }else{
                    $trend = '';
                }

                $htmlBody .= '<tr>'.$htmlTd.$trend;
            }


        // Seccion 4 - Paginador

            // Datos para Paginador
            $limit = $arg['limit'];
            $offset = $arg['offset'];
            $page = $arg['page'];


            // Contador de registros de la consulta a la BD       
            if($arg['count']!=''){

                //Contamos registros en total
                $this->setSelectArg($arg['count']);
                $resultCount = $this->selectData();

                foreach($resultCount as $colc);

                $totalReg = $colc['paginator_count'];
            }else{
                $totalReg = '';
            }

            // Condicionamos y llamamos a función que arma el paginador
            if($limit=='' || $limit>=$totalReg){
                $htmlPaginator = '';
            }else{
                $htmlPaginator = $this->paginator($totalReg,$limit,$page,$btn_op);
            } 


        // Seccion 5 - Armado de tabla

            $htmlList = '     
                <div class="panel panel-default"> 
                    <div class="panel-heading text-left heading-list '.$tVisible.'">
                        <span class="glyphicon glyphicon-'.$tIcon.'" aria-hidden="true"></span>
                        &nbsp;&nbsp; '.$tTitle.'
                    </div> 
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-striped table-hover">
                            <thead>
                                <tr>
                                    '.$htmlThead.'
                                </tr>
                            </thead>
                            <tbody>
                                '.$htmlBody.'
                            </tbody>
                        </table>
                        '.$msg_text.'
                    </div>
                    '.$htmlPaginator.'
                </div>';

            return $htmlList;
    }

    protected function paginator($total,$limit,$pag,$btn_op)
    {
        $htmlPaginator = '';
        $btnPaginator = '';
        $active = '';

        $aux_pag=$pag+1;

        $countPaginator = ceil($total/$limit);

        for($i=1;$i<=$countPaginator;$i++){ 
            if($aux_pag==$i){$active = 'btn-active';}else{$active = '';}

            $btnPaginator .= '
                    <li>
                        <button type="submit" class="'.$active.'" name="btn-pag" value="'.$i.'/'.$btn_op.'">'.$i.'</button>
                    </li>
            '; 
        }

        $htmlPaginator = '
            <div class="section-paginator">
                <ul class="pagination">
                    '.$btnPaginator.'
                </ul>
            </div>
        ';

        return $htmlPaginator;
    }

    protected function generateListOption($arg,$fields,$selected_value)
    {
        //$arg : arreglo múltiple que tiene los datos de la consulta      
        $this->setSelectArg($arg);
        $result = $this->selectData();
        
        $selected = '';   

        foreach($result as $col){

            if($selected_value!='' && $selected_value==$col[$fields[0][0]]){
                $selected = 'selected';
            }else{
                $selected = '';
            }

            $htmlOption .= '<option value="'.$col[$fields[0][0]].'" '.$selected.'>'.$col[$fields[0][1]].'</option>';
        }

        return $htmlOption;
    } 

    public function htmlListOption($options,$arg,$fields)
    {

        #Opciones para Select
        $option = $options['option'];
        $selectName = $options['select-name'];
        $btnName = $options['btn-name'];
        $btnValue = $options['btn-value'];
        $btnText = $options['btn-text'];
        $btnType = $options['btn-type'];
        $selected = $options['selected-value'];
        $required = $options['select-required'];

        //Campo obligatorio
        if($required==1){$txt_required='required';}else{$txt_required='';}



        $htmlOption = $this->generateListOption($arg,$fields,$selected);

        if($option=='group'){
            $htmlList = '
                <div class="input-group">
                  <select class="form-control" name="'.$selectName.'" onchange="select_validate(this.value)" '.$txt_required.'>
                    <option disabled selected value="">Seleccionar...</option>
                    '.$htmlOption.'
                  </select>
                  <div class="input-group-btn">
                    <button disabled type="submit" name="'.$btnName.'" id="btn-select" class="btn btn-'.$btnType.'" value="'.$btnValue.'">
                      '.$btnText.'
                    </button>
                  </div>
                </div>
            ';
        }else if($option=='simple'){
            $htmlList = '
                <select class="form-control" name="'.$selectName.'" '.$txt_required.'>
                    <option disabled selected value="">Seleccionar...</option>
                    '.$htmlOption.'
                </select>
            ';
        }

        return $htmlList;
    }

    public function editRegister($arg)
    {
        $this->setUpdateArg($arg);
        $result = $this->updateData();
    
        return $result;
    }

    public function deleteRegister($arg)
    {
        $this->setDeleteArg($arg);
        $result = $this->deleteData();
    
        return $result;
    }

    public function addRegister($arg)
    {
        $this->setInsertArg($arg);
        $result = $this->insertData();
    
        return $result;
    }
    
    public function getCategoryData($categoria_id)
    {
        $data = $this->getDataToCategory($categoria_id);
        return $data;
    }

    public function get_AllProducts($limit,$offset)
    {
        $data = $this->getAllProducts($limit,$offset);
        return $data;
    }
}

?>
