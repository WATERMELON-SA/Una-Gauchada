<?php 
	include "conexion.php";
	$conectar = conectar();
	$idFavor= $_POST['idFavor'];
	$idUsuario =$_POST['idUsuario'];
	$comentario = $_POST['comentario'];
	$postulamiento = $conectar-> query("INSERT INTO postula(idUsuario, idFavor, comentario) VALUES ($idUsuario, $idFavor, '$comentario')");
	if ($postulamiento) {
		header("Location: detalleFavor.php?idFavor=$idFavor");
	}

?>