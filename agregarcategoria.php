<?php
	include "conexion.php";
	$conection = conectar();
	$catnueva = $_GET['categorianueva'];
	$categorias = $conection->query("SELECT * FROM categoria WHERE nombre = '$catnueva'");
	if ((isset($categorias)) AND ($categorias!=false)) {
		$categorias = $categorias->fetch_assoc();
	}
	if (isset($categorias)) {
		header("Location: panelcategorias.php?erroragregar=true");
	}
	if ((isset($_GET['categorianueva'])) && ($_GET['categorianueva']!='')) {
		$insertar = $conection->query("INSERT INTO categoria (nombre) VALUES ('$catnueva')");
		header("Location: panelcategorias.php");
	}
?>
