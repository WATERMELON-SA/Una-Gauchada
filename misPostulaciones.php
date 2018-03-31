<?php include "navbar.php" ?>

<body style="background-color: #e6e6e6; padding-top: 50px;">

<?php 
	if (!isset($_SESSION['nombre'])) {
		header("Location: index.php");
	}
	include "conexion.php";
	$conectar = conectar();
	$id = $_SESSION['id'];
	$postulaciones= $conectar-> query("SELECT * FROM postula WHERE idUsuario=$id");
	$arreglo= $postulaciones -> fetch_assoc();
	if (isset($arreglo)){
		?>
		<h1 style="text-align: center;">Estos son los favores en los que te postulaste: </h1>
		<?php
	while (isset($arreglo)) {
		$idFavor = $arreglo['idFavor'];
		$favor = $conectar -> query("SELECT * FROM favor WHERE idFavor = $idFavor");
		$favor = $favor -> fetch_assoc();
		$idDueño= $favor['idUsuario'];
		$traernombre = $conectar->query("SELECT nombre FROM usuarios WHERE idUsuario = $idDueño ");
		if (isset($traernombre)) {
			$arreglonombre = $traernombre->fetch_assoc();
		}
		
		$descripcioncorta = substr($favor['descripcion'],0,170);
		if ($favor['activo'] == 1) {
			$estado= "En espera";
		}
		elseif ($favor['completo']==0) {
			$estado = "El favor ha sido borrado";
		}
			elseif ($favor['idUsuarioCumple']==$id) {
				$estado= "El usuario te ha elegido como gaucho";
			}
			else{
				$estado= "El usuario te ha rechazado";
			}
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
								<a href="verPerfiles.php?idUser=<?php echo $idDueño; ?>">
									<?php echo $arreglonombre["nombre"];?>
								</a>
							<br>
							<b>Estado: <?php echo $estado; ?></b>
							<br>
							<a href="detalleFavor.php?idFavor=<?php echo $favor['idFavor'] ?>">Ver más</a>
						</div>
						</div>
					</div>
<?php  
	$arreglo= $postulaciones -> fetch_assoc();
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