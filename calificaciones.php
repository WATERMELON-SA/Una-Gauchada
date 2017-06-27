<?php
include "conexion.php";
session_start();
$mysql=conectar();
$idFavor=$_GET['idFavor'];
$id=$_GET['idUsuario'];
$myid=$_SESSION['id'];
$calif_pend=$_SESSION['calif_pend']-1;

$comentario=$_POST['comentario'];
$puntuacion=$_POST['puntuacion'];

$mysql->query("UPDATE favor SET puntuacion='$puntuacion', comentario='$comentario' WHERE idFavor=$idFavor ");
$mysql->query("UPDATE usuarios SET calif_pend=$calif_pend WHERE idUsuario=$myid ");


$traer=$mysql-> query("SELECT * FROM usuarios WHERE idUsuario=$id"); 
$traer=$traer->fetch_assoc();
$puntaje=$traer['puntaje']+$_POST['puntuacion'];

$mysql->query("UPDATE usuarios SET puntaje=$puntaje WHERE idUsuario=$id ");

header("Location: index.php")

  ?>
