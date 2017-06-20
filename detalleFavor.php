<?php
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header("Location: iniciarSesion.php?alert=1");
  }
?>
<!DOCTYPE html>
<html  style="overflow-x: hidden;">
<head>
	<link rel="shortcut icon" href="logo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Roboto-Regular.ttf">
	<link rel="stylesheet" type="text/css" href="estiloDetalle.css">
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

  
  <button class="btn btn-default dropdown-toggle navbar-right navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <li class="dropdown">
  <?php
  if(isset($_SESSION['nombre'])) {
    echo "Bienvenido ".$_SESSION['nombre'];
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
  <?php
    include "conexion.php";
    $conexion = conectar();
    $idFavor = $_GET['idFavor'];
    $traerFavor = $conexion->query("SELECT * FROM favor WHERE idFavor = $idFavor");
    $favor = $traerFavor->fetch_assoc();
    $idUsuario = $favor['idUsuario'];
    $traerNombre = $conexion->query("SELECT * FROM usuarios WHERE idUsuario = $idUsuario");
    $favorNombre = $traerNombre->fetch_assoc();
    $idCategoria = $favor['idCategoria'];
    $idLocalidad = $favor['idLocalidad'];
    $traercategoria = $conexion->query("SELECT nombre FROM categoria WHERE idCategoria = $idCategoria");
    if (isset($traercategoria)) {
      $arreglocategoria = $traercategoria->fetch_assoc();
    }
    $traerlocalidad = $conexion->query("SELECT nombre FROM localidad WHERE idLocalidad = $idLocalidad");
    if (isset($traerlocalidad)) {
      $arreglolocalidad = $traerlocalidad->fetch_assoc();
    }
    $idPostulante = $_SESSION['id'];
    $postulado= $conexion ->query("SELECT * FROM postula WHERE idUsuario= $idPostulante AND idFavor= $idFavor");
    $postulado= $postulado-> fetch_assoc();
  ?>

    <div class="container">
      <div class="well cajaDetalle row">
        <?php
              if (is_null($favor['contenidoimagen'])) {
            ?>
              <div class="cajaFoto col-lg-4 col-xs-4">
                <img style="margin-top:20%" class="img-responsive" src="logo.png" alt="">
              </div>
            <?php
              }else{
            ?>
            <div class="cajaFoto col-lg-4 col-xs-4">
              <img style="margin-top:20%" class="img-responsive" src="mostrarimagen.php?idFavor=<?php echo $favor['idFavor']?>" alt="">
            </div>
            <?php } ?>
        <div class="col-lg-8 col-xs-8" style="margin-top:5%">
          <h2><?php echo strtoupper($favor["titulo"])?></h2>
          <div class="separador"></div>
          <h2>Descripcion</h2>
          <h3><?php echo $favor["descripcion"] ?></h3>
          <div class="separador"></div>
          <h3>Peticionante: <?php echo $favorNombre['nombre']?></h3>
          <h3>Localidad:<?php echo $arreglolocalidad['nombre'] ?></h5>
          <h3>Categoria:<?php echo $arreglocategoria['nombre'] ?></h5>
          
          <?php 
            if ($_SESSION['id'] != $idUsuario) {
              if(!$postulado){
          ?>
          <form method="POST" action="postularse.php">
            <label>Contale al dueño del favor por qué te tiene que elegir:</label>
            <textarea required class="form-control" type="text" name="comentario" style="resize: none"></textarea>
            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="idFavor" value="<?php echo $idFavor ?>">
            <br>
            <input type="submit" class="btn btn-primary" value="Ofrecerme">
          </form>
          <?php
              }
              else
                echo("<p style='color: green'> Ya te has postulado para este favor </p>");
            }
          else{
          ?>
          <button class="btn btn-primary">Modificar Favor</button>
          <a onClick='if(confirm("¿Estas seguro que deseas borrar este favor?")) location.href ="borrarFavor.php?idFavor=<?php echo $idFavor; ?>";' class="btn btn-primary">Borrar</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php
      include "mostrarpreguntas.php";
      mostrarPreguntas($idFavor);
      if ($_SESSION['id'] != $idUsuario) {
    ?>
    <div class="container">
    <form class="form-horizontal" method="POST" action="hacerPregunta.php">
	    <div class="form-group">
	    	<label class="control-label col-sm-1" for="pregunta">Pregunta:</label>
		    <div class="col-sm-10">
		    	<textarea type="text" required class="form-control" placeholder="Escribí tu pregunta acá" name="pregunta">
				</textarea>
			</div>
		</div>
		<input type="hidden" name="idFavor" value="<?php echo $idFavor; ?>">
    	<input class="btn btn-primary" type="submit" value="Preguntar" name="Preguntar">	
	</form>
	</div>
	<?php
      }
    ?>
</body>

</html>