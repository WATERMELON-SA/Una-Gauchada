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
		//	if ($ret=1) {
		//		header("Location: index.php");
		//	}
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
    <li><a href="publicarFavor.php">Publicar favor</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
  </ul>
  </li>
  </div>
</nav>
		<img style="width: 100%;" src="banner.png">
</header>
<body>
 
 <script type="text/javascript">
	
function validarLength(e,contenido,length){

	var unicode=e.keyCode? e.keyCode : e.charCode;
            // Permitimos las siguientes teclas:
            // 8 backspace
            // 46 suprimir
            // 13 enter
            // 9 tabulador
            // 37 izquierda
            // 39 derecha
            // 38 subir
            // 40 bajar
  if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
        return true;
	if (contenido.length>=length)
		return false;	
  return true;
}

</script>


<header style="text-align: center"><h2>Compra créditos y podrás publicar mas favores!!!</h2>
<img class="img-responsive center-block" style="max-width: 10%" src="monedas.jpg">
<?php 
		$link = conectar();
		$valorCredito = $link->query("SELECT precio FROM credito");
		$valorCredito = $valorCredito-> fetch_assoc(); 
		?>
<h3>Precio del crédito: $<?php echo $valorCredito['precio']; ?> </h3>
</header>
<div style="text-align: center; margin-top: 2%">
	<h2>Cantidad:</h2>
	<form method="POST" action="compra.php">
	<input type="number" onkeydown="return validarLength(event,this.value,3)" max="999" min="1" required class="form-control" style="display:inline-block; width: 6%; height: 40px; font-size: 20px;" name="cantidad">  
	<input type="submit" required class="btn btn-primary" style="display: inline-block;" name="Comprar" style="font-size:20px">
	</form>
</div>

<h3 align="center">
			Actualmente posees <?php echo $_SESSION['creditos']; ?> creditos
		</h3>


</body>
