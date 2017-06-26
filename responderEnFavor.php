<?php
	function guardarPregunta($conection){
		session_start();
	    $respuesta= $_POST['respuesta'];
	    $idPregunta= $_POST['idPregunta'];
	    $idUsuario= $_SESSION['id'];
	    $idFavor= $_POST['idFavor'];
		$resul = $conection->query("UPDATE pregunta SET respuesta='$respuesta' WHERE idPregunta= $idPregunta");
		header("Location: detalleFavor.php?idFavor=$idFavor");
	}
	 include "conexion.php";
    $conexion = conectar();
    guardarPregunta($conexion);
?>