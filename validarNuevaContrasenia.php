<?php 
session_start();
include "conexion.php";
$mysql = conectar();
$id=$_SESSION['id'];
if (isset($mysql)){
	$traer=$mysql->query("SELECT * FROM usuarios WHERE idUsuario='$id'");
}
$arreglo= $traer->fetch_assoc();
if((md5($_POST['vieja'])==$arreglo['password']) and ($_POST['nueva']==$_POST['repetir'])){
	$nueva=md5($_POST['nueva']);
	$mysql->query("UPDATE usuarios u SET u.password='$nueva' WHERE u.idUsuario='$id'");?>
   	<script type="text/javascript"> alert("Tu contraseña fue cambiada"); </script><?php
   	header("Location: miPerfil.php");
}
else {?>
	<script type="text/javascript"> alert("Tu contraseña fue cambiada"); </script>;<?php
	header("Location: modificarContrasenia.php");
}
 ?>
