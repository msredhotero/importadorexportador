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
	case 'ImportarTxt':
		ImportarTxt($serviciosImportar);
		break;
	case 'ImportarExcel':
		ImportarExcel($serviciosImportar);
		break;
	case 'insertarProveedores':
		insertarProveedores($serviciosProveedores);
		break;
	case 'modificarProveedores':
		modificarProveedores($serviciosProveedores);
		break;
	case 'eliminarProveedores':
		eliminarProveedores($serviciosProveedores);
		break;
	case 'eliminarImportacion':
		eliminarImportacion($serviciosImportar);
		break;
}

function eliminarImportacion($serviciosImportar) {
	$token = $_POST['token'];
	
	echo $serviciosImportar->eliminarImportacion($token);	
}

function insertarProveedores($serviciosProveedores) {
	$proveedor	=	$_POST['proveedor'];
	$nit		=	$_POST['nit'];
	
	echo $serviciosProveedores->insertarProveedores($proveedor,$nit);	
}

function modificarProveedores($serviciosProveedores) {
	$id 		=	$_POST['id'];
	$proveedor	=	$_POST['proveedor'];
	$nit		=	$_POST['nit'];
	
	echo $serviciosProveedores->modificarProveedores($id,$proveedor,$nit);	
}


function eliminarProveedores($serviciosProveedores) {
	$id = $_POST['id'];
	
	echo $serviciosProveedores->eliminarProveedores($id);	
}

function ImportarTxt($serviciosImportar){
	$nombrearchivo	= $_POST['nombrearchivo'];
	$token 			= $_POST['token'];
	
	echo $serviciosImportar->ImportarTxt($token,$nombrearchivo);
}

function ImportarExcel($serviciosImportar){
	$nombrearchivo	= $_POST['nombrearchivo'];
	$token 			= $_POST['token'];
	
	echo $serviciosImportar->ImportarExcel($token,$nombrearchivo);
}



function importar($serviciosImportar) {
	$nombre		=	$_POST['nombre'];
	$descripcion=	$_POST['descripcion'];
	
	$serviciosImportar->subirArchivo('archivo');
	
	$res = $serviciosImportar->cargarExcel($_FILES['archivo']['name'],$nombre,$descripcion);
	$Exento = 0;
	$Excluido = 0;
	$NoGravado = 0;
	$Gravado = 0;
	$IVA = 0;
	$CostoTotal = 0;
	
	
	$cad = '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>Exento</th>
                        <th>Excluido</th>
                        <th>NoGravado</th>
                        <th>Gravado</th>
                        <th>IVA</th>
                        <th>Costo Total</th>
                        
                    </tr>
                </thead>
                <tbody>';
				
	while ($row = mysql_fetch_array($res)) {
		$Exento 	= $Exento + $row[0];
		$Excluido 	= $Excluido + $row[1];
		$NoGravado 	= $NoGravado + $row[2];
		$Gravado 	= $Gravado + $row[3];
		$IVA 		= $IVA + $row[4];
		$CostoTotal = $CostoTotal + $row[5];
	}
	$cad = $cad.'<tr>
					<td>'.number_format($Exento,2,',','.').'</td>
					<td>'.number_format($Excluido,2,',','.').'</td>
					<td>'.number_format($NoGravado,2,',','.').'</td>
					<td>'.number_format($Gravado,2,',','.').'</td>
					<td>'.number_format($IVA,2,',','.').'</td>
					<td>'.number_format($CostoTotal,2,',','.').'</td>
				</tr>';			
	$cad = $cad.'</tbody>

            </table>';
	$cad = $cad."<br><br><button class='btn btn-success' id='confirmar'><a href='index.php'>Confirmar</a></button>";
	echo $cad;	
}

function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->login($email,$pass);
}


?>