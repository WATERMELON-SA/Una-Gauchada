<?php
	include "navbar.php";
?>
<br>
<div class="text-center">
	<h1>Búsqueda avanzada</h1>
</div>


<div class="container" style="margin-top:3%">

	<!-- FILTRADO POR CATEGORIA-->
	<div style="margin-left:15%; display:inline;">
		<span style="font-size:200%;">Categoria:</span>
		<span>
			<select style="font-size:150%" id="select" name="select">
				<option value="#">Seleccionar</option>
				<?php
					include "listador.php";
					include "conexion.php";
					$conection = conectar();
					listarCategorias($conection);
				?>
			</select>
		</span>
	</div>
	
	






	<!-- FILTRADO POR ORDEN-->
	<div style="margin-left:15%; display:inline">
		<span style="font-size:200%;">Ordenar por:</span>
		<span>
			<select style="font-size:150%" id="select" name="select">
				<option value="#">Seleccionar</option>
				<option value="idLocalidad">Localidad</option>
				<option value="titulo">Titulo</option>
				<option value="idCategoria">Categoria</option>
				<option value="fechaviejo">Más viejos</option>
				<option value="fechanuevo">Más nuevos</option>
			</select>
		</span>
	</div>

</div>


