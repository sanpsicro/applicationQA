<script type="text/javascript">
function creaAjax(){
         var objetoAjax=false;
         try {
          /*Para navegadores distintos a internet explorer*/
          objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
          try {
                   /*Para explorer*/
                   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
                   }
                   catch (E) {
                   objetoAjax = false;
          }
         }
         if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
          objetoAjax = new XMLHttpRequest();
         }
         return objetoAjax;
}
/*----
*/   
function FAjax (url,capa,valores,metodo)
{
          var ajax=creaAjax();
          var capaContenedora = document.getElementById(capa);
/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/
if(metodo.toUpperCase()=='POST'){
         ajax.open ('POST', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                          capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"img/loading.gif\"> <b><font color=\"#eeeeee\">Cargando.......</font></b></td></tr></table>";
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200)
                   {
                        document.getElementById(capa).innerHTML=ajax.responseText;
                   }
                   else if(ajax.status==404)
                                             {
                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                           else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
                  }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(valores);
         return;
}
/*Creamos y ejecutamos la instancia si el metodo elegido es GET*/
if (metodo.toUpperCase()=='GET'){
         ajax.open ('GET', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                                      capaContenedora.innerHTML="<table cellpadding=3 cellspacing=3 width=100% bgcolor=white><tr><td height=150 align=middle valign=middle><img src=\"img/loading.gif\" align=\"absmiddle\"> <b><font color=\"#cccccc\" size=3 face=arial>Cargando...</font></b></td></tr></table>";
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200){
                                             document.getElementById(capa).innerHTML=ajax.responseText;
                   }
                   else if(ajax.status==404)
                                             {
                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                                             else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
                  }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(null);
         return
}
} 
</script>

<script type="text/javascript" src="subcombo.js"></script>
<? 
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);


$result = mysql_query("SELECT * from general where id = '$id'",$db);
$servicio=mysql_result($result,0,"servicio");
$contrato=mysql_result($result,0,"contrato");
$cliente=mysql_result($result,0,"idCliente");
$ejecutivoaa=mysql_result($result,0,"idEmpleado");
$fecha_recepcion=mysql_result($result,0,"fecha_recepcion");
$fexa1=explode(" ",$fecha_recepcion);
$fexa1d=explode("-",$fexa1[0]);
$fecha_suceso=mysql_result($result,0,"fecha_suceso");
$fexa2=explode(" ",$fecha_suceso);
$fexa2d=explode("-",$fexa2[0]);
$reporta=mysql_result($result,0,"reporta");
$tel_reporta=mysql_result($result,0,"tel_reporta");
$num_contrato=mysql_result($result,0,"num_contrato");
$expediente=mysql_result($result,0,"expediente");
$num_cliente=mysql_result($result,0,"num_cliente");
$num_siniestro=mysql_result($result,0,"num_siniestro");
$ajustador=mysql_result($result,0,"ajustador");
$usuario=mysql_result($result,0,"usuario");
$motivo_servicio=mysql_result($result,0,"motivo_servicio");
$auto_marca=mysql_result($result,0,"auto_marca");
$auto_tipo=mysql_result($result,0,"auto_tipo");
$auto_modelo=mysql_result($result,0,"auto_modelo");
$auto_color=mysql_result($result,0,"auto_color");
$auto_placas=mysql_result($result,0,"auto_placas");
$ubicacion_requiere=mysql_result($result,0,"ubicacion_requiere");
$ubicacion_referencias=mysql_result($result,0,"ubicacion_referencias");
$ubicacion_estado=mysql_result($result,0,"ubicacion_estado");
$ubicacion_municipio=mysql_result($result,0,"ubicacion_municipio");
$ubicacion_ciudad=mysql_result($result,0,"ubicacion_ciudad");
$observaciones=mysql_result($result,0,"observaciones");
$reporte_cliente=mysql_result($result,0,"reporte_cliente");
$probestar=mysql_result($result,0,"Proveedor");
$convenio=mysql_result($result,0,"convenio");
$inciso=mysql_result($result,0,"inciso");
$ejecutivo=mysql_result($result,0,"ejecutivo");
$fax=mysql_result($result,0,"fax");
$email=mysql_result($result,0,"email");
$cobertura=mysql_result($result,0,"cobertura");
$pasajero=mysql_result($result,0,"pasajero");
$fecha_compra =mysql_result($result,0,"fecha_compra");
$codigo_reserva =mysql_result($result,0,"codigo_reserva");
$vuelo=mysql_result($result,0,"vuelo");
$fecha_vuelo =mysql_result($result,0,"fecha_vuelo");
$origen_ciudad =mysql_result($result,0,"origen_ciudad");
$destino_ciudad_v =mysql_result($result,0,"destino_ciudad_v");
$fecha_respuesta =mysql_result($result,0,"fecha_respuesta");
$motivo_servicio_v =mysql_result($result,0,"motivo_servicio_v");
$telefono_v =mysql_result($result,0,"telefono_v");
$fax_v =mysql_result($result,0,"fax_v");
$email_v =mysql_result($result,0,"email_v");

$result = mysql_query("SELECT * from servicios where id = '$servicio'",$db);
$servicio=mysql_result($result,0,"servicio");
$tipoServicio=mysql_result($result,0,"tipo");
$campos=mysql_result($result,0,"campos");

/*$row=mysql_fetch_assoc($result);
extract($row);*/
$camposex=explode(",",$campos);
$result = mysql_query("SELECT * from Cliente where idCliente = '$cliente'",$db);
$cliente=mysql_result($result,0,"nombre");
$result = mysql_query("SELECT * from Estado where idEstado = '$ubicacion_estado'",$db);
$ubicacion_estado=mysql_result($result,0,"NombreEstado");
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$ubicacion_municipio'",$db);
$ubicacion_municipio=mysql_result($result,0,"NombreMunicipio");
$result = mysql_query("SELECT * from Provedor where id = '$probestar'",$db);
$probestar=mysql_result($result,0,"nombre");

function sumDays($ano,$mes,$dia){
	$jd = GregorianToJD ($mes,$dia,$ano);
	$jd =  $jd + 21;
	$gregorian = JDToGregorian ($jd);
	$gregorian = explode('/',$gregorian);
	if($gregorian[0] <= 9){ $gregorian[0] = '0'.$gregorian[0]; }
	if($gregorian[1] <= 9){ $gregorian[1] = '0'.$gregorian[1]; }
	$fecha = $gregorian[2].'-'.$gregorian[0].'-'.$gregorian[1];
	return $fecha;
}


$dbl = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbl);
$resultl = mysql_query("SELECT nombre from Empleado where idEmpleado='$ejecutivoaa'",$dbl);
$aaejecutivo=mysql_result($resultl,0,"nombre");

?> 
<table border=0 width=950 cellpadding=0 cellspacing=0 align="center" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#010a0f" width="160" class="redondos">
<div align="center">
<a href="mainframe.php" class="menu">REGRESAR</a>
</div>
</td>
<td bgcolor="#FFFFFF" width="790">&nbsp;</td>
</tr>
</table>
<table border=0 width=950 cellpadding=0 cellspacing=0 align="center" class="dataclass">
 <tr> 
 	  <td width="600" bgcolor="#FFFFFF"></td>
      <td class="redondas" bgcolor="#EFEFEF"><div align="center" class="filermax">Reporte AMA: <? echo $reporte_cliente;?></div></td>
     </tr>
<tr>
  <td colspan="2" bgcolor="#EFEFEF">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td bgcolor="#CCCCCC" colspan=3><div class="filermax" align="left">Status del caso</div></td>
    </tr></table> <div id="statuscaso"><?
    include("status_caso.php");
	?></div>  
    <?
	$ivx=0;
$checa_array=array_search("informacion_caso",$camposex);
$checa_array2=array_search("num_contrato",$camposex);
$checa_array3=array_search("reporta",$camposex);
$checa_array4=array_search("tel_reporta",$camposex);
$checa_array5=array_search("fecha_suceso",$camposex);
$checa_array6=array_search("convenio",$camposex);
$checa_array7=array_search("expediente",$camposex);
$checa_array8=array_search("num_cliente",$camposex);
$checa_array9=array_search("num_siniestro",$camposex);
$checa_array10=array_search("inciso",$camposex);
$checa_array11=array_search("usuario",$camposex);
$checa_array12=array_search("reporte_cliente",$camposex);
if($checa_array===FALSE && $checa_array2===FALSE && $checa_array3===FALSE  && $checa_array4===FALSE && $checa_array5===FALSE && $checa_array6===FALSE && $checa_array7===FALSE && $checa_array8===FALSE && $checa_array9===FALSE && $checa_array10===FALSE && $checa_array11===FALSE && $checa_array12===FALSE)
{}
else{
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td bgcolor="#CCCCCC" colspan=3><div class="filermax" align="left">Información del caso</div></td>
      </tr>
    <tr>

      <td><strong>Expediente AA:</strong> <? echo $expediente;?></td>   <? $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			?>  

      <?
$checa_arrayx=array_search("reporte_cliente",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
            <td><strong>Reporte AMA:</strong> <? echo $reporte_cliente;?></td>
 <? $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>

	<?
		$checa_arrayx=array_search("ejecutivo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Ejecutivo AMA:</strong> <? echo $ejecutivo;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
    
    	    	<td><strong>Ejecutivo AA:</strong> <? echo $aaejecutivo;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>

      <td><strong>Fecha de recepci&oacute;n:</strong> <? echo ''.$fexa1d[2].'/'.$fexa1d[1].'/'.$fexa1d[0].' '.$fexa1[1].'';?></td>
     
       <? $ivx++; 			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}?>
      
<?
$checa_arrayx=array_search("reporta",$camposex);
if($checa_arrayx===FALSE){} else{
?>    
      <td><strong>Reporta:</strong> <? echo $reporta;?></td>
      
      <? $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
                  
          <?
$checa_arrayx=array_search("usuario",$camposex);
if($checa_arrayx===FALSE){} else{
?>          
      <td><strong>Paciente:</strong> <? echo $usuario;?></td>
 <? $ivx++; 
			            if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
      


    </tr>
       
       <tr><td colspan=3 align="right"><strong></strong></td>
       </tr>
       
   </table>
   <?
   $checa_arrayx=array_search("vuelo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
   ?>
   <table width="100%" border="0" cellspacing="0" cellpadding="3">
   	<tr>
    	<td bgcolor="#CCCCCC" colspan=3><div class="filermax" align="left">Información del Vuelo</div></td>
    </tr>   
	<?
		$ivx=0;
		$checa_arrayx=array_search("pasajero",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Pasajero:</strong> <? echo $pasajero;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("fecha_compra",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Fecha de Compra:</strong> <? echo $fecha_compra;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("codigo_reserva",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>C&oacute;digo de Reserva:</strong> <? echo $codigo_reserva;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("vuelo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Vuelo:</strong> <? echo $vuelo;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("fecha_vuelo",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else{
			if($fecha_vuelo == '0000-00-00'){
				$fecha_vuelo = 'No definida';
			}else{
				//$fecha_vuelo = explode('-',$fecha_vuelo);
				//$fecha_vuelo = sumDays($fecha_vuelo[0],$fecha_vuelo[1],$fecha_vuelo[2]);
				//$fecha_vuelo = $fecha_vuelo[0],$fecha_vuelo[1],$fecha_vuelo[2];
				
			}
			?>          
	    	<td><strong>Fecha de Vuelo:</strong> <? echo $fecha_vuelo;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("origen_ciudad",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Ciudad de Or&iacute;gen:</strong> <? echo $origen_ciudad;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("destino_ciudad_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Ciudad de Destino:</strong> <? echo $destino_ciudad_v;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("fecha_respuesta",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Fecha de Respuesta:</strong> <? echo $fecha_respuesta;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("motivo_servicio_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Motivo de Servicio:</strong> <? echo $motivo_servicio_v;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("telefono_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Tel. de Contacto:</strong> <? echo $telefono_v;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("fax_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>Fax:</strong> <? echo $fax_v;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?>
	<?
		$checa_arrayx=array_search("email_v",$camposex);
		if($checa_arrayx===FALSE)
		{
		}
		else
		{
			?>          
	    	<td><strong>E-mail:</strong> <? echo $email_v;?></td>
			<?
				$ivx++; 
			    if($ivx=="3")
				{
					echo'</tr><tr>';
					$ivx=0;
				}
		}
	?> 	
    <tr>
		<td colspan=3 align="right"><strong></strong></td>
    </tr>
       
   </table>
   
        <?
}

	?>	
	 
      
       
              <?
$checa_array=array_search("detalles_servicio",$camposex);
$checa_array2=array_search("tecnico_solicitado",$camposex);
$checa_array3=array_search("motivo_servicio",$camposex);
$checa_array4=array_search("ubicacion_requiere",$camposex);
$checa_array5=array_search("tipo_asistencia_vial",$camposex);
$checa_array6=array_search("tipo_asistencia_medica",$camposex);
$checa_array7=array_search("domicilio_cliente",$camposex);
$checa_array8=array_search("domicilio_sustituto",$camposex);
$checa_array9=array_search("ubicacion_estado",$camposex);
$checa_array10=array_search("ubicacion_municipio",$camposex);
$checa_array11=array_search("ubicacion_colonia",$camposex);
$checa_array12=array_search("ubicacion_ciudad",$camposex);
$checa_array13=array_search("destino_servicio",$camposex);
$checa_array14=array_search("destino_estado",$camposex);
$checa_array15=array_search("destino_municipio",$camposex);
$checa_array16=array_search("destino_colonia",$camposex);
$checa_array17=array_search("destino_ciudad",$camposex);
$checa_array18=array_search("formato_carta",$camposex);
$checa_array19=array_search("instructivo",$camposex);
if($checa_array===FALSE && $checa_array2===FALSE && $checa_array3===FALSE && $checa_array4===FALSE && $checa_array5===FALSE && $checa_array6===FALSE && $checa_array7===FALSE && $checa_array8===FALSE && $checa_array9===FALSE && $checa_array10===FALSE && $checa_array11===FALSE && $checa_array12===FALSE && $checa_array13===FALSE && $checa_array14===FALSE && $checa_array15===FALSE && $checa_array16===FALSE && $checa_array17===FALSE && $checa_array18===FALSE && $checa_array19===FALSE){} else{
	?>
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div class="filermax" align="left">Detalles del Servicio</div></td>
      </tr></table> <div id="servisuservisu"> <?
      include('servisuservisu.php'); 
	  ?>  
      </div>
      <?       }	  ?>
      
       <?
$checa_array=array_search("informacion_vehiculo",$camposex);
$checa_array2=array_search("auto_marca",$camposex);
$checa_array3=array_search("auto_tipo",$camposex);
$checa_array4=array_search("auto_modelo",$camposex);
$checa_array5=array_search("auto_color",$camposex);
$checa_array6=array_search("auto_placas",$camposex);
if($checa_array===FALSE && $checa_array2===FALSE && $checa_array3===FALSE && $checa_array4===FALSE && $checa_array5===FALSE && $checa_array6===FALSE){} else{
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div class="filermax" align="left">Informaci&oacute;n del veh&iacute;culo</div> </td>
      </tr></table><div id="datosvehiculo">
          <?
include ("datos_vehiculo.php");
	?>
      </div>   
      <? } ?>
                    <?
$checa_array=array_search("informacion_poliza",$camposex);
if($checa_array===FALSE){} else{
	?>
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
       <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div class="filermax" align="left">Informaci&oacute;n de la p&oacute;liza</div></td>
    </tr></table>
    <div id="infopoliza">
    <?
include ("info_poliza.php");
	?>
     
    </div>
          <?       }	  ?>
                          <?
$checa_array=array_search("informacion_legal",$camposex);
if($checa_array===FALSE){} else{
	?>
          <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div class="filermax" align="left">Situaci&oacute;n Jur&iacute;dica </div></td>
      </tr></table>
	  <div id="situacion" style="display:block">
	  <?
	  $db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from seguimiento_juridico where general = '$id'",$db);
if (mysql_num_rows($result)){ 
$situacion_conductor=mysql_result($result,0,"situacion_juridica");
$detencion=mysql_result($result,0,"detencion");
$detencion=explode("-",$detencion);
$liberacion=mysql_result($result,0,"liberacion");
$liberacion=explode("-",$liberacion);
$fianzas_conductor=mysql_result($result,0,"fianzas_conductor");
$monto_fianzas_conductor=mysql_result($result,0,"monto_fianzas_conductor");
$folios_fianzas_conductor=mysql_result($result,0,"folios_fianzas_conductor");
$concepto_fianzas_conductor=mysql_result($result,0,"concepto_fianzas_conductor");
$caucion_conductor=mysql_result($result,0,"caucion_conductor");
$monto_caucion_conductor=mysql_result($result,0,"monto_caucion_conductor");
$concepto_caucion_conductor=mysql_result($result,0,"concepto_caucion_conductor");
$situacion_vehiculo=mysql_result($result,0,"situacion_vehiculo");
$detencion_vehiculo=mysql_result($result,0,"detencion_vehiculo");
$detencion_vehiculo=explode("-",$detencion_vehiculo);
$liberacion_vehiculo=mysql_result($result,0,"liberacion_vehiculo");
$liberacion_vehiculo=explode("-",$liberacion_vehiculo);
$fianzas_vehiculo=mysql_result($result,0,"fianzas_vehiculo");
$monto_fianzas_vehiculo=mysql_result($result,0,"monto_fianzas_vehiculo");
$folios_fianzas_vehiculo=mysql_result($result,0,"folios_fianzas_vehiculo");
$concepto_fianzas_vehiculo=mysql_result($result,0,"concepto_fianzas_vehiculo");
$caucion_vehiculo=mysql_result($result,0,"caucion_vehiculo");
$monto_caucion_vehiculo=mysql_result($result,0,"monto_caucion_vehiculo");
$concepto_caucion_vehiculo=mysql_result($result,0,"concepto_caucion_vehiculo");
}
	  ?>
	  <table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td><strong>Situaci&oacute;n del conductor: </strong> <? echo $situacion_conductor;?></td>
            <td><strong>Detenci&oacute;n:</strong>  <? echo ''.$detencion[2].'/'.$detencion[1].'/'.$detencion[0].'';?></td>
            <td><strong>Liberaci&oacute;n:</strong>  <? echo ''.$liberacion[2].'/'.$liberacion[1].'/'.$liberacion[0].'';?></td>
          </tr>
          <tr>
            <td colspan="3">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td><? echo nl2br($caucion_conductor);?></td><td><? echo nl2br($monto_caucion_conductor);?></td><td><? echo nl2br($concepto_caucion_conductor);?></td><td></td>
				</tr>
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td><? echo nl2br($fianzas_conductor);?></td><td><? echo nl2br($monto_fianzas_conductor);?></td><td><? echo nl2br($folios_fianzas_conductor);?></td><td><? echo nl2br($concepto_fianzas_conductor);?></td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td><strong>Situaci&oacute;n del veh&iacute;culo: </strong> <? echo $situacion_vehiculo;?></td>
            <td><strong>Detenci&oacute;n:</strong> <? echo ''.$detencion_vehiculo[2].'/'.$detencion_vehiculo[1].'/'.$detencion_vehiculo[0].'';?></td>
            <td><strong>Liberaci&oacute;n:</strong> <? echo ''.$liberacion_vehiculo[2].'/'.$liberacion_vehiculo[1].'/'.$liberacion_vehiculo[0].'';?></td>
          </tr>
          <tr>
            <td colspan="3">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td><strong>Cauci&oacute;n</strong></td><td><strong>Monto</strong></td><td><strong>Concepto</strong></td><td></td>
				</tr>
				<tr>
					<td><? echo nl2br($caucion_vehiculo);?></td><td><? echo nl2br($monto_caucion_vehiculo);?></td><td><? echo nl2br($concepto_caucion_vehiculo);?></td><td></td>
				</tr>
				<tr>
					<td><strong>Fianzas</strong></td><td><strong>Montos</strong></td><td><strong>Folios</strong></td><td><strong>Concepto</strong></td>
				</tr>
				<tr>
					<td><? echo nl2br($fianzas_vehiculo);?></td><td><? echo nl2br($monto_fianzas_vehiculo);?></td><td><? echo nl2br($folios_fianzas_vehiculo);?></td><td><? echo nl2br($concepto_fianzas_vehiculo);?></td>
				</tr>
				</table>
			</td>
          </tr>
          <tr>
            <td colspan="3" align="right"><strong></strong> </td>
          </tr>
</table></div>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div class="filermax" align="left">Detalle del Siniestro</div></td>
      </tr></table>
<div id="siniestro">
<?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from seguimiento_juridico where general = '$id'",$db);
if (mysql_num_rows($result)){ 
$conductor=mysql_result($result,0,"conductor");
$tel1=mysql_result($result,0,"telconductor");
$tel2=mysql_result($result,0,"telconductor2");
$siniestro=mysql_result($result,0,"siniestro");
$averiguacion=mysql_result($result,0,"averiguacion");
$autoridad=mysql_result($result,0,"autoridad");
$fecha_accidente=mysql_result($result,0,"fecha_accidente");
$fecha_accidente=explode("-",$fecha_accidente);
$numlesionados=mysql_result($result,0,"numlesionados");
$numhomicidios=mysql_result($result,0,"numhomicidios");
$delitos=mysql_result($result,0,"delitos");
$danos=mysql_result($result,0,"danos");
$lesiones=mysql_result($result,0,"lesiones");
$homicidios=mysql_result($result,0,"homicidios");
$ataques=mysql_result($result,0,"ataques");
$robo=mysql_result($result,0,"robo");
$descripcion=mysql_result($result,0,"descripcion");
$lugar_hechos=mysql_result($result,0,"lugar_hechos");
$referencias=mysql_result($result,0,"referencias");
$colonia=mysql_result($result,0,"colonia");
$ciudad=mysql_result($result,0,"ciudad");
$municipio=mysql_result($result,0,"municipio");
$estado=mysql_result($result,0,"estado");
$ajustador=mysql_result($result,0,"ajustador");
$telajustador1=mysql_result($result,0,"telajustador");
$telajustador2=mysql_result($result,0,"telajustador2");
$monto_danos=mysql_result($result,0,"monto_danos");
$monto_deducible=mysql_result($result,0,"monto_deducible");
}
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Colonia where idColonia = '$colonia'",$db);
if (mysql_num_rows($result)){ 
$colonia=mysql_result($result,0,"NombreColonia");
}
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Estado where idEstado = '$estado'",$db);
if (mysql_num_rows($result)){ 
$estado=mysql_result($result,0,"NombreEstado");
}
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db);
if (mysql_num_rows($result)){ 
$municipio=mysql_result($result,0,"NombreMunicipio");
}
?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <!-- tr>
            <td><strong>Conductor:</strong> <? echo $conductor; ?></td>
            <td><strong>Tel&eacute;fono1:</strong> <? echo $tel1; ?></td>
            <td><strong>Tel&eacute;fono2:</strong> <? echo $tel2; ?></td>
          </tr -->
          <tr>
            <td><strong>Siniestro:</strong> <? echo $siniestro; ?></td>
            <td><strong>Averiguaci&oacute;n previa: </strong> <? echo $averiguacion; ?></td>
            <td><strong>Autoridad:</strong> <? echo $autoridad; ?></td>
          </tr>
          <tr>
            <td><strong>Fecha del accidente: </strong> <? echo''.$fecha_accidente[2].'/'.$fecha_accidente[1].'/'.$fecha_accidente[0].''; ?></td>
            <td><strong>N&uacute;mero de lesionados: </strong> <? echo $numlesionados; ?></td>
            <td><strong>N&uacute;mero de homicidios: </strong> <? echo $numhomicidios; ?></td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td><strong>Delitos:</strong> 
				   <? /* if($delitos=="si"){echo'Sí';} else{echo'No';} */ ?>
				  </td>
                  <td><strong>Da&ntilde;os:</strong>
				  <? if($danos=="si"){echo'Sí';} else{echo'No';} ?>				  
				  </td>
                  <td><strong>Lesiones:</strong>
				  				 <? if($lesiones=="si"){echo'Sí';} else{echo'No';} ?>
				  </td>
                  <td><strong>Homicidios:</strong>
				  				  <? if($homicidios=="si"){echo'Sí';} else{echo'No';} ?>
				  </td>
                  <td><strong>Ataques:</strong>
				<?  if($ataques=="si"){echo'Sí';} else{echo'No';} ?>
				  </td>
                  <td><strong>Robo:</strong>
				<?   if($robo=="si"){echo'Sí';} else{echo'No';}	?>
				  </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Descripci&oacute;n:</strong><br> <? echo nl2br($descripcion); ?></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Lugar de los hechos y Referencias: </strong>  <?  echo "$lugar_hechos $referencias"; ?></td>
            <td><strong>Colonia:</strong>  <?  echo $colonia; ?></td>
          </tr>
          <tr>
            <td><strong>Ciudad:</strong>  <?  echo $ciudad; ?></td>
            <td><strong>Municipio:</strong>  <?  echo $municipio; ?></td>
            <td><strong>Estado:</strong>  <?  echo $estado; ?></td>
          </tr>
          <!-- tr>
            <td><strong>Ajustador:</strong>  <?  echo $ajustador; ?></td>
            <td><strong>Tel&eacute;fono1:</strong>  <?  echo $telajustador1; ?></td>
            <td><strong>Tel&eacute;fono2:</strong>  <?  echo $telajustador2; ?></td>
          </tr -->
          <tr>
            <td><strong>Monto da&ntilde;os: </strong> $<?  echo number_format($monto_danos,2); ?></td>
            <td><strong>Monto Deducible: </strong>$<?  echo number_format($monto_deducible,2); ?></td>
            <td align="right"><strong></strong></td>
          </tr>
        </table>
</div>
    	  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div class="filermax" align="left">Terceros</div></td><td align="right"><b></b></td>
        </tr>
      </table>        </td>
      </tr>
  </table>
  <div id="terceros">
  <?
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM terceros where general='$id' order by tipo desc, nombre", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
$colonia=$row["colonia"];
$municipio=$row["municipio"];
$estado=$row["estado"];
$dbw = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbw);
$resultw = mysql_query("SELECT * from Colonia where idColonia = '$colonia'",$dbw);
if (mysql_num_rows($resultw)){ 
$colonia=mysql_result($resultw,0,"NombreColonia");
}
$dbw = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbw);
$resultw = mysql_query("SELECT * from Estado where idEstado = '$estado'",$dbw);
if (mysql_num_rows($resultw)){ 
$estado=mysql_result($resultw,0,"NombreEstado");
}
$dbw = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbw);
$resultw = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio'",$dbw);
if (mysql_num_rows($resultw)){ 
$municipio=mysql_result($resultw,0,"NombreMunicipio");
}
echo' <table width="100%" border="0" cellspacing="3" cellpadding="3">
		  <tr>
		    <td><strong>Tipo:</strong> '.$row["tipo"].'</td>
		    <td colspan="2"><strong>Nombre:</strong> '.$row["nombre"].'</td>
		    </tr>
		  <tr>
		    <td><strong>';
			
if($row["tipo"]=="Persona"){echo'Grado de lesi&oacute;n:';}
else{echo'Da&ntilde;o estimado:';}			
			
			echo'</strong> '.$row["dano_lesion"].'</td>
		    <td><strong>Tel&eacute;fono1:</strong> '.$row["tel1"].'</td>
		    <td><strong>Tel&eacute;fono2:</strong> '.$row["tel2"].'</td>
		  </tr>
		  <tr>
		    <td colspan="3"><strong>Descripci&oacute;n del da&ntilde;o: </strong><br>'.nl2br($row["descripcion"]).'</td>
		    </tr>
		  <tr>
		    <td colspan="3"><strong>Comentarios:</strong><br> '.nl2br($row["comentarios"]).'</td>
		    </tr>
			<tr>
			<td colspan="3"><b>Datos del veh&iacute;culo</b></td>
		   </tr>
		   <tr>
			<td><b>Marca:</b> '.$row["marca_vehiculo"].'</td>
			<td><b>Tipo:</b> '.$row["tipo_vehiculo"].'</td>
			<td><b>Modelo:</b> '.$row["modelo_vehiculo"].'</td>
		   </tr>
		   <tr>
			<td><b>Color:</b> '.$row["color_vehiculo"].'</td>
			<td><b>Placas:</b> '.$row["placas_vehiculo"].'</td>
			<td>&nbsp;</td>
		   </tr>
		   <tr>
			<td colspan="3"><b>Informaci&oacute;n del Seguro</b></td>
		   </tr>
		   <tr>
			<td><b>Aseguradora:</b> '.$row["aseguradora"].'</td>
			<td><b>P&oacute;liza:</b> '.$row["poliza"].'</td>
			<td><b>Inciso:</b> '.$row["inciso"].'</td>
		   </tr>
		   <tr>
			<td><b>Siniestro:</b> '.$row["siniestro"].'</td>
			<td><b>Abogado:</b> '.$row["abogado"].'</td>
			<td><b>Empresa:</b> '.$row["empresa"].'</td>
		   </tr>
		   <tr>
			<td><b>Tel&eacute;fono 1:</b> '.$row["tel1_abogado"].'</td>
			<td><b>Tel&eacute;fono 1:</b> '.$row["tel2_abogado"].'</td>
			<td></td>
		   </tr>
		  <tr>
		    <td><strong>Calle:</strong> '.$row["calle"].'</td>
		    <td><strong>Ciudad:</strong> '.$row["ciudad"].'</td>
		    <td><strong>C.P.:</strong> '.$row["cp"].'</td>
		  </tr>
		  <tr>
		    <td><strong>Estado:</strong> '.$estado.'</td>
		    <td><strong>Municipio:</strong> '.$municipio.'</td>
		    <td><strong>Colonia:</strong> '.$colonia.'</td>
		  </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td align="right"><strong></strong></td>
		    </tr>
	    </table>  ';
}
}
  ?>
    	 
  </div>
  </td>
</tr></table>
          <?       }	  ?>
<table width="950" border="0" cellspacing="0" cellpadding="6">
<tr>
	<th bgcolor="#cccccc" height="25" width="950" colspan="3"><div class="filermax" align="center">Seguimiento</div></th>
</tr>
<tr>
	<td valign="top" width="650">
		<div id="notas">
		  <?
				$link = mysql_connect($host, $username, $pass); 
				mysql_select_db($database, $link); 
				$result = mysql_query("SELECT * FROM clientacora where general='$id' order by fecha desc", $link); 
				
				
				
				if (mysql_num_rows($result)){ 
					  while ($row = @mysql_fetch_array($result)) { 
					  

				$fexar=$row["fecha"];
				$fexaz=explode(" ",$fexar);
				$fexa=explode("-",$fexaz[0]);
				$userx=$row["usuario"];
				$tipo=$row["tipo"];
				$visto=$row["visto"];
				$modular=$row["modules"];
				$mensaje=$row["id"];
				
				if ( $tipo == 1 ) {
				$dbl = mysql_connect($host,$username,$pass);
				mysql_select_db($database,$dbl);
				$resultl = mysql_query("SELECT * from Empleado where idEmpleado='$userx'",$dbl);
				if (mysql_num_rows($resultl)){ 
				$eluserx=mysql_result($resultl,0,"nombre");
				}
					if ( $visto == 0 ) {
						$eliframe="
						<iframe width='0' height='0' src='visto.php?idmensaje=$mensaje'>
						</iframe>
						";
						}
					if ( $visto == 1) { $eliframe=""; } 
				
				
				}
				if ( $tipo == 2  &&  empty($modular)) {
					
								$dbl = mysql_connect($host,$username,$pass);
				mysql_select_db($database,$dbl);
				$resultl = mysql_query("SELECT nombre from Cliente where idCliente='$userx'",$dbl);
				if (mysql_num_rows($resultl)){ 
				$eluserx=mysql_result($resultl,0,"nombre");
				$eliframe="";
				}	
					}
					
									if ( $tipo == 2 && $modular=="acceso")  {
					
								$dbl = mysql_connect($host,$username,$pass);
				mysql_select_db($database,$dbl);
				$resultl = mysql_query("SELECT nombre from accesocl where idusuario='$userx'",$dbl);
				if (mysql_num_rows($resultl)){ 
				$eluserx=mysql_result($resultl,0,"nombre");
				$eliframe="";
				}	
					}
					
				if ($tipo == 2 && $modular=="contratos")  {
					
								$dbl = mysql_connect($host,$username,$pass);
				mysql_select_db($database,$dbl);
				$resultl = mysql_query("SELECT nombre from webservice where idusuario='$userx'",$dbl);
				if (mysql_num_rows($resultl)){ 
				$eluserx=mysql_result($resultl,0,"nombre");
				$eliframe="";
				}	
					}
				
				
			echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
				  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>'.$eluserx.'</b></td></tr></table></td>
				</tr>
				<tr>
				  <td><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'
				  <br />
				  '.$eliframe.'
				  
				  </td>
				  </tr>
				</table>';  
			$eluserx="";
}}
?>
</div>
	</td>
    <td width="10"></td>

<td valign="top"><p><strong>Agregar comentario:<br /></strong></p>
		  <form method="post" action="upnotesb.php?id=<? echo $id; ?>&popup=0&caso=nuevo">
		  <input type="hidden" name="from_seguimiento" value="true" />
           <input type="hidden" name="modules" value="contratos" />
          <input type="hidden" name="num_poliza" value="<? echo $num_contrato; ?>" />
          <textarea name="comentario" cols="60" rows="3" id="comentario"></textarea>
<br />
		<input name="Enviar" type="submit" value="Enviar" />
        </form>
</td>

</tr>
</table>
