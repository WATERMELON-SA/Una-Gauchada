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
    //  if ($ret=1) {
    //    header("Location: index.php");
    //  }
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

 <?php
    if (isset($_GET['comprado'])) {
  ?>
  <script type="text/javascript"> alert("Tus datos son incorrectos"); </script>
  <?php  
    $_POST['cantidad']=$_GET['comprado'];
    }
    else{
if (!isset($_POST['cantidad']) || ($_POST['cantidad'] =='')){
      header("Location: comprarCreditos.php?Fallo");
  }

    }
  ?>


<body>
	<h2 style="margin-left: 15%">Ingrese sus datos para poder validar su compra de 
	<?php 
	echo $_POST['cantidad'];
	?>
	créditos por $ 
	<?php 
  $link = conectar();
  $valorCredito = $link->query("SELECT precio FROM credito");
  $valorCredito = $valorCredito-> fetch_assoc();
	echo ($_POST['cantidad'] *$valorCredito['precio']);
	?>

	</h2></br>

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

function validarMinLength(contenido,length){
  if (contenido.length<length)
    return false;

}
</script>

	<form class="form-horizontal" action="validarCompra.php" method="POST">
	<div class="form-group">
    <label  class="col-sm-2 control-label">Nombre completo</label>
    <div class="col-sm-10">
      <input type="text"  maxlength="40" class="form-control" required name="nombre" placeholder="Nombre completo"></br>
    </div>
    <label class="col-sm-2 control-label">DNI</label>
    <div class="col-sm-10">
      <input  class="form-control " min="1" max="99999999" onkeydown="return validarLength(event,this.value,8)" required type="number" name="DNI" placeholder="DNI"></br>
    </div>
    <label  class="col-sm-2 control-label">Nro tarjeta de crédito (sin espacios)</label>
    <div class="col-sm-10">
      <input type="number" min="0" required max="9999999999999999" onkeydown="return validarLength(event,this.value,16)" class="form-control" name="nroTarjeta"  placeholder="Nro tarjeta (16 digitos)"></br>
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
      <input type="number" min="0" max="999" onkeydown="return validarLength(event,this.value,3)" required  class="form-control" name="codigoSeguridad"  placeholder="Codigo de seguridad de tarjeta (3 digitos)"></br>
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
      <input type="submit" value="Validar Compra"  class="btn btn-primary"> (En cuanto presione validar compra esta se efectuará)
    </div>
  </div>
</form>
</body>