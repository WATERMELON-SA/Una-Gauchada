<?php
	function mostrarFavores($search,$order,$localidad,$categoria,$mysql){
		$and='';
		$busqueda='';
		if ($categoria!=false) {
			$and = $and . " AND idCategoria = $categoria";
		}
		if ($localidad!=false) {
			$and = $and . " AND idLocalidad = $localidad";
		}
		if($search!=false){
			$busqueda = " AND (descripcion LIKE '%$search%' OR
			 titulo LIKE '%$search%')";
		}

		if (!$order) {
			$order = 'idFavor';
		}else{
			if($order=='fechaviejo'){
				$format = 'ASC';
				$order='fecha_vencimiento';
			}if ($order=='fechanuevo') {
				$format = 'DESC';
				$order='fecha_vencimiento';
			}
		}

		$fechacontrol = date('Y-m-d');
		$traer = $mysql->query("SELECT * FROM favor WHERE fecha_vencimiento > $fechacontrol AND activo = 1 $and $busqueda ORDER BY $order");
		if(isset($traer)){
			$arreglo = $traer->fetch_assoc();
		}


		//CHEQUEO QUE EXISTA FRASE BUSCADA
		if (!isset($arreglo))  {
	?>
		

		 <div class="container">
      		<div class="well cajaPreguntas row">
        		<h1 style="text-align:center;">No se encontraron favores relacionados a tu búsqueda.</h1>
      		</div>
    	</div>
		
	<?php

	}else{
	while (isset($arreglo)) { 
		$idUsuario = $arreglo['idUsuario'];
		
		$traernombre = $mysql->query("SELECT nombre FROM usuarios WHERE idUsuario = $idUsuario ");
		if (isset($traernombre)) {
			$arreglonombre = $traernombre->fetch_assoc();
		}
		
		$descripcioncorta = substr($arreglo['descripcion'],0,170);
		?>
			<div class="container">
					<div class="well cajaFavor row">
						<?php
							if (is_null($arreglo['contenidoimagen'])) {
						?>
							<div class="cajaFoto col-lg-4 col-xs-4">
								<img style="margin-top:20%" class="img-responsive" src="logo.png" alt="">
							</div>
						<?php
							}else{
						?>
						<div class="cajaFoto col-lg-4 col-xs-4">
							<img style="margin-top:20%" class="img-responsive" src="mostrarimagen.php?idFavor=<?php echo $arreglo ['idFavor']?>" alt="">
						</div>
						<?php } ?>
						<div class="col-lg-8 col-xs-8">
							<h3><?php echo $arreglo["titulo"]?></h3>
							<h4><?php echo $descripcioncorta; if (strlen($arreglo['descripcion']) > 170) {
								echo "...";
							}?></h4>
							<h5>
								<a href="verPerfiles.php?idUser=<?php echo $idUsuario; ?>">
									<?php echo $arreglonombre["nombre"]?></h5>
								</a>
							<a href="detalleFavor.php?idFavor=<?php echo $arreglo['idFavor'] ?>">Ver más</a>
						</div>
						</div>
					</div>
		<?php					
			$arreglo = $traer->fetch_assoc();
		}
	}
	}
	?>

