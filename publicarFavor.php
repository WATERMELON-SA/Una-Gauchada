<?php include "navbar.php" ?>

<body style="padding-top: 50px;">

<?php 
	include "conexion.php";
	$conect = conectar();
	include "listador.php";
	include "publicar.php";
		if (validarPublicacion()) {
			$ret= publicar($conect);
			if ($ret==false) {
				$idnuevo = $conect->query("SELECT max(idFavor) as id FROM favor");
				$idnuevo = $idnuevo->fetch_assoc();
				$idnuevo= $idnuevo['id'];
				header("Location: detalleFavor.php?idFavor=".$idnuevo);
			}
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


	<div class="row">
		<div class="col-md-offset-2 col-xs-offset-1 col-xs-9 col-md-8"  style="margin-top: 50px; text-align: center;background-color: #e6e6e6;" >
		<b><h1>Publica un Favor</h1></b>
		<h2>
			Actualmente posees <?php echo $_SESSION['creditos']; ?> creditos
		</h2>
		<h2>
			Tenes <?php echo $_SESSION['calif_pend']; ?> calificaciones pendientes
		</h2>

		<form class="form-horizontal" enctype="multipart/form-data" action="publicarFavor.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="titulo">Titulo:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="titulo" name="titulo" maxlength="35" required placeholder="Titulo del favor">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="descripcion" id="descripcion" minlength="4" required placeholder="Detalles de en qué consiste tu favor"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fecha_venc">Fecha de vencimiento:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha_venc" name="fecha_venc" min="<?php echo (Date('Y-m-d')); ?>" max="<?php echo (date('Y-m-d', strtotime('+1 year'))); ?>" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="localidad">Localidad:</label>
					<div class="col-sm-10">
						<select name="localidad" id="localidad" class="form-control" required>
							<option value="" selected>Selecciona una localidad</option>
							<?php
								listarLocalidades($conect);
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="categoria">Categoria:</label>
					<div class="col-sm-10">
						<select name="categoria" id="categoria" required class="form-control">
							<option value="" selected>Selecciona una categoría</option>
							<?php 
								listarCategorias($conect);
							?>
						</select>
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="imagen">Imagen de favor:</label>
					<div class="col-sm-10">
						<input type="file" name="imagen" id="imagen"><br>
						La imagen es opcional, si no tienes una ahora no te preocupes!!
					</div>
				</div>
				<input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">							
				<input class="btn btn-primary" type="submit" value="Publicar Favor" name="Publicar">	
			</form>

		</div>
	
	</div>

</body>
</html>