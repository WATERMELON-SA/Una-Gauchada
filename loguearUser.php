<?php   
include "conexion.php";
$mysql = conectar();
function prueba(){

if (not isset($mysql)) {
	echo "un gran tu vieja"
}
	header ("Location: index.php") ;
}


prueba();
 ?>



