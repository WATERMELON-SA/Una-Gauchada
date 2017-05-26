<?php 
	session_start();
function validar(){
		return ((isset($_POST['nombre'])) and (isset($_POST['apellido'])) and (isset($_POST['DNI'])) and (isset($_POST['nroTarjeta'])) and ($_POST['nombre'] !='') and ($_POST['apellido'] !='') and ($_POST['DNI'] != '') and ($_POST['nroTarjeta'] != ''));
	}

	function actualizarBD(){
		include "conexion.php";
		$masCreditos= $_SESSION['creditos'] + $_POST['cantidad'];
		$id = $_SESSION['id'];
		$link = conectar();
		$link->query("UPDATE usuarios u SET u.creditos= $masCreditos WHERE u.idUsuario=$id");
		$_SESSION['creditos']= $masCreditos;
	}

	if (validar()){
		if (($_POST['nombre'] !='') and ($_POST['apellido'] !='') and ($_POST['DNI'] != '') and ($_POST['nroTarjeta'] != '')){
			actualizarBD();
			header("Location: index.php?comprado=1");
		}
	}
	else{
			header("Location: comprarCreditos.php?comprado=0");
		}


?>