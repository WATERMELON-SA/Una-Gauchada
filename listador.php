<?php
function listarCategorias($conection){
	$consulta2 = $conection->query("SELECT * FROM categoria");
	if ($consulta2 != false) {
		$categorias = $consulta2->fetch_assoc();
	}
	while (isset($categorias)) {
?>
		<option value="<?php echo $categorias['idCategoria']?>"> <?php echo $categorias['nombre']?></option>
<?php
		$categorias = $consulta2->fetch_assoc();
	}
}

function listarLocalidades($conection){
	$consulta = $conection->query("SELECT * FROM localidad");
	if ($consulta != false) {
		$localidades = $consulta->fetch_assoc();
	}
	while (isset($localidades)) {
?>
		<option value="<?php echo $localidades['idLocalidad']?>"> <?php echo $localidades['nombre']?></option>
<?php
		$localidades = $consulta->fetch_assoc();
	}
}

function listarLocalidadesConOptionActive($conection, $locaUser){
	$consulta = $conection->query("SELECT * FROM localidad");
		if ($consulta != false) {
			$localidades = $consulta->fetch_assoc();
		}
		while (isset($localidades)) {
	?>
			<option value=
			<?php echo '"'.$localidades['idLocalidad'].'" '; 
				if ($localidades['idLocalidad'] == $locaUser) {
			 		echo "selected";
			 	} 
			?>> <?php echo $localidades['nombre']?></option>
	<?php
			$localidades = $consulta->fetch_assoc();
		}
}




function listarPostulantes($conection,$user){
	$consulta=$conection->query("SELECT * FROM ((favor INNER JOIN postula ON favor.idFavor=postula.idFavor) INNER JOIN usuarios ON postula.idUsuario=usuarios.idUsuario) WHERE favor.idUsuario='$user'");
	if ($consulta!= false) {
		$postulantes=$consulta->fetch_assoc();
	}
	while (isset($postulantes)) {
		?> 
		<tr>
			<td><a href="verPerfiles.php?idUser=<?php echo $postulantes['idUsuario']; ?>"><?php echo $postulantes['nombre'] ?></a></td>
			<td><?php echo $postulantes['titulo'] ?></td>
		</tr><?php $postulantes=$consulta->fetch_assoc();
	}
}

function listarPostulantesParaFavor($conection,$favor){
	$consulta=$conection->query("SELECT * FROM (postula p INNER JOIN favor f ON p.idFavor=f.idFavor) INNER JOIN usuarios u ON u.idUsuario=p.idUsuario WHERE f.idFavor='$favor' ");
	if ($consulta!= false) {
		$postulantes=$consulta->fetch_assoc();
	}
	else{ 	?>
		<div class="container">
		<h2>Nadie se ha postulado para este favor</h2>
		</div>
<?php
	}

	while (isset($postulantes)) {
		?>
		<div class="container">
		<h1 class="col-sm-4"><a href="verPerfiles.php?idUser=<?php echo $postulantes['idUsuario']; ?>"><?php echo $postulantes['nombre'] ?> </a></h1>
		<button style="margin-top: 3%" class="btn btn-primary">Elegir gaucho</button><br>
		<p class="col-sm-10" style="padding-left: 12%"> <?php echo $postulantes['comentario'] ?> </p>
		</div> <?php $postulantes=$consulta->fetch_assoc(); 

	}
}
?>