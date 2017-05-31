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
	include "conexion.php";
	$conect = conectar();
	include "listador.php";
	include "publicar.php";
	session_start();
		if (validarPublicacion()) {
			$ret= publicar($conect);
			if ($ret==false) {
				$idnuevo = $conect->query("SELECT max(idFavor) as id FROM favor");
				$idnuevo = $idnuevo->fetch_assoc();
				$idnuevo= $idnuevo['id'];
				header("Location: detalleFavor.php?idFavor=".$idnuevo);
			}
	?>	
		<script type="text/javascript">
			alert("<?php echo $ret; ?>");
		</script>
	<?php	
		}
	
	if(isset ($_SESSION['nombre'])){
		$inicio=true;
	}
	else{
		header("Location: index.php");
	}
?>

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
    <li><a href="comprarCreditos.php">Comprar creditos</a></li>
    <li><a href="#">Preguntas</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
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
		<h2>
			Actualmente posees <?php echo $_SESSION['creditos']; ?> creditos
		</h2>
		<h2>
			Tenes <?php echo $_SESSION['calif_pend']; ?> calificaciones pendientes
		</h2>

		<form class="form-horizontal" enctype="multipart/form-data" action="publicarFavor.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="titulo">Titulo:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="titulo" name="titulo" maxlength="35" required placeholder="Titulo del favor">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="descripcion" id="descripcion" minlength="4" required placeholder="Detalles de en qué consiste tu favor"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fecha_venc">Fecha de vencimiento:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha_venc" name="fecha_venc" min="<?php echo (Date('Y-m-d')); ?>" max="<?php echo (date('Y-m-d', strtotime('+1 year'))); ?>" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="localidad">Localidad:</label>
					<div class="col-sm-10">
						<select name="localidad" id="localidad" class="form-control" required>
							<option value="" selected>Selecciona una localidad</option>
							<?php
								listarLocalidades($conect);
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="categoria">Categoria:</label>
					<div class="col-sm-10">
						<select name="categoria" id="categoria" required class="form-control">
							<option value="" selected>Selecciona una categoría</option>
							<?php 
								listarCategorias($conect);
							?>
						</select>
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="imagen">Imagen de favor:</label>
					<div class="col-sm-10">
						<input type="file" name="imagen" id="imagen"><br>
						La imagen es opcional, si no tienes una ahora no te preocupes!!
					</div>
				</div>
				<input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">							
				<input class="btn btn-primary" type="submit" value="Publicar Favor" name="Publicar">	
			</form>

		</div>
	
	</div>

</body>
</html>