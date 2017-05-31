<?php
	if ((isset($_GET['alert'])) AND ($_GET['alert']==1)) {
?>
	<script> alert("Por favor inicia sesión para poder ver un favor en detalle") </script>
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


	<a class="btn btn-default navbar-btn navbar-right" href="index.php">Inicio</a> 
   <?php 
	}
	?>

  </div>
</nav>


		<img style="width: 100%;" src="banner.png">


</header>


<body style="text-align: center; background-color: #e6e6e6;">

	<?php 
		include "inicioCorrecto.php";
		if(isset ($_SESSION['nombre'])){
			header("Location: index.php");
		}
	?>
		
		<h2 style="font-size: 40px">Iniciar sesion</h2>
		<form action="iniciarSesion.php"  method="POST">
			<div class="form-group">
				<label>Email</label></br>
				<input type="text" class="form-control" style="width: 25%; display: inline-block;;" id="email" name="email" placeholder="Correo electrónico" autofocus><br><br>
			</div>
			<div class="form-group">
				<label>Contrase&ntilde;a</label></br>
				<input type="password" id="pass" class="form-control" style="width: 25%; display: inline-block;" placeholder="Contraseña" name="contraseña"><br><br>
			</div>
			<input type="submit" class="btn btn-primary" name="Ingresar" value="Ingresar" style="width: 20%; height: 1cm;">
			<br>
			<br>
			&iquest;A&uacute;n no tienes una cuenta? <a href="registrarse.php" style="text-decoration:none"> Registrate </a>
		</form>

	

</body>
</html>