<?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$usuario=mysql_result($result,0,"usuario");
$num_cliente=mysql_result($result,0,"num_cliente");
$num_siniestro=mysql_result($result,0,"num_siniestro");
$reporte_cliente=mysql_result($result,0,"reporte_cliente");
$tel_reporta=mysql_result($result,0,"tel_reporta");
$ejecutivo=mysql_result($result,0,"ejecutivo");
$cobertura=mysql_result($result,0,"cobertura");
}
?>
<form id="form1" name="form1" method="post" action="process.php?module=usuariox&id=<? echo $id;?>">
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td bgcolor="#FFFFFF"><strong>Nombre del cliente:</strong></td>
      <td bgcolor="#FFFFFF"><input name="num_cliente" type="text" id="num_cliente" size="30" value="<? echo $num_cliente;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>N&uacute;mero del siniestro:</strong></td>
      <td bgcolor="#FFFFFF"><input name="num_siniestro" type="text" id="num_siniestro" size="30" value="<? echo $num_siniestro;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    
    <tr>
      <td width="200" bgcolor="#FFFFFF"><strong>Nombre de usuario:</strong></td>
      <td width="100" bgcolor="#FFFFFF"><input name="usuario" type="text" id="usuario" size="30" value="<? echo $usuario;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Reporte Cliente:</strong></td>
      <td bgcolor="#FFFFFF"><input name="reporte_cliente" type="text" id="reporte_cliente" size="30" value="<? echo $reporte_cliente;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Telefono de Contacto:</strong></td>
      <td bgcolor="#FFFFFF"><input name="tel_reporta" type="text" id="tel_reporta" size="30" value="<? echo $tel_reporta;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Ejecutivo:</strong></td>
      <td bgcolor="#FFFFFF"><input name="ejecutivo" type="text" id="ejecutivo" size="30" value="<? echo $ejecutivo;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><strong>Cobertura:</strong></td>
      <td bgcolor="#FFFFFF"><input name="cobertura" type="text" id="cobertura" size="30" value="<? echo $cobertura;?>"/></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>    
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="Guardar" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</form>
