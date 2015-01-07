<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Bogota');

class ServiciosUsuarios {



function login($usuario,$pass) {
	
	$sqlusu = "select * from se_usuarios where email = '".$usuario."'";



if (trim($usuario) != '' and trim($pass) != '') {

$respusu = $this->query($sqlusu,0);

if (mysql_num_rows($respusu) > 0) {
	$error = '';
	
	$idUsua = mysql_result($respusu,0,0);
	$sqlpass = "select nombrecompleto,email,usuario,refroll from se_usuarios where password = '".$pass."' and IdUsuario = ".$idUsua;

	$resppass = $this->query($sqlpass,0);
	
	if (mysql_num_rows($resppass) > 0) {
		$error = '';
		} else {
			$error = 'Usuario o Password incorrecto';
		}
	
	}
	else
	
	{
		$error = 'Usuario o Password incorrecto';	
	}
	
	if ($error == '') {
		session_start();
		$_SESSION['usua_cv'] = $usuario;
		$_SESSION['nombre_cv'] = mysql_result($resppass,0,0);
		$_SESSION['email_cv'] = mysql_result($resppass,0,1);
		$_SESSION['refroll_cv'] = mysql_result($resppass,0,3);
	}
	
}	else {
	$error = 'Usuario y Password son campos obligatorios';	
}
	
	
	return $error;
	
}

function traerUsuario($email) {
	$sql = "select idusuario,apellido,refroll,nombre,direccion from se_usuarios where email = '".$email."'";
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}
}

function traerUsuarioId($id) {
	$sql = "select idusuario,apellido,refroll,nombre,direccion,email,password from se_usuarios where idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}
}

function existeUsuario($usuario) {
	$sql = "select * from se_usuarios where email = '".$usuario."'";
	$res = $this->query($sql,0);
	if (mysql_num_rows($res)>0) {
		return true;	
	} else {
		return false;	
	}
}

function enviarEmail($destinatario,$asunto,$cuerpo) {
	//para el envío en formato HTML
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	//dirección del remitente
	$headers .= "From: Daniel Eduardo Duranti <dsagasti@yahoo.com.ar>\r\n";
	
	//ruta del mensaje desde origen a destino
	$headers .= "Return-path: ".$destinatario."\r\n";
	
	//direcciones que recibirán copia oculta
	$headers .= "Bcc: info@carnesacasa.com.ar,msredhotero@msn.com\r\n";
	
	mail($destinatario,$asunto,$cuerpo,$headers); 	
}


function insertarUsuario($apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos) {
	$sql = "INSERT INTO se_usuarios
				(idusuario,
				apellido,
				password,
				refroll,
				email,
				nombre,
				telefono,
				direccion,
				imagen,
				mime,
				carpeta,
				intentoserroneos,
				activo)
			VALUES
				('',
				'".utf8_decode($apellido)."',
				'".utf8_decode($password)."',
				".$refroll.",
				'".utf8_decode($email)."',
				'".utf8_decode($nombre)."',
				'".$telefono."',
				'".utf8_decode($direccion)."',
				'',
				'',
				'',
				0,
				0)";
	if ($this->existeUsuario($email) == true) {
		return "Ya existe el usuario";	
	}
	$res = $this->query($sql,1);
	if ($res == false) {
		return 'Error al insertar datos';
	} else {
		$ui = $this->GUID();
		$this->insertarActivacion($res,$ui);
		//$this->enviarEmail($email,"Se ha registrado en 'Carnes A Casa' correctamente.","Bienvenido\r\n Para ingresar sus datos son:\r\n\r\n Usuario: ".$email." \r\n Password:".$password);
		return $res;
	}
}

function insertarActivacion($refcliente,$ui) {
	$sql = "insert into cv_activacion
				(idactivacion,refcliente,token)
			VALUES
			('',
			".$refcliente.",
			'".$ui."')";
	$res = $this->query($sql,1);
	if ($res == false) {
		return 'Error al insertar datos';
	} else {
		return $res;
	}
}

function traerActivacion($ui) {
	$sql = "select refcliente,token from cv_activacion where token = '".$ui."'";
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		if (mysql_num_rows($res)>0) {
			return mysql_result($res,0,0);	
		} else {
			return 0;
		}
	}
}

function modificarUsuario($id,$apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos) {
	$sql = "UPDATE se_usuarios
			SET
				apellido = '".utf8_decode($apellido)."',
				password = '".utf8_decode($password)."',
				email = '".utf8_decode($email)."',
				nombre = '".utf8_decode($nombre)."',
				telefono = '".$telefono."',
				direccion = '".utf8_decode($direccion)."',
			WHERE idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return '';
	}
}

function activarUsuario($id) {
	$sql = "UPDATE se_usuarios
			SET
				activo = 1
			WHERE idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return '';
	}
}

function deshactivarUsuario($id) {
	$sql = "UPDATE se_usuarios
			SET
				activo = 0
			WHERE idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return '';
	}
}




function query($sql,$accion) {
		
		
		
		$hostname = "localhost";
		$database = "ed_base";
		$username = "root";
		$password = "";
		
/*		$hostname = "db494455387.db.1and1.com";
		$database = "db494455387";
		$username = "dbo494455387";
		$password = "Admin1234";*/
		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		
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