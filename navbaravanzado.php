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


   <form class="navbar-form navbar-left" role="search">
  
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Buscar" name="search"> 
  </div>
  <button type="submit" class="btn btn-default" name="search_btn"> <img src="glyphicons-28-search.png"></button>
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
    <?php 
      if ($_SESSION['admin']) {
    ?>
        <li><a href='panelAdmin.php'>Panel Administrador</a></li>
    <?php
      }
      else{
    ?>
   <li><a href="miPerfil.php">Mi Perfil</a></li>
   <li><a href="misgauchadas.php">Mis Gauchadas</a></li>
    <li><a href="listarPostulantes.php">Postulantes</a></li>
    <li><a href="misPostulaciones.php">Postulaciones</a></li>
    <li><a href="comprarCreditos.php">Comprar creditos</a></li>
    <li><a href="publicarFavor.php">Publicar Favor</a></li>
    <li role="separator" class="divider"></li>
    <?php
      }
    ?>
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