<?php

session_start();

if (!isset($_SESSION['usua_cv']))
{
	header('Location: /exportardatos/login.php');
} else {

include ('../includes/funcionesProveedores.php');
include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesImportar.php');

$serviciosProveedores = new ServiciosProveedores();
$serviciosUsuario = new ServiciosUsuarios();
$serviciosImportar = new ServiciosImportar();


$fecha = date('Y-m-d');


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Importación y Exportación</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css">

    <script src="../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

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
   <link href="../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../js/jquery.mousewheel.js"></script>
      <script src="../js/perfect-scrollbar.js"></script>
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
                <li class="arriba"><div class="icodashboard"></div><a href="index.php">Dashboard</a></li>
                <li><div class="icocontratos"></div><a href="proveedores/">Proveedores</a></li>
                <li><div class="icosalir"></div><a href="../index.php">Salir</a></li>
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
        	<p style="color: #fff; font-size:18px; height:16px;">Importar Datos</p>
        	
        </div>
    	<div class="cuerpoBox">
    		<form role="form" class="formulario">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label" for="archivos">Ingrese un nombre a la subida</label>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="nombre" name="nombre"/>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label" for="archivos">Ingrese una descripción</label>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" cols="50" rows="5" name="descripcion" id="descripcion">
                            </textarea>
                        </div>
                    </div>
                </div>
            	<div class="row">
            		<div class="col-md-5">
                        <label class="control-label" for="archivos">Seleccione el archivo a subir</label>
                        <div class="form-group col-md-12">
                            <input type="file" name="archivo" id="archivo"/>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                    	<button type="button" class="btn btn-success" id="cargar">Cargar</button>
                    </div>
                    <div class="col-md-2">
                    
                    </div>
                </div>
                <input type="hidden" id="accion" name="accion" value="importar">
            </form>
            
            <div id="load">
            
            </div>
    	</div>
    </div>

	<div class="boxInfo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Datos Obtenidos</p>
        	
        </div>
    	<div class="cuerpoBox2">
    		
            <div id="load">
            
            </div>
    	</div>
    </div>
    
    
   

</div>




<div id="dialog2" title="Eliminar Producto">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el pedido?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Se borrara el pedido y se le enviara un email al cliente!.</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<script type="text/javascript">
$(document).ready(function(){
	
	 $( '#dialog2' ).dialog({
		autoOpen: false,
		resizable: false,
		width:800,
		height:740,
		modal: true,
		buttons: {
			"Ok": function() {
				$( this ).dialog( "close" );
			}
		}
	});

$('#cargar').click(function() {
	var formData = new FormData($(".formulario")[0]);
			var message = "";
			//hacemos la petición ajax  
			$.ajax({
				url: '../ajax/ajax.php',  
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
					$("#load").html('<img src="../imagenes/load13.gif" width="50" height="50" />');
       
				},
				//una vez finalizado correctamente
				success: function(data){
					
					$('.cuerpoBox2').prepend(data);
					$("#load").html('');
				},
				//si ha ocurrido un error
				error: function(){
					$('.cuerpoBox2').prepend('Error');
				}
			});//fin del ajax
			
});

});
</script>
<?php } ?>
</body>
</html>
