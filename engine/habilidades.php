<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
?>
<?php
	include_once('../misc/asdb.php');
?>

<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Referencia Habilidades</title>
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>


<body bgcolor="#000" text="#00ff13">
<?php include_once("analytics.php") ?>

<h3>Lista de Habilidades</h3>
<ul>
<?php
	$conexion=conectarBD();	
	
	if($conexion){
		$datos = mysql_query("SELECT * FROM `habilidades` ORDER BY Nombre_Habilidad");
		while($info = mysql_fetch_array($datos)){
			echo '<li>'.$info["Nombre_Habilidad"].'</li>';
		
		}
	
	}
?>
</ul>
</body>

</html>