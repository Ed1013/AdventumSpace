<!DOCTYPE html>
<?php session_start();  ?>
<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Adventum Space</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>

<body bgcolor="#000" text="#00ff13">
<?php include_once("analytics.php") ?>

<?php session_destroy(); ?>
<center><h1>Final de Sesión</h1>
<p><a href="../login.php" class="boton">Login</a></p></center>


</body>

</html>