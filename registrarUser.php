<?php
	include "conexion.php";

	function validarRegistro(){
		return ((isset($_POST['nombre'])) and (isset($_POST['email'])) and (isset($_POST['fecha_nac'])) and (isset($_POST['telefono'])) and (isset($_POST['localidad'])) and (isset($_POST['contraseña1'])) and (isset($_POST['contraseña2'])) and ($_POST['nombre'] !='') and ($_POST['email'] !='') and ($_POST['fecha_nac'] != '') and ($_POST['telefono'] != '') and ($_POST['localidad'] != '') and ($_POST['contraseña1'] != '') and ($_POST['contraseña2']!= ''));
	}


	function contraOk(){
		return ($_POST['contraseña1'] == $_POST['contraseña2']);
	}

	function correoExistente(){
		$email = $_POST['email'];
		$link = conectar();
		$comprobar = $link->query("SELECT * FROM usuarios WHERE email = '$email'");
		$arreglo = $comprobar->fetch_assoc();
		return (isset($arreglo['email']));
	}

	function registrar(){
		if (!correoExistente()) {
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$contra = md5($_POST['contraseña1']);
			$nac = $_POST['fecha_nac'];
			$puntaje = 0;
			$telefono= $_POST['telefono'];
			$creditos = 1;
			$idLocalidad = $_POST['localidad'];
			$conect= conectar();
			$sql="INSERT INTO usuarios (nombre,email,idLocalidad,telefono,creditos,fechanacimiento,password) VALUES ('$nombre','$email','$idLocalidad','$telefono','0','$nac','$contra')";
			$ok= $conect->query($sql);
			echo $ok;
			$conect -> close();
			return $ok;
		}
	}

?>