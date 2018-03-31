<?php  
	$idReputacion=$_GET['idReputacion'];
	include "conexion.php";
	$conection= conectar();
	$conection->query("DELETE FROM reputacion WHERE idReputacion=$idReputacion");
	header("Location: adminReputaciones.php");
?>