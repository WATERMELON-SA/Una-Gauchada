<!DOCTYPE html>
<html  style="overflow-x: hidden;">
<head>
	<link rel="shortcut icon" href="logo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Roboto-Regular.ttf">
	<link rel="stylesheet" type="text/css" href="estiloDetalle.css">
	<link rel="javascript" type="text/javascript" href="bootstrap.min.js">
	<link rel="javascript" type="text/javascript" href="jquery-3.1.1.min.js">
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

	
  <button class="btn btn-default dropdown-toggle navbar-right navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>


	<button type="button" class="btn btn-default navbar-btn navbar-right">Iniciar sesion</button>


  </div>
</nav>






		<img style="width: 100%;" src="banner.png">
</header>

<body>
  <?php
    include "conexion.php";
    $conexion = conectar();
    $idFavor = $_GET['idFavor'];
    $traerFavor = $conexion->query("SELECT * FROM favor WHERE idFavor = $idFavor");
    $favor = $traerFavor->fetch_assoc();
    $idUsuario = $favor['idUsuario'];
    $traerNombre = $conexion->query("SELECT * FROM usuario WHERE idUsuario = $idUsuario");
    $favorNombre = $traerNombre->fetch_assoc();
  ?>

    <div class="container">
      <div class="well cajaDetalle row">
        <div class="cajaFoto col-lg-4 col-xs-4">
          <img style="margin-top:20%" class="img-responsive" src="mostrarimagen.php?idFavor=<?php echo $idFavor ?>" alt="">
        </div>
        <div class="col-lg-8 col-xs-8" style="margin-top:5%">
          <h2><?php echo strtoupper($favor["titulo"])?></h2>
          <div class="separador"></div>
          <h2>Descripcion</h2>
          <h3><?php echo $favor["descripcion"] ?></h3>
          <div class="separador"></div>
          <h3>Peticionante: <?php echo $favorNombre['nombre']?></h3>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="well cajaPreguntas row">
        <h1>ACA VAN LAS PREGUNTAS</h1>
      </div>
    </div>

</body>

</html>