<?php  
function devolverCredito($conect){
	session_start();
	$cant=$_SESSION['creditos'] + 1;
	$id= $_SESSION['id'];
	$valor= $conect->query("UPDATE usuarios u SET u.creditos=$cant WHERE u.idUsuario=$id");
	$_SESSION['creditos']= $cant;
	return $valor;
}

include "conexion.php";
$conect= conectar();
$idFavor= $_GET['idFavor'];
$postulantes= $conect-> query("SELECT idUsuario FROM postula WHERE idFavor= $idFavor");
$update= $conect -> query("UPDATE favor SET activo=0 WHERE idFavor = '$idFavor'");
if ($postulantes->fetch_row() == NULL) {
	devolverCredito($conect);	
}
header("Location: index.php");
?>