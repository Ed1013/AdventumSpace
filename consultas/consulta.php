<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
?>
<?php include_once('../engine/display.php'); ?>

<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Adventum Space: <?php echo $_GET[id_consulta]; ?></title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>

<body>
<?php include_once("../engine/analytics.php") ?>
	<div id="container">

		<?php sidebar(); ?>
		
		<div id="mainContent">	
			<?php consulta() ?>
			<p>&nbsp;</p>
		</div> <!-- fin mainContent -->

	</div> <!-- fin container -->
</body>
</html>