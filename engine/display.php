<?php
	include_once('../misc/asdb.php');
	
	function sidebar(){
	
		echo '
			<div id="sidebar1">
			<h3><a href="http://ed.site40.net/AdventumSpace/consultas/default.php"><img src="../img/logo_FN.png" alt="logo" width="171" height="149" border="1" /></a></h3>
			<h3>Adventum Space Database</h3>
			<p><a href="http://ed.site40.net/AdventumSpace/consultas/consulta.php?id_consulta=items" class="boton">Items</a></p>
			<p><a href="http://ed.site40.net/AdventumSpace/consultas/consulta.php?id_consulta=armas" class="boton">Armas</a></p>
			<p><a href="http://ed.site40.net/AdventumSpace/consultas/consulta.php?id_consulta=armaduras" class="boton">Armaduras</a></p>
			<p><a href="http://ed.site40.net/AdventumSpace/consultas/consulta.php?id_consulta=habilidades" class="boton">Habilidades</a></p>
			<p><a href="http://ed.site40.net/AdventumSpace/consultas/consulta.php?id_consulta=oponentes" class="boton">Oponentes</a></p>';
		
		if($_SESSION["logged"]=='administrador'){		
			echo '<br /><p><a href="http://ed.site40.net/AdventumSpace/insertar" class="boton">Agregar Datos</a></p>';		
		}
		
		echo '<br /><a href="http://ed.site40.net/AdventumSpace/engine/cerrar.php"><p style="font-size:smaller;">Cerrar Sesion</p></a>';
		echo '</div> <!-- fin sidebar1 -->';				
	
	}

	
	function consulta(){
		$conexion=conectarBD();		
		$tipo = $_GET[id_consulta];
		
		if($conexion){
			if($tipo=="items"){			
				echo '<h1>Items</h1><br />';
				$datos = mysql_query("SELECT * FROM `items` ORDER BY Nombre_Item");
				while($info = mysql_fetch_array($datos)){
					echo '<div class="entrada">'.
						 '<img src="'.$info['imagen'] .'" alt="imagen" /><h3>'.$info['Nombre_Item'] .'</h3><table width="525" border="1">' .  
						 '<tr><td>Descripcion</td><td>'.$info['Descripcion'].'</td></tr>'. 
						 '<tr><td>Efecto</td><td>'.$info['Efecto'].'</td></tr>'.
						 '<tr><td>Precio</td><td>'.$info['Precio'].' creditos</td></tr>'.
						 '<tr><td>Peso</td><td>'.$info['Peso'] . ' gr.</td></tr></table>';
						if(($_SESSION["logged"]=='administrador')){
							echo '<div align="right"><form id="editar" method="post" action="../engine/edit.php">
							<input type="hidden" name="elemento" value="'.$info['Nombre_Item'].'">
							<button type="submit" class="boton" name="tipo" value="items">Editar</button></form></div>';
						}
						echo '</div>';
				}

			} else if($tipo=="armas"){
				echo '<h1>Armas</h1><br />';
				$datos = mysql_query("SELECT * FROM `armas` ORDER BY Nombre_Arma");
				while($info = mysql_fetch_array($datos)){
					echo '<div class="entrada">'.
						 '<img src="'.$info['imagen'] .'" alt="imagen" /><h3>'.$info['Nombre_Arma'] .'</h3><table width="525" border="1">' .  
						 '<tr><td>Daño</td><td>'.$info['Damage'].'</td></tr>'. 
						 '<tr><td>Efecto</td><td>'.$info['Efecto_Arma'].'</td></tr>'.
						 '<tr><td>Cartucho</td><td>'.$info['Cartucho'].'</td></tr>'.
						 '<tr><td>Alcance</td><td>'.$info['Alcance'].'</td></tr>'.
						 '<tr><td>Modificacion</td><td>'.$info['Modificaciones'].' mods</td></tr>'.
						 '<tr><td>Requerimiento de Uso</td><td>'.$info['Requerimiento'].'</td></tr>'.
						 '<tr><td>Precio</td><td>'.$info['Precio'].' creditos</td></tr>'.
						 '<tr><td>Peso</td><td>'.$info['Peso'] . ' gr.</td></tr></table>';
						if(($_SESSION["logged"]=='administrador')){
							echo '<div align="right"><form id="editar" method="post" action="../engine/edit.php">
							<input type="hidden" name="elemento" value="'.$info['Nombre_Arma'].'">
							<button type="submit" class="boton" name="tipo" value="armas">Editar</button></form></div>';
						}
						echo '</div>';						 
				}		
			
			} else if($tipo=="armaduras"){
				echo '<h1>Armaduras</h1><br />';
				$datos = mysql_query("SELECT * FROM `armadura` ORDER BY Nombre_Armadura");
				while($info = mysql_fetch_array($datos)){
					echo '<div class="entrada">'.
						 '<img src="'.$info['imagen'] .'" alt="imagen" /><h3>'.$info['Nombre_Armadura'] .'</h3><table width="525" border="1">' .  
						 '<tr><td>Efecto</td><td>'.$info['Efecto'].'</td></tr>'.
						 '<tr><td>Bono DEF</td><td>+'.$info['Bono_DA'].'</td></tr>'.
						 '<tr><td>Agilidad Maxima</td><td>'.$info['Max_AGL'].'</td></tr>'.
						 '<tr><td>Requerimiento de Uso</td><td>'.$info['Requerimiento'].'</td></tr>'.
						 '<tr><td>Precio</td><td>'.$info['Precio'].' creditos</td></tr>'.
						 '<tr><td>Peso</td><td>'.$info['Peso'] . ' gr.</td></tr></table>';
						if(($_SESSION["logged"]=='administrador')){
							echo '<div align="right"><form id="editar" method="post" action="../engine/edit.php">
							<input type="hidden" name="elemento" value="'.$info['Nombre_Armadura'].'">
							<button type="submit" class="boton" name="tipo" value="armaduras">Editar</button></form></div>';
						}
						echo '</div>';						 
				}		
			
			} else if($tipo=="habilidades"){
				echo '<h1>Habilidades</h1><br />';

				$datos = mysql_query("SELECT * FROM `habilidades` ORDER BY Nombre_Habilidad");
				while($info = mysql_fetch_array($datos)){
					echo '<div class="entrada">'.
						 '<h3>'.$info['Nombre_Habilidad'].'</h3>';
					echo '<table width="680" border="1">' .  
						 '<tr><td>Efecto</td><td>'.$info['Efecto'].'</td></tr>'.
						 '<tr><td>Costo</td><td>'.$info['Costo_AP'].' AP</td></tr>'.
						 '<tr><td>Vocacion</td><td>'.$info['Vocacion'].'</td></tr>'.
						 '<tr><td>Raza</td><td>'.$info['Raza'].'</td></tr>'.
						 '<tr><td>Requerimientos</td><td>'.$info['Requerimiento'] . '</td></tr></table>';						 
					if(($_SESSION["logged"]=='administrador')){
						echo '<div align="right"><form id="editar" method="post" action="../engine/edit.php">
						<input type="hidden" name="elemento" value="'.$info['Nombre_Habilidad'].'">
						<button type="submit" class="boton" name="tipo" value="habilidades">Editar</button></form></div>';
					}								
					echo '</div>';
				}		
			
			} else if($tipo=="oponentes"){
				echo '<h1>Oponentes</h1><br />';
				$datos = mysql_query("SELECT * FROM `npc_oponente` ORDER BY Nombre");
				while($info = mysql_fetch_array($datos)){
					echo '						
						<div class="entradaNPC">						
						<img src="'.$info['imagen'] .'" alt="imagen" /><center><h3>'.$info['Nombre'] .'</h3></center>	
					    <div class="encima"> 
						<div class="propiedades">
						 <table width="120" border="1">' .  
						 '<tr><td>HP</td><td>'.$info['HP'].'</td></tr>'. 
						 '<tr><td>ATK</td><td>'.$info['ATK'].'</td></tr>'.
						 '<tr><td>ATK/Dist.</td><td>'.$info['ATK_Distancia'].'</td></tr>'.
						 '<tr><td>DEF</td><td>'.$info['DEF'].'</td></tr>'.
						 '<tr><td>AP</td><td>'.$info['AP'].'</td></tr>'.
						 '<tr><td>Armadura</td><td>'.$info['Armadura'].'</td></tr>'.
						 '<tr><td>Tamaño</td><td>'.$info['Tamano'].'</td></tr>'.
						 '<tr><td>Velocidad</td><td>'.$info['Velocidad'].' cps</td></tr>'.
						 '</table>
						 </div>						 
						 <div class="cualidades">						
						 <table width="120" border="1">'.
						 '<tr><td>FRZ</td><td>'.$info['FRZ'].'</td></tr>'.
						 '<tr><td>AGL</td><td>'.$info['AGL'].'</td></tr>'.
						 '<tr><td>RES</td><td>'.$info['RES'].'</td></tr>'.
						 '<tr><td>INT</td><td>'.$info['INT'].'</td></tr>'.
						 '<tr><td>SAB</td><td>'.$info['SAB'].'</td></tr>'.
						 '<tr><td>CAR</td><td>'.$info['CAR'] . '</td></tr></table>
						 </div>
						 </div>';
						 
						 $armas = mysql_query("SELECT * FROM  `set_armas` WHERE  `Nombre_NPC` =  '".$info['Nombre']."'");
						 $habilidades = mysql_query("SELECT * FROM  `set_habilidades` WHERE  `Nombre` =  '".$info['Nombre']."'");

						 
						 if(($armas)||($habilidades)){
							echo '<div class="debajo">';
						 
							if($armas){
							 
								 echo '<div class="op_armas"">
								 <p>Armas</p>
								 <table width="200" border="1">';
								while($arma = mysql_fetch_array($armas)){
									echo '<tr><td>'.$arma['Nombre_Arma'].'</td></tr>';
								}
								
								echo '</table>						 						 
								</div>';
							}
							 
							if($habilidades){
									 echo '<div class="op_habilidades">
									 <p>Habilidades</p>
									<table width="200" border="1">';
									
								while($habilidad = mysql_fetch_array($habilidades)){
									echo '<tr><td>'.$habilidad['Nombre_Habilidad'].'</td></tr>';
								}
								
								echo '</table>						 						 
								</div>';
							 }
							 
							  echo '</div>';
						}
						
						if(($_SESSION["logged"]=='administrador')){
							echo '<div align="center"><form id="editar" method="post" action="../engine/edit.php">
							<input type="hidden" name="elemento" value="'.$info['Nombre'].'">
							<button type="submit" class="boton" name="tipo" value="oponentes">Editar</button></form></div>';
						}						
						 
						 
						 echo '</div>';
				}			
			
			}	else {
				echo '<center><h2>Tipo no valido: '.$tipo.'</h2><center>';
			}

			echo '<br /><center><a href="http://ed.site40.net/AdventumSpace/consultas/default.php">Regresar</a></center>';
		} else {
			echo '<p>Error en la conexion a la Base de Datos</p>';
		}
		
		mysql_close();
	}
	
	
	function forma(){
		$tipo = $_GET[id_forma];
		$conexion=conectarBD();	
		
		if($conexion){
			if($tipo=="habilidades"){
			
				echo '
					<h3 align="center">Habilidad</h3>
					<div class="forma">            
					<form id="habilidad" method="post" action="insertar.php">
					<div class="izquierda">
					  <div align="center">Nombre
					  </div>
					  <p>
						<input type="text" name="nombre" id="nombre">		        
					  </p>
					  
					  <div align="center">Efecto
					  </div>
					  <p>
						<textarea name="Efecto" cols="" rows="5" id="efecto"></textarea>
					  </p>
									
					  <p align="center">Costo de AP <input name="costo" type="text" id="costo" size="3"></p>
					</div>
					
					<div class="derecha">
					  <div align="center">Requerimientos
					  </div>
					  <p>
						<textarea name="requerimientos" cols="" rows="5" id="requerimientos"></textarea>
					  </p>
					   

					  <p align="center">Vocacion <select name="vocacion" id="vocacion">
						<option>Cientifico</option>
						<option>Combatiente</option>
						<option>Medico</option>
						<option>Mercenario</option>
						<option>Prodigio</option>
						<option>Soldado</option>
						<option>Diplomatico</option>
						<option>Todas</option>					  
					  </select></p>
									  
					  <p align="center">Raza <select name="raza" id="raza">
						<option>Humano</option>
						<option>Androide</option>
						<option>Xeylen</option>
						<option>Todas</option>             
					  
					  </select></p>
					  </div>
							 

									
				  </form>
				  </div>
				  
				  <center>
				  <button type="submit" class="boton" name="tipo_insert" value="habilidades" form="habilidad">Enviar</button>
				  </center>';			
			} else if($tipo=="items"){
					echo '
						<h3 align="center">Item</h3>
						<div class="forma">            
						<form id="item" method="post" action="insertar.php">
						  <p>
						  <div align="center">
							<p>Nombre</p>
							<p><input type="text" name="nombre" id="nombre"></p>

							<p>Descripcion</p>
							<p><textarea name="descripcion" cols="" rows="5" id="descripcion"></textarea></p>
							
							<p>Efecto</p>   
							<p><textarea name="efecto" cols="" rows="5" id="efecto"></textarea></p>
							
																   
							<p>Precio 
							<input name="costo" type="text" id="costo" size="7">
							Peso 
							<input name="peso" type="text" id="pes" size="3">
							</p> 
							<br />
							<p>Seleccionar Imagen de Lista</p>
							<p><select name="imagen" id="imagen">
							<option></option>';							
							listaDirectorio("../consultas/img/items");							
							echo '</select><p>                              
						  </div>
						  </p>			               
							<p>&nbsp;  </p>              			  
						  </form>
					  </div>
						  <center>
							  <button type="submit" class="boton" name="tipo_insert" value="items" form="item">Enviar</button>
						  </center>';
			
			}else if($tipo=="armaduras"){
					echo '
						<h3 align="center">Armadura</h3>
						<div class="forma">            
						<form id="armadura" method="post" action="insertar.php">
						  <p>
						  <div align="center">
							<p>Nombre</p>
							<p><input type="text" name="nombre" id="nombre"></p>
							
							<p>Efecto</p>   
							<p><textarea name="efecto" cols="" rows="5" id="efecto"></textarea></p>
							
							<p>Bono DEF 
							<input name="def" type="text" id="def" size="5">							
							<input name="agl" type="text" id="agl" size="5">
							AGL Maxima 
							</p> 														
							
							<p>Requerimientos</p>
							<p><textarea name="requerimientos" cols="" rows="5" id="requerimientos"></textarea></p>							
																   
							<p>Precio 
							<input name="costo" type="text" id="costo" size="7">
							Peso 
							<input name="peso" type="text" id="peso" size="3">
							</p> 
							<br />
							<p>Seleccionar Imagen de Lista</p>
							<p><select name="imagen" id="imagen">
							<option></option>';							
							listaDirectorio("../consultas/img/armaduras");							
							echo '</select><p>                              
						  </div> 
						  </p>			               
							<p>&nbsp;  </p>              			  
						  </form>
					  </div>
						  <center>
							  <button type="submit" class="boton" name="tipo_insert" value="armaduras" form="armadura">Enviar</button>
						  </center>';						
			} else if($tipo=="armas"){
			
				echo '
					<h3 align="center">Arma</h3>
					<div class="forma">            
					<form id="arma" method="post" action="insertar.php">
					<div class="izquierda">
					  <div align="center">Nombre
					  </div>
					  <p>
						<input type="text" name="nombre" id="nombre">		        
					  </p>
					  <div align="center">
					  <p>Tipo</p><p><select name="tipo" id="tipo"><option>Ametralladora</option><option>Escopeta</option><option>Explosivo</option><option>Navaja</option><option>Pistola</option><option>Rifle</option><option>Golpe</option><option>Otros</option></select></p>
					  </div>
					  <div align="center">Efecto
					  </div>
					  <p>
						<textarea name="Efecto" cols="" rows="5" id="efecto"></textarea>
					  </p>
						
					  <div align="center">Requerimientos de uso
					  </div>
					  <p>
						<textarea name="requerimientos" cols="" rows="5" id="requerimientos"></textarea>
					  </p>
					  
					<div align="center">Seleccionar Imagen
					<p><select name="imagen" id="imagen">
					<option></option>';							
					listaDirectorio("../consultas/img/armas");							
					echo '</select></p></div>					  
						
					</div>
					
					<div class="derecha">							
						<p>Daño</p><p><input type="text" name="dmg" id="dmg" size="7"></p>
						<p>Alcance</p><p><input type="text" name="alcance" id="alcance" size="3"></p>
						<p>Cartucho</p><p><input type="text" name="cartucho" id="cartucho" size="3"></p>
						<p>Modificaciones</p><p><input type="text" name="mods" id="mods" size="3"></p>
						<div align="center" style="overflow:hidden;"><div style="float:left;"><p>Precio</p><input type="text" name="costo" id="costo" size="3"></div>
						<div style="float:right;"><p>Peso</p><input type="text" name="peso" id="peso" size="3"></div></div>
						
					</div>							
				  </form>
				  </div>
				  <br />
				  <center>
				  <button type="submit" class="boton" name="tipo_insert" value="armas" form="arma">Enviar</button>
				  </center>';
			
			} else if ($tipo=="oponentes"){
				echo '
					<h3 align="center">NPC / Oponente</h3>
					<div class="forma">						                         
					<form name="oponentes" id="oponentes" method="post" action="insertar.php">
						<div align="center">
										<p>Nombre <input type="text" name="nombre" id="nombre"></p>
						</div>
						
						<div class="encima" style="overflow:hidden;">                         
								<div class="izquierda">
									 <p align="right">Tipo <select name="tipo"><option>oponente</option><option>npc</option></select></p>
									 <p align="right">Nivel <input type="text" name="nivel" size="3"></p>
									 <p align="right">HP <input type="text" name="hp" size="3"></p>
									 <p align="right">ATK <input type="text" name="atk" size="3"></p>
									 <p align="right">ATK a Distancia <input type="text" name="atk_dist" size="3"></p>
									 <p align="right">DEF <input type="text" name="def" size="3"></p>
									 <p align="right">AP <input type="text" name="ap" size="3"></p>
									 <p align="right">Armadura <input type="text" name="armadura" size="3"></p>
									 <p align="right">Tamaño <select name="tamano">
										<option>Mínimo</option>
										<option>Diminuto</option>
										<option>Minúsculo</option>
										<option>Pequeño</option>
										<option selected>Medio</option>
										<option>Grande</option>
										<option>Gigante</option>
										<option>Colosal</option>
										<option>Gargantual</option>
										</select></p>
									 <p align="right">Velocidad <input type="text" name="velocidad" size="5"></p>
									 
								
								</div>		
								
												 
								 <div class="derecha">		
									<p>Cualidades</p>				
									<p align="left"><input type="text" name="frz" size="3"> FRZ</p>
									<p align="left"><input type="text" name="agl" size="3"> AGL</p>
									<p align="left"><input type="text" name="res" size="3"> RES</p>
									<p align="left"><input type="text" name="int" size="3"> INT</p>
									<p align="left"><input type="text" name="sab" size="3"> SAB</p>
									<p align="left"><input type="text" name="car" size="3"> CAR</p>
									<br />
									<div align="center">Seleccionar Imagen
									<p><select name="imagen" id="imagen">
									<option></option>';							
									listaDirectorio("../consultas/img/oponentes");							
									echo '</select></p></div>
								 </div>
					  </div>
								 
								 <div class="debajo">
									<div class="op_armas" style="float:left; margin-left:150px;">
										 <p align="center">Armas</p>
										 <p> Arma 1 <select name="arma1"><option></option>'; listaArmas(); echo '</select></p>	
										 <p> Arma 2 <select name="arma2"><option></option>'; listaArmas(); echo '</select></p>	
										 <p> Arma 3 <select name="arma3"><option></option>'; listaArmas(); echo '</select></p>						 						 
										</div>
										
										
										<div class="op_habilidades" style="float:right; margin-right:150px;">
											 <a href="#" onclick="window.open(\'../engine/habilidades.php\', \'newwindow\', \'width=300, height=250\'); return false;"><p align="center">Habilidades</p></a>
											      
											<div id="habilidad">
											  Habilidad 1<br><input type="text" name="habilidades[]">'; 						  
											echo '</div>';
											 
											 echo '<script src="agregar.js" language="Javascript" type="text/javascript"></script>';
											 echo '<center><input type="button" onclick="addInput(\'habilidad\');" value="Agregar"></center>';
											 
										echo '</div>
								</div>                                    
											
								</form>                                    					 						 
							</div>';
				
				 echo 
				  '<br />
				  <center>
				  <button type="submit" class="boton" name="tipo_insert" value="oponentes" form="oponentes">Enviar</button>
				  </center>';			
			} else {
				echo '<center><h2>Tipo no valido:'.$tipo.'</h2><center>';
			}
		} else {
				echo '<p>Error en la conexion a la Base de Datos</p>';
		}
		
		
	}		

	
	function despliegaDatos($info){
	
		if($info["tipo_insert"]=="habilidades"){
			echo '<p>Nombre Habilidad: '.$info["nombre"].'</p>';
			echo '<p>Efecto: '.$info["Efecto"].'</p>';
			echo '<p>Costo en AP: '.$info["costo"].'</p>'; 
			echo '<p>Requerimientos: '.$info["requerimientos"].'</p>'; 
			echo '<p>Vocacion: '.$info["vocacion"].'</p>'; 
			echo '<p>Raza: '.$info["raza"].'</p>'; 
		} else if($info["tipo_insert"]=="items"){
			echo '<p>Nombre Item: '.$info["nombre"].'</p>';
			echo '<p>Descripcion: '.$info["descripcion"].'</p>';
			echo '<p>Efecto: '.$info["efecto"].'</p>';
			echo '<p>Precio: '.$info["costo"].'</p>'; 
			echo '<p>Peso: '.$info["peso"].'</p>'; 
			echo '<p>Imagen: '.$info["imagen"].'</p>'; 
		} else if($info["tipo_insert"]=="armaduras") {
			echo '<p>Nombre armadura: '.$info["nombre"].'</p>';
			echo '<p>Efecto: '.$info["efecto"].'</p>';
			echo '<p>Precio: '.$info["costo"].'</p>'; 
			echo '<p>Peso: '.$info["peso"].'</p>'; 
			echo '<p>Bono DEF: '.$info["def"].'</p>'; 
			echo '<p>Agilidad Maxima: '.$info["agl"].'</p>'; 
			echo '<p>Imagen: '.$info["imagen"].'</p>';
		} else if($info["tipo_insert"]=="armas") {
			echo '<p>Nombre arma: '.$info["nombre"].'</p>';
			echo '<p>Tipo: '.$info["tipo"].'</p>';
			echo '<p>Daño: '.$info["dmg"].'</p>';	
			echo '<p>Efecto: '.$info["Efecto"].'</p>';
			echo '<p>Cartucho: '.$info["cartucho"].'</p>';
			echo '<p>Alcance: '.$info["alcance"].'</p>';
			echo '<p>Modificaciones: '.$info["mods"].'</p>';
			echo '<p>Requerimientos: '.$info["requerimientos"].'</p>';
			echo '<p>Precio: '.$info["costo"].'</p>';
			echo '<p>Peso: '.$info["peso"].'</p>';
			echo '<p>Imagen: '.$info["imagen"].'</p>';
			
		} else if($info["tipo_insert"]=="oponentes"){
			echo '<div style="overflow:hidden;">';
				echo '<p>Nombre: '.$info["nombre"].'</p>';
				echo '<p>Tipo: '.$info["tipo"].'</p>';
				echo '<p>Nivel: '.$info["nivel"].'</p>';
			echo '<div style="float:left;margin-left:50px;">';
				echo '<p>HP: '.$info["hp"].'</p>';
				echo '<p>ATK: '.$info["atk"].'</p>';
				echo '<p>ATK a Distancia: '.$info["atk_dist"].'</p>';
				echo '<p>DEF: '.$info["def"].'</p>';
				echo '<p>AP: '.$info["ap"].'</p>';
				echo '<p>Armadura: '.$info["armadura"].'</p>';
				echo '<p>Tamaño: '.$info["tamano"].'</p>';
				echo '<p>Velocidad: '.$info["velocidad"].'</p>';
				
			
			echo '</div><div style="float:right;margin-right:180px;">';
				echo '<p>FRZ: '.$info["frz"].'</p>';
				echo '<p>AGL: '.$info["agl"].'</p>';
				echo '<p>RES: '.$info["res"].'</p>';
				echo '<p>INT: '.$info["int"].'</p>';
				echo '<p>SAB: '.$info["sab"].'</p>';
				echo '<p>CAR: '.$info["car"].'</p>';
			echo '</div>';
			echo '</div>';
				echo '<p>Imagen: '.$info["imagen"].'</p>';
			
			echo '<div style="overflow:hidden;">';
			echo '<div style="float:left;margin-left:50px;">';
				echo '<p align="center"><u> Armas </u></p>';
				echo '<p>1: '.$info["arma1"].'</p>';
				echo '<p>2: '.$info["arma2"].'</p>';
				echo '<p>3: '.$info["arma3"].'</p>';
				
			echo '</div><div style="float:right;margin-right:50px;">';		
				echo '<p align="center"><u> Habilidades </u></p>';
				$listaHab=$info["habilidades"];
				$i=1;
				foreach($listaHab as $habilidad){
					echo '<p>'.$i.': '.$habilidad.'</p>';
					$i++;
				}
			echo '</div>';		
			echo '</div>';
		
		}
	
	}
	
	function listaDirectorio($dir){
		$archivos = scandir($dir);
		
		foreach($archivos as $archivo){
			if(($archivo!=".")&&($archivo!="..")){
				echo '<option>'.$archivo.'</option>';
			}
		}
	
	}
	
	function listaArmas(){
		$datos = mysql_query("SELECT * FROM `armas`") or die(mysql_error());
		
		while($dato = mysql_fetch_array($datos)){
			echo '<option>'.$dato['Nombre_Arma'].'</option>';
		}
		
	}

	function listaHabilidades(){
		$datos = mysql_query("SELECT * FROM `habilidades`") or die(mysql_error());
		
		while($dato = mysql_fetch_array($datos)){
			echo '<option>'.$dato['Nombre_Habilidad'].'</option>';
		}
		
	}	
?>