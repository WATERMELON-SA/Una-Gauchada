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

<header>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  <a href="index.php"><img alt="brand" class="navbar-left" src="logo.png" style="width: 50px; height: 50px"></a>


   <form class="navbar-form navbar-left" role="search">
  
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Buscar"> 
  </div>
  <button type="submit" class="btn btn-default"> <img src="glyphicons-28-search.png"></button>
</form>

	
  <button class="btn btn-default dropdown-toggle navbar-right navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <li class="dropdown">


  <?php
  	session_start();
  	if(isset ($_SESSION['nombre'])){
  		echo "Bienvenido ".$_SESSION['nombre'];
  	}
  	else{
  		header("Location: index.php");
  	}
  ?>
  
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" style="right: 0; left:auto;" aria-labelledby="dropdownMenu1">
    <li><a href="#">Mis pedidos</a></li>
    <li><a href="#">Postulaciones</a></li>
    <li><a href="comprarCreditos.php">Comprar creditos</a></li>
    <li><a href="#">Preguntas</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
  </ul>
  </li>
  </div>
</nav>
		<img style="width: 100%;" src="banner.png">
</header>

<body style="padding-top: 50px;">

<?php
  include "conexion.php";
  $conection= conectar();
  $idUser=$_GET['idUser'];
  $usuario = $conection -> query("SELECT * FROM usuarios WHERE idUsuario= '$idUser'");
  $usuario = $usuario -> fetch_assoc();
?>
  
  <br>
  <br>
  <div class="row">
    <div class="col-sm-2 col-md-4">
    <?php
              if (is_null($usuario['contenidoimagen'])) {
            ?>
              <div class="cajaFoto">
                <img style="text-align: center; margin-left: 50px; width: 200px; height: 250px;" class="img-responsive" src="logo.png" alt="">
              </div>
            <?php
              }else{
            ?>
            <div class="cajaFoto">
              <img style="text-align: center; margin-left: 50px; width: 200px; height: 250px;" class="img-responsive" src="mostrarFotoPerfil.php?idUser= <?php echo $idUser; ?>" alt="">
            </div>
            <?php } ?>

    </div>

    <div class="col-sm-10 col-md-8">
      <label>Nombre:</label>
      <?php echo $usuario['nombre']; ?>
      <br>
       <label>Puntaje:</label>
      <?php echo $usuario['puntaje']; ?>
      <br>
       <label>Calificaciones pendientes:</label>
      <?php echo $usuario['calif_pend']; ?>
      <br>
       <label>Fecha de nacimiento:</label>
      <?php echo $usuario['fechanacimiento']; ?>
    </div>
  </div>





  </body>
</html>
