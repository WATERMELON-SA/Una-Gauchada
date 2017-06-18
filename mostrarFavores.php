<?php
	include "conexion.php";
	function mostrarFavores(){
		$mysql = conectar();
		if (isset($mysql)){
			$fechacontrol = date('Y-m-d');
			$traer = $mysql->query("SELECT * FROM favor WHERE fecha_vencimiento > $fechacontrol AND activo = 1");
			if(isset($traer)){
				$arreglo = $traer->fetch_assoc();
			}
		}
	
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
	?>