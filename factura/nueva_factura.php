<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_servicio="active";

	$active_clientes="";
	$active_usuarios="";	
	$active_perfil="";	
	$title="makclaus.ltda |Nuevo servicio";
   
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
  <section>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nuevo servicio</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/registro_clientes.php");
		?>
			<form class="form-horizontal" role="form" id="datos_servicio" method="POST">
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
					  <input id="id_cliente" type='hidden'>	
				  </div>
                
				  <label for="tel1" class="col-md-1 control-label">Teléfono</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
							</div>
							
					<label for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-2">
								<input type="email" class="form-control input-sm" id="mail" placeholder="Email" readonly>
							</div>
				 </div>
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">empleado</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="id_vendedor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from users order by lastname");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["user_id"];
											$nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];
											if ($id_vendedor==$_SESSION['user_id']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
							<td>
						<div >
						
                            <label class="col-md-1 control-label">Opciones</label><br>
                            <div class="col-md-2">
                                <input type="checkbox" value="instalacion" name="opcion[]"/>instalacion<br>
                                <input type="checkbox" value="adicion" name="opcion[]"/>adicion<br>
                                <input type="checkbox" value="reinstalacion" name="opcion[]"/>reinstalacion<br>
                                <input type="checkbox" value="modificacion" name="opcion[]"/>modificacion<br>
                                <input type="checkbox" value="desmontar" name="opcion[]"/>desmontar<br>
							</div>
                            <div class="col-md-2">
                                <input type="checkbox" value="revision punto" name="opcion[]"/>revision punto<br>
                                <input type="checkbox" value="revision sistema" name="opcion[]"/>revision sistema<br>
                                <input type="checkbox" value="punto video" name="opcion[]"/>punto video<br>
                                <input type="checkbox" value="punto red" name="opcion[]"/>punto red
                            </div>
                            <td>
                        </div>
						
		
                        <div class="col-md-3" >
                            <LABEL  >indicaciones del cliente:</LABEL>
					
                            <textarea name="indicaciones"  id="indicaciones" placeholder="indicaciones"></textarea>
			
                        </div>
						<div class="col-md-3">
						<label >trabajo realizado:</label>
		
                            <textarea name="trabajo"  id="trabajo" placeholder=" trabajo"></textarea>

						</div>
						
						
				<table class="table bg-info"  id="tabla">
                       <div class="form-group">
                        <td><label>PROCESO:</label></td>
                    <tr class="fila-fija">
                        <td><textarea required name="operacion[]" id="operacion" placeholder="operario/operacion"></textarea></td>
                        <td><input required name="fech[]" id="fech" placeholder="dd-mm-aaaa"/></td>
                        <td><input required name="inicio[]" id="inicio" placeholder="HH:MM"/></td>
                        <td><input required name="final[]" id="final" placeholder="HH:MM"/></td>
                        <td class="eliminar"><input type="button"   value="Menos -"/></td>
                        
                    </tr>
                    <td><button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button></td>
                    </div>
                    </table>
					
					
					
						
						</div>
						
						
							   
					
                   
				
				
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			
			
			
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nuevo_servicio.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
      
           
        
	<script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});	
			
			
			 $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional").on('click', function(){
                    $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
             
                // Evento que selecciona la fila y la elimina 
                $(document).on("click",".eliminar",function(){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                });
            });
	</script>
</section>
  </body>
</html>