<?php
	include 'conexion.php';
	include 'listador.php';
	$mysql=conectar();

	if (isset($_POST['boton'])){

		if ($_POST['fecha_min'] > $_POST['fecha_max']){
?>
			<script type="text/javascript">
				alert("La fecha inicio debe ser menor o igual a la fecha fin");

			</script>
<?php
		}
		else{	
			$fecha_min=$_POST['fecha_min'];
			$fecha_max=$_POST['fecha_max'];
			$traer=$mysql->query("SELECT sum(cantidad) as creditos, sum(costo) as total FROM compra WHERE fecha_compra between '$fecha_min' and '$fecha_max' ");
			$compra=$traer->fetch_assoc();
?>			<br>
			<h3 class="col-sm-7"> Total ganancias entre el <?php echo date("d-m-Y",strtotime($_POST['fecha_min'] ))  ?> y el <?php echo date("d-m-Y",strtotime($_POST['fecha_max'] ))  ?>: </h3>
<?php  
			if ($compra['total']!=0){
?>      
				<h1 style="margin-top: 1%; color: green; font-weight:bold;">  $<?php echo $compra['total']; ?> </h1>   
			
	    		<br>	
	    		<h4>Detalle:</h4>
	    		<div class="table-responsive">
					<table class="table table-striped">
						<tr >
							<td style="font-weight: bold;">e-mail usuario</td>
							<td style="font-weight: bold;">Cantidad de creditos</td>
							<td style="font-weight: bold;">Monto total</td>
							<td style="font-weight: bold;">Fecha</td>
						</tr>
						<?php listarCompra(conectar(),$fecha_max,$fecha_min);  ?>
					</table>
				</div>
<?php
			}
			else{
?>				<br>
				<h1 class="col-sm-12" style="margin-top: 3%; color: red; font-weight:bold;"> <?php echo "No hay ganancias entre esas fechas"; ?> </h1>
<?php	
			}

		}
	}




  ?>