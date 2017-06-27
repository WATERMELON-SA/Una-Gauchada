<?php include "navbar.php"  ?>

<body style="padding-top: 50px;">

<?php
  if (!(isset($_SESSION['id']))) {
    header("Location: index.php");
  }
  include "conexion.php";
  $conection= conectar();
  $idUser=$_GET['idUser'];
  $usuario = $conection -> query("SELECT * FROM usuarios WHERE idUsuario= '$idUser'");
  $usuario = $usuario -> fetch_assoc();
  $favoresCumplidos= $conection-> query("SELECT * FROM favor WHERE idUsuarioCumple='$idUser'");
  if (isset($favoresCumplidos)) {
    $arreglo= $favoresCumplidos->fetch_assoc();
  }
?>
  
  <br>
  <br>
  <div class="row">
    <div class="col-sm-offset-1 col-sm-2 col-md-4">
    <?php
              if (is_null($usuario['contenidoimagen'])) {
            ?>      
                <img style="text-align: center; margin-left: 50px; width: 200px; height: 250px;" class="img-responsive thumbnail" src="logo.png" alt="">

            <?php
              }else{
            ?>
           
              <img style="text-align: center; margin-left: 50px; width: 200px; height: 250px;" class="img-responsive thumbnail" src="mostrarFotoPerfil.php?idUser= <?php echo $idUser; ?>" alt="">

   	<?php 
            	} 
    ?>

    </div>

    <div class="col-sm-9 col-md-7">
      <label>Nombre:</label>
      <?php echo $usuario['nombre']; ?>
      <br>
       <label>Puntaje:</label>
      <?php echo $usuario['puntaje']; ?>
       <br>
       <label>Calificaciones pendientes:</label>
      <?php echo $usuario['calif_pend']; ?>
      <br>
       <label>Fecha de nacimiento:</label>
      <?php echo $usuario['fechanacimiento']; ?>
      <br>


      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Ver hitorial de puntuaciones
      </button>

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
            if (isset($arreglo)) {
              while (isset($arreglo)) {
            ?>
              
                <b>Favor: <?php echo $arreglo['titulo']; ?></b>
                <br>
                Puntuacion: <?php echo $arreglo['puntuacion']; ?>
                <br>
                Comentario del dueño: <?php echo $arreglo['comentario']; ?>
                <br>

            <?php
            $arreglo= $favoresCumplidos->fetch_assoc();
              }
            }
            else
              echo("Este usuario no ha sido puntuado en ningun favor");
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





  </body>
</html>
