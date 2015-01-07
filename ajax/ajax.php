<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesProveedores.php');
include ('../includes/funcionesImportar.php');

$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosProveedores  = new ServiciosProveedores();
$serviciosImportar = new ServiciosImportar();

$accion = $_POST['accion'];


switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	case 'importar':
		importar($serviciosImportar);
        break;
	
}

function importar($serviciosImportar) {
	$nombre		=	$_POST['nombre'];
	$descripcion=	$_POST['descripcion'];
	
	$serviciosImportar->subirArchivo('archivo');
	
	$serviciosImportar->cargarExcel($_FILES['archivo']['name'],$nombre,$descripcion);
	
	echo $descripcion;	
}

function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->login($email,$pass);
}


?>