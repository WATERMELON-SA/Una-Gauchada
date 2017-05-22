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


	<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="registrarse.php"> Registrarse</a></button>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>


<body style="text-align: center; background-color: #e6e6e6;">

			<?php 
		include "inicioCorrecto.php";
	?>
		<h2 style="font-size: 40px">Iniciar sesion</h2>
		<form action="inicioCorrecto.php"  method="POST">
			Email:<input type="text" id="email" name="user" placeholder="Correo electrónico" autofocus><br><br>
			Contrase&ntilde;a:<input type="password" id="pass" placeholder="Contraseña" name="pass"><br><br>
			<input type="submit" name="Ingresar" value="Ingresar" style="width: 20%; height: 1cm;">
			<br>
			<br>
			&iquest;A&uacute;n no tienes una cuenta? <a href="registrarse.php" style="text-decoration:none"> Registrate </a>
		</form>

	

</body>
</html>