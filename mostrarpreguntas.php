<?php
	function mostrarPreguntas($idFavor){
		$mysql = conectar();
		if (isset($mysql)){
			$traer = $mysql->query("SELECT * FROM pregunta WHERE idFavor = $idFavor"); //AGARRAR IDFAVOR DE ALGUN LADO
			if (isset($traer)) {
				$pregunta = $traer->fetch_assoc();	
			}	
		}
		if (!isset($pregunta)) {
?>

		 <div class="container">
      		<div class="well cajaPreguntas row">
        		<h1 style="text-align:center;">Todavía nadie ha hecho una pregunta sobre este favor.</h1>
      		</div>
    	</div>

<?php
		}else{
			while (isset($pregunta)) {
				$idUsuarioPreg = $pregunta['idUsuario'];
				$traernombre = $mysql->query("SELECT nombre FROM usuarios WHERE idUsuario = $idUsuarioPreg");
				if (isset($traernombre)) {
					$nombre = $traernombre->fetch_assoc();
				}
?>
			 <div class="container">
	      		<div class="well cajaPreguntas row">
	        		<h3 style="text-align:left;"><?php echo $nombre['nombre'] ?> pregunta: <?php echo $pregunta['contenido'] ?></h1>
	        		<h3 style="text-align:left;">Respuesta del usuario: <?php echo $pregunta['respuesta'] ?></h1>
	      		</div>
	    	</div>
<?php
			  $pregunta = $traer->fetch_assoc();
			}
		}
	}
?>