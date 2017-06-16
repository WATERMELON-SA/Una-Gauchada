<?php
	function guardarPregunta($conection){
	    $pregunta= $_POST['pregunta'];
	    $idFavor= $_POST['idFavor'];
	    $idUsuario= $_SESSION['id'];
		$resul = $conection->query("INSERT INTO pregunta(contenido, idUsuario, idFavor) VALUES ('$pregunta','$idUsuario','$idFavor')");
		header("Location: detalleFavor.php?idFavor=$idFavor");
	}
	 include "conexion.php";
    $conexion = conectar();
    guardarPregunta($conexion);
?>