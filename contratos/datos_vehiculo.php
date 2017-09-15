 <?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$auto_marca=mysql_result($result,0,"auto_marca");
$auto_tipo=mysql_result($result,0,"auto_tipo");
$auto_modelo=mysql_result($result,0,"auto_modelo");
$auto_color=mysql_result($result,0,"auto_color");
$auto_placas=mysql_result($result,0,"auto_placas");
}

	  ?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td bgcolor="#FFFFFF"><strong>Marca:</strong> <? echo $auto_marca;?></td>
    <td bgcolor="#FFFFFF"><strong>Tipo:</strong> <? echo $auto_tipo;?></td>
    <td bgcolor="#FFFFFF"><strong>Modelo:</strong> <? echo $auto_modelo;?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Color:</strong> <? echo $auto_color;?></td>
    <td bgcolor="#FFFFFF"><strong>Placas:</strong> <? echo $auto_placas;?></td>
	<? if(empty($NO_EDITAR)):?>
    <td align="right" bgcolor="#FFFFFF"><strong>[ <a href="javascript:FAjax('editar_datosvehiculo.php?id=<? echo $id;?>&amp;flim-flam=new Date().getTime()','datosvehiculo','','get');">Editar</a> ]</strong></td>
	<? endif; ?>
  </tr>
</table>
