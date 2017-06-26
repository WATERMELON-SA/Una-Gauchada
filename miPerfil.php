<?php include "navbar.php" ?>
<body>
<div class="container ">
<?php
include "conexion.php";
$mysql = conectar();
if (isset($mysql)){
   $mail=$_SESSION['email'];
   $traer=$mysql->query("SELECT * FROM usuarios WHERE email='$mail'");
  if(isset($traer))
    $arreglo=$traer->fetch_assoc();
    $id= $_SESSION['id'];
    $locaUsu =$arreglo['idLocalidad'];
     $traerLoca=$mysql->query("SELECT * FROM localidad WHERE idLocalidad=$locaUsu");
  if(isset($traer))
      $localidad=$traerLoca->fetch_assoc();
   
    }
    

if (isset($_GET['pass'])){
 ?>
  <script type="text/javascript"> alert("Tu contraseña fue cambiada"); </script>
  <?php  

}






						
						if (is_null($arreglo['contenidoimagen'])) {
						?>
							<div style="float:left; margin-top: 10%;" class="cajaFoto col-xs-4">
								<img  class="img-responsive" src="logo.png" alt="">
							</div>
						<?php
							}else{
						?>
						<div  style="float:left; margin-top: 4%; margin-left: 5%" class="cajaFoto col-xs-4">
							<img style="margin-top:20%" class="img-responsive" src="mostrarimagenPerfil.php?idUsuario=<?php echo $arreglo ['idUsuario']?>" alt="">
						</div>
						<?php } ?>




<div class="row">
<div class="form-horizontal col-xs-8" style=" margin-top: 2%">
        <div class="form-group">
          <label class="control-label col-sm-2" for="nombre">Nombre:</label>
          <div class="col-sm-10">
            <p type="text" class="form-control-static"> <?php  echo $_SESSION['nombre'] ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Correo electrónico:</label>
          <div class="col-sm-10">
            <p class="form-control-static"> <?php  echo $_SESSION['email'] ?> </p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="fecha_nac">Fecha de nacimiento:</label>
          <div class="col-sm-10">
            <p type="date" class="form-control-static"> <?php  echo $_SESSION['fecha_nac'] ?></p>
          </div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
          <div class="col-sm-10">
            <p type="number" class="form-control-static"><?php  echo $_SESSION['telefono']; ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="localidad">Localidad:</label>
          <div class="col-sm-10">
            <p class="form-control-static" > <?php echo $localidad['nombre'] ?></p>
            </select>
          </div>
        </div>                                              
      <span class="glyphicon glyphicon-pencil" style="margin-left: 10%;"><a href="modificarPerfil.php">Modificar datos personales</a></span><br>
      <span class="glyphicon glyphicon-pencil" style="margin-left: 10%;"><a href="modificarContrasenia.php">Cambiar contraseña</a></span>
      <br>
      <br>
      <div class="form-group col-sm-offset-4">
          <label class="control-label col-sm-3" for="creditos">Cantida de créditos: <?php  echo $_SESSION['creditos'] ?></label>
        </div>  
      <div class="form-group col-sm-offset-4">
          <label class="control-label col-sm-3" for="calif_pend">Calificaciones pendientes: <?php  echo $_SESSION['calif_pend'] ?></label>
        </div>  
        </div>
</div>
        <br>
        <a class="btn btn-primary" href="#">Ver mis gauchadas</a>
        <a class="btn btn-primary" href="#">Ver mis comentarios en gauchadas</a>
        <a class="btn btn-primary" href="#">Ver mis calificaciones</a>
        <a class="btn btn-primary" href="listarPostulantes.php">Ver comentarios sobre mis gauchadas</a>
        <a class="btn btn-primary" href="misPostulaciones.php">Ver favores en los que me postule</a>
</div>
</body>