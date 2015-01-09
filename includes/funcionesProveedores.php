<?php


date_default_timezone_set('America/Bogota');

class ServiciosProveedores {

function traerProveedoresPorId($id) {
	$sql = "select idproveedor,proveedor,nit from ed_proveedores where idproveedor = ".$id;
	$res 		=	$this->query($sql,0);
	
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}	
}

function traerProveedores() {
	$sql = "select idproveedor,proveedor,nit from ed_proveedores order by proveedor";
	$res 		=	$this->query($sql,0);
	
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}	
}

function insertarProveedores($proveedor,$nit) {
	$sql = "insert into ed_proveedores(idproveedor,proveedor,nit) values ('','".$proveedor."', '".$nit."')";
	$res 		=	$this->query($sql,1);
	
	if ($res == false) {
		return 'Error al insertar datos';
	} else {
		return $res;
	}
}

function modificarProveedores($id,$proveedor,$nit) {
	$sql = "update ed_proveedores 
				set
				proveedor = '".$proveedor."',
				nit = '".$nit."'
				where idproveedor = ".$id;
	$res 		=	$this->query($sql,0);
	
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return $res;
	}
}

function eliminarProveedores($id) {
	$sql = "delete from ed_proveedores 
				where idproveedor = ".$id;
	$res 		=	$this->query($sql,0);
	
	if ($res == false) {
		return 'Error al eliminar datos';
	} else {
		return $res;
	}
}

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