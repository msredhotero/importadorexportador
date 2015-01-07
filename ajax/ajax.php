<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesProveedores.php');


$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosProveedores  = new ServiciosProveedores();

$accion = $_POST['accion'];


switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	
	
}


function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->login($email,$pass);
}


?>