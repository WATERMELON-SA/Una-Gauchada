<?php
	session_start();
	include "conexion.php";
	$mysql= conectar();
	$idFavor=$_GET['idFavor'];
	$idUsuarioCumple=$_GET['idUsuario'];
	$traer=$mysql->query("UPDATE favor SET activo=0, completo=1, idUsuarioCumple='$idUsuarioCumple' WHERE idFavor='$idFavor'");
	$calif= $_SESSION['calif_pend'] + 1;
	$id= $_SESSION['id'];
	$_SESSION['calif_pend'] = $calif;
	$yo= $mysql->query("UPDATE usuarios SET calif_pend =$calif WHERE idUsuario=$id");

	header("Location: index.php");


  ?>