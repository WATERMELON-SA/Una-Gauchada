<?php  
    session_start();
    $email=$_POST['email']
    $contraseña=$_POST['contraseña']
	function validarRegistro(){
		return  ((isset($email)) and (isset($contraseña))  and ($email !='') and ($contraseña != '')) 
	}


	function datosCorrectos(){
		include "conexion.php";
		$mysql = conectar();
		if (isset($mysql)){
			$dataBase = $mysql->query("SELECT * FROM usuario WHERE email='$email' AND contraseña='$contraseña' ");
			return isset($dataBase)


				}

	if(validarInicio() and datosCorrectos()){
			//header("Location: index.php");
			echo "holaaaa"
			else
				echo "Datos incorrectos";
		}


?>