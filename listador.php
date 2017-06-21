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
?>