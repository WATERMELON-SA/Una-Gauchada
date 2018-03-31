<?php  
    
	function validarRegistro(){
		return  ((isset($_POST['email'])) AND (isset($_POST['contraseña']))  AND ($_POST['email'] !='') AND ($_POST['contraseña'] != '')); 
	}


	function datosCorrectos(){
		include "conexion.php";
		$mysql = conectar();
		$contraseña= md5($_POST['contraseña']);
		$email=$_POST['email'];
		if (isset($mysql)){
			$dataBase = $mysql->query("SELECT * FROM usuarios WHERE email='$email' AND password='$contraseña'");
			$dataBase = $dataBase->fetch_assoc();
			if (isset($dataBase['email'])){
				session_start();
			$_SESSION["nombre"] = $dataBase["nombre"];
			$_SESSION["email"]=$dataBase["email"];
			$_SESSION["contraseña"]=$dataBase["password"];
			$_SESSION["id"]=$dataBase["idUsuario"];
			$_SESSION['creditos']= $dataBase['creditos'];
			$_SESSION['calif_pend']=$dataBase['calif_pend'];
			$_SESSION['fecha_nac']=$dataBase['fechanacimiento'];
			$_SESSION['telefono']=$dataBase['telefono'];
			$_SESSION['localidad']=$dataBase['idLocalidad'];
			$_SESSION['admin']=$dataBase['admin'];
			return true;
			}
			return false;		
		}
	}

	if(validarRegistro()){
		if (datosCorrectos()) {
			header("Location: index.php");
		}
				
		else{
			echo "<p style='margin-top:30px; color:red'>Datos incorrectos, verifiquelos</p>";	
		}
	}


?>