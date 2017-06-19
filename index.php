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

	<br><br><br>

	<div class="container">
		<?php
			include "mostrarFavores.php";
			mostrarFavores()
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