<?php include "navbar.php"  ?>

<body style="padding-top: 50px;">

<?php
  include "conexion.php";
  $conection= conectar();
  $idUser=$_GET['idUser'];
  $usuario = $conection -> query("SELECT * FROM usuarios WHERE idUsuario= '$idUser'");
  $usuario = $usuario -> fetch_assoc();
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
    </div>
  </div>





  </body>
</html>
