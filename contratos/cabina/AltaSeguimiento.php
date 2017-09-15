<?
  session_start();
   include_once("../conf.php");
   include("ConsultasCabina.php");
   conectar();
if(isset($_POST)){
   if(mysql_query($SQLCABINA["AgregarSeguimiento"])){
      header("Location: Seguimiento.php");
      die();
   }
   echo "<!-- $SQLCABINA[AgregarSeguimiento] -->";
}

$SEGARES = @mysql_query($SQLCABINA["DatosExpediente"]);
$DATA_AS = @mysql_fetch_assoc($SEGARES);

?>
<HTML>
<HEAD>
 <TITLE>Alta Seguimiento</TITLE>
</HEAD>
<BODY>
<form action="" method="POST">
<table>
<tr>
<td>Expediente:</td>
<td><? echo $DATA_AS["idExpediente"]; ?>
<td><input type="hidden" name="idExpediente" size="20" value="<? echo $DATA_AS["idExpediente"]; ?>"></td>
</td>
</tr>
<tr>
<td>Num.Poliza</td>
<td><? echo $DATA_AS["numPoliza"]; ?></td>
</tr>
<tr>
<td>Estado</td>
<td><input type="text" size="20" name="estado"></td>
</tr>
<tr>
<td>Bitacora</td>
<td><textarea rows="4" cols="20" name="bitacora"></textarea></td>
</tr>
</table>
<input type="submit" value="Agregar">
</form>
</BODY>
</HTML>
