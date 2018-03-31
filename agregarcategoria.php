<?php
	include "conexion.php";
	$conection = conectar();
	$catnueva = $_GET['categorianueva'];
	$categorias = $conection->query("SELECT * FROM categoria WHERE nombre = '$catnueva'");
	$categorias = $categorias->fetch_assoc();
	$yaexiste = false;
	$redirect = '';
	if ((isset($categorias)) AND ($categorias!=false)) {
		if ($categorias['activo']!=0)
			$redirect = "panelcategorias.php?erroragregar=true";
		else
			$redirect = "panelcategorias.php?agregarRepetido=true";
		$reactivar = $conection->query("UPDATE categoria SET activo = 0 WHERE nombre = '$catnueva'");
		$yaexiste = true;
	}
	if ((isset($_GET['categorianueva'])) && ($_GET['categorianueva']!='') && ($yaexiste == false)) {
		$insertar = $conection->query("INSERT INTO categoria (nombre) VALUES ('$catnueva')");
		$redirect = "panelcategorias.php";
	}
	header("Location: $redirect");
?>
