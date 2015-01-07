<?php


date_default_timezone_set('America/Bogota');

class ServiciosImportar {

function subirArchivo($file) {
	$dir_destino = '../archivos/';
	$imagen_subida = $dir_destino . utf8_decode(str_replace(' ','',basename($_FILES[$file]['name'])));
	
	//$noentrar = '../imagenes/index.php';
	//$nuevo_noentrar = '../archivos/'.$carpeta.'/'.$idInmueble.'/'.'index.php';
	
	if (!file_exists($dir_destino)) {
    	mkdir($dir_destino, 0777);
	}
	
	 
	if(!is_writable($dir_destino)){
		
		echo "no tiene permisos";
		
	}	else	{
		if ($_FILES[$file]['tmp_name'] != '') {
			if(is_uploaded_file($_FILES[$file]['tmp_name'])){
				/*echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
				echo "Mostrar contenido\n";
				echo $imagen_subida;*/
				if (move_uploaded_file($_FILES[$file]['tmp_name'], $imagen_subida)) {
					
					$archivo = utf8_decode($_FILES[$file]["name"]);
					$tipoarchivo = $_FILES[$file]["type"];
					
					/*if ($this->existeArchivo($idInmueble,$archivo,$tipoarchivo) == 0) {
						$sql	=	"insert into pifotos(idfoto,refinmueble,imagen,type) values ('',".$idInmueble.",'".str_replace(' ','',$archivo)."','".$tipoarchivo."')";
						$this->query($sql,1);
					}
					echo "";
					
					copy($noentrar, $nuevo_noentrar);
	*/
				} else {
					echo "Posible ataque de carga de archivos!\n";
				}
			}else{
				echo "Posible ataque del archivo subido: ";
				echo "nombre del archivo '". $_FILES[$file]['tmp_name'] . "'.";
			}
		}
	}	
}

function insertarDatos($codigocuenta,$comprobante,$fecha,$documento,$documentoreferencia,$nit,$detalle,$tipo,$valor,$valorbase,$centrocostos,$transaccion,$plazo,$nombre,$descripcion) 
{
	$sql = "insert into ed_datos(iddato,codigocuenta,comprobante,fecha,documento,documentoreferencia,nit,detalle,tipo,valor,valorbase,centrocostos,transaccion,plazo,nombre,descripcion) 
			values
				('',
				'".$codigocuenta."',
				'".$comprobante."',
				'".$fecha."',
				'".$documento."',
				'".$documentoreferencia."',
				'".$nit."',
				'".$detalle."',
				'".$tipo."',
				'".$valor."',
				'".$valorbase."',
				'".$centrocostos."',
				'".$transaccion."',
				'".$plazo."',
				'".$nombre."',
				'".$descripcion."')";
	//echo $sql;
	$res 		=	$this->query($sql,1);
	
	if ($res == false) {
		return 'Error al insertar datos';
	} else {
		return $res;
	}
}


function cargarExcel($archivo,$nombre,$descripcion) {

                    //incluimos la clase
                    require_once '../excelClass/PHPExcel/IOFactory.php';
                    
					$datos = array('comprobante' => '00004',
								   'codigocuenta' => array ('14350504','14350504','14350506','24081001','220501','129505','233595'),
								   'fecha' => '',
								   'documento' => '',
								   'documentoreferencia' => '',
								   'nit' => '',
								   'detalle' => array('COMPRA GRAVADA','COMPRA EXCLUIDA','COMPRA EXENTA','IVA DESCONTABLE','PROVEEDOR DE MERCANCIA','APORTES COOPERATIVA','APORTES COOPERATIVA'),
								   'tipo' => array('1','1','1','1','2','1','2'),
								   'valor' => array(),
								   'valorbase' => array(),
								   'centrocostos' => array('01','01','01','','','',''),
								   'transaccion' => '',
								   'plazo' => '0');
					
                    //cargamos el archivo que deseamos leer
                    $objPHPExcel = PHPExcel_IOFactory::load('../archivos/'.$archivo);
                    //obtenemos los datos de la hoja activa (la primera)
                    //$objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    //$objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
					
					$objHoja=$objPHPExcel->getSheet(0)->toArray(null,true,true,true);
					// ó
					//$objPHPExcel->getSheetByName('Worksheet 1');
					
                    //recorremos las filas obtenidas
                    foreach ($objHoja as $iIndice=>$objCelda) {
                        //imprimimos el contenido de la celda utilizando la letra de cada columna
						if ((integer)$objCelda['D'] > 0) {
							$datos["valor"][0] = $objCelda['T'] == '' ? 0 : str_replace('$','',str_replace(',','',$objCelda['T']));
							$datos["valor"][1] = $objCelda['M'] == '' ? 0 : str_replace('$','',str_replace(',','',$objCelda['M']));
							$datos["valor"][2] = $objCelda['J'] == '' ? 0 : str_replace('$','',str_replace(',','',$objCelda['J']));
							$datos["valor"][3] = $objCelda['V'] == '' ? 0 : str_replace('$','',str_replace(',','',$objCelda['V'])) * 0.16;
							$datos["valor"][4] = $objCelda['X'] == '' ? 0 : str_replace('$','',str_replace(',','',$objCelda['X']));
							$datos["valor"][5] = (str_replace('$','',str_replace(',','',$objCelda['T'])) + str_replace('$','',str_replace(',','',$objCelda['M'])) + str_replace('$','',str_replace(',','',$objCelda['J']))) * 0.01;
							$datos["valor"][6] = (str_replace('$','',str_replace(',','',$objCelda['T'])) + str_replace('$','',str_replace(',','',$objCelda['M'])) + str_replace('$','',str_replace(',','',$objCelda['J']))) * 0.01;
							
							$datos["valorbase"][0] = 0;
							$datos["valorbase"][1] = 0;
							$datos["valorbase"][2] = 0;
							$datos["valorbase"][3] = $objCelda['T'] == '' ? 0 : str_replace('$','',str_replace(',','',$objCelda['T']));
							$datos["valorbase"][4] = 0;
							$datos["valorbase"][5] = 0;
							$datos["valorbase"][6] = 0;
							
							$datos["fecha"] = $objCelda['E'];
							
							$datos["documento"] = $objCelda['D'];
							$datos["documentoreferencia"] = $objCelda['D'];
							
							//funcion para ir a buscar al proveedor
							$datos["nit"] = $objCelda['F'];
							
							
							if ($objCelda['F'] == 'JUAN PABLO SILVA') {
								for ($i=0;$i<7;$i++) {
									/*echo '
										<tr>
											<td>'.$datos["codigocuenta"].'</td>
											<td>'.$datos["comprobante"][$i].'</td>
											<td>'.$datos["fecha"].'</td>
											<td>'.$datos["documento"].'</td>
											<td>'.$datos["documentoreferencia"].'</td>
											<td>'.$datos["nit"].'</td>
											<td>'.$datos["detalle"][$i].'</td>
											<td>'.$datos["tipo"][$i].'</td>
											<td>'.$datos["valor"][$i].'</td>
											<td>'.$datos["valorbase"][$i].'</td>
											<td>'.$datos["centrocostos"][$i].'</td>
											<td>'.$datos["transaccion"].'</td>
											<td>'.$datos["plazo"].'</td>
										</tr>
									';*/
									$this->insertarDatos($datos["codigocuenta"][$i],$datos["comprobante"],$datos["fecha"],$datos["documento"],$datos["documentoreferencia"],$datos["nit"],$datos["detalle"][$i],$datos["tipo"][$i],$datos["valor"][$i],$datos["valorbase"][$i],$datos["centrocostos"][$i],$datos["transaccion"],$datos["plazo"],$nombre,$descripcion);
								}
							
							} else {
								for ($i=0;$i<5;$i++) {
									/*echo '
										<tr>
											<td>'.$datos["codigocuenta"].'</td>
											<td>'.$datos["comprobante"][$i].'</td>
											<td>'.$datos["fecha"].'</td>
											<td>'.$datos["documento"].'</td>
											<td>'.$datos["documentoreferencia"].'</td>
											<td>'.$datos["nit"].'</td>
											<td>'.$datos["detalle"][$i].'</td>
											<td>'.$datos["tipo"][$i].'</td>
											<td>'.$datos["valor"][$i].'</td>
											<td>'.$datos["valorbase"][$i].'</td>
											<td>'.$datos["centrocostos"][$i].'</td>
											<td>'.$datos["transaccion"].'</td>
											<td>'.$datos["plazo"].'</td>
										</tr>
									';*/
									$this->insertarDatos($datos["codigocuenta"][$i],$datos["comprobante"],$datos["fecha"],$datos["documento"],$datos["documentoreferencia"],$datos["nit"],$datos["detalle"][$i],$datos["tipo"][$i],$datos["valor"][$i],$datos["valorbase"][$i],$datos["centrocostos"][$i],$datos["transaccion"],$datos["plazo"],$nombre,$descripcion);
								}
							}
						}
                    }
}



function query($sql,$accion) {
		
		
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