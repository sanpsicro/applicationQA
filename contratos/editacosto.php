<?
ob_start("ob_gzhandler");
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT expediente, proveedor from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$exxxp=mysql_result($result,0,"expediente");
$provx=mysql_result($result,0,"proveedor");
}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT monto from pagos where expediente = '$exxxp' AND conceptor='Pago por servicio'",$db);
if (mysql_num_rows($result)){ 
$monto=mysql_result($result,0,"monto");
}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT banderazo, blindaje, maniobras, espera, otro, total from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$banderazo=mysql_result($result,0,"banderazo");
$blindaje=mysql_result($result,0,"blindaje");
$maniobras=mysql_result($result,0,"maniobras");
$espera=mysql_result($result,0,"espera");
$otro=mysql_result($result,0,"otro");
$totalCalculado=number_format($banderazo+$blindaje+$maniobras+$espera+$otro,2);
$total=mysql_result($result,0,"total");

}
?>

<form method="post" onsubmit="FAjax('costointerno.php?&flim-flam=new Date().getTime()','statuscaso','id=<? echo $id; ?>&caso=<? echo $caso; ?>&monto='+document.getElementById('monto').value+'&expediente='+document.getElementById('expediente').value+'&proveedor='+document.getElementById('proveedor').value+'&banderazo='+document.getElementById('banderazo').value+'&blindaje='+document.getElementById('blindaje').value+'&maniobras='+document.getElementById('maniobras').value+'&espera='+document.getElementById('espera').value+'&otro='+document.getElementById('otro').value+'&total='+document.getElementById('total').value,'POST'); return false" action="#">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td colspan="2" align="center" bgcolor="#eeeeee"><strong>Costo interno</strong></td>
            <td colspan="2" align="center" bgcolor="#eeeeee"><strong>Costo cliente</strong></td>
          </tr>
          <tr>
            <td width="25%" rowspan="6" bgcolor="#ffffff"><strong>Monto: 
              <input name="expediente" type="hidden" id="expediente" value="<? echo $exxxp; ?>" />
              <input name="proveedor" type="hidden" id="proveedor" value="<? echo $provx; ?>" />              
            </strong></td>
            <td width="25%" rowspan="6" bgcolor="#ffffff">$ 
            <input name="monto" type="text" id="monto" size="20"  value="<? echo $monto; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
            <td width="25%" bgcolor="#ffffff"><strong>Banderazo:</strong></td>
            <td width="25%" bgcolor="#ffffff">$ 
            <input name="banderazo" type="text" id="banderazo" size="20"  value="<? echo $banderazo; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Blindaje:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="blindaje" type="text" id="blindaje" size="20"  value="<? echo $blindaje; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Maniobras:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="maniobras" type="text" id="maniobras" size="20"  value="<? echo $maniobras; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Tiempo de espera:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="espera" type="text" id="espera" size="20"  value="<? echo $espera; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
          <tr>
            <td bgcolor="#ffffff"><strong>Otro:</strong></td>
            <td bgcolor="#ffffff">$ 
            <input name="otro" type="text" id="otro" size="20"  value="<? echo $otro; ?>"  onKeyPress="return numbersonly(this, event)"/></td>
          </tr>
         <tr>
            <td bgcolor="#ffffff"><strong>Total:</strong></td>
            <td bgcolor="#ffffff">$ <? echo $totalCalculado; ?></td>
          </tr><input name="total" type="hidden" id="total" value="<? echo $totalCalculado; ?>">
			
					<tr>
            <td colspan=4 align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax('statuscaso.php?id=<? echo $id; ?>&caso=<? echo $caso; ?>&flim-flam=new Date().getTime()','statuscaso','','get');"/></td>
          </tr>
        </table>
</form>
<?ob_flush();?>
