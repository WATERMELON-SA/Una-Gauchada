<?php 
	session_start();
	if(isset ($_SESSION['nombre'])){
		$inicio=true;
	}

	function validar(){
		return ((isset($_POST['nombre'])) and (isset($_POST['apellido'])) and (isset($_POST['DNI'])) and (isset($_POST['nroTarjeta'])) and ($_POST['nombre'] !='') and ($_POST['apellido'] !='') and ($_POST['DNI'] != '') and ($_POST['nroTarjeta'] != ''));
	}

	function actualizarBD(){
		include "conexion.php";
		$link = conectar();
		$link->query(" UPDATE usuarios SET cantCreditos=cantCreditos+1 WHERE email='$_SESSION['email']'");

	}

	if validar(){
		if (($_POST['nombre'] !='') and ($_POST['apellido'] !='') and ($_POST['DNI'] != '') and ($_POST['nroTarjeta'] != '')){
			actualizarBD();
			<script> alert("Tu compra se realizo exitosamente") </script>
			header("Location: index.php");

		}
		else{
			echo "Faltan completar campos";
		}


	}





?>