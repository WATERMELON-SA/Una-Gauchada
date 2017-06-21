<?php include "navbar.php";
include "conexion.php";
include "listador.php";
?>
<body>
	<div class="table-responsive">
	<table class="table table-striped">
		<tr>
		<td style="font-weight: bold; ">Nombre postulante</td>
		<td style="font-weight: bold; " >Titulo favor</td>

		</tr>
		<?php listarPostulantes(conectar(),$_SESSION['id']);  ?>
	</table>
</div>
</body>