<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
?>
<?php include_once('../engine/display.php'); ?>

<html lang="es_MX">

<head>
	<meta charset="utf-8" />
	<title>Adventum Space</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>

<body>
<?php include_once("../engine/analytics.php") ?>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="container">

		<?php sidebar(); ?>
		
		<div id="mainContent">
			<h1>Bienvenido a la Base de Datos</h1>
			<p align="center">Accede al enlace que corresponda a la informacion que quieres consultar</p><br>
			<div align="center">
			<form action="consulta.php" method="GET">
			<p><input type="submit" class="boton" name="id_consulta" value="items">
			<input type="submit" class="boton" name="id_consulta" value="armas">
			<input type="submit" class="boton" name="id_consulta" value="armaduras">
			<input type="submit" class="boton" name="id_consulta" value="habilidades">
			<input type="submit" class="boton" name="id_consulta" value="oponentes"></p>
			</form>
			</div>
			<br />
			<br />
			<div style="overflow:hidden;">
				<div style="float:left;">
					<!-- boton like de facebook -->
					<div class="fb-like" data-href="http://ed.site40.net/AdventumSpace/" data-send="false" data-width="450" data-show-faces="true" data-colorscheme="dark"></div>
				</div>
				<div style="float:right;">
					<!-- Video en forma "solo audio" mostrando solo barra de progreso -->
					<div style="position:relative;width:267px;height:25px;overflow:hidden;">
					  <div style="position:absolute;top:-276px;left:-5px">

						<iframe width="300" height="300" 
						  src="https://www.youtube.com/embed/q2tZc2E8soY?rel=0">
						</iframe>
					  </div>
					</div>		
				</div>
			</div>			
		<br />
		</div> <!-- fin mainContent -->

	</div> <!-- fin container -->
	
</body>
</html>