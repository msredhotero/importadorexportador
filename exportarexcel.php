<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo para leer un archivo de Excel con PHP - www.lewebmonster.com</title>
        <link rel="stylesheet" type="text/css" href="css/excel.css">
    </head>
    <body>
        <div id="divContenedor">
            <h1>Ejemplo para leer un archivo de Excel con PHP</h1>
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
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
                <tbody>
                <?php
                    //incluimos la clase
                    require_once 'excelClass/PHPExcel/IOFactory.php';
                    
					$datos = array('codigocuenta' => '00004',
								   'comprobante' => array ('14350504','14350504','14350506','24081001','220501','129505','233595'),
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
                    $objPHPExcel = PHPExcel_IOFactory::load('ProyectoFrenlancer.xlsx');
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
									echo '
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
									';
								}
							
							} else {
								for ($i=0;$i<5;$i++) {
									echo '
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
									';
								}
							}
						}
                    }
                ?>
                
                
                </tbody>

            </table>
        </div>
    </body>
</html>