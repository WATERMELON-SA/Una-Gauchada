<?php
	include "conexion.php";
	$mysql= conectar();
	$idFavor=$_GET['idFavor'];
	$traer=$mysql->query("UPDATE favor SET activo=0 WHERE idFavor='$idFavor'");
	//$traer=query->("UPDATE usuarios SET  WHERE idFavor='$idFavor'")

	header("Location: index.php");


  ?>