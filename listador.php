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

?>