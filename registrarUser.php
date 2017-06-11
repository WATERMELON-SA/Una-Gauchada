<?php

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

	function registrar($conect){
		if (!contraOk()){
			return "Las contraseñas no coinciden, por favor ingreselas nuevamente";
		}
		if (correoExistente()) {
			return "Ya existe una cuenta con ese email, por favor prueba con uno diferente";
		}	
		if (!(edadCorrecta())) {
			return "Debes ser mayor de 16 años para poder registrarte";
		}	
		
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$contra = md5($_POST['contraseña1']);
			$nac = $_POST['fecha_nac'];
			$puntaje = 1;
			$telefono= $_POST['telefono'];
			$creditos = 1;
			$idLocalidad = $_POST['localidad'];
			$sql="INSERT INTO usuarios (nombre,email,idLocalidad,telefono,creditos,fechanacimiento,password,puntaje) VALUES ('$nombre','$email','$idLocalidad','$telefono',$creditos,'$nac','$contra','$puntaje')";
			$ok= $conect->query($sql);
			$conect -> close();
			if ($ok){
?>
				<form id="myform" action="inicioCorrecto.php" method="POST">
					<input type="hidden" name="email" id="email" value="<?php echo $_POST['email']; ?>">
					<input type="hidden" name="contraseña" id="pass" value="<?php echo $_POST['contraseña1']; ?>">
				</form>
				<script type="text/javascript">
					document.getElementById('myform').submit();
				</script>
<?php
				return "Tu cuenta fue creada con éxito";
			}
			else
				return "Tu cuenta no se ha podido crear";
	}
?>