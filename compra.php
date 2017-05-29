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


	<button type="button" class="btn btn-default navbar-btn navbar-right"><a href='#'> MiPerfil</a></button>


  </div>
</nav>

		<img style="width: 100%;" src="banner.png">


</header>

<?php
    if (!isset($_POST['cantidad']) || ($_POST['cantidad'] =='')){
      header("Location: comprarCreditos.php?Fallo");
  }

?>

<body>
	<h2 style="margin-left: 15%">Ingrese sus datos para poder validar su compra de 
	<?php 
	echo $_POST['cantidad'];
	?>
	créditos por $ 
	<?php 
	echo ($_POST['cantidad'] * 50);
	?>

	</h2></br>

	<form class="form-horizontal" action="validarCompra.php" method="POST">
	<div class="form-group">
    <label  class="col-sm-2 control-label">Nombre completo</label>
    <div class="col-sm-10">
      <input type="text"  maxlength="30" class="form-control" required name="nombre" placeholder="Nombre completo"></br>
    </div>
    <label class="col-sm-2 control-label">DNI</label>
    <div class="col-sm-10">
      <input  class="form-control " maxlength="8" minlength="8" required type="number" name="DNI" placeholder="DNI"></br>
    </div>
    <label  class="col-sm-2 control-label">Nro tarjeta de crédito (sin espacios)</label>
    <div class="col-sm-10">
      <input type="number" max="9999999999999999" min="0000000000000000" required  class="form-control" name="nroTarjeta"  placeholder="Nro tarjeta"></br>
    </div>
     <label  class="col-sm-2 control-label">Tipo de tarjeta</label>
    <div class="col-sm-10">
      <select class="form-control">
        <option>Maestro</option>
        <option>Nativa</option>
        <option>Visa</option>
        <option>American Express</option>        
        <option>Master Card</option>
      </select>
      </br>
    </div>
    <label  class="col-sm-2 control-label">Codigo de seguridad</label>
    <div class="col-sm-10">
      <input type="number" maxlength="3" minlength="3" required  class="form-control" name="codigoSeguridad"  placeholder="Codigo de seguridad de tarjeta"></br>
    </div>
    <label  class="col-sm-2 control-label">Fecha Vencimiento</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" required name="fechaVencimiento" min= "<?php echo (date('Y-m-d')); ?>"></br>
    </div> 

</div>
 
      <div class="checkbox" style="margin-left: 15%">
        <label>
          <input required type="checkbox"> Acepto los términos y condiciones de UnaGauchada
        </label>
      </div></br>
    
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="hidden" name="cantidad" value="<?php echo $_POST['cantidad']; ?>">
      <input type="submit" value="Validar Compra" class="btn btn-primary"> (En cuanto presione validar compra esta se efectuará)
    </div>
  </div>
</form>
</body>