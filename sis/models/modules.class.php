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
                    "title"=>"Listado de Productos"
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
                    "title"=>"Listado de Productos"
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
            $categoria_id = $arg['fields'][5];
            $tipo_id = $arg['fields'][6];

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
                    ,array('categoria_id',(int)$categoria_id)
                    ,array('tipo_id',(int)$tipo_id)
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

    class Banner extends View
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
                                    ,"row"=>"banner_id"
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
                                    "row"=>array("banner_nombre")
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
                            "row"=>array("banner_imagen")
                            ,"modal"=>'1'
                            ,"url"=>'../../assets/img/banners/'
                        )
                    )
                )
                ,
                "col-3"=>array(
                    "head"=>"Link"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("banner_link")
                                )
                        )
                    )
                ,
                
                "col-4"=>array(
                    "head"=>"Modificar"
                    ,"body"=>array(
                            "type"=>"element-form"
                            ,"data"=>array(
                                    "element"=>"button"
                                    ,"type"=>"submit"
                                    ,"row"=>"banner_id"
                                    ,"btn-op"=>"modificar-form"
                                    ,"class"=>"success btn-sm"
                                    ,"formaction"=>"banner-form.php"
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
                    "title"=>"Listado de Banners"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('banners','b')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','b.banner_activo','=','1')
                    ),
                    'order'=>array(
                        array('order by','b.banner_id','ASC')
                    ),
                    'limit'=>array(
                        array($limit,$offset)
                    )
                )
                ,"count"=>array(
                    'tables'=>array(
                        array('banners','b')
                        ),
                    'operation'=>array(
                        array('COUNT','b.banner_id','paginator_count')
                        ),
                    'conditional'=>array(
                        array('','b.banner_activo','=','1')
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
                    "title"=>"Listado de Banners"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('banners','b')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','b.banner_activo','=','2')
                    ),
                    'order'=>array(
                        array('order by','b.banner_id','ASC')
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
                    "title"=>'Lista de Categorías <a class="btn-danger" href="banner.php" style="float:right;"><span class="glyphicon glyphicon-remove"></span> Cancelar Búsqueda</a>'
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('banners','b')
                    ),
                    'conditional'=>array(
                      array('','b.banner_nombre','like','CONCAT("%","'.$value.'","%")')
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
                    array('banners')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('banner_activo',$value)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','banner_id',$id)
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
                    array('banners')
                ),
                'conditional'=>array(
                    array('','banner_id',$id)
                )
            );

            $update=$this->deleteRegister($arg);

            return $update;
        }

         #9
        public function agregar($value)
        {
      
            $banner_nombre = $value[0];
            $banner_imagen = $value[1];
            $banner_link = $value[2];

            $arg = array(
                    'tables'=>array(
                            array('banners')
                        ),
                    'fields'=>array(
                            array('banner_nombre',$banner_nombre)
                            ,array('banner_imagen',$banner_imagen)
                            ,array('banner_link',$banner_link)
                            ,array('banner_activo',1)
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
                    array('banners','b')
                    ),
                'conditional' => array(
                    array('','b.banner_id','=',$id)
                    )
                );

            $this->setSelectArg($arg);
            $result = $this->selectData();

            return $result;
        }

        #11
        public function editar($arg)
        {
            
            $banner_id = $arg['id'];
            $banner_nombre = $arg['fields'][0];
            $banner_imagen= $arg['fields'][1];
            $banner_link = $arg['fields'][2];

            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('banners')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('banner_nombre',$banner_nombre)
                    ,array('banner_imagen',$banner_imagen)
                    ,array('banner_link',$banner_link)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','banner_id',$banner_id)
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

    class Categoria extends View
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
                                    ,"row"=>"categoria_id"
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
                                    "row"=>array("categoria_nombre")
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
                            "row"=>array("categoria_foto")
                            ,"modal"=>'1'
                            ,"url"=>'../../assets/img/categorias/'
                        )
                    )
                )
                ,
                "col-3"=>array(
                    "head"=>"Detalle"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("categoria_detalle")
                                )
                        )
                    )
                ,
                
                "col-4"=>array(
                    "head"=>"Modificar"
                    ,"body"=>array(
                            "type"=>"element-form"
                            ,"data"=>array(
                                    "element"=>"button"
                                    ,"type"=>"submit"
                                    ,"row"=>"categoria_id"
                                    ,"btn-op"=>"modificar-form"
                                    ,"class"=>"success btn-sm"
                                    ,"formaction"=>"categoria-form.php"
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
                    "title"=>"Listado de Categorías"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('categorias','c')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','c.categoria_activo','=','1')
                    ),
                    'order'=>array(
                        array('order by','c.categoria_id','ASC')
                    ),
                    'limit'=>array(
                        array($limit,$offset)
                    )
                )
                ,"count"=>array(
                    'tables'=>array(
                        array('categorias','c')
                        ),
                    'operation'=>array(
                        array('COUNT','c.categoria_id','paginator_count')
                        ),
                    'conditional'=>array(
                        array('','c.categoria_activo','=','1')
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
                    "title"=>"Listado de Categorias Desactivadas"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('categorias','c')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','c.categoria_activo','=','2')
                    ),
                    'order'=>array(
                        array('order by','c.categoria_id','ASC')
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
                    "title"=>'Lista de Categorias <a class="btn-danger" href="categoria.php" style="float:right;"><span class="glyphicon glyphicon-remove"></span> Cancelar Búsqueda</a>'
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('categorias','c')
                    ),
                    'conditional'=>array(
                      array('','c.categoria_nombre','like','CONCAT("%","'.$value.'","%")')
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
                    array('categorias')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('categoria_activo',$value)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','categoria_id',$id)
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
                    array('categorias')
                ),
                'conditional'=>array(
                    array('','categoria_id',$id)
                )
            );

            $update=$this->deleteRegister($arg);

            return $update;
        }

         #9
        public function agregar($value)
        {
    
            $categoria_nombre = $value[0];
            $categoria_foto = $value[1];
            $categoria_detalle = $value[2];

            $arg = array(
                    'tables'=>array(
                            array('categorias')
                        ),
                    'fields'=>array(
                            array('categoria_nombre',$categoria_nombre)
                            ,array('categoria_foto',$categoria_foto)
                            ,array('categoria_detalle',$categoria_detalle)
                            ,array('categoria_activo',1)
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
                    array('categorias','c')
                    ),
                'conditional' => array(
                    array('','c.categoria_id','=',$id)
                    )
                );

            $this->setSelectArg($arg);
            $result = $this->selectData();

            return $result;
        }

        #11
        public function editar($arg)
        {
            
            $categoria_id = $arg['id'];
            $categoria_nombre = $arg['fields'][0];
            $categoria_foto= $arg['fields'][1];
            $categoria_detalle = $arg['fields'][2];

            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('categorias')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('categoria_nombre',$categoria_nombre)
                    ,array('categoria_foto',$categoria_foto)
                    ,array('categoria_detalle',$categoria_detalle)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','categoria_id',$categoria_id)
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

    }

    class Tipo extends View
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
                                    ,"row"=>"tipo_id"
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
                                    "row"=>array("tipo_nombre")
                                )
                        )
                    )
                ,
                "col-2"=>array(
                    "head"=>"Detalle"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("tipo_detalle")
                                )
                        )
                    )
                ,
                
                "col-3"=>array(
                    "head"=>"Modificar"
                    ,"body"=>array(
                            "type"=>"element-form"
                            ,"data"=>array(
                                    "element"=>"button"
                                    ,"type"=>"submit"
                                    ,"row"=>"tipo_id"
                                    ,"btn-op"=>"modificar-form"
                                    ,"class"=>"success btn-sm"
                                    ,"formaction"=>"tipo-form.php"
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
                    "title"=>"Listado de Tipo de Artículos"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('tipos','t')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','t.tipo_activo','=','1')
                    ),
                    'order'=>array(
                        array('order by','t.tipo_id','ASC')
                    ),
                    'limit'=>array(
                        array($limit,$offset)
                    )
                )
                ,"count"=>array(
                    'tables'=>array(
                        array('tipos','t')
                        ),
                    'operation'=>array(
                        array('COUNT','t.tipo_id','paginator_count')
                        ),
                    'conditional'=>array(
                        array('','t.tipo_activo','=','1')
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
                    "title"=>"Listado de Tipos de Artículos desactivados"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('tipos','t')
                    ),
                    'relation'=>array(
                    ),
                    'conditional'=>array(
                        array('','t.tipo_activo','=','2')
                    ),
                    'order'=>array(
                        array('order by','t.tipo_id','ASC')
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
                    "title"=>'Lista de Tipos <a class="btn-danger" href="tipo.php" style="float:right;"><span class="glyphicon glyphicon-remove"></span> Cancelar Búsqueda</a>'
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('tipos','t')
                    ),
                    'conditional'=>array(
                      array('','t.tipo_nombre','like','CONCAT("%","'.$value.'","%")')
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
                    array('tipos')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('tipo_activo',$value)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','tipo_id',$id)
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
                    array('tipos')
                ),
                'conditional'=>array(
                    array('','tipo_id',$id)
                )
            );

            $update=$this->deleteRegister($arg);

            return $update;
        }

         #9
        public function agregar($value)
        {
            $tipo_nombre = $value[0];
            $tipo_detalle = $value[1];

            $arg = array(
                    'tables'=>array(
                            array('tipos')
                        ),
                    'fields'=>array(
                            array('tipo_nombre',$tipo_nombre)
                            ,array('tipo_detalle',$tipo_detalle)
                            ,array('tipo_activo',1)
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
                    array('tipos','t')
                    ),
                'conditional' => array(
                    array('','t.tipo_id','=',$id)
                    )
                );

            $this->setSelectArg($arg);
            $result = $this->selectData();

            return $result;
        }

        #11
        public function editar($arg)
        {
            
            $tipo_id = $arg['id'];
            $tipo_nombre = $arg['fields'][0];
            $tipo_detalle = $arg['fields'][1];

            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('tipos')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('tipo_nombre',$tipo_nombre)
                    ,array('tipo_detalle',$tipo_detalle)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','tipo_id',$tipo_id)
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

    }

    class DetalleProducto extends View
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
                                    ,"row"=>"pdetalle_id"
                                    ,"id"=>"user-check-"
                                    ,"name"=>"check-id[]"
                                )
                        )
                    )
                ,
                "col-1"=>array(
                    "head"=>"Nombre del Producto"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("producto_nombre")
                                )
                        )
                    )
                ,
                "col-2"=>array(
                    "head"=>"Descripción"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("pdetalle_descripcion")
                                )
                        )
                    )
                ,
                "col-3"=>array(
                    "head"=>"Tamaños"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("pdetalle_tamanos")
                                )
                        )
                    )
                ,
                "col-4"=>array(
                    "head"=>"Colores"
                    ,"body"=>array(
                            "type"=>"text"
                            ,"data"=>array(
                                    "row"=>array("pdetalle_colores")
                                )
                        )
                    )
                ,
                "col-5"=>array(
                    "head"=>"Modificar"
                    ,"body"=>array(
                            "type"=>"element-form"
                            ,"data"=>array(
                                    "element"=>"button"
                                    ,"type"=>"submit"
                                    ,"row"=>"pdetalle_id"
                                    ,"btn-op"=>"modificar-form"
                                    ,"class"=>"success btn-sm"
                                    ,"formaction"=>"producto_detalle-form.php"
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
                    "title"=>"Listado de Productos"
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('productos','p')
                        ,array('producto_detalle','d')
                    ),
                    'relation'=>array(
                        array('d.producto_id','p.producto_id')
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
                        array('producto_detalle','d')
                        ),
                    'operation'=>array(
                        array('COUNT','d.pdetalle_id','paginator_count')
                        ),
                    'conditional'=>array(
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
        public function buscar($value,$btn_op)
        {
            # Inicia variables
            $lista = '';

            # Datos Paginador
            $offset = $page*$limit;

            #Table Config
            $config=array(
                    "title"=>'Lista de Categorías <a class="btn-danger" href="producto_detalle.php" style="float:right;"><span class="glyphicon glyphicon-remove"></span> Cancelar Búsqueda</a>'
                    ,"icon"=>"th-list"
                    ,"visible"=>"block"
                    ,"btn-op"=>$btn_op
            );

            #Query
            $query = array(
                "consult"=>array(
                    'tables'=>array(
                        array('producto_detalle','d')
                        ,array('productos','p')
                    ),
                    'relation'=>array(
                        array('d.producto_id','p.producto_id')
                    ),
                    'conditional' => array(
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
          
            $pdetalle_descripcion = $value[0];
            $pdetalle_caracteristicas = $value[1];
            $pdetalle_fotos = $value[2];
            $pdetalle_tamanos= $value[3];
            $pdetalle_colores = $value[4];
            $pdetalle_precios = $value[5];
            $producto_id = $value[6];

            $arg = array(
                    'tables'=>array(
                            array('producto_detalle')
                        ),
                    'fields'=>array(
                            array('pdetalle_descripcion',$pdetalle_nombre)
                            ,array('pdetalle_caracteristicas',$pdetalle_identificador)
                            ,array('pdetalle_fotos',$pdetalle_foto)
                            ,array('pdetalle_tamanos',$pdetalle_precio)
                            ,array('pdetalle_colores',$pdetalle_descuento)
                            ,array('pdetalle_precios',$pdetalle_fecha)
                            ,array('producto_id',$producto_id)
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
                    array('producto_detalle','d')
                    ),
                'conditional' => array(
                    array('','d.pdetalle_id','=',$id)
                    )
                );

            $this->setSelectArg($arg);
            $result = $this->selectData();

            return $result;
        }

        #11
        public function editar($arg)
        {
            
            $pdetalle_id = $arg['id'];
            $pdetalle_descripcion = $arg['fields'][0];
            $pdetalle_caracteristicas = $arg['fields'][1];
            $pdetalle_fotos = $arg['fields'][2];
            $pdetalle_tamanos = $arg['fields'][3];
            $pdetalle_colores = $arg['fields'][4];
            $pdetalle_precios = $arg['fields'][5];
            $producto_id = $arg['fields'][6];

            #Query
            $arg = array(
                'tables'=>array(
                    //array('tabla')
                    array('producto_detalle')
                ),
                'fields'=>array(
                    //array('campo','valor')
                    array('pdetalle_descripcion',$pdetalle_descripcion)
                    ,array('pdetalle_caracteristicas',$pdetalle_caracteristicas)
                    ,array('pdetalle_fotos',$pdetalle_fotos)
                    ,array('pdetalle_tamanos',$pdetalle_tamanos)
                    ,array('pdetalle_colores',$pdetalle_colores)
                    ,array('pdetalle_precios',$pdetalle_precios)
                    ,array('producto_id',(int)$producto_id)
                ),
                'conditional'=>array(
                    //array('operador: VACIO, AND ó OR','campo','valor')
                    array('','pdetalle_id',$pdetalle_id)
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

        public function listaProductos($options)
        {
            $arg = array(
                    'tables'=>array(
                            array('productos','p')
                        )
                );

            $fields = array(
                    array('producto_id','producto_nombre')
                );

            $lista = $this->htmlListOption($options,$arg,$fields);

            return $lista;
        }

    }


?>
