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
	else{
		header("Location: index.php");
	}
	include "conexion.php";
	$conection = conectar();
	$consulta = $conection->query("SELECT * FROM localidad");
	if ($consulta != false) {
		$localidades = $consulta->fetch_assoc();
	}
	$consulta2 = $conection->query("SELECT * FROM categoria");
	if ($consulta2 != false) {
		$categorias = $consulta2->fetch_assoc();
	}
	
?>



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

	
  <button class="btn btn-default dropdown-toggle navbar-right navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <li class="dropdown">
  <?php
	if(isset($inicio) AND ($inicio)){
		echo "Bienvenido ".$_SESSION['nombre'];
	} else {
	echo "Menu";
	}
  ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" style="right: 0; left:auto;" aria-labelledby="dropdownMenu1">
    <li><a href="#">Mis pedidos</a></li>
    <li><a href="#">Postulaciones</a></li>
    <li><a href="#">Comprar creditos</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Preguntas</a></li>
  </ul>
  </li>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>

<body style="padding-top: 50px;">


<script type="text/javascript" src="obtenerCampos.js"></script>



	<div class="row">
		<div class="col-md-offset-2 col-xs-offset-1 col-xs-9 col-md-8"  style="margin-top: 50px; text-align: center;background-color: #e6e6e6;" >
		<b><h1>Publica un Favor</h1></b>
			<form id="formUsuario" enctype="multipart/form-data" action="publicarFavor.php" method="POST" onsubmit= "return validar_formulario();">
				<li>Título:<input type="text" name="titulo" >*</li><br>
				<li>Descripcion:<textarea style="width: 500px; height: 150px;" name="descripcion" ></textarea>*</li><br>
				<li>Fecha de vencimiento:<input type="date" name="fecha_venc"  min="<?php echo (date('Y-m-d', strtotime('+1 day'))); ?>">*</li><br>
				<li>Localidad:<select name="localidad">
				<?php
					while (isset($localidades)) {
				?>
					<option value="<?php echo $localidades['idLocalidad']?>"> <?php echo $localidades['nombre']?></option>
				<?php
					$localidades = $consulta->fetch_assoc();
				}
				?>
				</select>*</li><br>
				<li>Categoria:<select name="categoria">
				<?php
					while (isset($categorias)) {
				?>
					<option value="<?php echo $categorias['idCategoria']?>"> <?php echo $categorias['nombre']?></option>
				<?php
					$categorias = $consulta2->fetch_assoc();
				}
				?>
				</select>*</li><br>
				<li><input style="display:inline;"type="file" name="imagen" id="imagen"></li><br>
				<li>La imagen es opcional, si no tienes una ahora no te preocupes!!</li><br>
				<li><input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>"></li>
				<input type="submit" class="btn btn-primary" value="Publicar Favor" name="Publicar">		
			</form>
			<br>
	<?php 
		include "publicar.php";
		if (validarPublicacion()) {
			$ret= publicar();
			echo $ret;
		}

	?>

		</div>
	
	</div>

</body>
</html>