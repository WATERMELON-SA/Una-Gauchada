<?php
	include "conexion.php";
	$conection = conectar();
	$idCat = $_GET['idCat'];
	$eliminar = $conection->query("UPDATE categoria SET activo=1 WHERE idCategoria='$idCat'");
	header("Location: panelcategorias.php");
?>