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
	
}

function ImportarTxt($serviciosImportar){
	$nombrearchivo = $_POST['nombrearchivo'];
	
	echo $serviciosImportar->ImportarTxt('C81B15D0-B225-4E8F-9A80-CBA74A8AEAB7',$nombrearchivo);
}

function ImportarExcel($serviciosImportar){
	$nombrearchivo = $_POST['nombrearchivo'];
	
	echo $serviciosImportar->ImportarExcel('C81B15D0-B225-4E8F-9A80-CBA74A8AEAB7',$nombrearchivo);
}



function importar($serviciosImportar) {
	$nombre		=	$_POST['nombre'];
	$descripcion=	$_POST['descripcion'];
	
	$serviciosImportar->subirArchivo('archivo');
	
	$res = $serviciosImportar->cargarExcel($_FILES['archivo']['name'],$nombre,$descripcion);
	
	$cad = '<table border="0" width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>Comprobante</th>
                        <th>Fecha(mm/dd/yyyy)</th>
                        <th>Documento</th>
                        <th>Documento Ref.</th>
                        <th>Nit</th>
                        <th>Detalle</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Base</th>
                        <th>Centro de Costo</th>
                        <th>Trans. Ext</th>
                        <th>Plazo</th>
                    </tr>
                </thead>
                <tbody>';
	while ($row = mysql_fetch_array($res)) {
		$cad = $cad.'
					<tr>
						<td>'.$row["codigocuenta"].'</td>
						<td>'.$row["comprobante"].'</td>
						<td>'.$row["fecha"].'</td>
						<td>'.$row["documento"].'</td>
						<td>'.$row["documentoreferencia"].'</td>
						<td>'.$row["nit"].'</td>
						<td>'.$row["detalle"].'</td>
						<td>'.$row["tipo"].'</td>
						<td>'.$row["valor"].'</td>
						<td>'.$row["valorbase"].'</td>
						<td>'.$row["centrocostos"].'</td>
						<td>'.$row["transaccion"].'</td>
						<td>'.$row["plazo"].'</td>
					</tr>
				';	
	}
				
	$cad = $cad.'</tbody>

            </table>';
	echo $cad;	
}

function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->login($email,$pass);
}


?>