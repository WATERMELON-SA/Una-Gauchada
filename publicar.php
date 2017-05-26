<?php 

function validarPublicacion(){
	return ( (isset($_POST['idUsuario'])) and ($_POST['idUsuario'] !='') and (isset($_POST['titulo'])) and (isset($_POST['descripcion'])) and (isset($_POST['localidad'])) and (isset($_POST['categoria'])) and ($_POST['titulo'] !='') and ($_POST['descripcion'] !='') and ($_POST['localidad'] !='') and ($_POST['categoria'] !='') and (isset($_POST['fecha_venc'])) and ($_POST['fecha_venc'] !='')); 	
	}

function validarFecha(){
	$valida= date('Y-m-d', strtotime('+1 day'));
	return ($_POST['fecha_venc'] > $valida);
}

function validarCreditos($conect){
	$id= $_SESSION['id'];
	$creditos = $conect -> query("SELECT creditos FROM usuarios WHERE idUsuario='$id'");
	$creditos = $creditos->fetch_assoc();
	return ($creditos['creditos']);
}


function actualizarCreditos($conect){
	$cant=$_SESSION['creditos'] -1;
	$id= $_SESSION['id'];
	$valor= $conect->query("UPDATE usuarios u SET u.creditos=$cant WHERE u.idUsuario=$id");
	$_SESSION['creditos']= $cant;
	return $valor;
}

function publicar($conect){
	if (!validarFecha()) {
		return "La fecha debe ser mayor al día de hoy";
	}
	$idUsuario=$_POST['idUsuario'];
	$titulo= $_POST['titulo'];
	$descripcion= $_POST['descripcion'];
	$completo= 0;
	$idLocalidad= $_POST['localidad'];
	$categoria= $_POST['categoria'];
	$venc=$_POST['fecha_venc'];
	if (!actualizarCreditos($conect)) {
		return "Tus créditos no se han podido actualizar, comprueba tener suficientes";
	}
	if ($_FILES['imagen']['tmp_name']!='') {
  		$filetype =$_FILES['imagen']['type'];
  		$filecontent = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  		$arraytype=explode('/', $filetype);
  		$deftype = $arraytype[1];
  		$publicado= $conect -> query("INSERT INTO favor (idUsuario, titulo, descripcion, completo, idLocalidad, idCategoria, fecha_vencimiento, contenidoimagen, tipoimagen) VALUES('$idUsuario', '$titulo', '$descripcion', '$completo', '$idLocalidad', '$categoria', '$venc', '$filecontent', '$deftype')");
	}
	else{
		$publicado= $conect -> query("INSERT INTO favor (idUsuario, titulo, descripcion, completo, idLocalidad, idCategoria, fecha_vencimiento) VALUES('$idUsuario', '$titulo', '$descripcion', '$completo', '$idLocalidad', '$categoria', '$venc')");
	}
	if ($publicado)
		return "Tu favor ha sido publicado con éxito";
	return "Tu favor no ha podido ser publicado";
}

 ?>