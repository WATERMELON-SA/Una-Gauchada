<?php include "navbar.php" ?>
<body>
<?php
	include "conexion.php";
	$conection = conectar();
	include "listador.php";
?>
<form class="form-horizontal" enctype="multipart/form-data" action="modificarDatosPersonales.php" style="width: 40%; margin-top: 2%; margin-left: 15%" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nombre">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" maxlength="35" value="<?php echo $_SESSION['nombre']?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Correo electrónico:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']?>" maxlength="40" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fecha_nac">Fecha de nacimiento:</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" required name="fecha_nac" min="<?php echo (date('Y-m-d', strtotime('-80 year'))); ?>" max="<?php echo (date('Y-m-d', strtotime('-16 year'))); ?>" value="<?php echo $_SESSION['fecha_nac']?>" >
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="telefono">Teléfono:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" required max="9999999999999" min="1000000000"  name="telefono" value="<?php echo $_SESSION['telefono']?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="localidad">Localidad:</label>
					<div class="col-sm-10">
						<select name="localidad" class="form-control" required>
							<option value="">Selecciona una localidad</option>
							<?php
								$id = $_SESSION['id'];
								$usuario = $conection-> query("SELECT * FROM usuarios where idUsuario=$id");
								$usuario= $usuario -> fetch_assoc();
								listarLocalidadesConOptionActive($conection, $usuario['idLocalidad']);
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
				<!-- <img src="mostrarFotoPerfil?idUser=<?php //echo $id; ?>"> -->	
					<label class="control-label col-sm-2" for="imagen">Imagen de perfil:</label>
					<div class="col-sm-10">
						<input type="file" name="imagen" id="imagen"><br>
					</div>
				</div>
																											
				<input class="btn btn-primary" style="margin-left: 25%" type="submit" value="Guardar" name="Guardar">	
			</form>
			<br>
