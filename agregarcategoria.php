<?php
	include "conexion.php";
	$conection = conectar();

	if ((isset($_POST['categorianueva'])) && ($_POST['categorianueva']!='')) {
		$catnueva = $_POST['categorianueva'];
		var_dump($catnueva);
		$insertar = $conection->query("INSERT INTO categoria (nombre) VALUES ('$catnueva')");
	}
?>
