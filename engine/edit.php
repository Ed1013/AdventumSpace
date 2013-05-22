<!DOCTYPE html>
<?php include_once('../misc/list.php'); 
	session_start(); 
	check_logged();
	check_perm();
?>
<?php include_once('../engine/display.php');
	  include_once('../engine/dbAdm.php') ?>

<html lang="es_MX">

<head>
	<meta charset="iso-8859" />
	<title>Adventum Space</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<link rel="shortcut icon" href="../img/satelite.ico" >

</head>

<body>
<?php include_once("analytics.php") ?>

	<div id="container">

		<?php sidebar(); ?>
		
		<div id="mainContent">			
			<?php 
			
			
			if(isset($_POST["borrar"])){
						if(borrarDatos($_POST)){
							echo '<h3>Se han borrado los datos del registro seleccionado</h3>';
						} else {
							echo '<h3>Hubo un error al borrar</h3>';
						}
			} else if(isset($_POST["tipo_edit"])){						
					if(alterarDatos($_POST)){
						echo '<h3>Se han actualizado los datos</h3>';
					} else {
						echo '<h3>Hubo un error al insertar</h3>';
					}
			
			} else if(isset($_POST["tipo"])){					
					$tipo = $_POST["tipo"];
					$elemento = $_POST["elemento"];
					echo '<h2>Edicion de "'.$elemento.'"</h2>';
					
					echo '<h4>Tipo: '.$tipo.'</h4>';
					$conexion=conectarBD();
					
					if($conexion){
						if($tipo=="habilidades"){
							$datos = mysql_query("SELECT * FROM `habilidades` WHERE Nombre_Habilidad='".$elemento."'");	
							$info = mysql_fetch_array($datos);	
							echo '<div class="entrada">'.
								 '<form id="habilidad" method="post" action="edit.php">';
							echo '<h3>Nombre <input type="text" name="nombre" value="'.$info['Nombre_Habilidad'].'">
								  <input type="hidden" name="original" value="'.$info['Nombre_Habilidad'].'"></h3>';
							echo '<table width="680" border="1">' .  
								 '<tr><td>Efecto</td><td><textarea name="Efecto" cols="" rows="5" id="efecto">'.$info['Efecto'].'</textarea></td></tr>'.
								 '<tr><td>Costo</td><td><input name="costo" type="text" id="costo" size="3" value="'.$info['Costo_AP'].'"></td></tr>'.
								 '<tr><td>Vocacion</td><td><select name="vocacion" id="vocacion">
									<option>'.$info['Vocacion'].'</option>
									<option>Cientifico</option>
									<option>Combatiente</option>
									<option>Medico</option>
									<option>Mercenario</option>
									<option>Prodigio</option>
									<option>Soldado</option>
									<option>Diplomatico</option>
									<option>Todas</option>					  
									</select></td></tr>'.
								 '<tr><td>Raza</td><td><select name="raza" id="raza">
									<option>'.$info['Raza'].'</option>
									<option>Humano</option>
									<option>Androide</option>
									<option>Xeylen</option>
									<option>Todas</option>             					  
								 </select></td></tr>'.
								 '<tr><td>Requerimientos</td><td><textarea name="requerimientos" cols="" rows="5" id="requerimientos">'.$info['Requerimiento'] . '</textarea></td></tr>								 
								 </table></form><br />
								 <center><button type="submit" class="boton" name="tipo_edit" value="habilidades" form="habilidad">Cambiar</button></center>
								 <div align="right"><button type="submit" class="boton" name="borrar" value="habilidades" form="habilidad">Borrar</button></div>
								 </div>';					
						} else if ($tipo=="items"){
							$datos = mysql_query("SELECT * FROM `items` WHERE Nombre_Item='".$elemento."'");	
							$info = mysql_fetch_array($datos);
							echo '<div class="entrada">'.
								 '<form id="item" method="post" action="edit.php">';
							echo '<h3>Nombre <input type="text" name="nombre" value="'.$info['Nombre_Item'].'">
								  <input type="hidden" name="original" value="'.$info['Nombre_Item'].'"></h3>';									  
							echo '<table width="525" border="1">' .  
								 '<tr><td>Descripcion</td><td><textarea name="descripcion" cols="" rows="5" id="descripcion">'.$info['Descripcion'].'</textarea></td></tr>'. 
								 '<tr><td>Efecto</td><td><textarea name="efecto" cols="" rows="5" id="efecto">'.$info['Efecto'].'</textarea></td></tr>'.
								 '<tr><td>Precio</td><td><input name="costo" type="text" id="costo" size="7" value="'.$info['Precio'].'"></td></tr>'.
								 '<tr><td>Peso</td><td><input name="peso" type="text" id="peso" size="3" value="'.$info['Peso'] . '"></td></tr>
								  <tr><td>Imagen</td><td><select name="imagen" id="imagen">									
									<option>'.basename($info['imagen']).'</option>
									<option></option>';
									listaDirectorio("../consultas/img/items");							
							echo '</select>								  								  
								  </td></tr>
								 </table></form><br />								 
								 <center><button type="submit" class="boton" name="tipo_edit" value="items" form="item">Cambiar</button></center>
								 <div align="right"><button type="submit" class="boton" name="borrar" value="items" form="item">Borrar</button></div>
								 
								 </div>';								  
						
						} else if ($tipo=="armas"){
							$datos = mysql_query("SELECT * FROM `armas` WHERE Nombre_Arma='".$elemento."'");	
							$info = mysql_fetch_array($datos);		
							echo '<div class="entrada">'.
								 '<form id="arma" method="post" action="edit.php">';
							echo '<h3>Nombre <input type="text" name="nombre" value="'.$info['Nombre_Arma'].'">
								  <input type="hidden" name="original" value="'.$info['Nombre_Arma'].'"></h3>';	
							echo '<table width="525" border="1">' .  
								 '<tr><td>Daño</td><td><input type="text" name="dmg" id="dmg" size="7" value="'.$info['Damage'].'"></td></tr>'. 
								 '<tr><td>Efecto</td><td><textarea name="efecto" cols="" rows="5" id="efecto">'.$info['Efecto_Arma'].'</textarea></td></tr>'.
								 '<tr><td>Cartucho</td><td><input type="text" name="cartucho" id="cartucho" size="3" value="'.$info['Cartucho'].'"></td></tr>'.
								 '<tr><td>Alcance</td><td><input type="text" name="alcance" id="alcance" size="3" value="'.$info['Alcance'].'"></td></tr>'.
								 '<tr><td>Modificacion</td><td><input type="text" name="mods" id="mods" size="3" value="'.$info['Modificaciones'].'"></td></tr>'.
								 '<tr><td>Requerimiento de Uso</td><td><textarea name="requerimientos" cols="" rows="5" id="requerimientos">'.$info['Requerimiento'].'</textarea></td></tr>'.
								 '<tr><td>Precio</td><td><input type="text" name="precio" id="precio" size="3" value="'.$info['Precio'].'"></td></tr>'.
								 '<tr><td>Peso</td><td><input type="text" name="peso" id="peso" size="3" value="'.$info['Peso'].'"></td></tr>';							
							echo '<tr><td>Imagen</td><td><select name="imagen" id="imagen">									
									<option>'.basename($info['imagen']).'</option>
									<option></option>';
									listaDirectorio("../consultas/img/armas");							
							echo '</select>								  								  
								  </td></tr>
								  </td></tr>
								 </table></form><br />								 
								 <center><button type="submit" class="boton" name="tipo_edit" value="armas" form="arma">Cambiar</button></center>
								 <div align="right"><button type="submit" class="boton" name="borrar" value="armas" form="arma">Borrar</button></div>
								 
								 </div>';									 
						
						} else if ($tipo=="armaduras"){
							$datos = mysql_query("SELECT * FROM `armadura` WHERE Nombre_Armadura='".$elemento."'");
							$info = mysql_fetch_array($datos);
							echo '<div class="entrada">'.
								 '<form id="armadura" method="post" action="edit.php">';
							echo '<h3>Nombre <input type="text" name="nombre" value="'.$info['Nombre_Armadura'].'">
								  <input type="hidden" name="original" value="'.$info['Nombre_Armadura'].'"></h3>';
							echo '<table width="525" border="1">' .  
								 '<tr><td>Efecto</td><td><textarea name="efecto" cols="" rows="5" id="efecto">'.$info['Efecto'].'</textarea></td></tr>'.
								 '<tr><td>Bono DEF</td><td><input name="def" type="text" id="def" size="5" value="'.$info['Bono_DA'].'"></td></tr>'.
								 '<tr><td>Agilidad Maxima</td><td><input name="agl" type="text" id="agl" size="5" value="'.$info['Max_AGL'].'"></td></tr>'.
								 '<tr><td>Requerimiento de Uso</td><td><textarea name="requerimientos" cols="" rows="5" id="requerimientos">'.$info['Requerimiento'].'</textarea></td></tr>'.
								 '<tr><td>Precio</td><td><input name="precio" type="text" id="costo" size="7" value="'.$info['Precio'].'"></td></tr>'.
								 '<tr><td>Peso</td><td><input name="peso" type="text" id="peso" size="3" value="'.$info['Peso'].'"></td></tr></table>';
							echo '<tr><td>Imagen</td><td><select name="imagen" id="imagen">									
									<option>'.basename($info['imagen']).'</option>
									<option></option>';
									listaDirectorio("../consultas/img/armaduras");								 
							echo '</select>								  								  
								  </td></tr>
								  </td></tr>
								 </table></form><br />								 
								 <center><button type="submit" class="boton" name="tipo_edit" value="armaduras" form="armadura">Cambiar</button></center>
								 <div align="right"><button type="submit" class="boton" name="borrar" value="armaduras" form="armadura">Borrar</button></div>
								 
								 </div>';							
						} else if ($tipo=="oponentes"){
							$datos = mysql_query("SELECT * FROM `npc_oponente` WHERE Nombre='".$elemento."'");
							$info = mysql_fetch_array($datos);
							echo '<div class="entrada">'.
								 '<form id="npc" method="post" action="edit.php">';
							echo '<h3>Nombre <input type="text" name="nombre" value="'.$info['Nombre'].'">
								  <input type="hidden" name="original" value="'.$info['Nombre'].'"></h3>';
							echo '<div style="overflow:hidden;">';
							echo '<div style="float:left; margin-left:80px;">';
							echo '<table width="120" border="1">' .  
								 '<tr><td>HP</td><td><input type="text" name="hp" size="3" value="'.$info['HP'].'"></td></tr>'. 
								 '<tr><td>Tipo</td><td><select name="tipo"><option>'.$info['Tipo'].'</option><option>oponente</option><option>npc</option></select></td></tr>'.
								 '<tr><td>ATK</td><td><input type="text" name="atk" size="3" value="'.$info['ATK'].'"></td></tr>'.
								 '<tr><td>ATK/Dist.</td><td><input type="text" name="atk_dist" size="3" value="'.$info['ATK_Distancia'].'"></td></tr>'.
								 '<tr><td>DEF</td><td><input type="text" name="def" size="3" value="'.$info['DEF'].'"></td></tr>'.
								 '<tr><td>AP</td><td><input type="text" name="ap" size="3" value="'.$info['AP'].'"></td></tr>'.
								 '<tr><td>Armadura</td><td><input type="text" name="armadura" size="3" value="'.$info['Armadura'].'"></td></tr>'.
								 '<tr><td>Tamaño</td><td><select name="tamano">
									<option>'.$info['Tamano'].'</option>
									<option></option>
									<option>Mínimo</option>
									<option>Diminuto</option>
									<option>Minúsculo</option>
									<option>Pequeño</option>
									<option>Medio</option>
									<option>Grande</option>
									<option>Gigante</option>
									<option>Colosal</option>
									<option>Gargantual</option>
									</td></tr>'.
								 '<tr><td>Velocidad</td><td><input type="text" name="velocidad" size="3" value="'.$info['Velocidad'].'"></td></tr></table>';
							echo '</div>';
							echo '<div style="float:right; margin-right:160px;">';
							echo '<table width="120" border="1">'.
								 '<tr><td>FRZ</td><td><input type="text" name="frz" size="3" value="'.$info['FRZ'].'"></td></tr>'.
								 '<tr><td>AGL</td><td><input type="text" name="agl" size="3" value="'.$info['AGL'].'"></td></tr>'.
								 '<tr><td>RES</td><td><input type="text" name="res" size="3" value="'.$info['RES'].'"></td></tr>'.
								 '<tr><td>INT</td><td><input type="text" name="int" size="3" value="'.$info['INT'].'"></td></tr>'.
								 '<tr><td>SAB</td><td><input type="text" name="sab" size="3" value="'.$info['SAB'].'"></td></tr>'.
								 '<tr><td>CAR</td><td><input type="text" name="car" size="3" value="'.$info['CAR'].'"></td></tr></table>';
							echo '</div>';
							echo '</div>';
							
							echo '<div align="center">';
							echo '<center><p>Imagen</p><p><select name="imagen" id="imagen">									
									<option>'.basename($info['imagen']).'</option>
									<option></option>';
									listaDirectorio("../consultas/img/oponentes");								 
							echo '</select></p></center>';
							echo '</div>';
							
							echo '<div align="center">';
							echo '<button type="submit" class="boton" name="tipo_edit" value="oponentes" form="npc">Cambiar</button>';
							echo '</div></form>';
							
							echo '<div style="overflow:hidden;">';							
							echo '<div style="float:left; margin-left:100px;">'.
								 '<p align="center">Editar:</p><p><a href="#" onclick="window.open(\'../engine/sets.php?set=armas&original='.$info['Nombre'].'\', \'newwindow\', \'width=350, height=300\'); return false;" class="boton">Set Armas</a></p>';							
							echo '</div>';							
							echo '<div style="float:right; margin-right:100px;">'.
								 '<p align="center">Editar:</p><p><a href="#" onclick="window.open(\'../engine/sets.php?set=habilidades&original='.$info['Nombre'].'\', \'newwindow\', \'width=350, height=300\'); return false;" class="boton">Set Habilidades</a></p>';
							echo '</div>';
							echo '</div>';
							
							echo '<div align="right"><button type="submit" class="boton" name="borrar" value="oponentes" form="npc">Borrar</button></div>';
							echo '</div>';
						
						} else {
							echo '<h2>Tipo no valido: '.$tipo.'</h2>';
						}
					} else {
						'<p>Error en la conexion a la Base de Datos</p>';
					}
			} else {
				echo '<h2>Tipo no Valido</h2>';
			
			}
								
			?>
			<br /><center><a href="http://ed.site40.net/AdventumSpace/consultas/default.php">Regresar</a></center>
			<p>&nbsp;</p>
		</div> <!-- fin mainContent -->

	</div> <!-- fin container -->
</body>
</html>