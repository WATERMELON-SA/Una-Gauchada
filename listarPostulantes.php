<?php include "navbar.php";
include "conexion.php";
include "listador.php";
?>
<body>
<div class="container-fluid">
	<div class="table-responsive">
	<table class="table table-striped">
		<tr >
			<td style="font-weight: bold;">Nombre postulante</td>
			<td style="font-weight: bold;">Titulo favor</td>
			<td style="font-weight: bold;">Comentario</td>
			<td style="font-weight: bold;">Estado favor</td>
		</tr>
		<?php listarPostulantes(conectar(),$_SESSION['id']);  ?>
	</table>
</div>
</div>
</body>
</html>