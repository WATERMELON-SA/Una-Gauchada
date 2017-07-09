<?php
	include "navbar.php";
 	include "conexion.php";
	$mysql=conectar();
	$id=$_GET['idUsuario'];
	$idFavor=$_GET['idFavor'];
	$traer=$mysql->query("SELECT * FROM usuarios WHERE idUsuario=$id ");	
	$traer=$traer->fetch_assoc();
	$nombre=$traer['nombre'];
  ?>


  
  <body>

  	<div class="container">
  		<h2>Puntúa a <?php echo $nombre ?>!</h2>
  		<hr>
  		<form action="calificaciones.php?idUsuario=<?php echo $id  ?>&idFavor=<?php echo $idFavor?>" method="POST">
  			<label for="comentario"> Comentario:</label>
  			<textarea required name="comentario" class="form-control" rows="4"></textarea>
  			<div style="text-align: center; margin-top: 5%" >
  				<button onClick="puntuacion.value=-2;" href="index.php" type="submit"  class="btn btn-danger btn-lg">Negativo</button>
  				<button onClick="puntuacion.value=0;" type="submit"  style="background-color: grey; border-color: grey" class="btn btn-primary btn-lg" >Neutro</button>
  				<button onClick="puntuacion.value=1;" type="submit"  class="btn btn-success btn-lg">Positivo</button>
  			</div>
  			<input type="hidden" name="puntuacion" value=0. >
  		</form>
  		<a href="infoContacto.php?idUsuario=<?php echo $id  ?>&idFavor=<?php echo $idFavor?>"">Ir a info de contacto</a>
  	</div>
  	
  </body>
  </html>