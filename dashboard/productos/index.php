<?php

session_start();

if (!isset($_SESSION['usua_cv']))
{
	header('Location: /carnesvictoriaweb/login.php');
} else {

include ('../../includes/funcionesProductos.php');

$serviciosProductos = new ServiciosProductos();


$fecha = date('Y-m-d');

$resProductos = $serviciosProductos->traerProductos();

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestión de Cancha: La Caldera del Diablo</title>
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
		.form-group {
			padding:10px;
		}
		
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
            <p>Usuario: <span style="color: #333; font-weight:900;"><?php echo $_SESSION['nombre_se']; ?></span></p>
            <p class="ocultar" style="color: #900; font-weight:bold; cursor:pointer; font-family:'Courier New', Courier, monospace; height:20px;">(Ocultar)</p>
        </div>
    
        <nav class="nav">
            <ul>
                <li class="arriba"><div class="icodashboard"></div><a href="../index.php">Dashboard</a></li>
                <li><div class="icoturnos"></div><a href="../turnos/">Turnos</a></li>
                <li><div class="icoventas"></div><a href="../ventas/">Ventas</a></li>
                <li><div class="icousuarios"></div><a href="../clientes/">Clientes</a></li>
                <li><div class="icoproductos"></div><a href="index.php">Productos</a></li>
                <li><div class="icocontratos"></div><a href="../proveedores/">Proveedores</a></li>
                <li><div class="icoreportes"></div><a href="../reportes/">Reportes</a></li>
                <li><div class="icosalir"></div><a href="../salir/">Salir</a></li>
            </ul>
        </nav>
        
        <div id="infoMenu">
            <p>Información del Menu</p>
        </div>
        <div id="infoDescrMenu">
            <p>La descripción breve de cada item sera detallada aqui, deslizando el mouse por encima de cada menu.</p>
        </div>
     </div>
     <div class="menuHober">
     	<ul class="ulHober">
                <li class="arriba">
                	<div class="icodashboard2" id="tooltip2"></div>
                    <div class="tooltip-dash">Dashboard</div>
                </li>
                <li>
                	<div class="icoturnos2" id="tooltip3"></div>
                    <div class="tooltip-inmu">Turnos</div>
                </li>
                <li>
                	<div class="icoventas2" id="tooltip4"></div>
                    <div class="tooltip-alqui">Ventas</div>
                </li>
                <li>
                	<div class="icousuarios2" id="tooltip5"></div>
                    <div class="tooltip-usua">Clientes</div>
                </li>
                <li>
                	<div class="icoproductos2" id="tooltip9"></div>
                    <div class="tooltip-con">Productos</div>
                </li>
                <li>
                	<div class="icocontratos2" id="tooltip6"></div>
                    <div class="tooltip-con">Proveedores</div>
                </li>
                <li>
                	<div class="icoreportes2" id="tooltip7"></div>
                    <div class="tooltip-rep">Reportes</div>
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
        	<p style="color: #fff; font-size:18px; height:16px;">Nuevo Producto</p>
        </div>
    	<div class="cuerpoBox">
        
        <div class="row"> 
        <div class="col-sm-12 col-md-12">
        <form class="form-inline formulario" role="form">
                	
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	
				              	
                    
                    <div class="form-group col-md-6">
                    	<label for="producto" class="control-label" style="text-align:left">Nombre</label>
                        <div class="input-group col-md-12">
                        	<input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese el Nombre..." required>
                        </div>
                    </div>
					
                    <div class="form-group col-md-6">
                    	<label for="peso" class="control-label" style="text-align:left">Peso Aprox.</label>
                        <div class="input-group col-md-12">
                        	<span class="input-group-addon">Kg.</span>
                        	<input type="text" class="form-control" id="peso" name="peso" placeholder="Ingrese el Peso..." required>
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                    	<label for="precio_unit" class="control-label" style="text-align:left">Precio Unitario</label>
                        <div class="input-group col-md-12">
                        	<span class="input-group-addon">$</span>
                        	<input type="text" class="form-control" id="precio_unit" name="precio_unit" placeholder="Ingrese el Precio Unitario..." required>
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                    	<label for="precio_venta" class="control-label" style="text-align:left">Precio Venta</label>
                        <div class="input-group col-md-12">
                        	<span class="input-group-addon">$</span>
                            <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Ingrese el Precio Venta..." required>
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>

					<div class="form-group col-md-6">
                    	<label for="reftipoproducto" class="control-label" style="text-align:left">Precio Venta</label>
                        <div class="input-group col-md-12">
                            <select class="form-control" id="reftipoproducto" name="reftipoproducto">
                            	<option value="1">Novillo</option>
                                <option value="2">Ternera</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                    	<label for="imagen" class="control-label" style="text-align:left">Imagen</label>
                        <div class="input-group col-md-12">
                        	<div class='custom-input-file'>
                                    <input type="file" name="imagen1" id="imagen1">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia1" name="vistaPrevia1" width="72" height="72"/>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                    	<label for="observacion" class="control-label" style="text-align:left">Observación</label>
                        <div class="input-group col-md-12">
                        	<textarea type="text" class="form-control" id="observacion" name="observacion" placeholder="Ingrese el Observación..." required></textarea>
                        </div>
                    </div>
					<!--div para visualizar mensajes-->
                            <div class="messages"></div><br /><br />
                            <!--div para visualizar en el caso de imagen-->
                            <div class="showImage"></div>

                  
                
                
                    </div>
                    </div>
                    
                    <ul class="list-inline" style="padding-top:15px;">
                    	<li>
                    		<button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Cargar</button>
                        </li>
                        
   
                    </ul>
                    <div id="load">
                    
                    </div>
                    <div id="error" class="alert alert-info">
                		<p><strong>Importante!:</strong> El campo nombre, precio unitario, precio venta son obligatorios</p>
                	</div>
                    <input type="hidden" id="accion" name="accion" value="insertarProducto"/>
                </form>
                
                <br>
                
                
        </div>
    </div>

    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Ultimos 20 Productos Cargados</p>
        </div>
    	<div class="cuerpoBox">
        	<table class="table table-striped">
            	<thead>
                	<tr>
                    	<th>Imagen</th>
                    	<th>Nombre</th>
                        <th>Precio Unit</th>
                        <th>Precio Vent</th>
                        <th>Peso</th>
                        <th>Observación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	<?php
						if (mysql_num_rows($resProductos)>0) {
							$cant = 0;
							while ($row = mysql_fetch_array($resProductos)) {
								$cant+=1;
								if ($cant == 21) {
									break;	
								}
					?>
                    	<tr>
                        	<td><?php echo '<img src="../../'.$row[5].'"  width="72"/>'; ?></td>
                            <td><?php echo utf8_encode($row['producto']); ?></td>
                            <td><?php echo $row['preciounit']; ?></td>
                            <td><?php echo $row['precioventa']; ?></td>
                            
                            <td><?php echo $row['peso']." Kg"; ?></td>
                            <td><?php echo utf8_encode($row['observacion']); ?></td>

                            <td>
                            		<div class="btn-group">
										<button class="btn btn-success" type="button">Acciones</button>
										
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
										</button>
										
										<ul class="dropdown-menu" role="menu">
											<li>
											<a href="javascript:void(0)" class="varmodificar" id="<?php echo $row['idproducto']; ?>">Modificar</a>
											</li>

											<li>
											<a href="javascript:void(0)" class="varborrar" id="<?php echo $row['idproducto']; ?>">Borrar</a>
											</li>

										</ul>
									</div>
                             </td>
                        </tr>
                    <?php } ?>
                    <?php } else { ?>
                    	<h3>No hay productos cargados.</h3>
                    <?php } ?>
                </tbody>
            </table>
            <div style="height:50px;">
            
            </div>
            <button type="button" class="btn btn-default ver" style="margin-left:0px;">Ver Todos</button>
        </div>
    </div>

</div>

<div id="dialog2" title="Eliminar Producto">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar al Producto?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>También se borrara la relación con los productos asociados</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$('.ver').click(function(event){
			url = "ver.php";
			$(location).attr('href',url);
	});//fin del boton eliminar
	
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
									data:  {id: $('#idEliminar').val(), accion: 'eliminarProducto'},
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

	$("#producto").click(function(event) {
		if ($("#producto").val() == "") {
			$("#producto").removeClass("alert-danger");
			$("#producto").attr('value','');
			$("#producto").attr('placeholder','Ingrese el Nombre...');
		}
    });

	$("#producto").change(function(event) {
		if ($("#producto").val() == "") {
			$("#producto").removeClass("alert-danger");
			$("#producto").attr('placeholder','Ingrese el Nombre');
		}
	});
	
	$("#codigo").click(function(event) {
		if ($("#codigo").val() == "") {
			$("#codigo").removeClass("alert-danger");
			$("#codigo").attr('value','');
			$("#codigo").attr('placeholder','Ingrese el Codigo...');
		}
    });

	$("#codigo").change(function(event) {
		if ($("#codigo").val() == "") {
			$("#codigo").removeClass("alert-danger");
			$("#codigo").attr('placeholder','Ingrese el Codigo');
		}
	});
	
	$("#precio_unit").click(function(event) {
		if ($("#precio_unit").val() == "") {
			$("#precio_unit").removeClass("alert-danger");
			$("#precio_unit").attr('value','');
			$("#precio_unit").attr('placeholder','Ingrese el Precio Unit...');
		}
    });

	$("#precio_unit").change(function(event) {
		if ($("#precio_unit").val() == "") {
			$("#precio_unit").removeClass("alert-danger");
			$("#precio_unit").attr('placeholder','Ingrese el Precio Unit');
		}
	});
	
	$("#stock").click(function(event) {
		if ($("#stock").val() == "") {
			$("#stock").removeClass("alert-danger");
			$("#stock").attr('value','');
			$("#stock").attr('placeholder','Ingrese el Stock...');
		}
    });

	$("#stock").change(function(event) {
		if ($("#stock").val() == "") {
			$("#stock").removeClass("alert-danger");
			$("#stock").attr('placeholder','Ingrese el Stock');
		}
	});
	
	$("#stock_min").click(function(event) {
		if ($("#stock_min").val() == "") {
			$("#stock_min").removeClass("alert-danger");
			$("#stock_min").attr('value','');
			$("#stock_min").attr('placeholder','Ingrese el Stock Minimo...');
		}
    });

	$("#stock_min").change(function(event) {
		if ($("#stock_min").val() == "") {
			$("#stock_min").removeClass("alert-danger");
			$("#stock_min").attr('placeholder','Ingrese el Stock Minimo');
		}
	});
	
	function validador(){

			$error = "";
//idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas
			
			if ($("#producto").val() == "") {
				$error = "Es obligatorio el campo nombre.";
				$("#producto").addClass("alert-danger");
				$("#producto").attr('placeholder',$error);
			}
			
			
			if ($("#precio_unit").val() == "") {
				$error = "Es obligatorio el campo Precio Unit.";
				$("#precio_unit").addClass("alert-danger");
				$("#precio_unit").attr('placeholder',$error);
			}
			
			if ($("#stock_min").val() == "") {
				$error = "Es obligatorio el campo stock min.";
				$("#stock_min").addClass("alert-danger");
				$("#stock_min").attr('placeholder',$error);
			}


			return $error;
    }
	
	//al enviar el formulario
    $('#cargar').click(function(){
		existeCodigo($( this ).val());
		if (validador() == "")
        {
			//información del formulario
			var formData = new FormData($(".formulario")[0]);
			var message = "";
			//hacemos la petición ajax  
			$.ajax({
				url: '../../ajax/ajax.php',  
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){
					$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
				},
				//una vez finalizado correctamente
				success: function(data){

					if (data != '') {
                                            $(".alert").removeClass("alert-danger");
											$(".alert").removeClass("alert-info");
                                            $(".alert").addClass("alert-success");
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Producto</strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											url = "index.php";
											$(location).attr('href',url);
                                            
											
                                        } else {
                                        	$(".alert").removeClass("alert-danger");
                                            $(".alert").addClass("alert-danger");
                                            $(".alert").html('<strong>Error!</strong> '+data);
                                            $("#load").html('');
                                        }
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		}
    });
	
	function existeCodigo(codigo) {
		$.ajax({
			data:  {codigo:	$("#codigo").val(),
					accion:	'existeCodigo'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
					$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');
			},
			success:  function (response) {
					
					if (response == '') {
						
						$("#load").html('');
						$("#codigo").val('');
						$error = "Ya existe ese codigo.";
						$("#codigo").addClass("alert-danger");
						$("#codigo").attr('placeholder',$error);
						$("#errorCodigo").html('');
						$("#errorCodigo").html('<strong>Error!</strong> El codigo ya existe');

					} else {
						$("#load").html('');
						$("#errorCodigo").html('');
						$("#errorCodigo").html('<strong>Ok!</strong> El codigo se puede utilizar');
						
					}
					
			}
		});
	}
	
	$('#codigo').focusout(function(e) {
        existeCodigo($( this ).val());
    });
	
	$(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
	
	
		$('#imagen1').on('change', function(e) {
		  var Lector,
			  oFileInput = this;
		 
		  if (oFileInput.files.length === 0) {
			return;
		  };
		 
		  Lector = new FileReader();
		  Lector.onloadend = function(e) {
			$('#vistaPrevia1').attr('src', e.target.result);         
		  };
		  Lector.readAsDataURL(oFileInput.files[0]);
		 
		});


		jQuery('#imagen').on('change', function(e) {
		  var Lector,
			  oFileInput = this;
		 
		  if (oFileInput.files.length === 0) {
			return;
		  };
		 
		  Lector = new FileReader();
		  Lector.onloadend = function(e) {
			jQuery('#vistaPrevia').attr('src', e.target.result);         
		  };
		  Lector.readAsDataURL(oFileInput.files[0]);
		 
		});
	
	jQuery('#actualizarUsuario').on('click', function(e) {
	  e.preventDefault();
	  var parametros = {
		id : jQuery('#idUsuario').val(),
		nombre : jQuery('#nombreUsuario').val(),
		imagen : jQuery('#temporal').val()
	  };
	  $.ajax('guardar_imagen.php', {
		type : 'post',
		data : parametros,
		success : function(data) {
		  if(data.error){
			console.log('Error controlado.', data.mensaje);
			return;
		  };
		  console.log('Los datos del usuario ' + parametros.id + ' fueron guardados.');
		},
		error : function(data) {
		  console.log('Error no controlado.', data);
		}
	  });
	  return false;
	});
	
	function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
 
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase())
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}

});//fin del document ready
</script>

<?php } ?>

</body>
</html>
