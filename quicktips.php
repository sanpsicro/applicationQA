<?php  
$checa_arrayx=array_search("quicktips",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}

isset($_GET['accela']) ?  $accela = $_GET['accela'] : $accela = "" ;
isset($_GET['quest']) ?  $quest= $_GET['quest'] : $quest= "" ;
isset($_GET['sort']) ?  $sort= $_GET['sort'] : $sort= "" ;
isset($_GET['show']) ?  $show= $_GET['show'] : $show= "" ;


if(empty($show)){$show=1000;}
if(empty($sort)){$sort="id";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Quicktips</span></td><td width=150 class="blacklinks">[ <a href="?module=admin_quicktips&accela=new">Nuevo Quicktip</a> ]</td></tr></table></td></tr>
 <tr> 
     
         <td>
      </td>
  </tr>
<tr><td>
<?php  
$condicion="";
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;

$result = mysqli_query($link,"SELECT COUNT(*) FROM quicktips $condicion"); 
list($total) = mysqli_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysqli_query($link,"SELECT * FROM quicktips $condicion order by $sort  
  LIMIT $reg1, $tampag"); 


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
  echo paginar($pag, $total, $tampag, "mainframe.php?module=quicktips&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysqli_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
                    <tr> 
	                  <td class="titles">Título</td>	
                      <td class="titles">Mensaje</td>	
					   <td class="titles">ícono</td>	
					   <td class="titles">Activo</td>			  		  

                      <td class="titles">Operaci&oacute;n</td></tr>';

$bgcolor="#cccccc";
  while ($row = @mysqli_fetch_array($result)) { 
if($bgcolor=="#FFFFFF"){$bgcolor="#DCDCDC";} else{$bgcolor="#FFFFFF";} 
  echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["titulo"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["mensaje"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><div class="centerb"><img src="icon/qt/'.$row["icono"].'" width="72" height="72"></div></td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><div align="center">'; if ($row["activo"]==1) {  echo 'SI'; } if ($row["activo"]==0) { echo 'NO'; } echo'</div></td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle> <a href="?module=admin_quicktips&accela=edit&id='.$row["id"].'">Editar</a>  &nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete(\'process.php?module=quicktips&accela=delete&id='.$row["id"].'\',\'al usuario '.$row["usuario"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';
echo'</td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=quicktips&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td>
 </tr>
        </table>
</td></tr></table>