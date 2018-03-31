 <?php
  include "navbar.php";
  include "conexion.php";
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
      <input type="month" class="form-control" required name="fechaVencimiento" min= "<?php echo (date('Y-m')); ?>"></br>
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