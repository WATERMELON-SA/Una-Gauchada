<?php
include 'navbar.php';
  if (!(isset($_SESSION['admin'])) OR (!$_SESSION['admin'])) {
    header("Location: index.php");
  }
  ?>
<body>


  <div class="container">
  	<h2>Ver ganancia entre fechas</h2>
  	<form name="ganancias" action="verGanancias.php" class="form-inline" style="text-align: center; margin-top: 3%" method="POST">
  		<div class="form-group">
    		<label >Fecha inicio</label>
    		<input required type="date" class="form-control" id="fecha_min"  name="fecha_min" max="<?php echo (date('Y-m-d')); ?>" min="<?php echo (date('Y-m-d', mktime(0, 0, 0, 2, 3, 2017))) ?>" >
  		</div>
  		<div class="form-group">
    		<label >Fecha fin</label>
    		<input required type="date" class="form-control"  id="fecha_max" name="fecha_max" min="<?php echo (date('Y-m-d', mktime(0, 0, 0, 2, 3, 2017))) ?>" max="<?php echo (date('Y-m-d')); ?>">
  		</div>
  		<button  type="submit" value='1' name="boton" class="btn btn-primary">Ver</button>
  	</form>


<?php
    include 'ganancias.php';
?>


  </div>
</body>

</html>