<?php
	include "navbar.php";
	include "conexion.php";
	include "listador.php";
	include "mostrar.php";
	$conection = conectar();
?>
<br>
<div class="text-center">
	<h1>Búsqueda avanzada</h1>
</div>

<?php
	if (isset($_GET['busqueda'])){
				$search = $_GET['busqueda'];
			}else{
				$search=false;
			}
			if(isset($_GET['order'])){
				$order=$_GET['order'];
			}else{
				$order=false;
			}
			if( (isset($_GET['localidad'])) AND ($_GET['localidad']!='#')) {
				$localidad = $_GET['localidad'];
			}else{
				$localidad= false;
			}
			if ( (isset($_GET['categoria'])) AND ($_GET['categoria']!='#')) {
				$categoria = $_GET['categoria'];
			}else{
				$categoria=false;
			}
?>



<div class="container" style="margin-top:3%; border:solid 3px black; border-radius:1%; width:30%;">

<form action="busquedaAvanzadaConGet.php" method="GET">

<br>

<div id="firstBox">
	<!-- FILTRADO POR CATEGORIA-->
	<div style="text-align:center; margin-top:1%;">
		<span style="font-size:200%;">Categoria:</span>
		<span>
			<select style="font-size:150%" id="select_categoria" name="categoria" >
				<option disabled selected value>Seleccionar</option>
				<?php
					listarCategoriasAvanzada($conection);
				?>
			</select>
		</span>
	</div>

	<!-- FILTRADO POR LOCALIDAD-->
	<div style="text-align:center; margin-top:1%;">
		<span style="font-size:200%;">Localidad:</span>
		<span>
			<select style="font-size:150%" id="select_localidad" name="localidad" >
				<option disabled selected value>Seleccionar</option>
				<?php
					listarLocalidades($conection);
				?>
			</select>
		</span>
	</div>
</div>

<div id="secondBox">
	<!-- FILTRADO POR ORDEN-->
	<div style="text-align:center; margin-top:1%;">
		<span style="font-size:200%;">Ordenar por:</span>
		<span>
			<select  style="font-size:150%" id="select_orden" name="order">
				<option disabled selected value>Seleccionar</option>
				<option value="idLocalidad">Localidad</option>
				<option value="titulo">Titulo</option>
				<option value="idCategoria">Categoria</option>
				<option value="fechaviejo">Más viejos</option>
				<option value="fechanuevo">Más nuevos</option>
			</select>
		</span>
	</div>

	<div style="text-align:center; margin-top:1%;">
		<span style="font-size:200%;">Búsqueda: </span>
		<input type="text" name="busqueda">
	</div>

	<div style="text-align:center; margin-top:1%;">
		<span>
			<input class="btn" type="Submit" value="Filtrar" name="filter">
		</span>
	</div>
</div>


</form>




<br>

</div>
<?php
if (isset($_GET['filter'])) {
	if ((isset($localidad)) AND ($localidad!=false)) {
		$traerlocalidad = $conection->query("SELECT * FROM localidad WHERE idLocalidad = $localidad");
		$localidadmuestra = $traerlocalidad->fetch_assoc();
		$localidadmuestra =  $localidadmuestra['nombre'];
	}else{
		$localidadmuestra ='';
	}
	if ((isset($categoria)) AND ($categoria!=false)) {
		$traercategoria = $conection->query("SELECT * FROM categoria WHERE idCategoria = $categoria");
		$categoriamuestra = $traercategoria->fetch_assoc();
		$categoriamuestra = $categoriamuestra['nombre'];
	}else{
		$categoriamuestra='';
	}
?>
	<h3 style="text-align:center;"><?php echo ("Estás filtrando por ". $localidadmuestra . " - " . $categoriamuestra . "."); ?></h3>

<?php
	}
	
?>

<br><br>

<!-- MUESTRO FAVORES -->
<div>
	

	<?php
		mostrarFavores($search,$order,$localidad,$categoria,$conection);
	?>
		


</div>
 <footer class="footer">
      <div class="container">
        <p class="footerText subtitulo text-center">DEVELOPED BY Watermelon Web Development S.A.</p>
      </div>
    </footer>
</body>
</html>