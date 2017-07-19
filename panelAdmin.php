<?php
  include "navbar.php";  
  if (!(isset($_SESSION['admin'])) OR (!$_SESSION['admin'])) {
    header("Location: index.php");
  }
?>

	<div class="container">
		<h1 style="text-align: center;">Funcionalidades de administrador</h1>
		<br>
		<br>
		<div style="text-align: center;">
      <a href="adminReputaciones.php" class="btn btn-default">
        Reputaciones
      </a>
			<a class="btn btn-default" href="#">Categorias</a>	
			<a class="btn btn-default" href="#">Ganancias</a>
			<a class="btn btn-default" href="#">Ranking de usuarios</a>
		</div>
	</div>