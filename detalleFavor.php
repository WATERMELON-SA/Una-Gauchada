<?php include "navbar.php";  
      if(!(isset ($_SESSION['nombre']))){
        header("Location: iniciarSesion.php?alert");
    }
?>

<body style="padding-top: 50px;">
<div class="container">
  <?php
    include "conexion.php";
    include "listador.php";
    $conexion = conectar();
    $idFavor = $_GET['idFavor'];
    $traerFavor = $conexion->query("SELECT * FROM favor WHERE idFavor = $idFavor");
    $favor = $traerFavor->fetch_assoc();
    $idUsuario = $favor['idUsuario'];
    $traerNombre = $conexion->query("SELECT * FROM usuarios WHERE idUsuario = $idUsuario");
    $favorNombre = $traerNombre->fetch_assoc();
    $idCategoria = $favor['idCategoria'];
    $idLocalidad = $favor['idLocalidad'];
    $traercategoria = $conexion->query("SELECT nombre FROM categoria WHERE idCategoria = $idCategoria");
    if (isset($traercategoria)) {
      $arreglocategoria = $traercategoria->fetch_assoc();
    }
    $traerlocalidad = $conexion->query("SELECT nombre FROM localidad WHERE idLocalidad = $idLocalidad");
    if (isset($traerlocalidad)) {
      $arreglolocalidad = $traerlocalidad->fetch_assoc();
    }
    $idPostulante = $_SESSION['id'];
    $postulado= $conexion ->query("SELECT * FROM postula WHERE idUsuario= $idPostulante AND idFavor= $idFavor");
    $postulado= $postulado-> fetch_assoc();
  ?>

    <div class="container">
      <div class="well cajaDetalle row">
        <?php
              if (is_null($favor['contenidoimagen'])) {
            ?>
              <div class="cajaFoto col-lg-4 col-xs-4">
                <img style="margin-top:20%" class="img-responsive" src="logo.png" alt="">
              </div>
            <?php
              }else{
            ?>
            <div class="cajaFoto col-lg-4 col-xs-4">
              <img style="margin-top:20%" class="img-responsive" src="mostrarimagen.php?idFavor=<?php echo $favor['idFavor']?>" alt="">
            </div>
            <?php } ?>
        <div class="col-lg-8 col-xs-8" style="margin-top:5%">
          <h2><?php echo strtoupper($favor["titulo"])?></h2>
          <div class="separador"></div>
          <h2>Descripcion</h2>
          <h3><?php echo $favor["descripcion"] ?></h3>
          <div class="separador"></div>
          <h3>Peticionante: <?php echo $favorNombre['nombre']?></h3>
          <h3>Localidad:<?php echo $arreglolocalidad['nombre'] ?></h5>
          <h3>Categoria:<?php echo $arreglocategoria['nombre'] ?></h5>
          
          <?php 
            if ($_SESSION['id'] != $idUsuario)  {
              if(!$postulado){
          ?>
          <form method="POST" action="postularse.php">
            <label>Contale al dueño del favor por qué te tiene que elegir:</label>
            <textarea required class="form-control" type="text" name="comentario" style="resize: none"></textarea>
            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="idFavor" value="<?php echo $idFavor ?>">
            <br>
            <input type="submit" class="btn btn-primary" value="Ofrecerme">
          </form>
          <?php
              }
              else
                echo("<p style='color: green'> Ya te has postulado para este favor </p>");
            }
          elseif(is_null($favor['idUsuarioCumple'])){
          ?>
          <button class="btn btn-primary">Modificar Favor</button>
          <a onClick='if(confirm("¿Estas seguro que deseas borrar este favor?")) location.href ="borrarFavor.php?idFavor=<?php echo $idFavor; ?>";' class="btn btn-primary">Borrar</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php
      if(($_SESSION['id']==$idUsuario) AND (is_null($favor['idUsuarioCumple']))){
    ?>
    <h1>Postulantes:</h1>
    <?php
      listarPostulantesParaFavor(conectar(),$idFavor);
    }
    elseif ((!is_null($favor['idUsuarioCumple'])) and $idUsuario==$_SESSION['id']){
      $idCumplidor= $favor['idUsuarioCumple'];
      $usuarioCumple = $conexion->query("SELECT * FROM usuarios WHERE idUsuario = $idCumplidor");
      $usuarioCumple = $usuarioCumple ->fetch_assoc();
      ?>

      <h3 style="text-align: center;">Has elegido al usuario <a href="verPerfiles.php?idUser=<?php echo $usuarioCumple['idUsuario']?> "><?php echo $usuarioCumple['nombre']; ?></a> como gaucho 

      <?php
      if (is_null($favor['puntuacion'])){
        ?>
      
      ► <a href="infoContacto.php?idUsuario=<?php echo $idCumplidor?>&idFavor=<?php echo $idFavor?>"> Ver info contacto</a>
      <?php}  ?>
      </h3>
      <?php
    }
  }
    ?>
      <br>
    <h1>Preguntas:</h1>

      <?php  
      include "mostrarpreguntas.php";
      mostrarPreguntas($idFavor);
      if (($_SESSION['id'] != $idUsuario) and (is_null($favor['idUsuarioCumple'])))  {
    ?>
    <div class="container">
    <form class="form-horizontal" method="POST" action="hacerPregunta.php">
	    <div class="form-group">
	    	<label class="control-label col-sm-1" for="pregunta">Pregunta:</label>
		    <div class="col-sm-10">
		    	<textarea type="text" required class="form-control" style="resize: vertical;" name="pregunta">
				</textarea>
			</div>
		</div>
		<input type="hidden" name="idFavor" value="<?php echo $idFavor; ?>">
    <input class="btn btn-primary" type="submit" value="Preguntar" name="Preguntar">	
	</form>
	</div>
	<?php
      }
    ?>
    </div>
</body>
</html>