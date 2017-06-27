<?php 
	include "navbar.php" ;
	include "conexion.php";
?>
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
