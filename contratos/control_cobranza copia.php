<?
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=50;}
if(empty($sort)){$sort="cobranza.id";}
if(empty($selenium)){$selenium="no pagados";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Control de Cobranza</span></td><td width=150 class="blacklinks">[ <a href="?module=admin_cobranza&accela=new">Nuevo Pago</a> ]</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="mainframe.php?module=control_cobranza">
            <td> 
              <select name="show" id="mostrar">
                <option value="10" <? if($show=="10"){echo"selected";}?>>10 por página</option>
                <option value="20"  <? if($show=="20"){echo"selected";}?>>20 por página</option>
                <option value="30"  <? if($show=="30"){echo"selected";}?>>30 por página</option>
                <option value="50"  <? if($show=="50"){echo"selected";}?>>50 por página</option>
                <option value="100"  <? if($show=="100"){echo"selected";}?>>100 por página</option>
                <option value="200"  <? if($show=="200"){echo"selected";}?>>200 por página</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="Cliente.nombre" <? if($sort=="Cliente.nombre"){echo"selected";}?>>Ordenar por Cliente</option>
                <option value="cobranza.status" <? if($sort=="cobranza.status"){echo"selected";}?>>Ordenar por Status</option>                
				<option value="cobranza.monto" <? if($sort=="cobranza.monto"){echo"selected";}?>>Ordenar por Monto</option>   
              </select>
              <select name="selenium" id="selenium">
                <option value="all" <? if($selenium=="all"){echo' selected ';}?>>Todos</option>
                <option value="pagados" <? if($selenium=="pagados"){echo' selected ';}?>>Pagados</option>
                <option value="no pagados" <? if($selenium=="no pagados"){echo' selected ';}?>>No Pagados</option>
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <form name="form1" method="post" action="bridge.php?module=cobranza"><td align="right" class="questtitle">Búsqueda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>

        </table>
    </td>
  </tr>
<tr><td>
<?
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo pago Registrado</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Pago actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Pago eliminado</div></b><p>';}


if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la búsqueda:</div></b><p>';
$condicion="AND Cliente.nombre like '%$quest%'";
}
else{
if($selenium=="all"){$condicion="";}
if($selenium=="pagados"){$condicion="AND cobranza.status='pagado'";}
if($selenium=="no pagados"){$condicion="AND cobranza.status='no pagado'";}
}
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysql_query("SELECT COUNT(*) from cobranza $condicion", $link); 
list($total) = mysql_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$query="SELECT cobranza.id, cobranza.conceptor, cobranza.monto, cobranza.status, general.expediente,  Cliente.nombre FROM cobranza,general,Cliente WHERE cobranza.expediente=general.expediente AND general.idCliente=Cliente.idCliente $condicion order by $sort LIMIT $reg1, $tampag";
$result = mysql_query($query, $link) or die (mysql_error()); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
  function paginar($actual, $total, $por_pagina, $enlace) {
 $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la página</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
for($isabel=1; $isabel<=$total_paginas; $isabel++)
{ 
if($pag==$isabel){    $texto .= "<option selected value=\"$enlace$isabel\">$isabel</option> ";} else {
    $texto .= "<option $thisis value=\"$enlace$isabel\">$isabel</option> ";}
} 	
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$texto .= "</select></td><td width=5>&nbsp;</td><td width=30><font color=#000000>de ".$total_paginas."</font></td><td>&nbsp;</td></tr></form></table>";
  return $texto;
}
#
  echo paginar($pag, $total, $tampag, "mainframe.php?module=cobranza&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Proveedor</b></td>				  	                     
					 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Concepto</b></td>
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Monto</b></td>
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Status</b></td>					 
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Operaciones</b></td></tr>';

$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["conceptor"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto"],2).'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=control_cobro&cobro='.$row["id"].'">Detalles</a></td>
</tr> 
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=cobranza&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>