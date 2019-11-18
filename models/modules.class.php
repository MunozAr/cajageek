<?php

    class Proyecto extends View
    {

        //TABLAS
        private function table_config($estado)
        {
            if($estado=='activo'){
                $check_all = '
                    <div class="checkbox checkbox-info">
                      <input id="check-all" type="checkbox" class="check_id">
                      <label for="check-all" title="Seleccionar todos" class="chk-all"></label>
                    </div>
                ';

                $estado='<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;font-size:20px;"></span>';

            }else if($estado=='no-activo'){
                $check_all="#";
                $estado = '<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:red;font-size:20px;"></span>';
            }

            $table = array(
                "col-0"=>array(
                    "head"=>$check_all
                    ,"body"=>array(
                            "type"=>"element-form"
                            ,"data"=>array(
                                    "element"=>"checkbox"
                                    ,"row"=>"proyecto_id"
                                    ,"id"=>"user-check-"
                                    ,"name"=>"check-id[]"
                                )
                        )
                    )
                ,
                "col-1"=>array(
                    "head"=>"Nombre"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("proyecto_nombre")
                                )
                        )
                    )
                ,

                                    "col-2"=>array(
                                        "head"=>"Imagen"
                                        ,"body"=>array(
                                            "type"=>"image"
                                            ,"style"=>array(
                                                array("width","50px")
                                            )
                                            ,"data"=>array(
                                                "row"=>array("proyecto_imagen")
                                                ,"modal"=>'1'
                                                ,"url"=>'app/img/proyectos/'
                                            )
                                        )
                                    )
                ,
                "col-3"=>array(
                    "head"=>"Distrito"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("proyecto_distrito")
                                )
                        )
                    )
                ,
                "col-4"=>array(
                    "head"=>"Fecha de Creación"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("proyecto_date")
                                )
                        )
                    )
                ,
                "col-5"=>array(
                "head"=>"Estado"
                ,"body"=>array(
                        "type"=>"state"
                        ,"data"=>array(
                                "row"=>array("proyecto_estado")
                                ,"values"=>array(
                                    array("1","<b>ACTIVO<b>")
                                    ,array("2","<b>DESACTIVADO</b>")

                                )
                            )
                    )
                )
                ,
                "col-6"=>array(
                    "head"=>"Modificar"
                    ,"body"=>array(
                            "type"=>"element-form"
                            ,"data"=>array(
                                    "element"=>"button"
                                    ,"type"=>"submit"
                                    ,"row"=>"proyecto_id"
                                    ,"btn-op"=>"modificar-form"
                                    ,"class"=>"success btn-sm"
                                    ,"formaction"=>"proyecto-form.php"
                                    ,"name"=>"btn-op-form"
                                    ,"icon"=>"pencil"
                                    ,"text"=>""
                                )
                        )
                    )
            );


            return $table;

        }

        //Métodos de clase Categoría

        #1
        public function listaActivos($limit,$page,$btn_op)
        {
            # Inicia variables
            $lista = '';

            # Datos Paginador
            $offset = $page*$limit;

            #Table Config
            $config=array(
                    "title"=>"Listado de Proyectos Inmobiliarios"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('proyecto','p')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','p.proyecto_estado','=','1')
                    ),
                    'order'=>array(
                        array('order by','p.proyecto_id','ASC')
                    ),
                    'limit'=>array(
                        array($limit,$offset)
                    )
                )
                ,"count"=>array(
                    'tables'=>array(
                        array('proyecto','p')
                        ),
                    'operation'=>array(
                        array('COUNT','p.proyecto_id','paginator_count')
                        ),
                    'conditional'=>array(
                        array('','p.proyecto_estado','=','1')
                    )
                )
                ,"limit"=>$limit
                ,"offset"=>$offset
                ,"page"=>$page
            );

            #Table
            $table = $this->table_config('activo');
            // Empleamos el metodo dinamicTable
            $lista = $this->dinamicTable($config,$table,$query);
            return $lista;
        }

        #2
        public function listaDesactivados()
        {
            # Inicia variables
            $lista = '';

            # Datos Paginador
            $offset = $page*$limit;

            #Table Config
            $config=array(
                    "title"=>"Listado de Proyectos Desactivados"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('proyecto','p')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','p.proyecto_estado','=','2')
                    ),
                    'order'=>array(
                        array('order by','p.proyecto_id','ASC')
                    )
                )
            );

            #Table
            $table = $this->table_config('no-activo');


            // Empleamos el metodo dinamicTable
            $lista = $this->dinamicTable($config,$table,$query);
            return $lista;
        }

        #6
        public function buscar($value,$btn_op)
        {
            # Inicia variables
            $lista = '';

            # Datos Paginador
            $offset = $page*$limit;

            #Table Config
            $config=array(
                    "title"=>'Lista de Categorías <a class="btn-danger" href="proyecto.php" style="float:right;"><span class="glyphicon glyphicon-remove"></span> Cancelar Búsqueda</a>'
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('proyecto','p')
                    ),
                    'conditional'=>array(
                      array('','p.proyecto_nombre','like','CONCAT("%","'.$value.'","%")')
                    )
                )
            );

            #Table
            $table = $this->table_config('activo');


            // Empleamos el metodo dinamicTable
            $lista = $this->dinamicTable($config,$table,$query);
            return $lista;
        }

        #7
        public function cambiarEstado($value,$id)
        {
            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('proyecto')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('proyecto_estado',$value)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','proyecto_id',$id)
                )
            );

            $update=$this->editRegister($arg);

            return $update;
        }

        #8
        public function eliminar($id)
        {
            #Query
            $arg = array(
                'tables'=>array(
                    array('proyecto')
                ),
                'conditional'=>array(
                    array('','proyecto_id',$id)
                )
            );

            $update=$this->deleteRegister($arg);

            return $update;
        }

         #9
        public function agregar($value)
        {
            //  print_r($value);
            $proyecto_nombre = $value[0];
            $proyecto_distrito = $value[1];
            $proyecto_imagen = $value[2];
            $arg = array(
                    'tables'=>array(
                            array('proyecto')
                        ),
                    'fields'=>array(
                            array('proyecto_nombre',$proyecto_nombre)
                            ,array('proyecto_distrito',$proyecto_distrito)
                            ,array('proyecto_imagen',$proyecto_imagen)
                            ,array('proyecto_estado',1)
                        )
                );
            $add = $this->addRegister($arg);

            return $add;
        }

        #10
        public function listarxId($id)
        {

            $arg = array(
                'tables'=>array(
                    array('proyecto','p')
                    ),
                'conditional' => array(
                    array('','p.proyecto_id','=',$id)
                    )
                );

            $this->setSelectArg($arg);
            $result = $this->selectData();

            return $result;
        }

        #11
        public function editar($arg)
        {

            $proyecto_id = $arg['id'];
            $proyecto_nombre = $arg['fields'][0];
            $proyecto_distrito = $arg['fields'][1];
            $proyecto_imagen = $arg['fields'][2];
            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('proyecto')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('proyecto_nombre',$proyecto_nombre)
                    ,array('proyecto_distrito',$proyecto_distrito)
                    ,array('proyecto_imagen',$proyecto_imagen)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','proyecto_id',$proyecto_id)
                )
            );

            $update=$this->editRegister($arg);

            return $update;
        }


        public function listaTipo($categoria_categoria)
        {

            if($tipo_id==1){
                $selected1 = 'selected';
                $selected2 = '';
            }else if($tipo_id == 2){
                $selected1 = '';
                $selected2 = 'selected';
            }else{
                $selected1 = '';
                $selected2 = '';
            }


            $htmlSelect = '
                <option '.$selected1.' value="1">SI</option>
                <option '.$selected2.' value="2">NO</option>
            ';
            return $htmlSelect;
        }

        public function listaDeProyectos()
        {
            $arg = array(
                    'tables'=>array(
                            array('proyecto','p')
                        )
                );

            $fields = array(
                    array('proyecto_id','proyecto_nombre','proyecto_imagen','proyecto_distrito','proyecto_estado')
                );
                
            return $fields;

        }

    }

?>
