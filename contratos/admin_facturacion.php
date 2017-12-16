<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Facturacion</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" class="questtitle"> 

</td>
            <td>&nbsp;</td>
           <form name="form1" method="post" action="bridge.php?module=facturacion"><td align="right" class="questtitle">b&uacute;squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
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

                <td align="center" valign="top"><?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from facturas where id = '$id'",$db);
$numfac=mysql_result($result,0,"factura");
$orden=mysql_result($result,0,"orden");
$descripcion=mysql_result($result,0,"descripcion");
$precio=mysql_result($result,0,"precio");
$status=mysql_result($result,0,"status");				
				
				
echo'<form method="post" action="process.php?module=facturacion&accela='.$accela.'&id='.$id.'">'; 
?><table width="100%" cellpadding="3" cellspacing="3">
  <tr>
    <td bgcolor="#eeeeee"><strong>Factura Num: </strong></td>
    <td bgcolor="#eeeeee"><input name="factura" type="text" id="factura" value="<? echo $numfac;?>" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Orden de venta:</strong></td>
    <td bgcolor="#eeeeee"><input name="orden" type="text" id="orden" value="<? echo $orden;?>" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Monto:</strong></td>
    <td bgcolor="#eeeeee"><input name="monto" type="text" id="monto" value="<? echo $precio;?>" onKeyPress="return numbersonly(this, event)"/></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Descripcion:</strong></td>
    <td bgcolor="#eeeeee"><textarea name="descripcion" cols="50" rows="3"><? echo $descripcion;?></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Status:</strong></td>
    <td bgcolor="#eeeeee"><select name="status" id="status">
      <option value="no pagada" <? if($status=="no pagada"){echo' selected ';} ?>>No pagada</option>
      <option value="pagada" <? if($status=="pagada"){echo' selected ';} ?>>Pagada</option>
      <option value="cancelada" <? if($status=="cancelada"){echo' selected ';} ?>>Cancelada</option>
    </select>
    </td>
  </tr>
  
  <tr>
    <td bgcolor="#eeeeee">&nbsp;</td>
    <td bgcolor="#eeeeee"><input type="submit" name="Submit3" value="Enviar" />
      <input name="Submit2" type="reset" value="Reestablecer" /></td>
  </tr>
</table>
                </form>
                </td>
              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>