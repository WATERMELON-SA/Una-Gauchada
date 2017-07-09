<?php
	include "navbar.php";
	include "listador.php";
	include "conexion.php";
	$conection = conectar();
?>

<div class="row">
		<div class="col-lg-4 well text-center" style="height:650px; margin-top:50px; margin-left:30%;">
			<form action="agregarcategoria.php" method="POST">
				<h2>Agregar una categoria:</h2>
				<h3>Nombre:</h3> <input type="text" name="categorianueva"><br><br>
				<input class="btn" type="submit" value="Agregar">
			</form>

			<div style="height:2px; background-color:black; margin-top:5%;"></div>

			<form action="eliminarcategoria.php" method="POST">
				<h2>Eliminar una categoria:</h2>
				<select>
					<?php listarCategorias($conection); ?>
				</select><br><br>
				<input class="btn" type="submit" value="Eliminar">
			</form>
			
			<div style="height:2px; background-color:black; margin-top:5%;"></div>

			<form action="modificarcategoria.php" method="POST">
				<h2>Modificar una categoria:</h2>
				<select>
					<?php listarCategorias($conection); ?>
				</select>
				<h3>Nuevo nombre:</h3> <input type="text" name="categoriamodificada"><br><br>
				<input class="btn" type="submit" value="Modificar">
			</form>
		</div>
</div>