<?
$checa_arrayx=array_search("facturacion",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="factura";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Notas de Remision</span></td><td width=150 class="blacklinks"><?  $checa_array1=array_search("22_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_notasremision_b&accela=new">Nueva Nota de Remisi�n</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=notasremision<? if($quest!=""){echo"&quest=$quest";}?>">
            <td width="400"> 
              <select name="show" id="mostrar">
                <option value="10" <? if($show=="10"){echo"selected";}?>>10 por p�gina</option>
                <option value="20"  <? if($show=="20"){echo"selected";}?>>20 por p�gina</option>
                <option value="30"  <? if($show=="30"){echo"selected";}?>>30 por p�gina</option>
                <option value="50"  <? if($show=="50"){echo"selected";}?>>50 por p�gina</option>
                <option value="100"  <? if($show=="100"){echo"selected";}?>>100 por p�gina</option>
                <option value="200"  <? if($show=="200"){echo"selected";}?>>200 por p�gina</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="factura"  <? if($sort=="factura"){echo"selected";}?>>Ordenar por Nota</option>
                <option value="fecha" <? if($sort=="fecha"){echo"selected";}?>>Ordenar por fecha</option>
                <option value="notasremision.status" <? if($sort=="notasremision.status"){echo"selected";}?>>Ordenar por status</option>				
                <option value="Cliente.nombre" <? if($sort=="Cliente.nombre"){echo"selected";}?>>Ordenar por cliente</option>								
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=notasremision"><td align="right" class="questtitle">B�squeda: 



              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" > <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>



<?
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nueva Nota de Remisi�n Registrada</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos de la Nota de Remisi�n actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Nota de Remisi�n eliminada</div></b><p>';}

if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la b�squeda:</div></b><p>';
$condicion="where (factura like '%$quest%' OR nombre like '%$quest%')";
}
else{$condicion="";}
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysql_query("SELECT COUNT(*) FROM notasremision left join Cliente on (notasremision.cliente = Cliente.idCliente) $condicion", $link); 
list($total) = mysql_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysql_query("SELECT notasremision.id as factid, notasremision.cliente, notasremision.factura, notasremision.fecha, notasremision.total, notasremision.status as statusfactura, Cliente.nombre FROM notasremision left join Cliente on (notasremision.cliente = Cliente.idCliente) $condicion order by $sort  
  LIMIT $reg1, $tampag", $link); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
  function paginar($actual, $total, $por_pagina, $enlace) {
  $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p�gina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=notasremision&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Nota</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Cliente</b></td>					  				  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Fecha</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Total</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Status</b></td>					  
                      <td bgcolor="#BBBBBB" width=150  align=middle class="dataclass"><b>Operaci�n</b></td></tr>';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
  
$numfac=$row["factura"];
if(strlen($numfac)==1){$numfac="000000".$numfac."";} 
if(strlen($numfac)==2){$numfac="00000".$numfac."";} 
if(strlen($numfac)==3){$numfac="0000".$numfac."";} 
if(strlen($numfac)==4){$numfac="000".$numfac."";} 
if(strlen($numfac)==5){$numfac="00".$numfac."";} 
if(strlen($numfac)==6){$numfac="0".$numfac."";} 

$fexa=$row["fecha"];
$fexa=explode("-",$fexa);  
  
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$numfac.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=right>$'.number_format($row["total"],2).'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["statusfactura"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass"><center>';
$checa_array1=array_search("22_d",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=detail_notasremision&id='.$row["factid"].'">Detalle</a> ';}
$checa_array1=array_search("22_c",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=admin_notasremision&accela=edit&id='.$row["factid"].'">Editar</a> ';}
$checa_array1=array_search("22_b",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=notasremision&accela=delete&id='.$row["factid"].'\',\'la nota de remision '.$row["factura"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}
echo'</center></td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=notasremision&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>