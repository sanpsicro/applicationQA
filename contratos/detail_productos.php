<?
$checa_arrayx=array_search("servicios",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Productos</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=productos"><td align="right" class="questtitle">B�squeda: 
              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from productos where id = '$id'",$db);
$producto=mysql_result($result,0,"producto");
$servicios=mysql_result($result,0,"servicios");
$servicios=explode(",",$servicios);
$numeventos=mysql_result($result,0,"numeventos");
$numeventos=explode(",",$numeventos);
$terminos=mysql_result($result,0,"terminos");
?>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td align="center" bgcolor="#bbbbbb"><b>Detalles del Producto: <? echo ''.$producto.'';?></b></td>
    </tr>
  <tr>
    <td width="50%" bgcolor="#eeeeee"><strong>Servicios:</strong><p>
<table width=100% cellpadding=3 cellspacing=3>	
	<?
	$cuenta=0;
$absolute=0;	
	foreach($servicios as $miservicio){
	if($cuenta=="0"){echo'<tr>';}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from servicios where id = '$miservicio'",$db);
$servicio=mysql_result($result,0,"servicio");

	echo'<td><li>'.$servicio.' ['.$numeventos[$absolute].']</td>';	
	
	
	$cuenta=$cuenta+1;
$absolute=$absolute+1;	
	if($cuenta=="3"){echo'</tr>'; $cuenta=0;}
	}
	?>
	</table>
		</td>
    </tr>
	
	<tr><td bgcolor="#CCCCCC"><b>T�rminos:</b>
	  <p>
	<?
	echo nl2br($terminos);
	?>
	</td>
	</tr>
</table>
</td></tr></table>