<?
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=50;}
if(empty($sort)){$sort="pr.nombre";}
if(empty($selenium)){$selenium="all";}
?>
<span class="maintitle">Control de pagos</span>
<div class="filtros">
<form class="filtro" method="post" action="mainframe.php?module=control_pagos">
	<select name="show" id="mostrar">
		<option value="10" <? if($show=="10"){echo"selected";}?>>10 por página</option>
		<option value="20"  <? if($show=="20"){echo"selected";}?>>20 por página</option>
		<option value="30"  <? if($show=="30"){echo"selected";}?>>30 por página</option>
		<option value="50"  <? if($show=="50"){echo"selected";}?>>50 por página</option>
		<option value="100"  <? if($show=="100"){echo"selected";}?>>100 por página</option>
		<option value="200"  <? if($show=="200"){echo"selected";}?>>200 por página</option>
	</select>
	<select name="sort" id="ordenar">
		<option value="pr.nombre" <? if($sort=="pr.nombre"){echo"selected";}?>>Ordenar por Proveedor</option>
		<option value="p.expediente DESC" <? if($sort=="p.expediente DESC"){echo"selected";}?>>Ordenar por Expediente</option>
		<option value="p.status DESC" <? if($sort=="p.status DESC"){echo"selected";}?>>Ordenar por status</option>                
	</select>
	<select name="selenium" id="selenium">
		<option value="all" <? if($selenium=="all"){echo' selected ';}?>>Todos</option>
		<option value="pagados" <? if($selenium=="pagados"){echo' selected ';}?>>Pagados</option>
		<option value="no pagados" <? if($selenium=="no pagados"){echo' selected ';}?>>No Pagados</option>
	</select>
	<input type="submit" name="Submit2" value="Mostrar">
</form>
<form class="filtro" method="post" action="bridge.php?module=control_pagos">
Búsqueda: 
	<input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> 
	<input type="submit" name="Submit" value="Buscar">
</form>
</div>


<?
if(isset($code) && $code=="1"){echo'<br><div class="xplik">Nuevo pago Registrado</div>';}
if(isset($code) && $code=="2"){echo'<br><div class="xplik">Datos del Pago actualizados</div>';}
if(isset($code) && $code=="3"){echo'<div class="xplik">Pago eliminado</div>';}


if(isset($quest) && $quest!=""){
echo'<div class="xplik">Resultados de la búsqueda:</div>';
$condicion="WHERE pr.nombre like '%$quest%'";
}
else{
if($selenium=="all"){$condicion="";}
if($selenium=="pagados"){$condicion="WHERE p.status='1'";}
if($selenium=="no pagados"){$condicion="WHERE p.status='0'";}
}
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysql_query("SELECT p.expediente from pagos p 
							LEFT JOIN Provedor pr 
								ON (p.proveedor=pr.id) $condicion 
							GROUP BY expediente", $link); 
$total = mysql_num_rows($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$query="SELECT p.expediente, s.servicio, pr.nombre, SUM(p.monto) as monto, p.status, BIT_AND( p.status ) as todos_pagados , BIT_OR( p.status ) as alguno_pagado 
						FROM pagos p 
							LEFT JOIN Provedor pr
								ON (p.proveedor = pr.id)
							LEFT JOIN general g
								ON (g.id = p.expediente)
							LEFT JOIN servicios s
								ON (s.id = g.servicio)
							$condicion 
							GROUP BY p.expediente
							ORDER BY $sort 
							LIMIT $reg1, $tampag";
$result = mysql_query($query, $link) or die (mysql_error()."Consulta $query"); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
#
  echo paginacion($pag, $total, $tampag, "mainframe.php?module=control_pagos&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">
                    <tr> 
                     <th>Expediente</th>				  	                     
					 <th>Servicio</th>
                     <th>Proveedor</th>
                     <th>Monto Total</th>					 
                     <th>Status</th>
                     <th>Detalles</th>
					 </tr>';

$bgcolor="#cccccc";
  while ($row = mysql_fetch_array($result)) { 
if($i++%2==0){$class="even";} else{$class="odd";}
if($row['todos_pagados']== '1')
	$status = "Pagado";
else if($row['alguno_pagado'] == '1')
	$status = "Pagado Parcial";
else
	$status = "No Pagado";
	

  echo'                <tr> 
<td class="'.$class.'"><a class="expediente" href="http://67.19.37.194/~opcyons/detalle_seguimiento.php?id='.$row["expediente"].'" target="_blank">'.$row["expediente"].'</a></td>
<td class="'.$class.'">'.$row["servicio"].'</td>
<td class="'.$class.'">'.$row["nombre"].'</td>
<td class="'.$class.'">$'.number_format($row["monto"],2).'</td>
<td class="'.$class.'">'.$status.'</td>
<td class="'.$class.'"><a href="?module=control_pago&expediente='.$row["expediente"].'">Detalles</a></td>
</tr> 
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}

echo paginacion($pag, $total, $tampag, "mainframe.php?module=control_pagos&quest=$quest&sort=$sort&show=$show&pag=");
?>
<!-- <? echo print_r($_SESSION);?> -->
</td></tr></table>