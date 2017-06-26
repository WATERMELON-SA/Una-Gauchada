<?php 
	include "navbar.php"  ;
	include "conexion.php";
	$mysql=conectar();
	$id=$_GET['idUsuario'];
	$idFavor=$_GET['idFavor'];
	$traer=$mysql->query("SELECT * FROM usuarios WHERE idUsuario=$id ");	
	$traer=$traer->fetch_assoc();



?>
<body>
	<div class="container">

		<h2>Contacta a tu gaucho para que te pueda ayudar!</h2>
		<form class="form-horizontal" style="margin-top: 4%; margin-left: 25%;">
			<div class="form-group">
    			<label class="col-sm-2 control-label">Nombre:</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $traer['nombre']  ?></p>
    		</div>
  			</div>
  			<div class="form-group">
    			<label class="col-sm-2 control-label">Email:</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $traer['email']  ?></p>
    		</div>
  			</div>
  			<div class="form-group">
    			<label class="col-sm-2 control-label">Telefono:</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $traer['telefono']  ?></p>
    		</div>
  			</div>
		</form>
	
		<a href="puntuarUsuario.php?idUsuario=<?php echo $traer['idUsuario']?>&idFavor=<?php echo $idFavor?>"><h3> Califica a este usuario!</h3></a> (Puedes hacerlo ahora o mas tarde si quieres desde tu <a href="listarPostulantes.php">lista de postulantes</a>)
	</div>




</body>