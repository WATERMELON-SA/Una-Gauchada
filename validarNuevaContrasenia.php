<?php 
session_start();
include "conexion.php";
$mysql = conectar();
$id=$_SESSION['id'];
if (isset($mysql)){
	$traer=$mysql->query("SELECT * FROM usuarios WHERE idUsuario='$id'");
}
$arreglo= $traer->fetch_assoc();
if((md5($_POST['vieja']))!=($arreglo['password'])){ 
		header("Location: modificarContrasenia.php?actual=1");}
elseif ($_POST['nueva']==$_POST['vieja']){
		header("Location: modificarContrasenia.php?nueva=1");}
elseif ($_POST['nueva']!=$_POST['repetir']) {
	header("Location: modificarContrasenia.php?repetir=1");
}
else{
	$nueva=md5($_POST['nueva']);
	$mysql->query("UPDATE usuarios u SET u.password='$nueva' WHERE u.idUsuario='$id'");
   	header("Location: miPerfil.php?pass=1");
}