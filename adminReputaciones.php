<?php  
	include "navbar.php";
	if (!(isset($_SESSION['admin'])) OR (!$_SESSION['admin'])) {
		header("Location: index.php");
	}
	include "conexion.php";
	$conection = conectar();
	include "modificarReputacion.php";
 	if (isset($_POST['nombre'])) {
 		modificarReputacion($conection);
 	}
 	if (isset($_POST['nuevoNombre'])) {
 		$nuevoNombre=$_POST['nuevoNombre'];
 		$nuevoColor=$_POST['nuevoColor'];
 		$nuevoValor_max=$_POST['nuevoValor_max'];
 		$conection-> query("INSERT INTO reputacion (nombre, color, valor_max) VALUES ('$nuevoNombre','$nuevoColor','$nuevoValor_max')");
 	}
	$reputaciones = $conection -> query("SELECT * FROM reputacion ORDER BY valor_max");
	$arreglo= $reputaciones-> fetch_assoc();
	$i = -1;
	$ant=0;
	$total=0;
?>
<br>
<div class="container-fluid">
<div  class="progress" style="height: 60px;">

<?php  	
	while (isset($arreglo)){
		$i=$i+1;
		if ($ant==0)
			$valorMinimo=-9999;
		else 
			$valorMinimo= $ant['valor_max']+1;
	  	$rangos[$i]= $valorMinimo." a ".$arreglo['valor_max'];
	  	$arreglo2[$i]= $arreglo['nombre'];
	  	$diferencia[$i] = $arreglo['valor_max'] - $valorMinimo;
	  	if ($diferencia[$i]>200) {
	  		$diferencia[$i]=200;
	  	}
	  	$colores[$i]=$arreglo['Color'];
	  	$total = $total + $diferencia[$i];
	  	$id[$i]=$arreglo['idReputacion'];
	  	$ant=$arreglo;
  		$arreglo = $reputaciones-> fetch_assoc();
	}
	for ($j=0; $j <=$i ; $j++) {
	?>
		<div class="progress-bar" title="<?php echo $arreglo2[$j]; ?>" style="cursor:pointer; width: <?php echo (100 * $diferencia[$j] / $total) ?>%; background-color: <?php echo $colores[$j];?>">
			<b style="color: black;"> <?php echo $rangos[$j]; ?> </b>
		</div>
 	<?php
 	}
 	?>
</div>


	<div class="col-sm-6 col-sm-offset-4" style="align-self: center;">
		<div style="width: 70%; text-align: center;" class="panel panel-default panel-center">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Reputaciones</div>

	  <!-- Table -->
	  <table class="table">
			<tr>
				<th>Nombre reputacion</th>
				<th>Rango</th>
				<th></th>
			</tr>
			<?php
				for ($j=0; $j <=$i ; $j++) { 
			?>
				<tr>
				<td style="background-color:<?php echo $colores[$j];?> "><?php echo $arreglo2[$j];?></td>
				<td><?php echo $rangos[$j]; ?></td>
				<td><?php verInput($conection, $id[$j]); ?>
					<a onClick='if(confirm("¿Estas seguro que deseas borrar esta reputacion?")) location.href ="borrarReputacion.php?idReputacion=<?php echo $id[$j]; ?>";' tittle="eliminar" class="btn btn-default">
						<img src="remove.png">
					</a>
				</td>
				</tr>				
			<?php
				}
			?>
		</table>  
	</div>

		<div style="text-align: center;">
		<button class="btn btn-default" type="button" data-toggle="modal" data-target="#ModalAgregar">Agregar nueva Reputacion</button>
		<div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	    	<div class="modal-content">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              <h4 class="modal-title" id="myModalLabel">Agregar Reputacion</h4>
	            </div>
	            <div class="modal-body">
		
		<form class="form-horizontal" action="adminReputaciones.php" method="POST">
		<div class="form-group">
					<label class="control-label col-sm-2" for="color">Color:</label>
					<div class="col-sm-10">
						<input type="color" name="nuevoColor" class="form-control" required >
					</div>
		</div>
			<br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="nombre">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" name="nuevoNombre" class="form-control" required >
					</div>
		</div>	
			<br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="valor_max">Valor maximo:</label>
					<div class="col-sm-10">
						<input type="number" max="9999" name="nuevoValor_max" class="form-control" required >
						<b style="color: red;"> Se utilizara como valor minimo el de la reputacion anterior</b>
					</div>
		</div>
			<br>
			<input type="submit" class="btn btn-primary" name="Agregar" value="Agregar">
		</form>
		  </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	            </div>
	          </div>
	        </div>
	      </div>
		</div>
	</div>
    </div>
  </div>



</div>
  
 