<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
	check_perm();
?>
<?php
	include_once('../misc/asdb.php');
	include_once('display.php');
	$tipo = $_GET["set"];
	$elemento = $_GET["original"];
	$item = $_GET["item"];
?>
<style type="text/css"> 
	a:link {
		color: #00FF00;
		text-decoration: none;
	}
	a:visited {
		text-decoration: none;
		color: #66FF33;
	}
	a:hover {
		text-decoration: underline;
		color: #00FFFF;
	}
	a:active {
		text-decoration: none;
		color: #00FF00;
	}
</style>
<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Set <?php echo $tipo;?></title>
	<link rel="shortcut icon" href="../img/satelite.ico" >
</head>


<body bgcolor="#000" text="#00ff13">
<?php include_once("analytics.php") ?>

<ul>
<?php
	$conexion=conectarBD();
	if($conexion){
		

		if($tipo=="A_agregar"){			
			if(isset($_POST["arma"])){
				$nuevo=$_POST["arma"];
				if( mysql_query("INSERT INTO  `set_armas` (`Nombre_NPC`,`Nombre_Arma`) VALUES('".$elemento."','".$nuevo."');")){
					echo '<p>Elemento agregado con exito a la lista</p>';
				} else {
					echo '<p>Error en el agregado</p>';
				}			
			
			} else {
				echo '<center><p>Agregar nueva Arma</p>';
				echo '<form id="arma" method="post" action="sets.php?set=A_agregar&original='.$elemento.'">';
				echo '<select name="arma">';
				listaArmas();
				echo '</select>';
				echo '<input type="submit" value="Agregar"></form></center>';
			}
			
			echo '<p align="center"><a href="sets.php?set=armas&original='.$elemento.'">Regresar</a></p>';
		
		} else if($tipo=="A_borrar"){
			if( mysql_query("DELETE FROM `set_armas` WHERE Nombre_NPC='".$elemento."' AND Nombre_Arma='".$item."'")){
				echo '<p>"'.$item.'" de "'.$elemento.'" eliminado con exito de la lista</p>';
			} else {
				echo '<p>Error en el borrado</p>';
			}
			
			echo '<p align="center"><a href="sets.php?set=armas&original='.$elemento.'">Regresar</a></p>';
			
		} else if($tipo=="H_agregar"){			
			if(isset($_POST["habilidad"])){
				$nuevo=$_POST["habilidad"];
				if( mysql_query("INSERT INTO  `set_habilidades` (`Nombre`,`Nombre_Habilidad`) VALUES('".$elemento."','".$nuevo."');")){
					echo '<p>Elemento agregado con exito a la lista</p>';
				} else {
					echo '<p>Error en el agregado</p>';
				}			
			
			} else {
				echo '<center><p>Agregar nueva Habilidad</p>';
				echo '<form id="habilidades" method="post" action="sets.php?set=H_agregar&original='.$elemento.'">';
				echo '<select name="habilidad">';
				listaHabilidades();
				echo '</select>';
				echo '<input type="submit" value="Agregar"></form></center>';
			}
			
			echo '<p align="center"><a href="sets.php?set=habilidades&original='.$elemento.'">Regresar</a></p>';
		
		} else if($tipo=="H_borrar"){
			if( mysql_query("DELETE FROM `set_habilidades` WHERE Nombre='".$elemento."' AND Nombre_Habilidad='".$item."'")){
				echo '<p>"'.$item.'" de "'.$elemento.'" eliminado con exito de la lista</p>';
			} else {
				echo '<p>Error en el borrado</p>';
			}
			
			echo '<p align="center"><a href="sets.php?set=habilidades&original='.$elemento.'">Regresar</a></p>';
			
		} else if($tipo=="armas"){
			echo '<h3 style="color:#ffffff;">Editar Armas </h3>';
			echo '<p>Armas de <b style="color:#ffffff;">'.$elemento.'</b>:</p>';
			$datos = mysql_query("SELECT * FROM `set_armas` WHERE Nombre_NPC='".$elemento."'");
			$i=0;
			if($datos){	
				while($info = mysql_fetch_array($datos)){
					echo '<p>Arma '.($i+1).' <b style="color:#66FFFF;">'.$info["Nombre_Arma"].'</b> <a href="sets.php?set=A_borrar&original='.$elemento.'&item='.$info["Nombre_Arma"].'">(Eliminar)</a></p>';
					$i++;
				}
				
			} else {
				echo '<p>No hay armas relacionadas con "'.$elemento.'"</p>';						 
			}
				
			if($i<3){
				echo '<center><a href="sets.php?set=A_agregar&original='.$elemento.'&item='.$info["Nombre_Arma"].'">Agregar Nueva</a></center>';
			}
			
			//fin de armas
		} else if($tipo=="habilidades"){
			echo '<h3 style="color:#ffffff;">Editar Habilidades </h3>';
			echo '<p>Habilidades de <b style="color:#ffffff;">'.$elemento.'</b>:</p>';
			$datos = mysql_query("SELECT * FROM `set_habilidades` WHERE Nombre='".$elemento."'");
			$i=0;
			if($datos){
				while($info = mysql_fetch_array($datos)){
					echo '<p>Habilidad '.($i+1).' <b style="color:#66FFFF;">'.$info["Nombre_Habilidad"].'</b> <a href="sets.php?set=H_borrar&original='.$elemento.'&item='.$info["Nombre_Habilidad"].'">(Eliminar)</a></p>';
					$i++;
				}
			} else {
				echo '<p>No hay habilidades relacionadas con "'.$elemento.'"';
			}
			
			if($i<25){
				echo '<center><a href="sets.php?set=H_agregar&original='.$elemento.'&item='.$info["Nombre_Habilidad"].'">Agregar Nueva</a></center>';
			}
			
		} else {
			echo '<p>Tipo no valido: '.$tipo.'</p>';	
		}
	} else {
		echo '<p>Error en la conexion a la base de datos</p>';
	}
?>
</ul>
</body>

</html>