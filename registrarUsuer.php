<?php

function validarRegistro(){
	return ((isset($_POST['nombre'])) and (isset($_POST['email'])) and (isset($_POST['fecha_nac'])) and (isset($_POST['telefono'])) and (isset($_POST['localidad'])) and (isset($_POST['contraseña1'])) and (isset($_POST['contraseña2'])) and ($_POST['nombre'] !='') and
($_POST['email'] !='') and ($_POST['fecha_nac'] != '') and ($_POST['telefono'] != '') and ($_POST['localidad'] != '') and ($_POST['contraseña1'] != '') and ($_POST['contraseña2']!= ''));
	}


function contraOk(){
	return ($_POST['contraseña1'] == $_POST['contraseña2']);
	}


function registrar(){
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$contra = md5($_POST['contraseña1']);
	$nac = $_POST['fecha_nac'];
	$puntaje = 0;
	$telefono= $_POST['telefono'];
	$creditos = 1;
	$localidad = $_POST['localidad'];
	include "conexion.php";
	$conect= conectar();
	$registrado = $conect->query("INSERT INTO usuario (nombre, email, contraseña, fecha_nac, puntaje, telefono, cantCreditos, idLocalidad) VALUES('$nombre', '$email', '$contra', '$nac', '$puntaje', '$telefono', '$creditos', '$localidad')");
	$conect -> close();
	return $registrado;
	}

?>