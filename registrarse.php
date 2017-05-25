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
  <a href="muestra1.html"><img alt="brand" class="navbar-left" src="logo.png" style="width: 50px; height: 50px"></a>


   <form class="navbar-form navbar-left" role="search">
  
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Buscar"> 
  </div>
  <button type="submit" class="btn btn-default"> <img src="glyphicons-28-search.png"></button>
</form>

	<button class="btn btn-default navbar-right navbar-btn" type="button" >
    	<a href="index.php"> Inicio</a>
  </button>


	<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="iniciarSesion.php">Iniciar sesion</a></button>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>

<body style="padding-top: 50px;">

	

<script type="text/javascript" src="obtenerCampos.js"></script>

	<div class="row">
		<div class="col-md-offset-2 col-xs-offset-1 col-xs-9 col-md-8"  style="margin-top: 50px; text-align: center;background-color: #e6e6e6;" >
		<b><h1>Bienvenido a Una Gauchada</h1></b>
			<form id="formUsuario" style="" action="registrarse.php" method="POST" onsubmit= "return validar_formulario();">
				<li>Nombre:<input type="text" name="nombre" required>*</li><br>
				<li>Correo electrónico:<input type="text" name="email" required>*</li><br>
				<li>Contraseña:<input type="password" name="contraseña1" required>*</li><br>
				<li>Repetir contraseña:<input type="password" name="contraseña2" required>*</li><br>
				<li>Fecha de nacimiento:<input type="date" name="fecha_nac" required>*</li><br>
				<li>Teléfono:<input type="text" name="telefono" required>*</li><br>
				<li>Localidad:<input type="number" name="localidad" required>*</li><br>
				<input type="submit" value="Registrarse" name="Registrarse" required>	
			</form>
			<br>
			<?php 
		include "registrarUser.php";
		if(validarRegistro()) {
			if (contraOk()){
				if(registrar()){
					echo "<p style='color: green;>Tu cuenta ha sido creada con éxito. Ahora <a href='iniciarSesion.php'>Inicia Sesion</a></p>";
				}
				else{
					echo "<p style='color: red;''>Ya existe una cuenta con ese email, por favor prueba con uno diferente</p>";
				}
			}
			else{
				echo "<p style='color: red;''>Las contraseñas no coinciden, por favor ingreselas nuevamente</p>";
			}
		}
?>

		</div>
	
	</div>

</body>
</html>