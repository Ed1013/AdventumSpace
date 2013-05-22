<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
	check_perm();
?>

<?php 
	include_once('../engine/display.php');
	include_once('../engine/dbAdm.php');
?>

<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Insertar <?php echo $_GET["id_forma"];?></title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>

<body>
<?php include_once("../engine/analytics.php") ?>

	<div id="container">

		<?php sidebar(); ?>
		
		<div id="mainContent">	
			<?php 
				if(!isset($_POST["tipo_insert"])){
					echo '<h1 align="center">Agregar Datos</h1>';
					forma(); 
				} else {					
					echo '<h1 align="center">Datos Agregados</h1>';
					echo '<div class="entrada">';
					if(insertarDatos($_POST)){
						echo '<p>Se inserto a: <b style="color:#66FFFF;">' . $_POST["tipo_insert"].'</b></p>';
						despliegaDatos($_POST);
						echo '</div>';
					} else {
						echo '<h3>Hubo un error al insertar</h3>';
					}
				}
			
			
			?>
			<br /><center><a href="http://ed.site40.net/AdventumSpace/insertar/default.php">Regresar</a></center>
			<p>&nbsp;</p>			
		</div> <!-- fin mainContent -->

	</div> <!-- fin container -->
</body>
</html>