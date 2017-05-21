<?php
function conectar(){
	$link = new mysqli('localhost', 'root', '', 'una_gauchada') or die("Error " . mysqli_error($link));	 
	return $link;
}
?>