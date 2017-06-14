<?php  
include "conexion.php";
$conect= conectar();
$idFavor= $_GET['idFavor'];
$update= $conect -> query("UPDATE favor SET activo=0 WHERE idFavor = '$idFavor'");
echo "$update";
header("Location: index.php");
?>