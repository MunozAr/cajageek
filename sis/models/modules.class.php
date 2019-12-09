<?php

    class Producto extends View
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
                                    ,"row"=>"producto_id"
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
                                    "row"=>array("producto_nombre")
                                )
                        )
                    )
                ,
                "col-2"=>array(
                "head"=>"Foto"
                    ,"body"=>array(
                        "type"=>"image"
                        ,"style"=>array(
                            array("width","50px")
                        )
                        ,"data"=>array(
                            "row"=>array("producto_foto")
                            ,"modal"=>'1'
                            ,"url"=>'../../assets/img/productos/'
                        )
                    )
                )
                ,
                "col-3"=>array(
                    "head"=>"Precio"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("producto_precio")
                                )
                        )
                    )
                ,
                "col-4"=>array(
                    "head"=>"Descuento"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("producto_descuento")
                                )
                        )
                    )
                ,
                "col-5"=>array(
                "head"=>"Estado"
                ,"body"=>array(
                        "type"=>"state"
                        ,"data"=>array(
                                "row"=>array("producto_activo")
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
                                    ,"row"=>"producto_id"
                                    ,"btn-op"=>"modificar-form"
                                    ,"class"=>"success btn-sm"
                                    ,"formaction"=>"producto-form.php"
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
                        array('productos','p')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','p.producto_activo','=','1')
                    ),
                    'order'=>array(
                        array('order by','p.producto_id','ASC')
                    ),
                    'limit'=>array(
                        array($limit,$offset)
                    )
                )
                ,"count"=>array(
                    'tables'=>array(
                        array('productos','p')
                        ),
                    'operation'=>array(
                        array('COUNT','p.producto_id','paginator_count')
                        ),
                    'conditional'=>array(
                        array('','p.producto_activo','=','1')
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
                        array('productos','p')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','p.producto_activo','=','2')
                    ),
                    'order'=>array(
                        array('order by','p.producto_id','ASC')
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
                    "title"=>'Lista de Categorías <a class="btn-danger" href="producto.php" style="float:right;"><span class="glyphicon glyphicon-remove"></span> Cancelar Búsqueda</a>'
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('productos','p')
                    ),
                    'conditional'=>array(
                      array('','p.producto_nombre','like','CONCAT("%","'.$value.'","%")')
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
                    array('productos')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('producto_activo',$value)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','producto_id',$id)
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
                    array('productos')
                ),
                'conditional'=>array(
                    array('','producto_id',$id)
                )
            );

            $update=$this->deleteRegister($arg);

            return $update;
        }

         #9
        public function agregar($value)
        {
            //  print_r($value);
            $producto_nombre = $value[0];
            $producto_identificador = $value[1];
            $producto_foto = $value[2];
            $producto_precio= $value[3];
            $producto_descuento = $value[4];
            $producto_fecha = $value[5];
            $categoria_id = $value[6];
            $tipo_id = $value[7];

            $arg = array(
                    'tables'=>array(
                            array('productos')
                        ),
                    'fields'=>array(
                            array('producto_nombre',$producto_nombre)
                            ,array('producto_identificador',$producto_identificador)
                            ,array('producto_foto',$producto_foto)
                            ,array('producto_precio',$producto_precio)
                            ,array('producto_descuento',$producto_descuento)
                            ,array('producto_fecha',$producto_fecha)
                            ,array('categoria_id',$categoria_id)
                            ,array('tipo_id',$tipo_id)
                            ,array('producto_activo',1)
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
                    array('productos','p')
                    ),
                'conditional' => array(
                    array('','p.producto_id','=',$id)
                    )
                );

            $this->setSelectArg($arg);
            $result = $this->selectData();

            return $result;
        }

        #11
        public function editar($arg)
        {
            
            $producto_id = $arg['id'];
            $producto_nombre = $arg['fields'][0];
            $producto_identificador = $arg['fields'][1];
            $producto_foto = $arg['fields'][2];
            $producto_precio = $arg['fields'][3];
            $producto_descuento = $arg['fields'][4];
            $categoria_id = $arg['fields'][6];
            $tipo_id = $arg['fields'][7];

            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('productos')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('producto_nombre',$producto_nombre)
                    ,array('producto_identificador',$producto_identificador)
                    ,array('producto_foto',$producto_foto)
                    ,array('producto_precio',$producto_precio)
                    ,array('producto_descuento',$producto_descuento)
                    ,array('categoria_id',$categoria_id)
                    ,array('tipo_id',$tipo_id)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','producto_id',$producto_id)
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
                            array('productos','p')
                        )
                );

            $fields = array(
                    array('producto_id','producto_nombre','producto_identificador','producto_foto','producto_precio','producto_descuento','producto_fecha','categoria_id','tipo_id','producto_activo')
                );
                
            return $fields;

        }

        public function listaCategorias($options)
      {
          $arg = array(
                  'tables'=>array(
                          array('categorias','a')
                      )
              );

          $fields = array(
                  array('categoria_id','categoria_nombre')
              );

          $lista = $this->htmlListOption($options,$arg,$fields);

          return $lista;
        }
        public function listaTipos($options)
        {
            $arg = array(
                    'tables'=>array(
                            array('tipos','t')
                        )
                );

            $fields = array(
                    array('tipo_id','tipo_nombre')
                );

            $lista = $this->htmlListOption($options,$arg,$fields);

            return $lista;

        }

    }

?>
