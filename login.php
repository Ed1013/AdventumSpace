<?php 
	session_start(); 
	include("misc/list.php"); 
	
?>

<!DOCTYPE html>
<html lang="es_MX">

<style type="text/css">
.botonLogin {
	-moz-box-shadow:inset 0px 1px 0px 0px #000000;
	-webkit-box-shadow:inset 0px 1px 0px 0px #000000;
	box-shadow:inset 0px 1px 0px 0px #000000;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #000000), color-stop(1, #9e9e9e) );
	background:-moz-linear-gradient( center top, #000000 5%, #9e9e9e 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#9e9e9e');
	background-color:#000000;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #000000;
	display:inline-block;
	color:#ffffff;
	font-family:Courier New;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #361236;
}.botonLogin:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9e9e9e), color-stop(1, #000000) );
	background:-moz-linear-gradient( center top, #9e9e9e 5%, #000000 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#000000');
	background-color:#9e9e9e;
}.botonLogin:active {
	position:relative;
	top:1px;
}

</style>

<head>
	<meta charset="utf-8" />
	<title>Autenticacion</title>
	<link rel="shortcut icon" href="img/satelite.ico" >

</head>

<body background="./img/blackBG.jpg">
<?php include_once("engine/analytics.php") ?>
	<div id="container">
		<center><div id="mainContent" style="background-image: url(./img/plate.jpg); height: 480px; width: 700px; padding-top:45px;">
			<center><h1>Autenticacion</h1>
			<?php
				if ($_POST["ac"]=="log") { 
					 if ($USERS[$_POST["tipo"]]==md5($_POST["password"])) { // revisa la igualdad de la contraseña 
						  $_SESSION["logged"]=$_POST["tipo"]; //envia que existe el usario autenticado
					 } else { 
						  echo '<p>Nombre de usuario o contrase&ntilde;a incorrectos...</p>'; 
					 }; 
				};
				 
				if (array_key_exists($_SESSION["logged"],$USERS)) { // checar si el usuario esta autenticado 
					 echo '<p><b>Estas conectado.</b></p>';
					 echo '<p><a href="./consultas/"><input type="submit" value="Proceder a Pagina Principal" class="botonLogin"/></a><p>'; // si esta conectado
				} else {
					 echo '<form action="login.php" method="post"><input type="hidden" name="ac" value="log"> '; 
					 echo '<p><b>Usuario:</b></p><br /> <input type="text" name="tipo" /></p><br />'; 
					 echo '<b>Contrase&ntilde;a:</b></p><br /> <input type="password" name="password" /></p><br />'; 
					 echo '<p><input type="submit" value="Iniciar" class="botonLogin"/></p>'; 
					 echo '</form>'; 
				}; 
			?>
			</center>
		</div></center> <!-- fin mainContent -->
	</div> <!-- fin container -->

</body>
</html>