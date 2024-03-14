<?php 
include '../conexion/conexion.php';

	if(isset($_POST)){

		$numemp=$_POST['numemp'];
		$password=$_POST['password'];

		//comprobar si existe el usuario
		$sql="CALL proc_login('$numemp')";
		$login=$conn->query($sql);

		if($login&&$login->num_rows==1){
			$usuario=$login->fetch_object();

			//verificar contra
			$verify=password_verify($password, $usuario->password);
			
			if($verify){
				//usuario correcto
				//session_name('logisticapp');
      	//session_start();
      	unset($usuario->password);      			
      	//$_SESSION['identity'] = $usuario;
        /*
				if($usuario->Level=='ADMIN'){
          $_SESSION['admin']=true;
				}
				if($usuario->Level=='TRANSPORTISTA'){
          header('location: ../Transportista_Menu.php');
				}else{
          header('location: ../menu_principal.php');
          
				}   			
        */
        var_dump($usuario);
			}else{
				//contraseña incorrecta
        /*
				session_name('logisticapp');
        session_start();			
        $_SESSION['error_login']="Contraseña incorrecta";				
				header('location: ../index.php');
        */
        echo "Contra incorrecta";
			}
		}else{
			//usuario incorrecto
			/*
      session_name('logisticapp');
      session_start();			
      $_SESSION['error_login']="Usuario no existe";	
			header('location: ../index.php');
      */
      echo "No se accedio";
		}
	

	}

