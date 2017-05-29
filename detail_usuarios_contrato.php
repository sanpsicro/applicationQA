<?
session_start();
 include 'conf.php';
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from usuarios_contrato where id = '$id'",$db);
$fecha_inicio=mysql_result($result,0,"fecha_inicio");
$finicio=explode(" ",$fecha_inicio);
$finix=explode("-",$finicio[0]);
$fecha_vencimiento=mysql_result($result,0,"fecha_vencimiento");
$fvence=explode(" ",$fecha_vencimiento);
$fvenx=explode("-",$fvence[0]);
$monto=mysql_result($result,0,"monto");
$comision=mysql_result($result,0,"comision");
$ingreso=mysql_result($result,0,"ingreso");

$tipoventa=mysql_result($result,0,"tipo_venta");

$marca=mysql_result($result,0,"marca");
$modelo=mysql_result($result,0,"modelo");
$tipo=mysql_result($result,0,"tipo");
$color=mysql_result($result,0,"color");
$placas=mysql_result($result,0,"placas");
$serie=mysql_result($result,0,"serie");
$servicio=mysql_result($result,0,"servicio");
$pre_idPoliza=mysql_result($result,0,"idPoliza");
$pre_tmpid=mysql_result($result,0,"tmpid");

$nombre=mysql_result($result,0,"nombre");
$fecha_nacimiento=mysql_result($result,0,"fecha_nacimiento");
$fecha=explode("-",$fecha_nacimiento);
$domicilio=mysql_result($result,0,"domicilio");
$colonia=mysql_result($result,0,"colonia");
$ciudad=mysql_result($result,0,"ciudad");
$municipio=mysql_result($result,0,"municipio");
$estado=mysql_result($result,0,"estado");
$tel=mysql_result($result,0,"tel");
$cel=mysql_result($result,0,"cel");
$nextel=mysql_result($result,0,"nextel");
$mail=mysql_result($result,0,"mail");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from TipoVenta where idVenta = '$tipoventa'",$db);
$tipoventa=mysql_result($result,0,"nombre");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Estado where idEstado = '$estado'",$db);
$estado=mysql_result($result,0,"nombreEstado");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db);
$municipio=mysql_result($result,0,"nombreMunicipio");

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Colonia where idColonia = '$colonia'",$db);
$colonia=mysql_result($result,0,"nombreColonia");
?>

<html><head>
<link href="style_1.css" rel="stylesheet" type="text/css" />
</head><body>
 <table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="4" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><strong>Usuarios</strong></td>

        <td width="150" align="center" class="blacklinks">[ <a href="usuarios_contrato.php?tmpid=<? echo $tmpid; ?>&idPoliza=<? echo $idPoliza; ?>&tipocliente=<? echo $tipocliente; ?>&numcontrato=<? echo $numcontrato; ?>&idCliente=<? echo $idCliente;?>">Lista de Usuarios</a> ]</td>
      </tr>

    </table>      </td>
  </tr>

  

   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos de contrato</strong> </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de inicio:</strong> </td>
     <td bgcolor="#bbbbbb"><? echo''.$finix[2].'/'.$finix[1].'/'.$finix[0].' '.$finicio[1].''; ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Tipo de venta:</strong> </td>
     <td bgcolor="#bbbbbb"><? echo $tipoventa;


?>    </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de vencimiento:</strong></td>
     <td bgcolor="#bbbbbb"><div id="vencimiento"><? echo''.$fvenx[2].'/'.$fvenx[1].'/'.$fvenx[0].' '.$fvence[1].''; ?></div></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Monto:</strong></td>
     <td bgcolor="#bbbbbb">$<? echo number_format($monto,2);?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Comisi&oacute;n:</strong></td>
     <td bgcolor="#bbbbbb">$<? echo number_format($comision,2); ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Ingreso:</strong></td>
     <td bgcolor="#bbbbbb">$<? echo number_format($ingreso,2); ?></td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos personales</strong> </td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Nombre:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $nombre; ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Fecha de nacimiento:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo''.$fecha[2].'/'.$fecha[1].'/'.$fecha[0].''; ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Domicilio:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $domicilio; ?></td>
	      <td align="right" bgcolor="#bbbbbb"><strong>Ciudad:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $ciudad; ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Estado:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $estado;  ?>
</td>
 
      <td align="right" bgcolor="#bbbbbb"><strong>Municipio:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $municipio;  ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Colonia:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $colonia;  ?></td>
						       <td align="right" bgcolor="#bbbbbb"><strong>Tel&eacute;fono:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $tel; ?></td>
   </tr>
   <tr>
     <td align="right" bgcolor="#bbbbbb"><strong>Celular:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $cel; ?></td>
     <td align="right" bgcolor="#bbbbbb"><strong>Nextel:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $nextel; ?></td>
   </tr>
   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Email:</strong></td>
     <td align="left" bgcolor="#bbbbbb"><? echo $mail; ?></td>
	      <td align="right" bgcolor="#bbbbbb">&nbsp;</td>
     <td align="left" bgcolor="#bbbbbb">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="4" align="center" bgcolor="#eeeeee"><strong>Datos del veh&iacute;culo</strong> </td>
   </tr>
   <tr>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Marca</strong><strong>:</strong><strong></strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><? echo $marca; ?></td>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Modelo:</strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><? echo $modelo; ?></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Tipo:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><? echo $tipo; ?></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Color:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><? echo $color; ?></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Placas:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><? echo $placas; ?></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Serie:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><? echo $serie; ?></td>
   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Servicio:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><? echo $servicio;  ?></td>

     <td align="right" bgcolor="#bbbbbb">&nbsp;</td>

     <td align="left" bgcolor="#bbbbbb">&nbsp;</td>
   </tr>

 </table>
 </body></html>