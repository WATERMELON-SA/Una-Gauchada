<?php
		if(isset($_GET['idUser'])){
			$id=$_GET['idUser'];
		}
		include "conexion.php";
		$conection = conectar();
		if(isset($id)){
			$result = $conection->query("SELECT contenidoimagen, tipoimagen FROM usuarios WHERE idUsuario='$id'");
		}
		if (isset($result)) {
			$row = mysqli_fetch_array($result);
		}
		if (isset($row)) {
			header("Content-type: " . $row['tipoimagen']);
			echo $row['contenidoimagen'];
		}
?>