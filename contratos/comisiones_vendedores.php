<?
$checa_arrayx=array_search("comisiones_vendedores",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=50;}
if(empty($sort)){$sort="Poliza.numPoliza";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Comisiones de Vendedores</span></td><td width=150 class="blacklinks">&nbsp;
	   </td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="mainframe.php?module=comisiones_vendedores">
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
                <option value="numPoliza" <? if($sort=="numPoliza"){echo"selected";}?>>Ordenar por N&uacute;mero de contrato</option>
                <option value="Cliente.nombre" <? if($sort=="Cliente.nombre"){echo"selected";}?>>Ordenar por cliente</option>                
                 <option value="Empleado.nombre" <? if($sort=="Empleado.nombre"){echo"selected";}?>>Ordenar por vendedor</option>				
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>

            <form name="form1" method="post" action="bridge.php?module=comisiones_vendedores"><td align="right" class="questtitle">b&uacute;squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>

        </table>
      </td>
  </tr>
<tr><td>
<?



if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la b&uacute;squeda:</div></b><p>';
$condicion="AND(Cliente.nombre like '%$quest%' OR Poliza.numPoliza like '%$quest%' or Empleado.nombre like '%$quest%')";
}
else{$condicion="";}

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

if (isset($_GET['pag'])){} else{$_GET['pag']=1;}

$pag = ($_GET['pag']); 

if (!isset($pag)) $pag = 1;
	
$result = mysql_query("SELECT COUNT(DISTINCT Poliza.numPoliza) from Poliza left join usuarios_contrato on (Poliza.numPoliza = usuarios_contrato.contrato) where usuarios_contrato.status='validado' $condicion", $link); 
list($total) = mysql_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysql_query("SELECT DISTINCT Poliza.numPoliza from Poliza left join usuarios_contrato on (Poliza.numPoliza = usuarios_contrato.contrato) where usuarios_contrato.status='validado' $condicion order by $sort LIMIT $reg1, $tampag", $link); 

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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=comisiones_vendedores&quest=$quest&sort=$sort&show=$show&pag=");



#











if (mysql_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">



                    <tr> 



                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Vendedor</b></td>

                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Num. Contrato</b></td>
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Comisi&oacute;n</b></td>				  					 
                     <td bgcolor="#BBBBBB" width=150  align=middle class="dataclass"><b>Status</b></td>
                     <td bgcolor="#BBBBBB" width=150  align=middle class="dataclass"><b>Operaciones</b></td></tr>					 
					 ';

$bgcolor="#cccccc";



  while ($row = @mysql_fetch_array($result)) { 

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
$contrato=$row["numPoliza"];

$dbv = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbv);
$resultv = mysql_query("SELECT * from usuarios_contrato where contrato = '$contrato'",$dbv);
if (mysql_num_rows($resultv)){ 
$monto=0;
$ingreso=0;
$comision=0;
while ($rowv = @mysql_fetch_array($resultv)) { 
$comision=$comision+$rowv["comision"];
}
}

$dbv = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbv);
$resultv = mysql_query("SELECT idEmpleado from Poliza where numPoliza = '$contrato'",$dbv);
if (mysql_num_rows($resultv)){ 
$vendedor=mysql_result($resultv,0,"idEmpleado");

}

$dbv = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbv);
$resultv = mysql_query("SELECT nombre from Empleado where idEmpleado = '$vendedor'",$dbv);
if (mysql_num_rows($resultv)){ 
$vendedor=mysql_result($resultv,0,"nombre");
}

$dbv = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbv);
$resultv = mysql_query("SELECT status from comisiones_contratos where contrato = '$contrato'",$dbv);
if (mysql_num_rows($resultv)){ 
$status=mysql_result($resultv,0,"status");
}


  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$vendedor.'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numPoliza"].'</td>


<td bgcolor="'.$bgcolor.'" class="dataclass" align="right">$'.number_format($comision,2).'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$status.'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="?module=admin_comision&contrato='.$contrato.'">Editar</a></td>

</tr>

';
$status="";
}

echo'</table>';



  }



else{echo'<center><b>No hay resultados</b></center>';}



  echo paginar($pag, $total, $tampag, "mainframe.php?module=comisiones_vendedores&quest=$quest&sort=$sort&show=$show&pag=");







?>



</td></tr></table>
