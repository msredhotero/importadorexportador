<?php


date_default_timezone_set('America/Bogota');

class ServiciosProveedores {




Function query($sql,$accion) {
		
		
		$hostname = "localhost";
		$database = "ed_base";
		$username = "root";
		$password = "";
		/*
		$hostname = "localhost";
		$database = "carnesac_carnesvictoria";
		$username = "carnesacasacom";
		$password = "frigorifico326435";
		*/
        

		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		/*
		$result = mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		mysql_close($conex);
		return $result;
		*/
                $error = 0;
		mysql_query("BEGIN");
		$result=mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		if(!$result){
			$error=1;
		}
		if($error==1){
			mysql_query("ROLLBACK");
			return false;
		}
		 else{
			mysql_query("COMMIT");
			return $result;
		}
	}

}




?>