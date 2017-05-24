<?php  
    


	function validarRegistro(){
		return  ((isset($_POST['email'])) AND (isset($_POST['contraseña']))  AND ($_POST['email'] !='') AND ($_POST['contraseña'] != '')); 
	}


	function datosCorrectos(){
		include "conexion.php";
		$mysql = conectar();
		$contraseña=md5($_POST['contraseña']);
		$email=$_POST['email'];
		if (isset($mysql)){
			$dataBase = $mysql->query("SELECT * FROM usuarios WHERE email='$email' AND password='$contraseña'");
			$dataBase = $dataBase->fetch_assoc();
			if (isset($dataBase['email'])){
				return true;
			}
			return false;		
		}
	}

	if(validarRegistro()){
		if (datosCorrectos()) {
			session_start();
			$_SESION["nombre"]=$dataBase["nombre"];
			$_SESION["email"]=$dataBase["email"];
			$_SESION["contraseña"]=$dataBase["contraseña"];
header("Location: index.php");
		}
				
		else{
			echo "mal ahee";	
		}
	}


?>
