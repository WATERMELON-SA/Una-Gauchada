<?php include "navbar.php" ?>

<body style="background-color: #e6e6e6; padding-top: 50px;">

  <?php
    if (isset($_GET['comprado'])) {
  ?>
 	<script type="text/javascript"> alert("Tu compra se realizo exitosamente"); </script>
  <?php    
    }
  ?>



<div class="row" style="text-align:center">
		<h1 class="text-center text-primary subtitulo">Date una vuelta y fijate si podes ayudar</h1>
	</div>

	<br><br>
	
	<div style="margin-left:20%;">
		<span style="font-size:200%">Ordenar por:</span>
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
		<script>
			$('select').change(function() {
   				window.location.href = "index.php?order=".concat($(this).val());
			});
		</script>
	</div>

	
	<br>


	<div class="container">
		<?php
			include "mostrarFavores.php";
			if (isset($_GET['search'])){
				$search = $_GET['search'];
			}else{
				$search=false;
			}
			if(isset($_GET['order'])){
				$order=$_GET['order'];
			}else{
				$order=false;
			}
			mostrarFavores($search,$order);
		?>
		
	</div>
</div>

	  <footer class="footer">
      <div class="container">
        <p class="footerText subtitulo text-center">DEVELOPED BY Watermelon Web Development S.A.</p>
      </div>
    </footer>
</body>
</html>