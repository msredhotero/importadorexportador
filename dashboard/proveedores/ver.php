<?php

session_start();

if (!isset($_SESSION['usua_cv']))
{
	header('Location: /importadorexportador/index.php');
} else {

include ('../../includes/funcionesProveedores.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesImportar.php');

$serviciosProveedores = new ServiciosProveedores();
$serviciosUsuario = new ServiciosUsuarios();
$serviciosImportar = new ServiciosImportar();

$resProveedores = $serviciosProveedores->traerProveedores();

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Importación y Exportación</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    
    <script src="../../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
		
	</style>
    
    <script type="text/javascript">
		$( document ).ready(function() {
			$('.icodashboard2, .icoventas2, .icousuarios2, .icoturnos2, .icoproductos2, .icoreportes2, .icocontratos2, .icosalir2').click(function() {
				$('.menuHober').hide();
				$('.todoMenu').show(100, function() {
					$('#navigation').animate({'margin-left':'0px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
			});
			
			$('.ocultar').click(function(){
				$('.menuHober').show(100, function() {
					$('#navigation').animate({'margin-left':'-185px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
				$('.todoMenu').hide();
			});
			
			
						$("#tooltip2").mouseover(function(){
							$("#tooltip2").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip3").mouseover(function(){
							$("#tooltip3").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip4").mouseover(function(){
							$("#tooltip4").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip5").mouseover(function(){
							$("#tooltip5").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip6").mouseover(function(){
							$("#tooltip6").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip7").mouseover(function(){
							$("#tooltip7").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip8").mouseover(function(){
							$("#tooltip8").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip9").mouseover(function(){
							$("#tooltip9").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});

		});
	</script>
   	  <link href="../../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../../js/jquery.mousewheel.js"></script>
      <script src="../../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
</head>

<body>


<div id="navigation" >
	<div class="todoMenu">
        <div id="mobile-header">
            Menu
            <p>Usuario: <span style="color: #333; font-weight:900;"><?php echo $_SESSION['nombre_cv']; ?></span></p>
            <p class="ocultar" style="color: #900; font-weight:bold; cursor:pointer; font-family:'Courier New', Courier, monospace; height:20px;">(Ocultar)</p>
        </div>
    
        <nav class="nav">
            <ul>
                <li class="arriba"><div class="icodashboard"></div><a href="../index.php">Dashboard</a></li>
                <li><div class="icocontratos"></div><a href="index.php">Proveedores</a></li>
                <li><div class="icosalir"></div><a href="../logout.php">Salir</a></li>
            </ul>
        </nav>
        
      
     </div>
     <div class="menuHober">
     	<ul class="ulHober">
                <li class="arriba">
                	<div class="icodashboard2" id="tooltip2"></div>
                    <div class="tooltip-dash">Dashboard</div>
                </li>
                <li>
                	<div class="icocontratos2" id="tooltip4"></div>
                    <div class="tooltip-alqui">Proveedores</div>
                </li>
         
                <li>
                	<div class="icosalir2" id="tooltip8"></div>
                    <div class="tooltip-sal">Salir</div>
                </li>
            </ul>
     </div>
</div>

<div id="ingoGral" style=" margin-left:240px; padding-top:20px;">

	
    <div class="boxInfo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Proveedores Cargados</p>
        </div>
    	<div class="cuerpoBox">
        <button type="button" class="btn btn-primary nuevo" style="margin-left:0px;">Nuevo Proveedor</button>
        	<table class="table table-striped">
            	<thead>
                	<tr>
                    	<th>Proveedor</th>
                        <th>NIT</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!--proveedor,direccion, telefono, cuit, nombre, email -->
                	<?php
						if (mysql_num_rows($resProveedores)>0) {
							$cant = 0;
							while ($row = mysql_fetch_array($resProveedores)) {
								$cant+=1;
								if ($cant == 11) {
									break;	
								}
					?>
                    	<tr>
                        	<td><?php echo utf8_encode($row['proveedor']); ?></td>
                            <td><?php echo utf8_encode($row['nit']); ?></td>

                            <td>
                            		<div class="btn-group">
										<button class="btn btn-success" type="button">Acciones</button>
										
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
										</button>
										
										<ul class="dropdown-menu" role="menu">
											<li>
											<a href="javascript:void(0)" class="varmodificar" id="<?php echo $row['idproveedor']; ?>">Modificar</a>
											</li>

											<li>
											<a href="javascript:void(0)" class="varborrar" id="<?php echo $row['idproveedor']; ?>">Borrar</a>
											</li>

										</ul>
									</div>
                             </td>
                        </tr>
                    <?php } ?>
                    <?php } else { ?>
                    	<h3>No hay proveedores cargados.</h3>
                    <?php } ?>
                </tbody>
            </table>
            <div style="height:50px;">
            
            </div>
            
        </div>
    </div>

</div>

<div id="dialog2" title="Eliminar Proveedor">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar al Proveedor?.<span id="proveedorEli"></span>
        </p>
     
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$('.nuevo').click(function(event){
			url = "index.php";
			$(location).attr('href',url);
	});//fin del boton nuevo
	
	$('.varborrar').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog2").dialog("open");
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$('.varmodificar').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificar.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar

	$( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarProveedores'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											url = "index.php";
											$(location).attr('href',url);
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
});
</script>


<?php } ?>

	
	
</body>
</html>
