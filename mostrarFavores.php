<?php
	include "conexion.php";
	function mostrarFavores(){
		$mysql = conectar();
		if (isset($mysql)){
			$traer = $mysql->query("SELECT * FROM favor");
			if(isset($traer)){
				$arreglo = $traer->fetch_assoc();
			}
		}
	
	while (isset($arreglo)) { 
		$idUsuario = $arreglo['idUsuario'];
		$traernombre = $mysql->query("SELECT nombre FROM usuario WHERE idUsuario = $idUsuario ");
		if (isset($traernombre)) {
			$arreglonombre = $traernombre->fetch_assoc();
		}
		$descripcioncorta = substr($arreglo['descripcion'],0,170);
		?>
			<div class="container">
					<div class="well cajaFavor row">
						<div class="cajaFoto col-lg-4 col-xs-4">
							<img style="margin-top:20%" class="img-responsive" src="mostrarimagen.php?idFavor=<?php echo $arreglo ['idFavor']?>" alt="burro">
						</div>
						<div class="col-lg-8 col-xs-8">
							<h3><?php echo $arreglo["titulo"]?></h3>
							<h4><?php echo $descripcioncorta ?> ...</h4>
							<h4>Usuario: <?php echo $arreglonombre["nombre"]?></h4>
							<a href="detalleFavor.php?idFavor=<?php echo $arreglo['idFavor'] ?>">Ver más</a>
						</div>
						</div>
					</div>
		<?php					
			$arreglo = $traer->fetch_assoc();
		}
	}
	?>