<?php 
	session_start();
	function actualizarBD(){
		include "conexion.php";
		$masCreditos= $_SESSION['creditos'] + $_POST['cantidad'];
		$id = $_SESSION['id'];
		$link = conectar();
		$link->query("UPDATE usuarios u SET u.creditos= $masCreditos WHERE u.idUsuario=$id");
		$valorCredito = $link->query("SELECT precio FROM credito");
		$valorCredito = $valorCredito-> fetch_assoc();
		$costo=$_POST['cantidad'] * $valorCredito['precio'];
		$cantidad=$_POST['cantidad'];
		$fecha= date('Y-m-d');
		$link->query("INSERT INTO compra (idUsuario,costo,cantidad,fecha_compra) VALUES ('$id','$costo','$cantidad','$fecha')");
		$_SESSION['creditos']= $masCreditos;
	}
	function datosIncorrectos(){
		if(( strlen($_POST['DNI']) < 8) or (strlen($_POST['nroTarjeta']) <16) or (strlen($_POST['codigoSeguridad']) <3))
			return true;
		return false; 

	}
	if (!datosIncorrectos()){
	actualizarBD();
	header("Location: index.php?comprado=1");
	}
	else 
		header("Location: compra.php?comprado=$_POST[cantidad]");


?>