<?php
	include "conexion.php";
	$link = conectar();
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$contra = md5($_POST['contraseña1']);
	$nac = $_POST['fecha_nac'];
	$puntaje = 0;
	$telefono= $_POST['telefono'];
	$creditos = 1;
	$localidad = $_POST['localidad'];
	$result = $link -> query("INSERT INTO usuarios (nombre, email, telefono, localidad, creditos, fecha_nac, puntaje, contraseña) VALUES ('$nombre', '$email', '$telefono', '$localidad', '$creditos', '$nac', '$puntaje', '$contra')");
	$link -> close();

?>