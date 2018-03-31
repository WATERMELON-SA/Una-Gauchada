<?php
	if (isset($_GET['alert'])) {
?>
<script>alert("Por favor inicia sesión para acceder a esta página.")</script>
<?php
	}
	include "navbar.php";
?>
<body style="text-align: center; background-color: #e6e6e6;">

	<?php 
		include "inicioCorrecto.php";
		if(isset ($_SESSION['nombre'])){
			header("Location: index.php");
		}
	?>
		
		<h2 style="font-size: 40px">Iniciar sesion</h2>
		<form action="iniciarSesion.php"  method="POST">
			<div class="form-group">
				<label>Email</label></br>
				<input type="text" maxlength="40" class="form-control" style="width: 25%; display: inline-block;;" id="email" name="email" placeholder="Correo electrónico" autofocus><br><br>
			</div>
			<div class="form-group">
				<label>Contrase&ntilde;a</label></br>
				<input type="password" maxlength="40" id="pass" class="form-control" style="width: 25%; display: inline-block;" placeholder="Contraseña" name="contraseña"><br><br>
			</div>
			<input type="submit" class="btn btn-primary" name="Ingresar" value="Ingresar" style="width: 20%; height: 1cm;">
			<br>
			<br>
			&iquest;A&uacute;n no tienes una cuenta? <a href="registrarse.php" style="text-decoration:none"> Registrate </a>
		</form>

	

</body>
</html>