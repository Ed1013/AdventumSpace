<?php
	include_once('../misc/asdb.php');
	
	function insertarDatos($info){
		$conexion=conectarBD();	
		$insert="INSERT INTO ";
		
		if($conexion){
			if($info["tipo_insert"]=="habilidades"){
				$insert.="`habilidades` (`Nombre_Habilidad` ,`Efecto` ,`Costo_AP` ,`Requerimiento`,`Vocacion` ,`Raza` ) VALUES(";
				$insert.="'".$info["nombre"]."',";
				$insert.="'".$info["Efecto"]."',";
				$insert.="'".$info["costo"]."',";
				$insert.="'".$info["requerimientos"]."',";
				$insert.="'".$info["vocacion"]."',";
				$insert.="'".$info["raza"]."'";
				$insert.=");";
				
				mysql_query($insert) or die(mysql_error());
				
			} else if($info["tipo_insert"]=="items"){
				$insert.="`items` (`Nombre_Item` ,`Efecto` ,`Descripcion` ,`Precio`,`Peso` ,`imagen` ) VALUES(";
				$insert.="'".$info["nombre"]."',";
				$insert.="'".$info["efecto"]."',";
				$insert.="'".$info["descripcion"]."',";
				$insert.="'".$info["costo"]."',";
				$insert.="'".$info["peso"]."',";
				if($info["imagen"]!=""){
					$insert.="'img/items/".$info["imagen"]."'";
				} else {
					$insert.="'img/NA.jpg'";
				}
				$insert.=");";

				mysql_query($insert) or die(mysql_error());
				
			} else if($info["tipo_insert"]=="armaduras"){
				$insert.="`armadura` (`Nombre_Armadura` ,`Efecto` ,`Peso` ,`Precio`,`Bono_DA` ,`Max_AGL`, `Requerimiento`, `imagen` ) VALUES(";
				$insert.="'".$info["nombre"]."',";
				$insert.="'".$info["efecto"]."',";
				$insert.="'".$info["peso"]."',";
				$insert.="'".$info["costo"]."',";
				$insert.="'".$info["def"]."',";
				$insert.="'".$info["agl"]."',";
				$insert.="'".$info["requerimientos"]."',";
				if($info["imagen"]!=""){
					$insert.="'img/armaduras/".$info["imagen"]."'";
				} else {
					$insert.="'img/NA.jpg'";
				}
				$insert.=");";
				
				mysql_query($insert) or die(mysql_error());
				
			} else if($info["tipo_insert"]=="armas"){
				$insert.="`armas` (`Nombre_Arma` ,`Tipo` ,`Damage` ,`Efecto_Arma`,`Cartucho` ,`Alcance`, `Modificaciones`, `Requerimiento`, `Peso`, `Precio`, `imagen` ) VALUES(";
				$insert.="'".$info["nombre"]."',";
				$insert.="'".$info["tipo"]."',";
				$insert.="'".$info["dmg"]."',";
				$insert.="'".$info["Efecto"]."',";
				$insert.="'".$info["cartucho"]."',";
				$insert.="'".$info["alcance"]."',";
				$insert.="'".$info["mods"]."',";
				$insert.="'".$info["requerimientos"]."',";
				$insert.="'".$info["peso"]."',";
				$insert.="'".$info["costo"]."',";
				if($info["imagen"]!=""){
					$insert.="'img/armas/".$info["imagen"]."'";
				} else {
					$insert.="'img/NA.jpg'";
				}
				$insert.=");";
				
				mysql_query($insert) or die(mysql_error());
				
			} else if($info["tipo_insert"]=="oponentes"){
				$insert.="`npc_oponente` (`Nombre`,`Nivel`,`HP`,`ATK`,`ATK_Distancia`,`DEF`,`FRZ`,`AGL`,`RES`,`INT`,`SAB`,`CAR`,`AP`,`Armadura`,`Tamano`,`Velocidad`,`Tipo`,`imagen`) VALUES(";
				$insert.="'".$info["nombre"]."',";
				$insert.="'".$info["nivel"]."',";
				$insert.="'".$info["hp"]."',";
				$insert.="'".$info["atk"]."',";
				$insert.="'".$info["atk_dist"]."',";
				$insert.="'".$info["def"]."',";
				$insert.="'".$info["frz"]."',";
				$insert.="'".$info["agl"]."',";
				$insert.="'".$info["res"]."',";
				$insert.="'".$info["int"]."',";
				$insert.="'".$info["sab"]."',";
				$insert.="'".$info["car"]."',";
				$insert.="'".$info["ap"]."',";
				$insert.="'".$info["armadura"]."',";
				$insert.="'".$info["tamano"]."',";
				$insert.="'".$info["velocidad"]."',";
				$insert.="'".$info["tipo"]."',";
				if($info["imagen"]!=""){
					$insert.="'img/oponentes/".$info["imagen"]."'";
				} else {
					$insert.="'img/NA.jpg'";
				}
				$insert.=");";				
				mysql_query($insert) or die(mysql_error());
				
				if($info["arma1"]!=""){
					mysql_query("INSERT INTO `set_armas` (`Nombre_NPC`,`Nombre_Arma`) VALUES('".$info["nombre"]."','".$info["arma1"]."');") or die(mysql_error());
				}				
				if($info["arma2"]!=""){
					mysql_query("INSERT INTO `set_armas` (`Nombre_NPC`,`Nombre_Arma`) VALUES('".$info["nombre"]."','".$info["arma2"]."');") or die(mysql_error());
				}				
				if($info["arma3"]!=""){
					mysql_query("INSERT INTO `set_armas` (`Nombre_NPC`,`Nombre_Arma`) VALUES('".$info["nombre"]."','".$info["arma3"]."');") or die(mysql_error());
				}
				
				if(isset($info["habilidades"])){
					$listaHab=$info["habilidades"];
					foreach($listaHab as $habilidad){
						if($habilidad!=""){
							mysql_query("INSERT INTO `set_habilidades` (`Nombre`,`Nombre_Habilidad`) VALUES('".$info["nombre"]."','".$habilidad."');") or die(mysql_error());
						}
					}
				}								
				
			} 
		} else {
				echo '<p>Error en la conexion a la Base de Datos</p>';
				return false;
		}		
		
		return true;		
	}	
	
	function alterarDatos($info){
		$conexion=conectarBD();	
		$edit="UPDATE ";
		if($conexion){
			if($info["tipo_edit"]=="habilidades"){
				$edit.="`habilidades` SET ";
				$edit.="`Nombre_Habilidad`= '".$info["nombre"]."',";
				$edit.="`Efecto`= '".$info["Efecto"]."',";
				$edit.="`Costo_AP`= '".$info["costo"]."',";
				$edit.="`Vocacion`= '".$info["vocacion"]."',";
				$edit.="`Raza`= '".$info["raza"]."',";
				$edit.="`Requerimiento`= '".$info["requerimientos"]."'";
				$edit.=" WHERE Nombre_Habilidad='".$info["original"]."';";
				mysql_query($edit) or die(mysql_error());
			} else if($info["tipo_edit"]=="items"){
				$edit.="`items` SET ";
				$edit.="`Nombre_Item`= '".$info["nombre"]."',";
				$edit.="`Descripcion`= '".$info["descripcion"]."',";
				$edit.="`Efecto`= '".$info["efecto"]."',";
				$edit.="`Precio`= '".$info["costo"]."',";
				$edit.="`Peso`= '".$info["peso"]."',";
				if($info["imagen"]!=""&&$info["imagen"]!="NA.jpg"){
					$edit.="`imagen`= 'img/items/".$info["imagen"]."'";
				} else {
					$edit.="`imagen`= 'img/NA.jpg'";
				}								
				$edit.=" WHERE Nombre_Item='".$info["original"]."';";
				mysql_query($edit) or die(mysql_error());
			} else if($info["tipo_edit"]=="armas"){
				$edit.="`armas` SET ";
				$edit.="`Nombre_Arma`= '".$info["nombre"]."',";
				$edit.="`Damage`= '".$info["dmg"]."',";
				$edit.="`Efecto_Arma`= '".$info["efecto"]."',";
				$edit.="`Cartucho`= '".$info["cartucho"]."',";
				$edit.="`Alcance`= '".$info["alcance"]."',";
				$edit.="`Modificaciones`= '".$info["mods"]."',";
				$edit.="`Requerimiento`= '".$info["requerimientos"]."',";
				$edit.="`Precio`= '".$info["precio"]."',";
				if($info["imagen"]!=""&&$info["imagen"]!="NA.jpg"){
					$edit.="`imagen`= 'img/armas/".$info["imagen"]."'";
				} else {
					$edit.="`imagen`= 'img/NA.jpg'";
				}								
				$edit.=" WHERE Nombre_Arma='".$info["original"]."';";
				mysql_query($edit) or die(mysql_error());								
				
			} else if($info["tipo_edit"]=="armaduras"){
				$edit.="`armadura` SET ";
				$edit.="`Nombre_Armadura`= '".$info["nombre"]."',";
				$edit.="`Efecto`= '".$info["efecto"]."',";
				$edit.="`Peso`= '".$info["peso"]."',";
				$edit.="`Precio`= '".$info["precio"]."',";
				$edit.="`Bono_DA`= '".$info["def"]."',";
				$edit.="`Max_AGL`= '".$info["agl"]."',";
				$edit.="`Requerimiento`= '".$info["requerimientos"]."',";
				if($info["imagen"]!=""&&$info["imagen"]!="NA.jpg"){
					$edit.="`imagen`= 'img/armaduras/".$info["imagen"]."'";
				} else {
					$edit.="`imagen`= 'img/NA.jpg'";
				}								
				$edit.=" WHERE Nombre_Armadura='".$info["original"]."';";
				mysql_query($edit) or die(mysql_error());				
			
			} else if($info["tipo_edit"]=="oponentes"){
				$edit.="`npc_oponente` SET ";
				$edit.="`Nombre`= '".$info["nombre"]."',";
				$edit.="`Tipo`= '".$info["tipo"]."',";
				$edit.="`Nivel`= '".$info["nivel"]."',";
				$edit.="`HP`= '".$info["hp"]."',";
				$edit.="`ATK`= '".$info["atk"]."',";
				$edit.="`ATK_Distancia`= '".$info["atk_dist"]."',";
				$edit.="`DEF`= '".$info["def"]."',";
				$edit.="`FRZ`= '".$info["frz"]."',";
				$edit.="`AGL`= '".$info["agl"]."',";
				$edit.="`RES`= '".$info["res"]."',";
				$edit.="`INT`= '".$info["int"]."',";
				$edit.="`SAB`= '".$info["sab"]."',";
				$edit.="`CAR`= '".$info["car"]."',";
				$edit.="`AP`= '".$info["ap"]."',";
				$edit.="`Armadura`= '".$info["armadura"]."',";
				$edit.="`Tamano`= '".$info["tamano"]."',";
				$edit.="`Velocidad`= '".$info["velocidad"]."',";
				if($info["imagen"]!=""&&$info["imagen"]!="NA.jpg"){
					$edit.="`imagen`= 'img/oponentes/".$info["imagen"]."'";
				} else {
					$edit.="`imagen`= 'img/NA.jpg'";
				}								
				$edit.=" WHERE Nombre='".$info["original"]."';";
				mysql_query($edit) or die(mysql_error());				
				
			
			} else {
				echo '<p>Tipo no valido: '.$info["tipo_edit"].'</p>';
			}
		} else {
			echo '<p>Error en la conexion a la Base de Datos</p>';
			return false;
		}
		
		return true;
	}
	
	function borrarDatos($info){
		$conexion=conectarBD();
		$borra="DELETE FROM ";
		
		if($info["borrar"]=="habilidades"){
			$borra.="`habilidades` WHERE Nombre_Habilidad='".$info["original"]."';";
		} else if($info["borrar"]=="items"){
			$borra.="`items` WHERE Nombre_Item='".$info["original"]."';";
		}else if($info["borrar"]=="armas"){
			$borra.="`armas` WHERE Nombre_Arma='".$info["original"]."';";
		}else if($info["borrar"]=="armaduras"){
			$borra.="`armadura` WHERE Nombre_Armadura='".$info["original"]."';";
		}else if($info["borrar"]=="oponentes"){
			$borra.="`npc_oponente` WHERE Nombre='".$info["original"]."';";
		} else {
			echo '<p>Tipo equivocado</p>';
			return false;
		}

		if($conexion){						
			if($info["borrar"]=="oponentes"){
				$armasD=" DELETE FROM `set_armas` WHERE Nombre_NPC='".$info["original"]."';";
				mysql_query($armasD) or die(mysql_error());
				$habilidadesD=" DELETE FROM `set_habilidades` WHERE Nombre='".$info["original"]."';";
				mysql_query($habilidadesD) or die(mysql_error());
				mysql_query($borra) or die(mysql_error());
			} else {
				mysql_query($borra) or die(mysql_error());
			}
		} else {
			echo '<p>Error de conexion a la base de datos</p>';
			return false;
		}
		
		return true;
	}
	
?>	