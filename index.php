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

	
  <!--<button class="btn btn-default dropdown-toggle navbar-right navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Menu
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Mis pedidos</a></li>
    <li><a href="#">Postulaciones</a></li>
    <li><a href="#">Comprar creditos</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Preguntas</a></li>
  </ul>
-->
	<button class="btn btn-default navbar-right navbar-btn" type="button" >
    	<a href="registrarse.php"> Registrarse</a>
  </button>


	<button type="button" class="btn btn-default navbar-btn navbar-right"><a href="iniciarSesion.php">Iniciar sesion</a></button>


  </div>
</nav>






		<img style="width: 100%;" src="banner.png">


</header>

<body style="background-color: #e6e6e6; padding-top: 50px;">





<div class="row" style="text-align:center">
		<img src="logo.png">
		<h2 class="text-center text-primary subtitulo">Date una vuelta y fijate si podes ayudar</h2>
	</div>

	<br><br><br><br><br>

	<div class="container">
		<div class="container">
			<div class="well cajaFavor row">
				<div class="cajaFoto col-lg-4 col-xs-4">
					<img style="margin-top:20%" class="img-responsive" src="burro.jpg" alt="burro">
				</div>
				<div class="col-lg-8 col-xs-8">
					<h3>Titulo</h3>
					<h4>Descripcion</h4>
					<h5>Usuario</h5>
					<a href="#">Ver más</a>
				</div>
			</div>
		</div>
		<?php
			include "mostrarFavores.php";
			mostrarFavores()
		?>
		
	</div>
</div>

	  <footer class="footer">
      <div class="container">
        <p class="footerText subtitulo text-center">DEVELOPED BY Watermelon Web Development S.A.</p>
      </div>
    </footer>
</body>
</html>