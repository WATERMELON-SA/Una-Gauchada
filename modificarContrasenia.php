<?php include "navbar.php" ?>
<body>
<?php  
if (isset($_GET['actual'])){
 ?>
  <script type="text/javascript"> alert("Tus contraseña actual no coincide con la ingresada"); </script>
  <?php  

}

elseif (isset($_GET['nueva'])) {
   ?>
  <script type="text/javascript"> alert("Tu nueva contraseña no puede ser igual a la anterior"); </script>
  <?php  
}
elseif (isset($_GET['repetir'])) {
   ?>
  <script type="text/javascript"> alert("Tus contraseñas no coinciden en los ultimos dos campos"); </script>
  <?php  
}



?>

	<form class="form-horizontal" method="POST" action="validarNuevaContrasenia.php" style="margin-left: 20%; margin-top: 2%">
  <div class="form-group">
    <label for="actual" class="col-sm-2 control-label">Contraseña actual:</label>
    <div class="col-sm-5">
      <input type="password" name="vieja" required class="form-control" id="actual" placeholder="Contraseña actual">
    </div>
  </div>
  <div class="form-group">
    <label for="nueva" class="col-sm-2 control-label">Nueva contraseña:</label>
    <div class="col-sm-5">
      <input type="password" name="nueva" required class="form-control" id="nueva" placeholder="Contraseña nueva">
    </div>
  </div>
    <div class="form-group">
    <label for="repetir"   class="col-sm-2 control-label">Repetir nueva contraseña:</label>
    <div class="col-sm-5">
      <input type="password" name="repetir" required class="form-control" id="repetir" placeholder="Repertir nueva contraseña ">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Validar</button>
    </div>
  </div>
</form>

</body>