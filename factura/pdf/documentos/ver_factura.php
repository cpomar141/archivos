<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	$id_servicio= intval($_POST['id_servicio']);
	$sql_count=mysqli_query($con,"select * from servicio where id_servicio='".$id_servicio."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('servicio no encontrado')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_servicio=mysqli_query($con,"select * from servicio where id_servicio='".$id_servicio."'");
	$rw_servicio=mysqli_fetch_array($sql_servicio);
	$numero_servicio=$rw_servicio['numero_servicio'];
	$id_cliente=$rw_servicio['id_cliente'];
	$id_vendedor=$rw_servicio['id_vendedor'];
	$fecha_servicio=$rw_servicio['fecha_servicio'];
	$estado_servicio=$rw_servicio['estado_servicio'];
	$opciones=$rw_servicio['opciones'];
	$indicaciones=$rw_servicio['indicaciones'];
	$trabajo=$rw_servicio['trabajo'];
	$operacion=$rw_servicio['operacion'];
	$fech=$rw_servicio['fech'];
	$inicio=$rw_servicio['inicio'];
	$final=$rw_servicio['final'];
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_factura_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_POST['vuehtml']));
        // send the PDF
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
