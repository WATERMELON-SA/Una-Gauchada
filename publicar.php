<?php 

function validarPublicacion(){
	return ( (isset($_POST['idUsuario'])) and ($_POST['idUsuario'] !='') and (isset($_POST['titulo'])) and (isset($_POST['descripcion'])) and (isset($_POST['localidad'])) and (isset($_POST['categoria'])) and ($_POST['titulo'] !='') and ($_POST['descripcion'] !='') and ($_POST['localidad'] !='') and ($_POST['categoria'] !='') and (isset($_POST['fecha_venc'])) and ($_POST['fecha_venc'] !='')); 	
	}

function validarFecha(){
	$valida= date('Y-m-d', strtotime('+1 day'));
	return ($_POST['fecha_venc'] > $valida);
}


function publicar(){
	if (!validarFecha()) {
		return "La fecha debe ser mayor al día de hoy";
	}
	include "conexion.php";
	$conect= conectar();
	$idUsuario=$_POST['idUsuario'];
	$titulo= $_POST['titulo'];
	$descripcion= $_POST['descripcion'];
	$completo= 0;
	$idLocalidad= $_POST['localidad'];
	$categoria= $_POST['categoria'];
	$venc=$_POST['fecha_venc'];

	if ($_FILES['imagen']['tmp_name']!='') {
  		$filetype =$_FILES['imagen']['type'];
  		$filecontent = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  		$arraytype=explode('/', $filetype);
  		$deftype = $arraytype[1];
	}
	else{
		$deftype= NULL;
		$filecontent= NULL;
	}

	$publicado= $conect -> query("INSERT INTO favor (idUsuario, titulo, descripcion, completo, idLocalidad, idCategoria, fecha_vencimiento, contenidoimagen, tipoimagen) VALUES('$idUsuario', '$titulo', '$descripcion', '$completo', '$idLocalidad', '$categoria', '$venc', '$filecontent', '$deftype')");
	if ($publicado)
		return "Tu producto ha sido publicado con éxito";
	return "Tu producto no ha podido ser publicado";
}

 ?>