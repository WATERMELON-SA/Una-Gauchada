<?php
function listarCategorias($conection){
	$consulta2 = $conection->query("SELECT * FROM categoria WHERE activo = 0");
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

function listarCategoriasAvanzada($conection){
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

function listarCategoriasConOptionActive($conection, $locaUser){
	$consulta = $conection->query("SELECT * FROM categoria");
		if ($consulta != false) {
			$localidades = $consulta->fetch_assoc();
		}
		while (isset($localidades)) {
	?>
			<option value=
			<?php echo '"'.$localidades['idCategoria'].'" '; 
				if ($localidades['idCategoria'] == $locaUser) {
			 		echo "selected";
			 	} 
			?>> <?php echo $localidades['nombre']?></option>
	<?php
			$localidades = $consulta->fetch_assoc();
		}
}




function listarPostulantes($conection,$user){
	$consulta=$conection->query("SELECT * FROM ((favor INNER JOIN postula ON favor.idFavor=postula.idFavor) INNER JOIN usuarios ON postula.idUsuario=usuarios.idUsuario) WHERE favor.idUsuario='$user' and  (completo=1 or activo=1) ");
	if ($consulta!= false) {
		$postulantes=$consulta->fetch_assoc();
	}
	if (!isset($postulantes)) 
		{ 	?>
		<div class="container">
		<h2>No posees postulantes para ningún favor</h2>
		</div>
<?php }

	while (isset($postulantes)) {
		if ($postulantes['activo'] == 1) {

			$idCumple=$postulantes['idUsuario'];
			$idFavor=$postulantes['idFavor'];
			$href="elegirGaucho.php?idUsuario=$idCumple&idFavor=$idFavor";
			$estado= "<a class='btn btn-primary' href=$href>Elegir gaucho</a>";
		}
		elseif((!is_null($postulantes['puntuacion'])) and ($postulantes['idUsuarioCumple']==$postulantes['idUsuario']) ){
					$estado= "has elegido y calificado a este usuario como gaucho!";
				}
			elseif ($postulantes['idUsuarioCumple']==$postulantes['idUsuario']) {
				$nombre=$postulantes['idUsuario'];
				$favor=$postulantes['idFavor'];
				$puntuar="puntuarUsuario.php?idUsuario=$nombre&idFavor=$favor";
				$estado= "has elegido a este usuario como gaucho! <a href=$puntuar>califica este usuario</a>" ;
			}
			
				else{
					$estado= "Has rechazado a este usuario";
				}


		?> 
		<tr>
			<td><a href="verPerfiles.php?idUser=<?php echo $postulantes['idUsuario']; ?>"><?php echo $postulantes['nombre'] ?></a></td>
			<td><a href="detalleFavor.php?idFavor=<?php echo $postulantes['idFavor'] ?>"><?php echo $postulantes['titulo'] ?></td>
			<td><?php echo $postulantes['comentario']; ?></td>
			<td><?php echo $estado; ?></td>

		</tr><?php $postulantes=$consulta->fetch_assoc();
	}
}

function listarPostulantesParaFavor($conection,$favor){
	$consulta=$conection->query("SELECT * FROM postula NATURAL JOIN usuarios WHERE idFavor='$favor'");
	if (isset($consulta)) {
		$postulantes=$consulta->fetch_assoc();
	}
	if (!isset($postulantes)) 
		{ 	?>
		<div class="container">
		<h2>Nadie se ha postulado para este favor</h2>
		</div>
<?php
	}

	while (isset($postulantes)) {
		?>
		<div class="container">
		<h3 class="col-sm-4"><a href="verPerfiles.php?idUser=<?php echo $postulantes['idUsuario']; ?>"><?php echo $postulantes['nombre'] ?> </a></h3>
		<a onClick='if(confirm("¿Estas seguro que deseas elegir este usuario como gaucho para tu favor?")) location.href ="elegirGaucho.php?idFavor=<?php echo $favor; ?>&idUsuario=<?php echo $postulantes['idUsuario']; ?>"' style="margin-top: 3%" class="btn btn-primary">Elegir gaucho</a><br>
		<p class="col-sm-10" style="padding-left: 12%"> <?php echo $postulantes['comentario'] ?> </p>
		</div> <?php $postulantes=$consulta->fetch_assoc(); 

	}
}


function listarCompra($conection,$fecha_max,$fecha_min){
	$traer=$conection->query("SELECT * FROM compra NATURAL JOIN usuarios WHERE  fecha_compra between '$fecha_min' and '$fecha_max' ");
	$compra=$traer->fetch_assoc();
	
	while (isset($compra)) {
		?>
		<tr>
			<td><?php echo $compra['email'] ?></td>
			<td><?php echo $compra['cantidad'] ?></td>
			<td><?php echo $compra['costo'] ?></td>
			<td><?php echo date("d-m-Y",strtotime($compra['fecha_compra'] ));?></td>
		</tr>
	<?php
	$compra=$traer->fetch_assoc();
	}


}

function listarReputacion($conection, $puntaje){
	$reputacion = $conection->query("SELECT * FROM reputacion WHERE valor_max >= $puntaje ORDER BY valor_max  LIMIT 1");
	$reputacion = $reputacion->fetch_assoc();
	return $reputacion['nombre'];
}




function listarRanking($conection){
	$traer=$conection->query("SELECT * FROM usuarios ORDER BY puntaje desc , email LIMIT 50 ");
	$usuario=$traer->fetch_assoc();
	$ranking=1;
	while (isset($usuario)) {
		if ($usuario['admin']==false){
			$reputacion=listarReputacion($conection,$usuario['puntaje']);
?>
			<tr>
				<td><?php echo $ranking ?></td>
				<td><?php echo $usuario['email'] ?></td>
				<td><?php echo $usuario['puntaje'] ?></td>
				<td><?php echo $reputacion  ?></td>
			</tr>
<?php
			$ranking=$ranking +1;
		}
	$usuario=$traer->fetch_assoc();
	
	}
}

function listarCategoriasTabla($conection){
	$consulta2 = $conection->query("SELECT * FROM categoria WHERE activo = 0");
	if ($consulta2 != false) {
		$categorias = $consulta2->fetch_assoc();
	}
	while (isset($categorias)) {
?>
		<tr>
			<td><?php echo $categorias['nombre']?></td>
			<td>
				<a href="modificarcategoria.php?idCat=<?php echo $categorias['idCategoria']?>;" class="btn btn-primary">Modificar</a>
				<a href="eliminarcategoria.php?idCat=<?php echo $categorias['idCategoria']?>;" class="btn btn-primary" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
			</td>
		</tr>
<?php
		$categorias = $consulta2->fetch_assoc();
	}
}




?>