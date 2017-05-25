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
			<form id="formUsuario" style="" action="registrarse.php" method="POST" onsubmit= "return validar();">
				<li>Nombre:<input type="text" name="nombre" >*</li><br>
				<li>Correo electrónico:<input type="email" name="email" >*</li><br>
				<li>Contraseña:<input type="password" name="contraseña1" >*</li><br>
				<li>Repetir contraseña:<input type="password" name="contraseña2" >*</li><br>
				<li>Fecha de nacimiento:<input type="date" name="fecha_nac" min="<?php echo (date('Y-m-d', strtotime('-80 year'))); ?>" max="<?php echo (date('Y-m-d', strtotime('-16 year'))); ?>" >*</li><br>
				<li>Teléfono:<input type="text" name="telefono" >*</li><br>
				<li>Localidad:<input type="number" min="1" name="localidad" >*</li><br>
				<input type="submit" value="Registrarse" name="Registrarse">	
			</form>
			<br>
	<?php 
		include "registrarUser.php";
		if(validarRegistro()) {
			$ret =registrar();
			echo $ret;
		}
	?>

		</div>
	
	</div>

</body>
</html>