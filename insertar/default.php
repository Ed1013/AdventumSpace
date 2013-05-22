<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
	check_perm();
?>
<?php include_once('../engine/display.php'); ?>

<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Agregar Datos</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>

<body>
<?php include_once("../engine/analytics.php") ?>

	<div id="container">

		<?php sidebar(); ?>
		
		<div id="mainContent">
			<h1>Sección de <b style="color:#66FFFF;">Edición</b></h1>
			
			<p>Accede al enlace que corresponda a la informacion que quieres agregar</p><br>
			<div class="forma">
			<form action="insertar.php" method="GET">
			<div class="izquierda">
			<p>
			<input type="submit" class="boton" name="id_forma" value="items">
			<input type="submit" class="boton" name="id_forma" value="armas">
			<input type="submit" class="boton" name="id_forma" value="armaduras">
			</p>
			</div>
			<div class="derecha">
			<p>
			<input type="submit" class="boton" name="id_forma" value="habilidades">
			<input type="submit" class="boton" name="id_forma" value="oponentes">
			</p>
			</div>
			</form>
			</div>
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div> <!-- fin mainContent -->

	</div> <!-- fin container -->
</body>
</html>