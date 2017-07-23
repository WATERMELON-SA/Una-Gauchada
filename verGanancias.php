<?php
include 'navbar.php';
  if (!(isset($_SESSION['admin'])) OR (!$_SESSION['admin'])) {
    header("Location: index.php");
  }
  ?>
<body>



  <div class="container">
  	<h2>Ver ganancia entre fechas</h2>
  	<form action="verGanancias.php" class="form-inline" style="text-align: center; margin-top: 3%" method="POST">
  		<div class="form-group">
    		<label >Fecha inicio</label>
    		<input type="date" class="form-control" name="fecha_min" min="<?php echo (date('Y-m-d', mktime(0, 0, 0, 2, 3, 2017))) ?>" >
  		</div>
  		<div class="form-group">
    		<label >Fecha fin</label>
    		<input type="date" class="form-control" name="fecha_max" max="<?php echo (date('Y-m-d')); ?>">
  		</div>
  		<button  type="submit" value='1' name="boton" class="btn btn-primary">Ver</button>
  	</form>

<?php
include 'ganancias.php';
  ?>


  </div>
</body>

</html>