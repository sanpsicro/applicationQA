<?
session_start();
$explota_permisos=explode(",",$_SESSION["valid_permisos"]);
$checa_arrayx=array_search("4_i",$explota_permisos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{
include('conf.php');
}
?>
<html><head><title>OPCYON</title>
<link href="style_1.css" rel="stylesheet" type="text/css" />
<script language="Javascript1.2">
 function printpage() {
window.print();  
}
</script>
</head><body onLoad="printpage()">
<?
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Poliza where idPoliza = '$idPoliza'",$db);
$idCliente=mysql_result($result,0,"idCliente");
$idEmpleado=mysql_result($result,0,"idEmpleado");
$fechaCaptura=mysql_result($result,0,"fechaCaptura");
$fecha1=explode(" ",$fechaCaptura);
$fecha1=explode("-",$fecha1[0]);
$numPoliza=mysql_result($result,0,"numPoliza");
$factura=mysql_result($result,0,"factura");
$monto=mysql_result($result,0,"monto");
$comision=mysql_result($result,0,"comision");
$ingreso=mysql_result($result,0,"ingreso");
$productos=mysql_result($result,0,"productos");
$tipoventa=mysql_result($result,0,"tipoVenta");

###
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query("SELECT * from Empleado where idEmpleado = '$idEmpleado'",$db2);
$vendedor=mysql_result($result2,0,"nombre");
###
$db2 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db2);
$result2 = mysqli_query("SELECT * from Cliente where idCliente = '$idCliente'",$db2);
$cliente=mysql_result($result2,0,"nombre");
###
$db7 = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db7);
$result7 = mysqli_query("SELECT * from productos where id = '$productos'",$db7);
$elproducto=mysql_result($result7,0,"producto");
$terminos=mysql_result($result7,0,"terminos");
###
?>

<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" align="left"><img src="img/newlog.gif" /></td>
  </tr>
  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del Contrato <? echo ''.$numPoliza.'';?></b></td>
    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Cliente:</strong> <? echo $cliente?></td>

    <td bgcolor="#CCCCCC"><strong>Vendedor:</strong> <? echo $vendedor?></td>
    </tr>
  <tr>
    <td bgcolor="#CCCCCC" colspan=2><strong>Producto:</strong> <? echo $elproducto;?></td>
  </tr>


<?
if($factura=="1"){
echo'<tr><td align=right><b>Factura</b></td><td>&nbsp;</td></tr>
<tr><td bgcolor="#CCCCCC" align=right><strong>Monto:</strong></td><td bgcolor="#CCCCCC">$'.number_format($monto,2).'</td></tr>
<tr><td align=right><strong>Comisión:</strong></td><td>$'.number_format($comision,2).'</td></tr>
<tr><td bgcolor="#CCCCCC" align=right><strong>Ingreso:</strong></td><td bgcolor="#CCCCCC">$'.number_format($ingreso,2).'</td></tr>';
}

echo'</table>';
##################
$link = mysqli_connect($host, $username, $pass); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM usuarios_contrato where idPoliza='$idPoliza' order by inciso", $link); 
if (mysqli_num_rows($result)){ 
echo'<table width=100% cellpadding=3 cellspacing=3><tr><td colspan=8 align=middle><b>Usuarios</b></td></tr>
<tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Contrato</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Inciso</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Clave del usuario</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de inicio</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de vencimiento</strong></td>
  </tr>';
$bgcolor="#cccccc";
while ($row = @mysqli_fetch_array($result)) { 

$fecha1=$row["fecha_inicio"];
$fecha1=explode(" ",$fecha1);
$fecha1_date=explode("-",$fecha1[0]);
$fecha2=$row["fecha_vencimiento"];
$fecha2=explode(" ",$fecha2);
$fecha2_date=explode("-",$fecha2[0]);

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
  echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>  
  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["inciso"].'</td>
    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
	    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha1_date[2].'/'.$fecha1_date[1].'/'.$fecha1_date[0].' '.$fecha1[1].'</td>
		  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha2_date[2].'/'.$fecha2_date[1].'/'.$fecha2_date[0].' '.$fecha2[1].'</td>
  
  </tr>';
  }
  echo'</table>';
  }
  
  
  

?><table width="100%" border="0" cellspacing="3" cellpadding="3">
<tr>
  <td height="100" align="center"valign="bottom">&nbsp;</td>
  <td height="100" align="center"valign="bottom">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"valign="top"><p align=center><strong>T&eacute;rminos y Condiciones</strong> </p>
    <p align=justify>

CONDICIONES GENERALES DEL CONTRATO DE PRESTACION DEL SERVICIO DE GRÚA PROMOCION LIMITADA, 2 SERVICIOS INCLUIDOS

<b>1.- DEFINICIONES GENERALES </b><br>
OPCYON ES UNA MARCA REGISTRADA DE PHONE ASSISTANCE S. A. DE C. V., QUIEN ES LA EMPRESA PRESTADORA DE ESTOS SERVICIOS Y ESTA CONSTITUIDA CONFORME LAS LEYES MEXICANAS, OPCYON NO ES UNA ASEGURADORA.
<br>
OBJETO DE LAS COBERTURAS.- OPCYON SE OBLIGA A CUBRIR LOS BENEFICIOS CONTRATADOS, DURANTE LA VIGENCIA ESTIPULADA EN LA CARATULA DE ESTE CONTRATO, A CAMBIO DEL PAGO DEL PRECIO CONVENIDO. CONTRATO.-ESTE DOCUMENTO, LA SOLICITUD DE SERVICIOS Y LAS DECLARACIONES PROPORCIONADAS POR EL CONTRATANTE, CONSTITUYEN TESTIMONIO DE ESTE CONTRATO DE SERVICIOS DE ASISTENCIA VIAL ENTRE OPCYON Y EL CONTRATANTE.
<br>
TERRITORIALIDAD.-LOS BENEFICIOS DESCRITOS EN ESTE DOCUMENTO SE ENCUENTRAN AMPARADOS LAS 24 HORAS, TODOS LOS DÍAS DE AÑO, EN SERVICIOS QUE NO REBASEN LOS LÍMITES TERRITORIALES FORMADOS POR LAS SIGUIENTES ENTIDADES: LAS 16 DELEGACIONES DEL DISTRITO FEDERAL Y LOS SIGUIENTES MUNICIPIOS DEL ESTADO DE MÉXICO: NAUCALPAN, TLALNEPANTLA, ATIZAPAN, CUAUTITLAN IZCALLI, ECATEPEC Y NEZAHUALCOYOTL.
<br>
USUARIO.- ES LA PERSONA TITULAR DE ESTE CONTRATO Y/O SUS BENEFICIARIOS Y/O LA PERSONA QUE CONDUZCA EL VEHÍCULO REGISTRADO EN LA BASE DE DATOS DE CLIENTES DEL SISTEMA DE OPCYON. VEHICULO.- VEHÍCULO MOTORIZADO DE CUALQUIER TIPO, DE HASTA 2 1/2, DOS Y MEDIA TONELADAS DE PESO QUE SE ENCUENTRE REGISTRADO EN EL SISTEMA DE OPCYON, YA SEA DE SERVICIO PÚBLICO O PARTICULAR.
<br><br>
<b>2.- NORMAS GENERALES</b><br>
COLABORACION.-EL USUARIO Y/O SU REPRESENTANTE SE OBLIGAN A COOPERAR EN TODO MOMENTO CON EL PERSONAL QUE ENVÍE OPCYON PARA FACILITAR LA PRESTACIÓN DEL SERVICIO CONTRATADO. PRESENCIA DEL USUARIO EN TRASLADO DEL VEHICULO.- EL USUARIO SE OBLIGA A ACOMPAÑAR AL OPERADOR DE LA GRÚA PARA EL CASO DE EL TRASLADO DEL VEHÍCULO USO DEL SERVICIO.- SI EL USUARIO SOLICITA SU SERVICIO Y POR CUALQUIER RAZÓN DECIDE CANCELARLO DENTRO DE LOS 15 MINUTOS DESPUÉS DE HABERLO SOLICITADO CONTINUARÁ CONTANDO CON SU SERVICIO DISPONIBLE, SI LO CANCELA DESPUÉS DEL MINUTO 15 AGOTARÁ SU SERVICIO DE GRÚA, LO MISMO APLICARÁ SI LA GRÚA LLEGA Y EL USUARIO SE RETIRA DEL LUGAR SIN DAR AVISO.
<br><br>
<b>3.-SERVICIO DE GRÚA</b><br>
OPCYON ENVIARÁ UNA GRÚA PARA REMOLCAR O TRASLADAR EL AUTOMÓVIL DEL USUARIO, DE BANQUETA A BANQUETA CUANDO:
<br>
A) SUFRA UN ACCIDENTE DE TRÁNSITO Y POR CONSECUENCIA ESTE SUFRA DAÑOS QUE NO PERMITAN LA MARCHA DEL AUTOMÓVIL.
<br>
B) REGISTRE UN DESPERFECTO O FALLA MECÁNICA QUE LE IMPIDA CONTINUAR SU MARCHA, EXCEPTO LOS ORIGINADOS POR ENCHARCAMIENTO O INUNDACIÓN.
<br>
C) OPCYON CUBRIRÁ EL ARRASTRE O TRASLADO HASTA UN LÍMITE DE $750.00 (SETECIENTOS CINCUENTA PESOS 00/100 M.N.), ESTA COBERTURA INICIA A PARTIR DEL PUNTO EN DONDE SE RECOJA EL VEHÍCULO. ESTA COBERTURA TIENE UN ALCANCE DE 20 KILOMETROS DENTRO DEL D. F. Y DE 15 KILOMETROS SI EL RECORRIDO ES TOTAL O PARCIALMENTE DENTRO DE LOS MUNICIPIOS DEL EDO. MEX., MENCIONADOS EN LA CLAÚSULA DE TERRITORIALIDAD. EN CASO DE CONTROVERSIA EL CONTRATANTE O USUARIO ESTARÁ A LO DISPUESTO AL KILOMETRAJE QUE SEÑALE LA APLICACION MAPS GOOGLE. 
<br>
D) OPCYON CUBRIRÁ HASTA UN LÍMITE DE $1,000.00 (UN MIL PESOS 00/100 M. N), POR CONCEPTO DE MANIOBRAS QUE SE REQUIERAN PARA TRASLADAR EL VEHÍCULO SIEMPRE Y CUANDO LA AUTORIDAD QUE TOME CONOCIMIENTO DE LA AVERÍA O SINIESTRO PERMITA REALIZAR DICHA MANIOBRA AL OPERADOR REPRESENTANTE DE ESTE SERVICIO, OPCYON EN NINGÚN CASO REEMBOLSARÁ MANIOBRAS REALIZADAS POR OTRA EMPRESA DE GRÚAS.
<br>
E) SI EL ARRASTRE EXCEDIERA EL LÍMITE MENCIONADO, EL CONTRATANTE SE OBLIGA A PAGAR EL COSTO EXCEDENTE EN CUAL LE SERÁ INFORMADO AL MOMENTO DE SOLICITAR EL SERVICIO, MISMO QUE DEBERA SER LIQUIDADO AL MOMENTO DE LLEGAR LA GRÚA PARA RECOGER EL VEHÍCULO AFILIADO.
<br>
F) EL USUARIO CUENTA CON 15 MINUTOS DE TOLERANCIA UNA VEZ QUE LA GRÚA HAYA LLEGADO AL LUGAR, A PARTIR DEL MINUTO 16 EL CONTRATANTE SE OBLIGA A PAGAR $150.00 POR CADA HORA O FRACCIÓN DE TIEMPO DE ESPERA.
<br>
G) ESTE SERVICIO TIENE UNA COBERTURA DE 2 (DOS) SERVICIO SIN COSTO PARA AUTOS PARTICULARES Y DE 1 (UNO) PARA VEHÍCULOS DE SERVICIOS PÚBLICO O DE CARGA, DURANTE LA VIGENCIA DE SU COBERTURA SEMESTRAL O ANUAL, SEGÚN SEA EL CASO.
<br>
H) OPCYON NO SERÁ RESPONSABLE SI EL SERVICIO DE GRÚA ES RETRASADO, INTERRUMPIDO O IMPEDIDO, NI SE CONSIDERARÁ COMO VIOLACIÓN A ESTE CONTRATO, CUANDO ESTO SE DEBA A CASOS DE FUERZA MAYOR O HECHOS DE TERCEROS, QUE ESCAPEN AL CONTROL RAZONABLE DEL PERSONAL DE OPCYON, PARA EFECTOS DE ESTE CONTRATO EL CONTRATANTE RECONOCE COMO TALES LOS SIGUIENTES: SISMOS O TERREMOTOS, INUNDACIONES, ENCHARCAMIENTOS, TROMBAS, MANIFESTACIONES, MARCHAS, CIERRES DE VÍAS DE COMUNICACIÓN. UNA VEZ QUE CESE LA FUERZA MAYOR O EL HECHO DE TERCERO OPCYON RESTABLECERÁ EL SERVICIO DE FORMA INMEDIATA.
<br>
I) PARA UTILIZAR EL SERVICIO DE GRÚA ESTE TIENE UN TIEMPO DE ESPERA DE 7 DÍAS NATURALES A PARTIR DE SU CONTRATACIÓN, EXCEPTO SI SE TRATA DE UN CONTRATO DE RENOVACIÓN, HECHA EN FORMA OPORTUNA.
<br><br>
<b>4.- INSTRUCCIONES DE USO</b><br>
EL USUARIO DEBERÁ SOLICITAR LA ASISTENCIA QUE REQUIERA AL CALL CENTER DE OPCYON, DEL D.F. AL <b><font size="+2" color="red">TELÉFONO 9112-9816</font></b>. PARA SER ATENDIDO EL USUARIO SE OBLIGA A PROPORCIONAR SU NOMBRE, NUMERO DE PLACAS DEL VEHÍCULO AMPARADO O EN SU CASO EL NOMBRE DEL CONTRATANTE. DEBERÁ DAR UNA BREVE DESCRIPCIÓN DE LO OCURRIDO Y DAR LA DIRECCIÓN EN DONDE REQUIERE EL SERVICIO INCLUYENDO CALLE, ENTRE CALLES, COLONIA, DELEGACIÓN Y ALGUNA REFERENCIA.
<br><br>
<b>5.- EXCLUYENTES</b><br>
ESTA COBERTURA NO APLICA EN LOS SIGUIENTES CASOS:
<br>
A) FUERA DEL TERRITORIO ESTABLECIDO EN LA CLÁUSULA 1.
<br>
B) PARA VEHÍCULOS DISTINTOS AL DESCRITO EN LA CARATULA DE ESTE CONTRATO O CON UNA ANTIGÜEDAD MAYOR A 15 AÑOS.
<br>
C) CUANDO EL CLIENTE TENGA MÁS DE UN CONTRATO.
<br>
D) CUANDO LA GRÚA SE REQUIERA PARA CASOS DISTINTOS A LOS MENCIONADOS EN LA CLAUSULA 3, INCISOS A Y B.
<br>
E) PARA FALLAS ELÉCTRICAS DERIVADAS DE INUNDACIONES O ENCHARCAMIENTOS.
<br>
F) COSTOS DE CASETAS (IDA Y VUELTA), ESTACIONAMIENTOS O TIEMPO DE ESPERA.
<br>
G) SERVICIOS EN CARRETERAS, AUTOPISTAS O ZONAS FEDERALES.
<br>
H) REEMBOLSOS POR SERVICIOS NO SOLICITADOS DIRECTAMENTE A LA EMPRESA.
<br>
I) MANIOBRAS PARA METER VEHÍCULOS A COCHERAS, ESTACIONAMIENTOS, PENSIONES, TALLERES, ETC.
<br>
J) PARA EVENTOS PREEXISTENTES (FALLA MECÁNICA O SINIESTRO)
<br><br>
<b>V.MET 181011</b>

<br><br>

</p></td>
  </tr>
<tr>
  <td align="center"valign="bottom"><p>Firma del Cliente</p>
      <p>&nbsp;</p>
    <p>__________________________________</p></td>
  <td align="center"valign="bottom"><p>Firma del Representante de Opcyon</p>
      <p>&nbsp;</p>
    <p>__________________________________</p></td>
</tr>
<tr>
  <td colspan="2"valign="top">
<br><br><br>
<div align="center">
<font color="blue"><b>www.gruasopcyon.com
<br><br>
info@opcyon.com</font><br><br></b>
<img src="calidad.gif">
</div><br><br>
</td>
</tr>
</table>
</body></html>