<?php include "navbar.php";
include "conexion.php";
include "listador.php";
$conection = conectar();
$idFavor = $_GET['idFavor'];
$favor = $conection->query("SELECT * FROM favor WHERE idFavor = '$idFavor'");
$favor = $favor->fetch_assoc();
?>
<body>
	<div class="container">
		<?php
			if (isset($_GET['postulantes'])) {
		?>
		<div class="text-center" style="color:red; margin-top:5%;">No puedes modificar el favor porque ya tiene postulantes.</div>
		<?php
			}
		?>
		<form class="form-horizontal" enctype="multipart/form-data" action="modificardatosfavor.php" style="width: 40%; margin-top: 2%; margin-left: 15%" method="POST">
				<h1 class="text-center">Modificar favor: </h1>
				<div class="form-group">
					<label class="control-label col-sm-4" for="nombre">Titulo:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="titulo" maxlength="50" value="<?php echo $favor['titulo']?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="descripcion">Descripcion:</label>
					<div class="col-sm-8">
						<textarea required style="height:200px; width:300px" name="desc"><?php echo $favor['descripcion']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="fecha_venc">Fecha de vencimiento:</label>
					<div class="col-sm-8">
						<input type="date" class="form-control" id="fecha_venc" name="fecha_venc" min="<?php echo (Date('Y-m-d')); ?>" max="<?php echo (date('Y-m-d', strtotime('+1 year'))); ?>" value="<?php echo $favor['fecha_vencimiento'];?>" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="localidad">Localidad:</label>
					<div class="col-sm-8">
						<select name="localidad" class="form-control" required>
							<option value="">Selecciona una localidad</option>
							<?php
								listarLocalidadesConOptionActive($conection, $favor['idLocalidad']);
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="localidad">Categoría:</label>
					<div class="col-sm-8">
						<select name="categoria" class="form-control" required>
							<option value="">Selecciona una categoría</option>
							<?php
								listarCategoriasConOptionActive($conection, $favor['idCategoria']);
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
				<!-- <img src="mostrarFotoPerfil?idUser=<?php //echo $id; ?>"> -->	
					<label class="control-label col-sm-4" for="imagen">Imagen:</label>
					<div class="col-sm-8">
						<input type="file" name="imagen" id="imagen"><br>
					</div>
				</div>
				
				<div class="form-group">
					<input type="hidden" value="<?php echo $idFavor;?>" name="idFavor">
				</div>
																											
				<input class="btn btn-primary" style="margin-left: 25%" type="submit" value="Guardar" name="Guardar">	
			</form>
	</div>
</body>