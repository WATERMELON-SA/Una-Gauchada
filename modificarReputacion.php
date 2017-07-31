<?php  
	function verInput($conection, $idReputacion){
		$reputacion= $conection ->query("SELECT * FROM reputacion WHERE idReputacion='$idReputacion'");
		$reputacion = $reputacion ->fetch_assoc();
?>
	<button title="modificar" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal<?php echo $reputacion['idReputacion']; ?>">
		<img src="edit.png">
	</button>
	<div class="modal fade" id="myModal<?php echo $reputacion['idReputacion']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	    	<div class="modal-content">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              <h4 class="modal-title" id="myModalLabel">Modificar Reputacion</h4>
	            </div>
	            <div class="modal-body">
		
		<form class="form-horizontal" action="adminReputaciones.php" method="POST">
		<div class="form-group">
					<label class="control-label col-sm-2" for="color">Color:</label>
					<div class="col-sm-10">
						<input type="color" name="color" value="<?php echo $reputacion['Color']; ?>" class="form-control" required >
					</div>
		</div>
			<br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="nombre">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" name="nombre" value="<?php echo $reputacion['nombre']; ?>" class="form-control" required >
					</div>
		</div>	
			<br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="valor_max">Valor maximo:</label>
					<div class="col-sm-10">
						<input type="number" name="valor_max" max="9999" value="<?php echo $reputacion['valor_max']; ?>" class="form-control" required >
						<b style="color: red;"> Se utilizara como valor minimo el de la reputacion anterior</b>
					</div>
		</div>
			<br>
			<input type="hidden" name="idReputacion" value="<?php echo $idReputacion; ?>">
			<input type="submit" class="btn btn-primary" name="Modificar" value="Modificar">
		</form>
		  </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	            </div>
	          </div>
	        </div>
	      </div>
<?php
	}


	function modificarReputacion($conection){
		$nombre= $_POST['nombre'];
		$color = $_POST['color'];
		$valor_max= $_POST['valor_max'];
		$idReputacion= $_POST['idReputacion'];
		$existe= $conection-> query("SELECT * FROM reputacion WHERE idReputacion!=$idReputacion AND (nombre='$nombre' OR color='$color' OR valor_max='$valor_max')");
		$existe = $existe->fetch_assoc();
		if (!$existe) {
			$valido=$conection->query("UPDATE reputacion SET nombre='$nombre', color='$color', valor_max='$valor_max' WHERE idReputacion=$idReputacion");
			?> 
				<script type="text/javascript"> alert("Los datos fueron modificados con exito");</script>
 			<?php
		}
		else{
			?> 
				<script type="text/javascript"> alert("Los datos ingresados no son validos, compruebe que no haya otra reputacion con los mismos");</script>
 			<?php
		}
	}
?>
    