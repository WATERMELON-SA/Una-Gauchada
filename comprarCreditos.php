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

	<button class="btn btn-default navbar-right navbar-btn" type="button" >
    	<a href="index.php"> Inicio</a>
  </button>


	<button type="button" class="btn btn-default navbar-btn navbar-right"><a href='#'> MiPerfil</a></button>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>
<body>
 
  <?php
    if (isset($_GET['comprado'])) {
  ?>
  <script type="text/javascript"> alert("Faltan completar campos");</script>
  <?php    
    }
  ?>
 

<?php
	if (isset($_GET['Fallo'])) {
		echo "Debes ingresar el numero de creditos a comprar";
	}
?>
<header style="text-align: center"><h2>Compra créditos y podrás publicar mas favores!!!</h2>
<img class="img-responsive center-block" style="max-width: 10%" src="monedas.jpg">
<h3>Precio del crédito: $50</h3>
</header>
<div style="text-align: center; margin-top: 2%">
	<h2>Cantidad:</h2>
	<form method="POST" action="compra.php">
	<input class="form-control" style="display:inline-block; width: 6%; height: 40px; font-size: 20px;" type="number" max="30" min="1" name="cantidad">  
	<input type="submit" class="btn btn-primary" style="display: inline-block;" name="Comprar" style="font-size:20px">
	</form>
</div>




</body>
