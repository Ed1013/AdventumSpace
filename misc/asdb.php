<?php
		

	function conectarBD(){
		
		$content=file_get_contents("../misc/config.txt");
		$pieces=explode("\n",$content);
		
		$servidor=$pieces[0];
		$usuario=$pieces[1];
		$password=$pieces[2];
		
		$enlace =  mysql_connect($servidor, $usuario, $password);
		if (!$enlace) {
			echo '<p>No pudo conectarse a la Base de Datos: </p><br />' . mysql_error();
			return false;
		}				
		
		mysql_select_db("a9462608_AdSp") or die(mysql_error()) ;
		
		return true;
	}


?>