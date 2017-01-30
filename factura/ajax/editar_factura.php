<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	$id_servicio= $_SESSION['id_servicio'];
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id_cliente'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['id_vendedor'])) {
           $errors[] = "Selecciona el vendedor";
		} else if ($_POST['estado_servicio']==""){
			$errors[] = "Selecciona el estado del servicio";
		} else if ($_POST['opciones']==""){
			$errors[] = "Selecciona opciones del servicio";
		} else if ($_POST['indicaciones']==""){
			$errors[] = "indicaciones del servicio";
		} else if ($_POST['trabajo']==""){
			$errors[] = "trabajo del servicio";
		} else if ($_POST['operacion']==""){
			$errors[] = "operacion del servicio";
		} else if ($_POST['fech']==""){
			$errors[] = "fech del servicio";
		} else if ($_POST['inicio']==""){
			$errors[] = "H.inicio del servicio";
		} else if ($_POST['final']==""){
			$errors[] = "H.final del servicio";
		} else if (
			!empty($_POST['id_cliente']) &&
			!empty($_POST['id_vendedor']) &&
			!empty($_POST['opciones']) &&
			!empty($_POST['indicaciones']) &&
			!empty($_POST['trabajo']) &&
			!empty($_POST['operacion']) &&
			!empty($_POST['fech']) &&
			!empty($_POST['inicio']) &&
			!empty($_POST['final']) &&
			$_POST['estado_servicio']!="" 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_cliente=intval($_POST['id_cliente']);
		$id_vendedor=intval($_POST['id_vendedor']);
		$opciones=intval($_POST['opciones']);
		$indicaciones=intval($_POST['indicaciones']);
		$trabajo=intval($_POST['trabajo']);
		$operacion=intval($_POST['operacion']);
		$fech=intval($_POST['fech']);
		$inicio=intval($_POST['inicio']);
		$final=intval($_POST['final']);
		$estado_servicio=intval($_POST['estado_servicio']);
		
		$sql="UPDATE servicio SET id_cliente='".$id_cliente."', id_vendedor='".$id_vendedor."', estado_servicio='".$estado_servicio."' WHERE id_servicio='".$id_servicio."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "servicio ha sido actualizada satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>