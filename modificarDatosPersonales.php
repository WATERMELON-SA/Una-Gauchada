<?php
session_start();
function chequeoModificación(){
	return (($_POST['nombre']==$_SESSION['nombre']) and ($_POST['email']==$_SESSION['email']) and ($_POST['telefono']==$_SESSION['telefono']) and ($_POST['fecha_nac']==$_SESSION['fecha_nac']) and ($_POST['localidad']==$_SESSION['localidad']));
}


include "conexion.php";
$mysql = conectar();
if (!chequeoModificación()) {
	if (isset($mysql)){
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$nac = $_POST['fecha_nac'];
		$telefono= $_POST['telefono'];
		$idLocalidad = $_POST['localidad'];
		$id=$_SESSION['id'];
		if ($_FILES['imagen']['tmp_name']!='') {
	  		$filetype =$_FILES['imagen']['type'];
	  		$filecontent = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	  		$arraytype=explode('/', $filetype);
	  		$deftype = $arraytype[1];			
			$traer=$mysql->query("UPDATE usuarios u SET u.nombre='$nombre',u.email='$email',u.idLocalidad='$idLocalidad',u.fechanacimiento='$nac',u.contenidoimagen= '$filecontent', u.tipoimagen='$deftype' WHERE u.idUsuario='$id'");
		}
		else{
			$traer=$mysql->query("UPDATE usuarios u SET u.nombre='$nombre',u.email='$email',u.idLocalidad='$idLocalidad',u.fechanacimiento='$nac' WHERE u.idUsuario='$id'");
		}
		if ($traer) {
		  $_SESSION["nombre"] =$nombre;
		  $_SESSION["email"]=$email;
		  $_SESSION['fecha_nac']=$nac;
		  $_SESSION['telefono']=$telefono;
		  $_SESSION['localidad']=$idLocalidad;
	}}

 	header("Location: miPerfil.php");
 }
 else{
 	header("Location: modificarPerfil.php");
 }


?>
