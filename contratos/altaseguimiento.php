<?
   include("ConsultasCabina.php");
   conectar();
if(isset($_POST)){
   if(mysql_query($SQLCABINA["AgregarSeguimiento"])){
      header("Location: ?module=Seguimiento");
      die();
   }
   echo "<!-- $SQLCABINA[AgregarSeguimiento] -->";
}

$SEGARES = @mysql_query($SQLCABINA["DatosExpediente"]);
$DATA_AS = @mysql_fetch_assoc($SEGARES);

?>
<table width="100%" height=100% border="1" cellpadding="6" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="contentarea1">
              <tr> 
                <td valign="top"> <div align="center">

<form action="?module=AltaSeguimiento" method="POST">
<table width=300>
<tr>
<td bgcolor="#EEEEEE" align="right"><b>Expediente:</b></td>
<td bgcolor="#EEEEEE" align="right"><input type="hidden" name="idExpediente" size="20" value="<? echo $DATA_AS["idExpediente"]; ?>"><? echo $DATA_AS["idExpediente"]; ?>
</td>
</tr>
<tr>
<td bgcolor="#EEEEEE" align="right"><b>Num.Poliza:</b></td>
<td bgcolor="#EEEEEE" align="right"><? echo $DATA_AS["numPoliza"]; ?></td>
</tr>
<tr>
<td bgcolor="#EEEEEE" align="right"><b>Estado:</b></td>
<td bgcolor="#EEEEEE"><input type="text" size="20" name="estado"></td>
</tr>
<tr>
<td bgcolor="#EEEEEE" align="right"><b>Bitacora:</b></td>
<td bgcolor="#EEEEEE"><textarea rows="4" cols="20" name="bitacora"></textarea></td>
</tr>
</table>
<input type="submit" value="Agregar">
</form>

</div>
</td>
</tr>
</table>