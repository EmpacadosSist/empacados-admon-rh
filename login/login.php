<?php 
include '../conexion/conexion.php';

	if(isset($_POST)){

		$numemp=$_POST['numemp'];
		$password=$_POST['password'];
		$pagLogin=$_POST['pagLogin']!="" ? $_POST['pagLogin'] : "index.php" ;
		//contra fria generica#256
		//contra dir dirGen#21021020
		//comprobar si existe el usuario
		$sql="CALL proc_login('$numemp')";
		$login=$conn->query($sql);
		if($login&&$login->num_rows==1){
			$usuario=$login->fetch_object();
			$conn->next_result();

			//verificar contra
			$verify=password_verify($password, $usuario->password);
			
			if($verify){
				//usuario correcto
				session_name('rh_admon');
      	        session_start();

      	unset($usuario->password);     			
      	$_SESSION['identity'] = $usuario;
				$userId=$usuario->userId;
				$sql="CALL select_user_authorization('$userId')";
				$uauth=$conn->query($sql);
				
				$arrPermisos=[];

				while($row = $uauth->fetch_assoc()){
          array_push($arrPermisos, $row);
        }

				if($uauth&&$uauth->num_rows>0){
					$_SESSION['permisos'] = $arrPermisos;

				}

				header('location: ../'.$pagLogin);

			}else{
				//contraseña incorrecta        
				session_name('rh_admon');
        session_start();			
        $_SESSION['error_login']="Contraseña incorrecta";				
				header('location: ../login.php');

			}
		}else{
			//usuario incorrecto
      session_name('rh_admon');
      session_start();			
      $_SESSION['error_login']="Usuario no existe";	
			header('location: ../login.php');
      
		}
	}

