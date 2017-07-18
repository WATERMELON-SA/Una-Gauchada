<?php  
	include "navbaravanzado.php";
	include "conexion.php";
	$conection = conectar();
	$reputaciones = $conection -> query("SELECT * FROM reputacion ORDER BY valor_min");
	$total = $conection -> query("SELECT sum(valor_max-valor_min) as suma FROM reputacion ORDER BY valor_min");
	$total= $total -> fetch_assoc();
	$arreglo= $reputaciones-> fetch_assoc();
	$colores = ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Beige","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];
	$i = 0;
	$j= -1;
?>
<br>
<div class="container">
<div  class="progress" style="height: 60px;">
<?php  	
	while (isset($arreglo)){
		$j= $j + 1;
		$diferencia = $arreglo['valor_max'] - $arreglo['valor_min'];
		$diferencia = 100 * $diferencia / $total['suma'];
?>

  <div class="progress-bar" title="<?php echo $arreglo['nombre']; ?>" style="width: <?php echo $diferencia ?>%; background-color: <?php echo $colores[$i]; if ($i < sizeof($colores)) $i=$i +1; else $i=1; ?>">
  <b style="color:black;">
  <?php //echo $arreglo['nombre']; ?>
  <!--<br>-->
  <?php 
  	$rangos[$j]= $arreglo['valor_min']." a ".$arreglo['valor_max'];
  	echo $rangos[$j];
  	$arreglo2[$j]= $arreglo['nombre'];
  ?>
  </b>
  </div>
  <?php 
  		$arreglo = $reputaciones-> fetch_assoc();
	}
	?>
</div>

	<div class="col-sm-6 col-sm-offset-3" style="align-self: center;">
	<div style="width: 70%; text-align: center;" class="panel panel-default panel-center">
  <!-- Default panel contents -->
  <div class="panel-heading">Reputaciones</div>

  <!-- Table -->
  <table class="table">
		<tr>
			<th>Nombre reputacion</th>
			<!--<th>Color</th>-->
			<th>Rango</th>
		</tr>
		
		<?php
			for ($j; $j >=0 ; $j--) { 
		?>
			<tr>
			<td style="background-color:<?php echo $colores[$j];?> "><?php echo $arreglo2[$j];?></td>
			<!--<td style="background-color:<?php echo $colores[$j];?> "></td><-->
			<td><?php echo $rangos[$j]; ?></td>
			</tr>
		<?php
			}
		?>
		
	</table>  
	</div>
</div>
</div>
  
 