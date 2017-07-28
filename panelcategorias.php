<?php include "navbar.php";
include "conexion.php";
include "listador.php";
?>
<body>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-striped">
			<tr >
				<td style="font-weight: bold;">Categoria</td>
				<td style="font-weight: bold;">Acción</td>
			</tr>
			<?php listarCategoriasTabla(conectar());  ?>
		</table>
		<div class="container text-center well" style="width:30%;">
			<?php if (isset($_GET['erroragregar'])) {?>
				<h3>Ya existe una categoría con ese nombre.</h3>
			<?php
			}?>
				<h3>Agregar categoria:</h3>
				<form action="agregarcategoria.php" method="GET">
					<input type="text" name="categorianueva">
					<input class="btn" type="submit" value="Agregar" name="submit">
				</form>
		</div>
</div>
</div>
</div>
</body>
</html>