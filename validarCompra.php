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
		$valorCredito = $link->query("SELECT precio FROM credito");
		$valorCredito = $valorCredito-> fetch_assoc();
		$costo=$_POST['cantidad'] * $valorCredito['precio'];
		$cantidad=$_POST['cantidad'];
		$fecha= date('Y-m-d');
		$link->query("INSERT INTO compra (idUsuario,costo,cantidad,fecha_compra) VALUES ('$id','$costo','$cantidad','$fecha')");
		$_SESSION['creditos']= $masCreditos;
	}
	//if (validar()){
		echo "aca";
		actualizarBD();
		header("Location: index.php?comprado=1");
	//	}

?>