<?php
	if (isset($_GET['alert'])) {
?>
<script>alert("Por favor inicia sesión para acceder a esta página.")</script>
<?php
	}
?>
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

	<a class="btn btn-default navbar-right navbar-btn" type="button" href="index.php"> Inicio</a>
 


	<a type="button" class="btn btn-default navbar-btn navbar-right" href="registrarse.php"> Registrarse</a>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>


<body style="text-align: center; background-color: #e6e6e6;">

	<?php 
		include "inicioCorrecto.php";
		session_start();
		if(isset ($_SESSION['nombre'])){
			header("Location: index.php");
		}
	?>
		
		<h2 style="font-size: 40px">Iniciar sesion</h2>
		<form action="iniciarSesion.php"  method="POST">
			<div class="form-group">
				<label>Email</label></br>
				<input type="text" maxlength="40" class="form-control" style="width: 25%; display: inline-block;;" id="email" name="email" placeholder="Correo electrónico" autofocus><br><br>
			</div>
			<div class="form-group">
				<label>Contrase&ntilde;a</label></br>
				<input type="password" maxlength="40" id="pass" class="form-control" style="width: 25%; display: inline-block;" placeholder="Contraseña" name="contraseña"><br><br>
			</div>
			<input type="submit" class="btn btn-primary" name="Ingresar" value="Ingresar" style="width: 20%; height: 1cm;">
			<br>
			<br>
			&iquest;A&uacute;n no tienes una cuenta? <a href="registrarse.php" style="text-decoration:none"> Registrate </a>
		</form>

	

</body>
</html>