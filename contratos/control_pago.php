<?
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<span class="maintitle">Pagos Expediente <a href="detalle_seguimiento.php?id=<?=$expediente?>" target="_blank"><?=$expediente?></a></span><br />
<?
if(isset($code) && $code=="1"){echo'<br><div class="xplik">Nuevo pago Registrado</div>';}
if(isset($code) && $code=="2"){echo'<br><div class="xplik">Datos del Pago actualizados</div>';}
if(isset($code) && $code=="3"){echo'<div class="xplik">Pago eliminado</div>';}


$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysql_query("SELECT p.expediente from pagos p 
							LEFT JOIN Provedor pr 
								ON (p.proveedor=pr.id)
							WHERE p.expediente='$expediente'", $link); 
$total = mysql_num_rows($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$query="SELECT 	DATE_FORMAT(p.fecha_corte,'%e/%m/%y') as fecha_corte, 
				p.id, 
				p.expediente, 
				pr.nombre,
				pr.id as proveedor_id,
				p.conceptor, 
				p.monto, 
				p.status,
				p.cerrado,
				DATE_FORMAT(p.fecha_pago,'%e/%m/%y') as fecha_pago
						FROM pagos p 
							LEFT JOIN Provedor pr
								ON (p.proveedor = pr.id)
							LEFT JOIN general g
								ON (g.id = p.expediente)
							WHERE p.expediente='$expediente'";
$result = mysql_query($query, $link) or die (mysql_error()); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;

if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">
                    <tr> 
                     <th>Fecha de Corte</th>				  	                     
					 <th>Concepto</th>
                     <th>Monto</th>				 
                     <th>Status</th>
                     <th>Fecha de Pago</th>
                     <th>Detalles</th>
					 </tr>';

$pago_cerrado = false;

  while ($row = mysql_fetch_array($result)) { 
if($i++%2==0){$class="even";} else{$class="odd";}
	
if($pago_cerrado === false){
	$pago_cerrado = ($row['cerrado']=='0') ? false : true;
}	

$proveedor=$row["proveedor_id"];	

  echo'                <tr> 
<td class="'.$class.'">'.$row["fecha_corte"].'</a></td>
<td class="'.$class.'">'.$row["conceptor"].'</td>
<td class="'.$class.'">$'.number_format($row["monto"],2).'</td>
<td class="'.$class.'">'.($row['status']==1?'Pagado':'No Pagado').'</td>
<td class="'.$class.'">'.$row['fecha_pago'].'</a></td>
<td class="'.$class.'"><a href="?module=control_pago_editar&id='.$row["id"].'">Editar</a></td>
</tr> 
';
  }  
echo'</table>';
  }
else{
	echo'<center><b>No hay resultados</b></center>';
}
?>
<?php if($pago_cerrado === false): ?> 
<div class="control_pagos">
	<a href="mainframe.php?module=control_pago_alta&expediente=<?=$expediente?>&proveedor=<?=$proveedor?>">Agregar Pago</a>
	<small><a href="control_pago_db.php?action=cerrar&expediente=<?=$expediente?>&proveedor=<?=$proveedor?>">Cerrar Pagos</a></small>
</div>
<?php endif; ?>
<!-- <? echo print_r($_SESSION);?> -->
</td></tr></table>