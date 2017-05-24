<?php 

include "conexion.php";
$conect= conectar();

function validarPublicacion(){
	return ((isset($_POST['idUsuario'])) and ($_POST['idUsuario'] !='') (isset($_POST['titulo'])) and (isset($_POST['descripcion'])) and (isset($_POST['localidad'])) and (isset($_POST['categoria'])) and ($_POST['titulo'] !='') and ($_POST['descripcion'] !='') and ($_POST['localidad'] !='') and ($_POST['categoria'] !='')); 	
	}

function registrar(){
	$publicado= $conect -> query("INSERT INTO favor (idUsuario, titulo, descripcion, completo, idLocalidad, idCategoria) VALUES($_POST['idUsuario'], $_POST['titulo'], $_POST['descripcion'], 0, $_POST['localidad'], $_POST['categoria'])");
	return $publicado;
}

 ?>