<?php
		if(isset($_GET['idFavor'])){
			$id=$_GET['idFavor'];
		}
		include "conexion.php";
		$link = conectar();
		if(isset($id)){
			$result = $link->query("SELECT contenidoimagen, tipoimagen FROM favor WHERE idFavor=$id");
		}
		if (isset($result)) {
			$row = mysqli_fetch_array($result);
		}
		mysqli_close($link);
		if (isset($row)){
			header("Content-type: " . $row['tipoimagen']);
			echo $row['contenidoimagen'];
		}
?>
