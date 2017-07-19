<?php include "navbar.php" ?>

<body style="background-color: #e6e6e6; padding-top: 50px;">

<?php 
	if (!isset($_SESSION['nombre'])) {
		header("Location: index.php");
	}
	include "conexion.php";
	$conectar = conectar();
	$id = $_SESSION['id'];
	$cumplidos= $conectar-> query("SELECT * FROM favor WHERE puntuacion is not null");
	$arreglo= $cumplidos -> fetch_assoc();
	if (isset($arreglo)){
		?>
		<h1 style="text-align: center;">Estos son todos los favores cumplidos: </h1>
		<?php
	while (isset($arreglo)) {
		$idFavor = $arreglo['idFavor'];
		$favor = $conectar -> query("SELECT * FROM favor WHERE idFavor = $idFavor");
		$favor = $favor -> fetch_assoc();
		$idDueño= $favor['idUsuario'];
		$idCategoria=$favor['idCategoria'];
		$idLocalidad=$favor['idLocalidad'];


		$traernombre = $conectar->query("SELECT nombre,email FROM usuarios WHERE idUsuario = $idDueño ");
		if (isset($traernombre)) {
			$arreglonombre = $traernombre->fetch_assoc();
		}
		$traercategoria = $conectar->query("SELECT nombre FROM categoria WHERE idCategoria = $idCategoria ");
		if (isset($traercategoria)) {
			$arreglocategoria = $traercategoria->fetch_assoc();
		}
		$traerlocalidad = $conectar->query("SELECT nombre FROM localidad WHERE idLocalidad = $idLocalidad ");
		if (isset($traerlocalidad)) {
			$arreglolocalidad = $traerlocalidad->fetch_assoc();
		}
		
		$descripcioncorta = substr($favor['descripcion'],0,170);
		
?>
	<div class="container">
					<div class="well cajaFavor row">
						<?php
							if (is_null($favor['contenidoimagen'])) {
						?>
							<div class="cajaFoto col-lg-4 col-xs-4">
								<img style="margin-top:20%" class="img-responsive" src="logo.png" alt="">
							</div>
						<?php
							}else{
						?>
						<div class="cajaFoto col-lg-4 col-xs-4">
							<img style="margin-top:20%" class="img-responsive" src="mostrarimagen.php?idFavor=<?php echo $favor ['idFavor']?>" alt="">
						</div>
						<?php } ?>
						<div class="col-lg-8 col-xs-8">
							<h3><?php echo $favor["titulo"]?></h3>
							<h4><?php echo $descripcioncorta; if (strlen($favor['descripcion']) > 170) {
								echo "...";
							}?></h4>
							<div>
							<span style="display:inline;"><h5><b>Categoria: <?php echo $arreglocategoria['nombre'];?> - Localidad: <?php echo $arreglolocalidad['nombre'];?></b> </5></span>
							</div>
							<b> Autor:  </b> 
							<a href="verPerfiles.php?idUser=<?php echo $idDueño; ?>"> <?php echo $arreglonombre["nombre"];?> </a>
							<br>
							<a style="margin-top: 1%" href="detalleFavor.php?idFavor=<?php echo $favor['idFavor'] ?>">Ver más</a>
						</div>
						</div>
					</div>
<?php  
	$arreglo= $cumplidos -> fetch_assoc();
}
}
else{
?>
<h1 style="text-align: center;">No te postulaste a ningún favor</h1>
<?php 
}
?>
</body>
</html>