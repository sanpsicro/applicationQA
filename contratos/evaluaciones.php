<?
$checa_arrayx=array_search("evaluaciones",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="fecha_recepcion DESC";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Evaluaciones</span></td><td width=150 class="blacklinks"><?
if(!empty($filter)){echo'[ <a href="?module=evaluaciones">Ver evaluaciones</a> ]';}
else{echo'[ <a href="?module=evaluaciones&filter=evaluar">Realizar evaluaciones</a> ]';}	  
	  ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=evaluaciones<? if($quest!=""){echo"&quest=$quest";} if(!empty($filter)){echo'&filter='.$filter.'';}?>">
            <td width="400"> 
              <select name="show" id="mostrar">
                <option value="10" <? if($show=="10"){echo"selected";}?>>10 por p&aacute;gina</option>
                <option value="20"  <? if($show=="20"){echo"selected";}?>>20 por p&aacute;gina</option>
                <option value="30"  <? if($show=="30"){echo"selected";}?>>30 por p&aacute;gina</option>
               <option value="50"  <? if($show=="50"){echo"selected";}?>>50 por p&aacute;gina</option>
               <option value="100"  <? if($show=="100"){echo"selected";}?>>100 por p&aacute;gina</option>
               <option value="200"  <? if($show=="200"){echo"selected";}?>>200 por p&aacute;gina</option>
             </select>
              <select name="sort" id="ordenar">
                <option value="fecha_recepcion"  <? if($sort=="fecha_recepcion"){echo"selected";}?>>Ordenar por fecha de recepci�n</option>
                <option value="contrato" <? if($sort=="contrato"){echo"selected";}?>>Ordenar por N&uacute;mero de contrato</option>
                <option value="promedio" <? if($sort=="promedio"){echo"selected";}?>>Ordenar por promedio</option>								
                <option value="idEmpleado" <? if($sort=="idEmpleado"){echo"selected";}?>>Ordenar por empleado</option>				
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=evaluaciones<? if(!empty($filter)){echo'&filter='.$filter.'';} ?>"><td align="right" class="questtitle">b&uacute;squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nueva evaluaci�n Registrada</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos de evaluaci�n actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Evaluaci�n eliminada</div></b><p>';}
if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: la evaluaci�n ya existe</div></b><p>';}


if(isset($quest) && $quest!=""){echo'<br><b><div class="xplik">Resultados de la b&uacute;squeda:</div></b><p>';
if(empty($filter)){$condicion="AND evaluado ='evaluado' AND (contrato like '%$quest%' OR contacto like '%$quest%')";}
else{$condicion="AND evaluado !='evaluado' AND (contrato like '%$quest%' OR contacto like '%$quest%')";}
}
else{
if(empty($filter)){$condicion="AND evaluado ='evaluado'";}
else{$condicion="AND evaluado !='evaluado'";}
}

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysql_query("SELECT COUNT(general.id) from servicios,general left join evaluaciones on (general.id = evaluaciones.general) WHERE general.servicio=servicios.id $condicion order by $sort", $link); 
list($total) = mysql_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysql_query("SELECT general.id as milene,general.idEmpleado,general.num_cliente,general.usuario,general.expediente,servicios.servicio,general.fecha_recepcion,general.evaluado,evaluaciones.promedio from servicios,general left join evaluaciones on (general.id = evaluaciones.general) WHERE general.servicio=servicios.id $condicion order by $sort LIMIT $reg1, $tampag", $link) or die (mysql_error()); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
  function paginar($actual, $total, $por_pagina, $enlace) {
  $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p&aacute;gina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=evaluaciones&quest=$quest&sort=$sort&show=$show&filter=$filter&pag=");
#

if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Expediente</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Fecha recepci�n</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Cliente</b></td>
					  <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Servicio</b></td>
					  <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Usuario</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Promedio</b></td>					  					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Status</b></td>				  
                      <td bgcolor="#BBBBBB" width=250  align=middle class="dataclass"><b>Operaci&Oacute;n</b></td></tr>';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}

$fecharece=explode(" ",$row["fecha_recepcion"]);
$fecharecex=explode("-",$fecharece[0]);
$idempleado=$row["idEmpleado"];
$dbx = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbx);
$resultx = mysql_query("SELECT * from Empleado where idEmpleado = '$idempleado'",$dbx);
$empleado=mysql_result($resultx,0,"nombre");

$bgcolorx=$bgcolor;
if($row["promedio"]<6){$bgcolorx="#FF0000";}
if($row["promedio"]<9 && $row["promedio"]>5){$bgcolorx="#FFFF00";}
if($row["promedio"]>8){$bgcolorx="#32CD32";}


  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["expediente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecharecex[2].'/'.$fecharecex[1].'/'.$fecharecex[0].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["num_cliente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["servicio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>
<td bgcolor="'.$bgcolorx.'" class="dataclass" align=middle>'.$row["promedio"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>';

if($row["evaluado"]=="evaluado"){echo'evaluado';}
else{echo'<a href="?module=admin_evaluaciones&id='.$row["milene"].'">evaluar</a>';}


echo'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=detail_evaluaciones&id='.$row["milene"].'">Detalle evaluacion</a> | <a href="?module=detail_seguimiento&id='.$row["milene"].'">Detalle caso</a></td></tr>';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=evaluaciones&quest=$quest&sort=$sort&filter=$filter&show=$show&pag=");
?>
</td></tr></table>