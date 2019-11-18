<?php 

class Login extends generalQuery
{
	private $tipo_login; // dinámico o estático
	private $tipo_usuario;

	private $usuario;
	private $password;
	
	function __construct($usuario="", $password="", $tipo_usuario="")
	{
		$this->_usuario=$usuario;
		$this->_password=$password;
		$this->_tipo_usuario=$tipo_usuario;
	}

// GET & SET
	public function getUsuario(){
		return $this->_usuario;
	}

	public function setUsuario($usuario){
		$this->_usuario=$usuario;
	}
	public function getPassword(){
		return $this->_password;
	}

	public function setPassword($password){
		$this->_password=$password;
	}

	public function getTipoUsuario(){
		return $this->_tipo_usuario;
	}

	public function setTipoUsuario($tipo_usuario){
		$this->_tipo_usuario=$tipo_usuario;
	}

	public function getTipoLogin(){
		return $this->tipo_login;
	}

	public function setTipoLogin($tipo_login){
		$this->tipo_login=$tipo_login;
	}
// fin GET & SET
        
// MÉTODOS LOGIN 

	private function validateSetData()
    {
			$return_vd = 0;

			if($this->getTipoLogin()==''){
				$return_vd = 1;//err
			}else{
				$return_vd = 0;//ok
			}

			if($this->getTipoLogin()!='log_estatico' && $this->getTipoLogin()!='log_dinamico'){
				$return_vd = 1;//err
			}else{
				$return_vd = 0;//ok
			}

			if($return_vd == 0){
		
				if($this->getUsuario()==''){
					$valid_user = 1;//err
				}else{
					$valid_user = 0;//ok
				}
				if($this->getPassword()==''){
					$valid_pass = 1;//err
				}else{
					$valid_pass = 0;//ok
				}

			}else if($return_vd == 1){
				error_log('Error en parámetro que define el tipo de login.',0);
			}

			if($valid_user+$valid_pass == 0){
				return 'ok';
			}else if($valid_user+$valid_pass>0){
				return 'err';
			}
	}

	private function defineUser()
    {

			//define_user es usuario definido internamente

			$this->setTipoLogin(TIPO_LOG);

			if($this->getTipoLogin()=='log_estatico'){//ADMIN_USER 
				
				$define_user = ADMIN_USER;

				if(SUPER_USER!=''){
					$define_superuser = SUPER_USER;				
				}else{
					$define_superuser = '';
				}

			}else if($this->getTipoLogin()=='log_dinamico'){	
				
				$getUsuario = $this->getUsuario();
                $getPassword = $this->getPassword();
				$valUser = $this->validateLoginBD($getUsuario,$getPassword);

				if($valUser==1){
					$define_user = $getUsuario;
				}else{
					$define_user = '';
				}

				if(SUPER_USER!=''){
					$define_superuser = SUPER_USER;
					
				}else{
					$define_superuser = '';
				}
			}

			return $define_user.'/'.$define_superuser;
	}

	private function definePassword()
    {

			//define_password es contraseña definida internamente

			$this->setTipoLogin(TIPO_LOG);

			if($this->getTipoLogin()=='log_estatico'){

				$define_password = ADMIN_PASS;

				if(SUPER_PASS!=''){
					$define_superpassword = SUPER_PASS;
				}else{
					$define_superpassword = '';
				}
	
			}else if($this->getTipoLogin()=='log_dinamico'){
                
                $getUsuario = $this->getUsuario();
				$getPassword = $this->getPassword();
				$valPassword = $this->validateLoginBD($getUsuario,$getPassword);;

				if($valPassword>=1){
					$define_password = $getPassword;
				}else{
					$define_password = '';
				}
				
				if(SUPER_PASS!=''){
					$define_superpassword = SUPER_PASS;
				}else{
					$define_superpassword = '';
				}
			}

			return $define_password.'/'.$define_superpassword;
	}

	public function generateLogin()
    {
		$_SESSION[SES_ADMIN] = '';
		$_SESSION[SES_SUPERADMIN] = '';

		$this->setTipoLogin(TIPO_LOG);

		//usuario/superusuario
		$userReturn = explode('/',$this->defineUser());
		$general_user = $userReturn[0];
		$general_superuser = $userReturn[1];

		// contraseña/super contraseña
		$passwordReturn = explode('/',$this->definePassword());

		$general_password = $passwordReturn[0];
		$general_superpassword = $passwordReturn[1];


		$validaDatos = $this->validateSetData();

		if($validaDatos == 'ok'){

			if($this->getUsuario() == $general_superuser && $this->getPassword() == md5($general_superpassword)){
				//$loginEstate = 'CREA SESION';
				$_SESSION[SES_SUPERADMIN] = session_id().'-superadmin';
				$_SESSION[SES_DATA] = array(
							'user_name' => 'SUPER-ADMIN'
							,'type_user_name' => ''
							,'user_op' => '0'
                             ,'user_tipo' => '0'//global
                             ,'user_nick' => ''
						);
			}else{
				if($this->getTipoLogin()=='log_estatico'){
						
					if($this->getUsuario()==$general_user){

						if($this->getPassword() == md5($general_password)){

							//$loginEstate = 'CREA SESION';
							$_SESSION[SES_ADMIN] = session_id().'-admin';
							//Armamos datos de Usuario por sesión
							$_SESSION[SES_DATA] = array(
							    'user_name' => SES_USER_NAME
							    ,'type_user_name' => ''
							    ,'user_op' => '2'
                                ,'user_tipo' => '0'
                                ,'user_nick' => ''
							);
						}
					}

				}else if($this->getTipoLogin()=='log_dinamico'){

					if($this->getUsuario()==$general_user){
						if($this->getPassword() == $general_password){
							//$loginEstate = 'CREA SESION';
							$_SESSION[SES_ADMIN] = session_id().'-admin';	
							//Obtenemos datos de usuario:
							$userDataBD=$this->getDataUserBD($this->getUsuario(),$this->getPassword());
                            $arrUser = explode('/',$userDataBD);
							//Armamos datos de Usuario por sesión
							$_SESSION[SES_DATA] = array(
							    'user_name' => $arrUser[0]
							    ,'type_user_name' => $arrUser[1]
							    ,'user_op' => $arrUser[2]
                                ,'user_tipo' => $arrUser[3]
                                ,'user_nick' => $arrUser[4]
							);						
						}
					}
				}					
			}
		}
	}

	public function validateSession()
    {
		if($_SESSION[SES_ADMIN]!='' || $_SESSION[SES_SUPERADMIN]!=''){
			$msg_login = 1;
            return $msg_login;
		}else if($_SESSION[SES_ADMIN]=='' || $_SESSION[SES_SUPERADMIN]==''){

			$msg_login = 0;
                
			if(URL!='index.php'){
				echo '<script> document.location=("../"); </script>';
			}else{
				return $msg_login;
			}
		}
	}
    
    private function validateLoginBD($user,$pass)
    {      
        //Arreglo de argumentos para consulta SELECT
        $arg=array(
            'tables' => array(
                array('usuario','u')
            ),
            'operation'=>array(
                array('COUNT','u.usuario_id','user_count')
            ),
            'conditional'=>array(
                array('','u.usuario_activo','=','1'),
				array('and','u.usuario_user','=','"'.$user.'"'),
                array('and','u.usuario_pass','=','"'.$pass.'"')
            )
        );
        $this->setSelectArg($arg);

		$result = $this->selectData();
        foreach($result as $col);
        $valLoginBD = $col['user_count'];    
		return $valLoginBD;
    }  

	private function getDataUserBD($user,$pass)
    {

        //Arreglo de argumentos para consulta SELECT
        $arg=array(
            'tables' => array(
                array('usuario','u')
                ,array('tipo_usuario','tu')
            ),
            'relation'=>array(
            	array('u.tipo_usuario_id','tu.tipo_usuario_id')
            ),
            'conditional'=>array(
                array('','u.usuario_activo','=','1'),
				array('and','u.usuario_user','=','"'.$user.'"'),
				array('and','u.usuario_pass','=','"'.$pass.'"')
            )
        );
        
        $this->setSelectArg($arg);

		$result = $this->selectData();

		foreach($result as $col){
			$userData = $col['usuario_nombre'].'/'.$col['tipo_usuario_nombre'].'/'.$col['usuario_op'].'/'.$col['tipo_usuario_id'].'/'.$col['usuario_user'];
		}

		return $userData;
	}

// fin MÉTODOS LOGIN         
        
}
?>