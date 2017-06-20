<?php include "navbar.php" ?>

<body style="background-color: #e6e6e6; padding-top: 50px;">
<h1 style="text-align: center;">Estos son los favores en los que te postulaste: </h1>
<?php 
	if (!isset($_SESSION['nombre'])) {
		header("Location: index.php");
	}
	include "conexion.php";
	$conectar = conectar();
	$id = $_SESSION['id'];
	$postulaciones= $conectar-> query("SELECT * FROM postula WHERE idUsuario=$id");
	$arreglo= $postulaciones -> fetch_assoc();
	while (isset($arreglo)) {
		$idFavor = $arreglo['idFavor'];
		$favor = $conectar -> query("SELECT * FROM favor WHERE idFavor = $idFavor");
		$favor = $favor -> fetch_assoc();
		$traernombre = $conectar->query("SELECT nombre FROM usuarios WHERE idUsuario = $id ");
		if (isset($traernombre)) {
			$arreglonombre = $traernombre->fetch_assoc();
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
							<h5>
								<a href="verPerfiles.php?idUser=<?php echo $idUsuario; ?>">
									<?php echo $arreglonombre["nombre"]?></h5>
								</a>
							<a href="detalleFavor.php?idFavor=<?php echo $favor['idFavor'] ?>">Ver más</a>
						</div>
						</div>
					</div>
<?php  
	$arreglo= $postulaciones -> fetch_assoc();
}
?>






</body>
</html>