<?php  
	function validarRegistro(){
		return  ((isset($_POST['email'])) and (isset($_POST['contraseña']))  and ($_POST['email'] !='') and ($_POST['contraseña'] != '')) 
	}


	function datosCorrectos(){
		include "conexion.php";
		$mysql = conectar();
		if (isset($mysql)){
			$email = $mysql->query("SELECT email FROM usuario WHERE email=$_POST[email]");
			$contraseña=$mysql->query("SELECT contraseña FROM usuario WHERE email=$_POST[contraseña]");
			return (isset($email) and isset($contraseña));
	}

	function inicionSeseada(){ 

	if(validarInicio() and datosCorrectos()){
				echo "<a href="index.php"><a/>" ;
			else
				echo "Datos incorrectos";
		}
	}

?>