<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Pagos</span></td><td width=150 class="blacklinks">[ <a href="?module=admin_pagos&accela=new">Nuevo Pago</a> ]</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400" class="questtitle">&nbsp; 
</td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=pagos"><td align="right" class="questtitle">b&uacute;squeda: 
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
                <td valign="top" align="center"> <form name="form2" method="post" action="mainframe.php?module=admin_pagos&accela=new">

                  <table width="100%%" border="0" cellspacing="3" cellpadding="3">

                    <tr>

                      <td width="48%" align="center" bgcolor="#CCCCCC"><strong>Buscar Proveedor: 

                        <input name="proveedor" type="text" id="proveedor" size="50" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/>

                        <input type="submit" name="Submit2" value="Buscar" />

                      </strong></td>

                      </tr>

                  </table>

                                </form>

								

							<?
							
							
							if(isset($proveedor) && $proveedor!=""){
							echo'<br><b><div class="xplik">Resultados de la b&uacute;squeda:</div></b><p>';
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Provedor where nombre like '%$proveedor%' order by nombre", $link); 
if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass">'.$row["nombre"].'</td><td bgcolor="'.$bgcolor.'" class="dataclass" align=middle width=200><a href="?module=admin_pagos_b&proveedor='.$row["id"].'&accela='.$accela.'">Generar Pago para este Proveedor</a></td></tr>';
							}
							echo'</table>';
							}
							}
							?>	
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</td></tr></table>