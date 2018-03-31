<?php 
	include "navbar.php";
	include "listador.php";
	include "conexion.php";
  ?>
<body>
	
		<div class="container">
			<h2>	Ranking de usuarios: </h2>

			<div class="table-responsive">
				<table class="table table-striped">
					<tr >
						<td style="font-weight: bold;">Ranking</td>
						<td style="font-weight: bold;">Usuario</td>
						<td style="font-weight: bold;">Puntaje</td>
						<td style="font-weight: bold;">Reputacion</td>
					</tr>
					<?php listarRanking(conectar());  ?>
				</table>
			</div>

		</div>

</body>
</html>