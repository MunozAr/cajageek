<?php

require_once dirname(__FILE__).'/conexionBD.class.php';

class generalQuery extends ConexionBD
{

	//query
	private $query;

	//table
	private $table; // type: string

	private $selectArg; //type: multiple array
    private $insertArg; //type: multiple array
    private $updateArg; //type: multiple array
    private $deleteArg; //type: multiple array

    private $addFields; // type: multiple array

	function __construct($query='',$selectArg = '',$insertArg = '',$updateArg = '',$deleteArg = '')
	{
		$this->query = $query;
        $this->selectArg = $selectArg;
        $this->insertArg = $insertArg;
        $this->updateArg = $updateArg;
        $this->deleteArg = $deleteArg;
	}

// SET AND GET
    public function setSelectArg($selectArg=''){
		$this->selectArg = $selectArg;
	}
	public function getSelectArg(){
		return $this->selectArg;
	}
    public function setInsertArg($insertArg=''){
		$this->insertArg = $insertArg;
	}
	public function getInsertArg(){
		return $this->insertArg;
	}
    public function setUpdateArg($updateArg=''){
		$this->updateArg = $updateArg;
	}
	public function getUpdateArg(){
		return $this->updateArg;
	}
    public function setDeleteArg($deleteArg=''){
		$this->deleteArg = $deleteArg;
	}
	public function getDeleteArg(){
		return $this->deleteArg;
	}
// Fin


//Private Function
    // Result de c/Query
	private function resultSelect($result)
	{
			$result->execute();
			$call = $result->fetchAll();
			return $call;
	}

    //Select query
	protected function defineSelectQuery()
	{
        $arg = $this->getSelectArg();

        $countArrTables = count($arg['tables']);
        $countArrRelation = count($arg['relation']);
        $countArrConditional = count($arg['conditional']);
        $countArrOrder = count($arg['order']);
        $countArrLimit = count($arg['limit']);
        $countArrFields = count($arg['fields']);
        $countArrOperation = count($arg['operation']);

        $firstTable = '';
        $innerTables = '';
        $orderTable = '';

        // Armamos string para los campos solicitados del query
        $coma = '';
        if($countArrOperation==0){
            if($countArrFields>0){
                for($k=0;$k<$countArrFields;$k++){
                    if($k==0){$coma = '';}else{$coma = ' ,';}

                    $fieldsConsult .= $coma.$arg['fields'][$k][0];
                }
            }else{
                $fieldsConsult = ' * ';
            }
        }else{
            for($k=0;$k<$countArrOperation;$k++){
                if($k==0){$coma = '';}else{$coma = ' ,';}

                $fieldsConsult .= $coma.$arg['operation'][$k][0].'('.$arg['operation'][$k][1].') as '.$arg['operation'][$k][2].' ';
            }
        }

        // Armamos string para los inner join del query
        $cont = 0;
        if($countArrTables>0){
            for($i=0;$i<$countArrTables;$i++){
                $cont = $cont+1;
                $table = $arg['tables'][$i][0];
                $tableAs = $arg['tables'][$i][1];

                if($i==0){
                    $firstTable = $arg['tables'][0][0].' as '.$arg['tables'][0][1];
                    $innerTables='';
                }else{
                    if($countArrRelation>0){
                        $firstTable = '';
                        $innerTables .= ' inner join '.$table.' as '.$tableAs.' on '.$arg['relation'][$i-1][0].' = '.$arg['relation'][$i-1][1];
                    }else{
                        $innerTables='';
                    }
                }
                $innerTables = $firstTable.$innerTables;
            }
        }


        // Armamos string para las condicionales (where) del query
        if($countArrConditional>0){
            $conditionalTables = '';
            for($f=0;$f<$countArrConditional;$f++){
                if($arg['conditional'][$f][0]==''){
                    $ini = '';
                }else{
                    $ini = $arg['conditional'][$f][0];
                }

                $conditionalTables .= ' '.$ini.' '.$arg['conditional'][$f][1].' '.$arg['conditional'][$f][2].' '.$arg['conditional'][$f][3];
            }
            $conditional = ' where '.$conditionalTables;
        }

        //Armamos para ordenar(order,limit,offset)
        $orderTable = '';
        $limitTable = '';
        for($g=0;$g<$countArrOrder;$g++){
            $orderTable .= ' '.$arg['order'][$g][0].' '.$arg['order'][$g][1].' '.$arg['order'][$g][2];
        }

        for($h=0;$h<$countArrLimit;$h++){
            $limitTable .= ' limit '.$arg['limit'][$h][0].' offset '.$arg['limit'][$h][1];
        }

        //Encriptamos datos
        $innerTables_return = $innerTables;
        $conditional_return = $conditional;
        $orderTable_return = $orderTable;
        $limitTable_return = $limitTable;
        $fieldsConsult_return = $fieldsConsult;

        //return $consult;
        $consult = $innerTables_return.$conditional_return.$orderTable_return.$limitTable_return.'|'.$fieldsConsult_return;

        return $consult;
	}

    protected function defineInsertQuery()
    {
        $arg = $this->getInsertArg();

        $countArrTables = count($arg['tables']);
        $countArrFields = count($arg['fields']);

        $nameTables='';
        if($countArrTables>0){
            // Nombre de tabla para insertar
            for($i=0;$i<$countArrTables;$i++){
                $nameTables .= $arg['tables'][$i][0];
            }
            // Campos y valores para insertar
            if($countArrFields>0){
                $cont=0;
                for($f=0;$f<$countArrFields;$f++){
                    $cont = $cont+1;
                    if($cont < $countArrFields){$coma = ',';}else{$coma = '';}

                    $nameFields .= $arg['fields'][$f][0].$coma;
                    $valueFields .= '"'.$arg['fields'][$f][1].'"'.$coma;

                    //Encriptamos datos
                    $nameTables_return = base64_encode($nameTables);
                    $nameFields_return = base64_encode($nameFields);
                    $valueFields_return = base64_encode($valueFields);

                    $consult = $nameTables_return.'|'.$nameFields_return.'|'.$valueFields_return;

                }
            }else{
                echo '<p style="color:red;"><b>AVISO: </b>Tiene que pasar los campos y valores para insertar los datos.</p>';
            }
        }else{
            echo '<p style="color:red;"><b>AVISO: </b>Tiene que pasar el nombre de la tabla para insertar los datos.</p>';
        }

        return $consult;
    }

    protected function defineUpdateQuery()
    {
        $arg = $this->getUpdateArg();

        $countArrTables = count($arg['tables']);
        $countArrFields = count($arg['fields']);
        $countArrConditional = count($arg['conditional']);

        $nameTables='';
        if($countArrTables>0){
            // Nombre de tabla para insertar
            for($i=0;$i<$countArrTables;$i++){
                $nameTables .= $arg['tables'][$i][0];
            }
            // Campos y valores para insertar
            if($countArrFields>0){
                $cont=0;
                for($f=0;$f<$countArrFields;$f++){
                    $cont = $cont+1;
                    if($cont < $countArrFields){$coma = ',';}else{$coma = '';}

                    $setUpdateFields .= $arg['fields'][$f][0].' = "'.$arg['fields'][$f][1].'"'.$coma;

                }
                // Condicionales para update
                if($countArrConditional>0){
                    for($g=0;$g<$countArrConditional;$g++){
                        $conditional .= ' '.$arg['conditional'][$g][0].' '.$arg['conditional'][$g][1].' = "'.$arg['conditional'][$g][2].'"';
                    }
                }
                //Encriptamos los datos
                $nameTables_return = base64_encode($nameTables);
                $setUpdateFields_return = base64_encode($setUpdateFields);
                $conditional_return = base64_encode($conditional);

                $consult = $nameTables_return.'|'.$setUpdateFields_return.'|'.$conditional_return;
            }else{
                echo '<p style="color:red;"><b>AVISO: </b>Tiene que pasar los campos y valores para insertar los datos.</p>';
            }
        }else{
            echo '<p style="color:red;"><b>AVISO: </b>Tiene que pasar el nombre de la tabla para insertar los datos.</p>';
        }

        return $consult;
    }

    protected function defineDeleteQuery()
    {
        $arg = $this->getDeleteArg();

        $countArrTables = count($arg['tables']);
        $countArrConditional = count($arg['conditional']);

        $nameTables='';
        if($countArrTables>0){

            // Nombre de tabla para insertar
            for($i=0;$i<$countArrTables;$i++){
                $nameTables .= $arg['tables'][$i][0];
            }
            if($countArrConditional>0){
                for($g=0;$g<$countArrConditional;$g++){
                    $conditional .= ' '.$arg['conditional'][$g][0].' '.$arg['conditional'][$g][1].' = "'.$arg['conditional'][$g][2].'"';
                }
            }

            //Encriptamos datos
            $nameTables_return = base64_encode($nameTables);
            $conditional_return = base64_encode($conditional);

            $consult = $nameTables_return.'|'.$conditional_return;
        }else{
            echo '<p style="color:red;"><b>AVISO: </b>Tiene que pasar el nombre de la tabla para insertar los datos.</p>';
        }

        return $consult;
    }


//Fin


//Public Function

	// SELECT METHOD
    public function selectData()
    {
        $arrConsult = explode('|',$this->defineSelectQuery());
        $bodyConsult = $arrConsult[0];
        $fieldsConsult = $arrConsult[1];

        $this->query = 'call sp_select_getdata(:v1,:v2);';


		$result = $this->conectBD()->prepare($this->query);

        //En Variables:
        $a = $fieldsConsult;
        $b = $bodyConsult;

		$result->bindParam(':v1',$a);
		$result->bindParam(':v2',$b);

		$rpta = $this->resultSelect($result);
		return $rpta;
    }

	// INSERT METHOD
	public function insertData()
	{
		$arrConsult = explode('|',$this->defineInsertQuery());

		$tableConsult = base64_decode($arrConsult[0]);
        $fieldsConsult= base64_decode($arrConsult[1]);
		$valuesConsult = base64_decode($arrConsult[2]);

		$this->query = 'call sp_insert_adddata(:v1,:v2,:v3);';

		// Preparamos los datos
		$result = $this->conectBD()->prepare($this->query);

        //En Variables:
        $a = $tableConsult;
        $b = $fieldsConsult;
        $c = $valuesConsult;

		$result->bindParam(':v1',$a);
		$result->bindParam(':v2',$b);
		$result->bindParam(':v3',$c);

		$rpta = $result->execute();

    return $rpta;
	}

	// UPDATE METHOD
	public function updateData()
	{
		$arrConsult = explode('|',$this->defineUpdateQuery());

		$tableConsult = base64_decode($arrConsult[0]);
        $setConsult= base64_decode($arrConsult[1]);
		$conditionalConsult = base64_decode($arrConsult[2]);

		$this->query = 'call sp_update_updatedata(:v1,:v2,:v3)';

		// Preparamos los datos
		$result = $this->conectBD()->prepare($this->query);

        //Variables
        $a = $tableConsult;
        $b = $setConsult;
        $c = $conditionalConsult;

		$result->bindParam(':v1',$a);
		$result->bindParam(':v2',$b);
		$result->bindParam(':v3',$c);

		$rpta = $result->execute();

        return $rpta;
	}

	// DELETE METHOD
	public function deleteData()
	{

		$arrConsult = explode('|',$this->defineDeleteQuery());

		$tableConsult = base64_decode($arrConsult[0]);
        $conditionalConsult= base64_decode($arrConsult[1]);

		$this->query = 'call sp_delete_deletedata(:v1,:v2)';

		$result = $this->conectBD()->prepare($this->query);

        //Variables
        $a = $tableConsult;
        $b = $conditionalConsult;

		$result->bindParam(':v1',$a);
		$result->bindParam(':v2',$b);

		$rpta = $result->execute();

        return $rpta;
    }
    
    public function getDataToCategory($id)
	{
		$queryDataToCategory = 'call sp_select_getdatatocategory('.$id.')';
		$result = $this->conectBD()->prepare($queryDataToCategory);
		$result->execute();
        $call = $result->fetchAll();
		return $call;
	}

//Fin

}


?>
