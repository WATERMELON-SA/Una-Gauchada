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

	function edadCorrecta(){
		$mayor16 = date('Y-m-d', strtotime('-16 year'));
		return ($_POST['fecha_nac'] <= $mayor16);
	}

	function registrar(){
		if (!contraOk()){
			return "<p style='color: red;'>Las contraseñas no coinciden, por favor ingreselas nuevamente</p>";
		}
		if (correoExistente()) {
			return "<p style='color: red;'>Ya existe una cuenta con ese email, por favor prueba con uno diferente</p>";
		}	
		if (!(edadCorrecta())) {
			return "<p style='color: red;'>Debes ser mayor de 16 años para poder registrarte</p>";
		}	
		
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
			$conect -> close();
			if ($ok){
				return "<p style='color: green;'>Tu cuenta ha sido creada con éxito. Ahora <a href='iniciarSesion.php'>Inicia Sesion</a></p>";
			}
			else{
				return "<p style='color: red;'>Tu cuenta no se ha podido crear</p>";
			}
	}
?>