<?php
	function mostrarPreguntas($idFavor){
		$mysql = conectar();
		if (isset($mysql)){
			$traer = $mysql->query("SELECT * FROM pregunta WHERE idFavor = $idFavor"); 
			if (isset($traer)) {
				$pregunta = $traer->fetch_assoc();	
			}	
		}
		$favor = $mysql -> query("SELECT * FROM favor WHERE idFavor=$idFavor");
		$favor= $favor ->fetch_assoc();
		if (!isset($pregunta)) {
?>

		 <div class="container">
      		<div class="well cajaPreguntas row">
        		<h1 style="text-align:center;">Nadie ha hecho una pregunta sobre este favor.</h1>
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
	        		<h3 style="text-align:left;"><?php echo $nombre['nombre'] ?> pregunta: <?php echo $pregunta['contenido'] ?></h3>

<?php
					if(((is_null($pregunta['respuesta']))||($pregunta['respuesta']!=''))) {
?>
	        		<h3 style="text-align:left;">Respuesta del usuario: <?php echo $pregunta['respuesta'] ?></h3>
<?php
				}
				elseif ($favor['idUsuario'] == $_SESSION['id']){
?>				
				 <form class="form-horizontal" method="POST" action="responderEnFavor.php">
	   			 <div class="form-group">
	    			<label class="control-label col-sm-1" for="pregunta">Respuesta:</label>
		    		<div class="col-sm-10">
		    			<textarea type="text" required class="form-control" style="resize: vertical;" name="respuesta">
						</textarea>
					</div>
				</div>
				<input type="hidden" name="idPregunta" value="<?php echo $pregunta['idPregunta']; ?>">
				<input type="hidden" name="idFavor" value="<?php echo $idFavor ?>">
    			<input class="btn btn-primary" type="submit" value="Responder" name="Responder">	
				</form>				        		
<?php
				}
?>
				</div>
				</div>
<?php
			  $pregunta = $traer->fetch_assoc();
			}
			}
		}
?>