<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo " Makclau's ltda. Av2E N°16A-25 Apt.101 Caobos, Cúcuta-Colombia. Telf:(7)5893944-3163786982 "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo NIT_EMPRESA;?><br> 
                <br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Email: <?php echo EMAIL_EMPRESA;?>
                
            </td>
			<td style="width: 25%;text-align:right">
			FACTURA Nº <?php echo $numero_servicio;?>
			</td>
			
        </tr>
    </table>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>FACTURAR A</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo $rw_cliente['nombre_cliente'];
				echo "<br>";
				echo $rw_cliente['direccion_cliente'];
				echo "<br> Teléfono: ";
				echo $rw_cliente['telefono_cliente'];
				echo "<br> Email: ";
				echo $rw_cliente['email_cliente'];
			?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>VENDEDOR</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA</td>
       
        </tr>
            
    
         
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users where user_id='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['firstname']." ".$rw_user['lastname'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>

   
    </table>
             <br>
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 15%" class='midnight-blue'>OPCIONES:</th>
            
        </tr>
    </table>
    <br>
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 35%" class='midnight-blue'>INDICACIONES DEL CLIENTE:</th>
            
        </tr>
    </table> 
        <br>
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 35%" class='midnight-blue'>TRABAJO REALIZADO:</th>
            
        </tr>
    </table>
     <br>
    
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 50%" class='midnight-blue'>OPERARIO/OPERACION</th>
           <th style="width: 20%;text-align: right" class='midnight-blue'>FECHA</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>H.INICIO</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>H.FINAL</th>
            <th style="width: 10%;text-align: right" class='midnight-blue'>T.TIEMPO</th>
            
        </tr>
    </table>
            <br>
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
       <th style="width: 60%" class='midnight-blue'>MATERIAL</th>
        <th style="width: 10%;text-align:center" class='midnight-blue'>CANTIDAD</th>
            
        </tr>
    </table>

	
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO servicio VALUES ('','$numero_servicio','$date','$id_cliente','$id_vendedor','1')");

?>