<?
$checa_arrayx=array_search("evaluaciones",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Validaciones</span></td>
          <td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
             <form name="form1" method="post" action="bridge.php?module=validaciones"><td align="right" class="questtitle">b&uacute;squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>


          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from usuarios_contrato where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$clave=mysql_result($result,0,"clave");
$nombre=mysql_result($result,0,"nombre");
}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from validaciones  where clave_usuario  = '$clave'",$db);
if (mysql_num_rows($result)){ 
$tipo_pago=mysql_result($result,0,"tipo_pago");
$fecha_pago=mysql_result($result,0,"fecha_pago");
$fecha1=explode("-",$fecha_pago);
$fecha_pago_comision=mysql_result($result,0,"fecha_pago_comision");
$fecha2=explode("-",$fecha_pago_comision);
$cuanta_ingreso=mysql_result($result,0,"cuenta_ingreso");
$observaciones=mysql_result($result,0,"observaciones");
$comision_vendedor=mysql_result($result,0,"comision_vendedor");
}
?>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles de validaci&oacute;n</b></td>
    </tr>

  <tr>

    <td width="25%" bgcolor="#eeeeee"><strong>Nombre:</strong> <? echo $nombre;?></td>
    <td width="25%" bgcolor="#eeeeee"><p><strong>Clave de usuario:</strong> <? echo $clave;?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Tipo de pago:</strong> <? echo $tipo_pago;?></td>
    <td bgcolor="#FFFFFF"><strong>Fecha de pago:</strong> <? echo''.$fecha1[2].'/'.$fecha1[1].'/'.$fecha1[0].'';?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Cuenta de ingreso del pago:</strong> <? echo $cuanta_ingreso;?></td>
    <td bgcolor="#eeeeee"><strong>Observaciones:</strong> <? echo nl2br($observaciones);?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Monto comisi&oacute;n vendedor:</strong> $<? echo number_format($comision_vendedor,2); ?></td>
    <td bgcolor="#FFFFFF"><strong>Fecha de pago de comisi&oacute;n:</strong> <? echo''.$fecha2[2].'/'.$fecha2[1].'/'.$fecha2[0].'';?></td>
  </tr>
</table>





</td></tr></table>