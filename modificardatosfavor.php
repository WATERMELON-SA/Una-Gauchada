<?php
include "conexion.php";
$mysql = conectar();
	if (isset($mysql)){
		$existen = false;
		$traer=false;
		$id=$_POST['idFavor'];
		$postulantes = $mysql->query("SELECT * FROM postula WHERE idFavor = '$id'");
		$postulantes = $postulantes->fetch_assoc();
		if ((isset($postulantes)) AND ($postulantes!=false)) {
			$existen = true;
		}
		if (!$existen) {
			$titulo = $_POST['titulo'];
			$desc = $_POST['desc'];
			$idCategoria = $_POST['categoria'];
			$idLocalidad = $_POST['localidad'];
			$fecha_venc = $_POST['fecha_venc'];
			var_dump($id);
			if ($_FILES['imagen']['tmp_name']!='') {
		  		$filetype =$_FILES['imagen']['type'];
		  		$filecontent = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
		  		$arraytype=explode('/', $filetype);
		  		$deftype = $arraytype[1];			
				$traer=$mysql->query("UPDATE favor f SET f.titulo='$titulo',f.descripcion='$desc',f.idLocalidad='$idLocalidad',f.idCategoria='$idCategoria',f.contenidoimagen= '$filecontent', f.tipoimagen='$deftype', f.fecha_vencimiento='$fecha_venc' WHERE u.idFavor='$id'");
			}
			else{
				$traer=$mysql->query("UPDATE favor f SET f.titulo='$titulo',f.descripcion='$desc',f.idLocalidad='$idLocalidad',f.idCategoria='$idCategoria', f.fecha_vencimiento='$fecha_venc' WHERE f.idFavor='$id'");
			}
		}
		
	}

	if ((!$traer) AND ($existen)) {
		  $redireccion="modificarfavor.php?postulantes=true&idFavor=$id";
	}elseif ($traer){
		$redireccion="detalleFavor.php?idFavor=$id";
	}else{
		$redireccion="modificarfavor.php?idFavor=$id";
	}

	header("Location: $redireccion");
 	
 	


?>