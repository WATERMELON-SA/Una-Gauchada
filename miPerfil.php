<!DOCTYPE html>
<html  style="overflow-x: hidden">
<head>
	<link rel="shortcut icon" href="logo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Roboto-Regular.ttf">
	<link rel="stylesheet" type="text/css" href="estilo1.css">	
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<title>Una Gauchada</title>
</head>

<?php
	session_start();
	if(isset ($_SESSION['nombre'])){
		$inicio=true;
	}
?>



<header>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  <a href="index.php"><img alt="brand" class="navbar-left" src="logo.png" style="width: 50px; height: 50px"></a>


   <form class="navbar-form navbar-left" role="search" onsubmit="return false">
  
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Buscar"> 
  </div>
  <button type="submit" class="btn btn-default"> <img src="glyphicons-28-search.png"></button>
</form>

	<?php
		if(isset($inicio) AND ($inicio)){
	?>
  <button class="btn btn-default dropdown-toggle navbar-right navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <li class="dropdown">
  	<?php
			echo "Bienvenido ".$_SESSION['nombre'];
  	?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" style="right: 0; left:auto;" aria-labelledby="dropdownMenu1">
    <li><a href="#">Mis pedidos</a></li>
    <li><a href="#">Postulaciones</a></li>
    <li><a href="comprarCreditos.php">Comprar creditos</a></li>
    <li><a href="publicarFavor.php">Publicar Favor</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
  </ul>
  </li>
  
  <?php 
  	}
  	if (!isset($_SESSION['nombre'])) {
  ?>

    	<a class="btn btn-default navbar-right navbar-btn" href="registrarse.php"> Registrarse</a>


	<a class="btn btn-default navbar-btn navbar-right" href="iniciarSesion.php">Iniciar sesion</a> 
   <?php 
	}
	?>

  </div>
</nav>






		<img style="width: 100%;" src="banner.png">


</header>
<body>

<?php
include "conexion.php";
$mysql = conectar();
if (isset($mysql)){
   $mail=$_SESSION['email'];
   $traer=$mysql->query("SELECT * FROM usuarios WHERE email='$mail'");
  if(isset($traer))
    $arreglo=$traer->fetch_assoc();
    $id= $_SESSION['id'];
    $locaUsu =$arreglo['idLocalidad'];
     $traer=$mysql->query("SELECT * FROM localidad WHERE idLocalidad=$locaUsu");
  if(isset($traer))
      $localidad=$traer->fetch_assoc();
   
    }
    
?>

<div class="form-horizontal" style="margin-left: 30%; margin-top: 2%;">
        <div class="form-group">
          <label class="control-label col-sm-2" for="nombre">Nombre:</label>
          <div class="col-sm-10">
            <p type="text" class="form-control-static"> <?php  echo $_SESSION['nombre'] ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Correo electrónico:</label>
          <div class="col-sm-10">
            <p class="form-control-static"> <?php  echo $_SESSION['email'] ?> </p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="fecha_nac">Fecha de nacimiento:</label>
          <div class="col-sm-10">
            <p type="date" class="form-control-static"> <?php  echo $_SESSION['fecha_nac'] ?></p>
          </div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
          <div class="col-sm-10">
            <p type="number" class="form-control-static"><?php  echo $_SESSION['telefono']; ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="localidad">Localidad:</label>
          <div class="col-sm-10">
            <p class="form-control-static" > <?php echo $localidad['nombre'] ?></p>
            </select>
          </div>
        </div>                                              
      </div>
      <span class="glyphicon glyphicon-pencil" style="margin-left: 35%"><a href="modificarPerfil.php">Modificar datos personales</a></span>
      <br>
       <br>
      <div class="form-group col-sm-offset-2">
          <label class="control-label col-sm-2" for="creditos">Cantida de créditos: <?php  echo $_SESSION['creditos'] ?></label>
        </div>  
       <br>
      <div class="form-group col-sm-offset-2">
          <label class="control-label col-sm-3" for="calif_pend">Calificaciones pendientes: <?php  echo $_SESSION['calif_pend'] ?></label>
        </div>  


</body>