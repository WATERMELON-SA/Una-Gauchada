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
	$conection = conectar();
	include "listador.php";
?>
<form class="form-horizontal" action="modificarDatosPersonales.php" style="width: 40%; margin-top: 2%; margin-left: 15%" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nombre">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" maxlength="35" value="<?php echo $_SESSION['nombre']?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Correo electrónico:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']?>" maxlength="40" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fecha_nac">Fecha de nacimiento:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" required name="fecha_nac" min="<?php echo (date('Y-m-d', strtotime('-80 year'))); ?>" max="<?php echo (date('Y-m-d', strtotime('-16 year'))); ?>" value="<?php echo $_SESSION['fecha_nac']?>" >
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="telefono">Teléfono:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" required max="9999999999999" min="1000000000"  name="telefono" value="<?php echo $_SESSION['telefono']?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="localidad">Localidad:</label>
					<div class="col-sm-10">
						<select name="localidad" class="form-control" required>
							<option value="">Selecciona una localidad</option>
							<?php
								$id = $_SESSION['id'];
								$usuario = $conection-> query("SELECT * FROM usuarios where idUsuario=$id");
								$usuario= $usuario -> fetch_assoc();
								listarLocalidadesConOptionActive($conection, $usuario['idLocalidad']);
							?>
						</select>
					</div>
				</div>																							
				<input class="btn btn-primary" style="margin-left: 25%" type="submit" value="Guardar" name="Guardar">	
			</form>
			<br>
