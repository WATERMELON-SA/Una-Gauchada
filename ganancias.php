<?php
	include 'conexion.php';
	include 'listador.php';
	$mysql=conectar();
	if (isset($_POST['boton'])){
		$fecha_min=$_POST['fecha_min'];
		$fecha_max=$_POST['fecha_max'];
		$traer=$mysql->query("SELECT sum(cantidad) as creditos, sum(costo) as total FROM compra WHERE ($fecha_min < fecha_compra) ");
		$compra=$traer->fetch_assoc();
		?>
		<h3> Total ganancias:  $<?php echo $compra['total']; ?> </h3>
		<h3> Creditos: <?php echo $compra['creditos']; ?> </h3>
	</br>	
	<h4>Detalle:</h4>
	<div class="table-responsive">
		<table class="table table-striped">
			<tr >
				<td style="font-weight: bold;">e-mail usuario</td>
				<td style="font-weight: bold;">Cantidad de creditos</td>
				<td style="font-weight: bold;">Costo</td>
			</tr>
			<?php listarCompra(conectar(),$fecha_max,$fecha_min);  ?>
		</table>
	</div>
		<?php

	}




  ?>