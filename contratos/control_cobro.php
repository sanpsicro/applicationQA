<?
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
<tr> 
	<td height="44" align="left">
		<table width=100% cellpadding=0 cellspacing=0>
		<tr>
			<td>
				<span class="maintitle">Control de Cobro</span>
			</td>
			<!-- td width=150 class="blacklinks">[ <a href="?module=admin_pagos&accela=new">Nuevo Pago</a> ]</td -->
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<?
		$query="SELECT Pr.nombre,p.conceptor,p.expediente,p.monto,p.status,p.id, p.fecha FROM cobranza p,Provedor Pr WHERE p.id='$cobro' AND Pr.id=p.proveedor";
		$result=mysql_query($query) or die(mysql_error());
		if (mysql_num_rows($result)){ 
		echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		                    <tr> 
		                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Proveedor</b></td>				  	                     
							 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Concepto</b></td>
		                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Monto</b></td>
		                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Status</b></td>
							 <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Fecha de Pago</b></td>
							 </tr>';

		$bgcolor="#cccccc";
		$row = @mysql_fetch_array($result); 
		 $fpagado = strtotime($row["fecha"]);
if ($row["fecha"]!="0000-00-00 00:00:00") {$fpago=date("d/m/Y", $fpagado);} else{$fpago="Sin pago";}
		if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
		 echo'                <tr> 
		<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
		<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["conceptor"].'</td>
		<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto"],2).'</td>
		<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>
		<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fpago.'</td>
		</tr> 
		';
		echo'</table>';
		  }
		else{echo'<center><b>No hay resultados</b></center>';}
		?>
	</td>
</tr>
<tr>
	<td>
		<div id="notas">
	  <table width="100%" border="0" cellspacing="3" cellpadding="3">
      		<tr>
		  <td bgcolor="#cccccc">
			<strong>ACTUALIZAR:</strong> 
			<form method="post" action="setPago.php">
				<input type="hidden" name="id" value="<? echo $cobro; ?>">
				<input type="hidden" name="obj" value="cobranza">
                Monto: <input type="text" name="monto" value="<? echo number_format($row["monto"],2); ?>"><br />
Fecha de pago: 
<select name="diap">
<?
if ($row["fecha"]!="0000-00-00 00:00:00") {$fpagod=date("d", $fpagado);} else{$fpagod=date(d);}
?>
<option value="<? echo $fpagod; ?>"><? echo $fpagod; ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
/
<select name="mesp">
<?
if ($row["fecha"]!="0000-00-00 00:00:00") {$fpagom=date("m", $fpagado);} else{$fpagom=date(m);}
?>
<option value="<? echo $fpagom; ?>"><? echo $fpagom; ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
/
<select name="anop">
<?
if ($row["fecha"]!="0000-00-00 00:00:00") {$fpagoa=date("Y", $fpagado);} else{$fpagoa=date(Y);}
?>
<option value="<? echo $fpagoa; ?>"><? echo $fpagoa; ?></option>
<option value="2013">2013</option>
<option value="2012">2012</option>
</select>

<br />
				<select name="status">
					<option value="no pagado" <? if($row['status']=="no pagado")echo "selected"; ?>>No pagado</option>
					<option value="pagado" <? if($row['status']=="pagado")echo "selected"; ?>>Pagado</option>
				</select><br />
				<input type="submit" value="Actualizar">
			</form>
		</td>
		</tr>
      	<tr>
		  <td bgcolor="#cccccc"><strong>Agregar nota:</strong></td>
		</tr>
		<tr>
		  <td bgcolor="#ffffff">
		  <form method="post" action="control_cobro_agrega_nota.php?expediente=<? echo $row['expediente']; ?>&cobro=<? echo $cobro; ?>">
			<strong>Comentario:</strong><textarea name="comentario" cols="50" rows="3"></textarea>
			<input type="submit" value="Agregar">
		  </form>
		  </td>
		 </tr>
		<?
		$query="SELECT DATE_FORMAT(notas_cobranza.fecha,'%e/%m/%Y %T') as fecha,Empleado.nombre as usuario,notas_cobranza.comentario FROM notas_cobranza,Empleado WHERE expediente='$row[expediente]' AND Empleado.idEmpleado=notas_cobranza.usuario ORDER BY fecha DESC";
		
		$result=mysql_query($query)or die(mysql_error());
		#echo print_r($_SESSION);
		#echo $query;
		if (mysql_num_rows($result)){ 

		$bgcolor="#cccccc";
		  while ($row = mysql_fetch_array($result)) { 
		if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
		  echo'<tr>
					  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong>'.$row['fecha'].'</td><td align=right><b>'.$row['usuario'].'</b></td></tr></table></td>
					</tr>
					<tr>
					  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.$row['comentario'].'</td>
					  </tr>';
		  }  
		}
		  echo paginar($pag, $total, $tampag, "mainframe.php?module=pagos&quest=$quest&sort=$sort&show=$show&pag=");
		?>
		</table></div>
	</td>
</tr>
</table>