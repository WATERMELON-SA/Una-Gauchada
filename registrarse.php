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


	<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="iniciarSesion.php">Iniciar sesion</a></button>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>

<body style="padding-top: 50px;">

	

<?php
	include "conexion.php";
	$conection = conectar();
	include "listador.php";
?>

	<div class="row">
		<div class="col-md-offset-2 col-xs-offset-1 col-xs-9 col-md-8"  style="margin-top: 50px; text-align: center;background-color: #e6e6e6;" >
		<b><h1>Bienvenido a Una Gauchada</h1></b>
			<form class="form-horizontal" action="registrarse.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nombre">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" maxlength="35" required placeholder="Juan Perez">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Correo electrónico:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" maxlength="40" required placeholder="juanperez@ejemplo.com">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="contraseña1">Contraseña:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="contraseña1" maxlength="15" minlength="4" required placeholder="Tu contraseña">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="contraseña2">Repetir contraseña:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="contraseña2" maxlength="15" minlength="4" required placeholder="Tu contraseña">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fecha_nac">Fecha de nacimiento:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" required name="fecha_nac" min="<?php echo (date('Y-m-d', strtotime('-80 year'))); ?>" max="<?php echo (date('Y-m-d', strtotime('-16 year'))); ?>" >
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="telefono">Teléfono:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" required max="9999999999999" name="telefono" placeholder="011151234567" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="localidad">Localidad:</label>
					<div class="col-sm-10">
						<select name="localidad" class="form-control" required>
							<option value="" selected>Selecciona una localidad</option>
							<?php
								listarLocalidades($conection);
							?>
						</select>
					</div>
				</div>																							
				<input class="btn btn-primary" type="submit" value="Registrarse" name="Registrarse">	
			</form>
			<br>
	<?php 
		include "registrarUser.php";
		if(validarRegistro()) {
			$ret =registrar($conection);
	?>	
		<script type="text/javascript">
			alert("<?php echo $ret; ?>");
		</script>
	<?php	
		}
	?>
		</div>
	</div>
</body>
</html>