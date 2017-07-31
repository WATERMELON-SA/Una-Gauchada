<?php include "navbar.php"; include "listador.php"; ?>
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
          <label class="control-label " for="creditos">Puntaje: <?php  echo $arreglo['puntaje'] ?></label>
        </div>  
       <div class="form-group col-sm-offset-4">
          <label class="control-label" for="creditos">Reputacion: <?php echo listarReputacion($mysql,$arreglo['puntaje']); ?></label>
        </div>  
      <div class="form-group col-sm-offset-4">
          <label class="control-label " for="creditos">Cantida de créditos: <?php  echo $_SESSION['creditos'] ?></label>
        </div>  
      <div class="form-group col-sm-offset-4">
          <label class="control-label " for="calif_pend">Calificaciones pendientes: <?php  echo $_SESSION['calif_pend'] ?></label>
        </div>  
        </div>
</div>
        <br>
        <a style="margin-left: 1%; margin-top: 1%" class="btn btn-primary " href="misGauchadas.php">Mis gauchadas</a>
        <a style="margin-left: 1%; margin-top: 1%" class="btn btn-primary " href="listarPostulantes.php">Postulantes en mis gauchadas</a>
        <a style="margin-left: 1%; margin-top: 1%" class="btn btn-primary " href="misPostulaciones.php">Favores en los que me postule</a>
        <button type="button" style="margin-left: 1%; margin-top: 1%" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
        Historial de puntuaciones
      </button>
</div>
</body>

 <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Historial de puntuaciones</h4>
            </div>
            <div class="modal-body">
            <?php
            $traer=$mysql->query("SELECT * FROM favor WHERE idUsuarioCumple=$id and puntuacion is not null");
            if(isset($traer))
                $arreglo=$traer->fetch_assoc();
            if (isset($arreglo)) {
              while (isset($arreglo)) {
                $puntuacion=$arreglo['puntuacion'];
                if ($puntuacion==1)
                  $puntuacion='Positivo';
                elseif($puntuacion==0)
                  $puntuacion='Neutro';
                else $puntuacion='Negativo';
            ?>
              
                <b>Favor: <?php echo $arreglo['titulo']; ?></b>
                <br>
                Puntuacion: <?php echo $puntuacion; ?>
                <br>
                Comentario del dueño: <?php echo $arreglo['comentario']; ?>
                <br>
                <br>

            <?php
            $arreglo= $traer->fetch_assoc();
              }
            }
            else
              echo("No has sido puntuado en ningun favor");
            ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>



</html>