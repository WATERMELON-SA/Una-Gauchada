<?php include "navbaravanzado.php" ?>

	<div  style="text-align: center;" class="container"> 
		<h1> Iniciar sesion</h1>

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
		</form>

	</div>