<?php
	include "navbar.php";
	include "listador.php";
	include "conexion.php";
	$conection = conectar();
	if (isset($_GET['idCat'])) {
		$idcat = $_GET['idCat'];
		$categoria = $conection->query("SELECT * FROM categoria WHERE idCategoria = '$idcat'");
		$categoria = $categoria->fetch_assoc();
	}
	$error=false;
	$yaexiste=false;
	if (isset($_GET['categoriamodificada'])) {
		$nombre = $_GET['categoriamodificada'];
		$existe = $conection->query("SELECT * FROM categoria WHERE nombre = '$nombre'");
		$existe = $existe->fetch_assoc();
		if ((isset($categoria)) AND ($categoria!=false)) {
			$yaexiste=true;
		}
	}
	
	if ((isset($_GET['submit'])) AND ($_GET['categoriamodificada']!='') AND (!$yaexiste)) {
		$nombre = $_GET['categoriamodificada'];
		$modificar = $conection->query("UPDATE categoria SET nombre='$nombre' WHERE idCategoria = '$idcat'");
		header("Location: panelcategorias.php");
	}

	if((isset($modificar)) AND ($modificar==false)){
		$error = true;
	}
?>

<div class="container" style="margin-top:10%;">
<div class="row well">
			<?php
				if($error){
					echo "No se pudo modificar";
				}elseif ($yaexiste) {
					echo "Ya existe una categoria con ese nombre";
				}
			?>
			<form action="modificarcategoria.php" method="GET">
				<h2>Modificar categoria: <?php echo $categoria['nombre']; ?></h2>
				<h3>Nuevo nombre:</h3> <input type="text" name="categoriamodificada"><br><br>
				<input type="hidden" name="idCat" value="<?php echo $categoria['idCategoria']?>">
				<input class="btn" type="submit" value="Modificar" name="submit">
			</form>
		</div>
</div>
</div>
