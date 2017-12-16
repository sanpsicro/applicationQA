<script type="text/javascript" src="combofecha.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="lang/calendar-es.js"></script>
<script type="text/javascript" src="calendar-setup.js"></script>
<script type="text/javascript">
function calula(){
var alfa = document.frm.monto.value;
var beta = document.frm.comision.value;
cec= alfa - beta;
document.frm.ingreso.value= cec;
}
</script>
<script language="JavaScript"> 
  var aFinMes = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
  function finMes(nMes, nAno){ 
   return aFinMes[nMes - 1] + (((nMes == 2) && (nAno % 4) == 0)? 1: 0); 
  } 
   function padNmb(nStr, nLen, sChr){ 
    var sRes = String(nStr); 
    for (var i = 0; i < nLen - String(nStr).length; i++) 
     sRes = sChr + sRes; 
    return sRes; 
   } 
   function makeDateFormat(nDay, nMonth, nYear){ 
    var sRes; 
    sRes = padNmb(nDay, 2, "0") + "-" + padNmb(nMonth, 2, "0") + "-" + padNmb(nYear, 4, "0"); 
    return sRes; 
   } 
  function incDate(sFec0){ 
   var nDia = parseInt(sFec0.substr(0, 2), 10); 
   var nMes = parseInt(sFec0.substr(3, 2), 10); 
   var nAno = parseInt(sFec0.substr(6, 4), 10); 
   nDia += 1; 
   if (nDia > finMes(nMes, nAno)){ 
    nDia = 1; 
    nMes += 1; 
    if (nMes == 13){ 
     nMes = 1; 
     nAno += 1; 
    } 
   } 
   return makeDateFormat(nDia, nMes, nAno); 
  } 
  function decDate(sFec0){ 
   var nDia = Number(sFec0.substr(0, 2)); 
   var nMes = Number(sFec0.substr(3, 2)); 
   var nAno = Number(sFec0.substr(6, 4)); 
   nDia -= 1; 
   if (nDia == 0){ 
    nMes -= 1; 
    if (nMes == 0){ 
     nMes = 12; 
     nAno -= 1; 
    } 
    nDia = finMes(nMes, nAno); 
   } 
   return makeDateFormat(nDia, nMes, nAno); 
  } 
  function addToDate(sFec0, sInc){ 
   var nInc = Math.abs(parseInt(sInc)); 
   var sRes = sFec0; 
   if (parseInt(sInc) >= 0) 
    for (var i = 0; i < nInc; i++) sRes = incDate(sRes); 
   else 
    for (var i = 0; i < nInc; i++) sRes = decDate(sRes); 
   return sRes; 
  } 
  function recalcF1(){ 
   with (document.frm){ 
    fecha_vencimiento.value = addToDate(fecha_inicio.value, tipoventa.value); 
   } 
  } 
 </script> 
 
 <script Language="JavaScript">
function validar(formulario) {
  
 
  return (true); 
}
</script>
 
 <script type="text/javascript" language="JavaScript">
function confirmGeneral(generalurl) { 
if (confirm("¿Est&aacute; seguro?")) { 
document.location = generalurl; 
}
}
</script>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Contratos</span></td><td width=150 class="blacklinks"><?  $checa_array1=array_search("4_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_contratos&accela=new">Nuevo Contrato</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" 			class="questtitle"> 
			<? 
			if($accela=="new"){echo'Dar de alta Contrato';}
			else{echo'Editar Contrato';
			}
			?>
</td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=contratos"><td align="right" class="questtitle">b&uacute;squeda: 
              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td bgcolor="#eeeeee">
<table border=0 width=100% cellpadding=0 cellspacing=0>
  <tr> 
    <td valign="top" bgcolor="#eeeeee"><table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr> 
          <td><table width="100%" height=100% border="1" cellpadding="6" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="contentarea1">
              <tr> 
                <td valign="top"> <div align="center">
<? if($accela=="edit" && isset($idPoliza)){
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Poliza where idPoliza = '$idPoliza'",$db);
$idCliente=mysql_result($result,0,"idCliente");
$vendedor=mysql_result($result,0,"idEmpleado");
$numpoliza=mysql_result($result,0,"numPoliza");
$tipocliente=mysql_result($result,0,"tipoCliente");
$tipoventa=mysql_result($result,0,"tipoVenta");
$fecha1=mysql_result($result,0,"fechaInicio");
$fecha1expre=explode(" ",$fecha1);
$fecha1ex=explode("-",$fecha1expre[0]);
$fecha1hr=explode(":",$fecha1expre[1]);
$fecha2=mysql_result($result,0,"fechaVence");
$fecha2expre=explode(" ",$fecha2);
$fecha2ex=explode("-",$fecha2expre[0]);
$fecha2hr=explode(":",$fecha2expre[1]);
$factura=mysql_result($result,0,"factura");
$monto=mysql_result($result,0,"monto");
$comision=mysql_result($result,0,"comision");
$ingreso=mysql_result($result,0,"ingreso");
$productos=mysql_result($result,0,"productos");
$productos_exploited=explode(",",$productos);
$status=mysql_result($result,0,"status");
}

echo'<form name="frm" method="post" action="process.php?module=contratos&accela='.$accela.'&idPoliza='.$idPoliza.'" onSubmit="return validar(this); submitonce(this)"><input name="tmpid" type="hidden" value="'.$unixid.'_'.$valid_userid.'" />';    
?>

<table width="100%%" border="0">
  <tr>
    <td valign="top"><center>
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td width="30%" align="right" bgcolor="#cccccc"><strong>Cliente:</strong></td>
          <td width="70%" bgcolor="#cccccc"><?
			if(isset($idCliente) && $idCliente!=""){
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$resultz = mysql_query("SELECT * from Cliente where idCliente = '$idCliente'",$db);
$clientenombre=mysql_result($resultz,0,"nombre");
$tipocliente=mysql_result($resultz,0,"tipocliente");
$idvendedor=mysql_result($resultz,0,"idEmpleado");
$rfc=mysql_result($resultz,0,"rfc");
			echo'<input name="cliente" type="hidden" value="'.$idCliente.'" /><input name="rfc" type="hidden" value="'.$rfc.'" />'.$clientenombre.'';}
			else{}
			  ?>          </td>
        </tr>
        <tr>
          <td align="right" bgcolor="#cccccc"><strong>Vendedor:</strong></td>
          <td bgcolor="#cccccc"><?		
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$resultz = mysql_query("SELECT * from Empleado where idEmpleado = '$idvendedor'",$db);
$vendedornombre=mysql_result($resultz,0,"nombre");
echo'<input name="vendedor" type="hidden" value="'.$idvendedor.'"/>'.$vendedornombre.'';
?></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#cccccc"><strong>Num. Contrato:</strong> </td>
          <td bgcolor="#cccccc"><? 

if($accela=="edit"){echo"$numpoliza";
echo'<input name="numcontrato" type="hidden" value="'.$numpoliza.'"/>';
}
else{

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$resultz = mysql_query("SELECT * from Empleado where idEmpleado = '$idvendedor'",$db);
$venduser=mysql_result($resultz,0,"usuario");
$consecutivo=mysql_result($resultz,0,"indexPoliza");
$consecutivo=($consecutivo+1);
if(strlen($consecutivo)==1){$consecutivo="00000".$consecutivo."";} 
if(strlen($consecutivo)==2){$consecutivo="0000".$consecutivo."";} 
if(strlen($consecutivo)==3){$consecutivo="000".$consecutivo."";} 
if(strlen($consecutivo)==4){$consecutivo="00".$consecutivo."";} 
if(strlen($consecutivo)==5){$consecutivo="0".$consecutivo."";} 
$numcontrato="".$venduser."_".$consecutivo."";
echo'<input name="numcontrato" type="text" value="'.$numcontrato.'" readonly="readonly"/>';
}


if($accela=="new"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From usuarios_contrato Where contrato='$numcontrato' AND idPoliza=''";
mysql_db_query("$database",$sSQL);
}
		?></td>
        </tr>
        <!--  <tr>

        <td align="right" bgcolor="#cccccc"><strong>Tipo de Cliente:</strong></td>

        <td bgcolor="#cccccc"><?

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM TipoCliente", $link); 

if (mysql_num_rows($result)){ 

echo'<select name="tipocliente" id="tipocliente">';

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idTipoCliente"].'"';

     if($tipocliente==$row["idTipoCliente"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }

  echo'        </select>';}



?>        </td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Tipo de Venta :</strong></td>

        <td bgcolor="#cccccc"><?

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM TipoVenta", $link); 

if (mysql_num_rows($result)){ 

echo'<select name="tipoventa" id="tipoventa" onChange=\'cargaContenido(this.id)\' ><option value="">Seleccione una opci&oacute;n</option>';

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idVenta"].'"';

     if($tipoventa==$row["idVenta"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }

  echo'        </select>';}



?>          </td>

      </tr>
      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Fecha de inicio:</strong> </td>

        <td bgcolor="#cccccc"><input name="fecha_inicio" type="text" id="fecha_inicio" size="15" value="<?

		if($accela=="edit"){echo''.$fecha1ex[2].'-'.$fecha1ex[1].'-'.$fecha1ex[0].' '.$fecha1hr[0].':'.$fecha1hr[1].':'.$fecha1hr[2].'';} else{echo date("j-n-Y H:i:s");                 } ?>" readonly="readonly"/>		</td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Fecha de vencimiento:</strong> </td>

        <td bgcolor="#cccccc"><input name="fecha_vencimiento" type="text" id="fecha_vencimiento" size="15" value="<? if($accela=="edit"){echo''.$fecha2ex[2].'-'.$fecha2ex[1].'-'.$fecha2ex[0].' '.$fecha2hr[0].':'.$fecha2hr[1].':'.$fecha2hr[2].'';}?>" readonly="readonly"/></td>

      </tr>


      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Factura:</strong></td>

        <td bgcolor="#cccccc"><input name="factura" type="checkbox" id="factura" value="1" <? if($factura=="1"){echo'checked';} else{} ?>></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Monto $</strong></td>

        <td bgcolor="#cccccc"><input name="monto" type="text" id="monto" size="30"value="<? echo"$monto";?>" onchange="calula();"    onBlur="calula();" onClick="calula();" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Comisi&oacute;n $</strong></td>

        <td bgcolor="#cccccc"><input name="comision" type="text" id="comision" size="30" value="<? echo"$comision";?>" onchange="calula();" onBlur="calula();" onClick="calula();" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Ingreso $</strong></td>

        <td bgcolor="#cccccc"><input name="ingreso" type="text" id="ingreso" size="30" value="<? echo"$ingreso";?>" disabled="disabled"/></td>

      </tr>
	  -->
        <tr>
          <td align="right" bgcolor="#cccccc"><strong>Producto:</strong></td>
          <td bgcolor="#cccccc"><? 

		  $link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM productos order by producto", $link); 

if (mysql_num_rows($result)){ 

while ($row = @mysql_fetch_array($result)) { 

  echo'<input name="producto" type="radio" value="'.$row["id"].'"'; 

$checa_array1=array_search($row["id"],$productos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';}   

  echo'/>'.$row["producto"].' <br>';

  }

}

  ?></td>
        </tr>
      </table>
      
      
      
    </center></td>
    </tr>




<?
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM TipoCliente where idTipoCliente='$tipocliente'", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
$tipo_cliente=$row["nombre"];
  }
}
?>    

  <tr>

    <td valign="top"><iframe src ="usuarios_contrato.php?accela=<? echo $accela;?>&tmpid=<? echo "".$unixid."_".$valid_userid."";?>&idPoliza=<? echo $idPoliza;?>&tipocliente=<? echo $tipocliente;?><? if($accela=="new"){echo '&numcontrato='.$numcontrato.'';} if($accela=="edit"){echo '&numcontrato='.$numpoliza.'';}?>&idCliente=<? echo $idCliente; ?>" width="100%" height=550 border=0 frameborder=0 MARGINWIDTH=50 MARGINHEIGHT=50 ALIGN=30 name="window1"></iframe></td>
  </tr>
<!--
 <tr>

    <td colspan="2" valign="top"><iframe src ="beneficiarios.php?accela=<? echo $accela;?>&tmpid=<? echo "".$unixid."_".$valid_userid."";?>&idPoliza=<? echo $idPoliza;?>" width="100%" height=200 border=0 frameborder=0 MARGINWIDTH=50 MARGINHEIGHT=50 ALIGN=30 name="window2"></iframe></td>

    </tr>
-->
</table>

<!--

					  <script type="text/javascript">

					  

                            Calendar.setup({

                                    inputField     :    "fecha_inicio",   // id of the input field

                                    ifFormat       :    "%d-%m-%Y",       // format of the input field

                                    timeFormat     :    "24"

                            });

							

							  Calendar.setup({

                                    inputField     :    "fecha_vencimiento",   // id of the input field

                                    ifFormat       :    "%d-%m-%Y",       // format of the input field

                                    timeFormat     :    "24"

                            });

                  </script>  -->                   

                </div>

                </td>

              </tr>
  <tr>

    <td colspan="2" align="center" valign="top"><?
    if($accela=="edit"){echo'<input type="submit" name="Submit" value="A c t u a l i z a r  C o n t r a t o" /> &nbsp;  <input type="button" name="Submit2" value="C a n c e l a r C o n t r a t o" class="butn" onClick="javascript:confirmGeneral(\'process.php?module=contratos&accela=cancela&idPoliza='.$idPoliza.'\')">';}
	else{echo'<input type="submit" name="Submit" value="D a r   d e   A l t a  C o n t r a t o" />';}
	?> </form>
    &nbsp;</td>
  </tr>


            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>