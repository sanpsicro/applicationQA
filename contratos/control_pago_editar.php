<?
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$query="SELECT  p.fecha_corte, 
				p.id, 
				p.expediente, 
				p.proveedor, 
				p.conceptor, 
				p.monto, 
				p.status,
				p.cerrado,
				p.fecha_pago
				FROM pagos p 
				WHERE p.id='$id'";
$result = mysql_query($query, $link) or die (mysql_error()); 
extract(mysql_fetch_array($result));
list($corte_anio,$corte_mes,$corte_dia)=explode("-",$fecha_corte);
list($pago_anio,$pago_mes,$pago_dia)=explode("-",$fecha_pago);
if($cerrado == '1'){
	$disabled = 'disabled="disabled"';
}
?>
<span class="maintitle">Alta de pago al Expediente <a href="detalle_seguimiento.php?id=<?=$expediente?>" target="_blank"><?=$expediente?></a></span>
<form method="post" action="control_pago_db.php?action=editar">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="expediente" value="<?=$expediente?>">
<input type="hidden" name="proveedor" value="<?=$proveedor?>">
<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">

<? if($cerrado == '0'): ?>
<tr> 
	<th>Fecha de Corte</th>
	<td style="text-align:left">
		<select name="fecha_corte_dia">
		<? for($i=1;$i<=31;$i++): ?>
			<option value="<?=$i?>" <?=($i==$corte_dia?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_corte_mes">
		<? for($i=1;$i<=12;$i++): ?>
			<option value="<?=$i?>" <?=($i==$corte_mes?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_corte_anio">
		<? for($i=date("Y")-2;$i<=date("Y")+5;$i++): ?>
			<option value="<?=$i?>" <?=($i==$corte_anio?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
	</td>
</tr>
<tr>	
	<th>Concepto</th><td style="text-align:left"><input type="text" name="conceptor" value="<?=$conceptor?>" size="40"></td>
</tr>
<tr>
	<th>Monto</th><td style="text-align:left"><input type="text" name="monto" value="<?=$monto?>" size="4"></td>				  
</tr>
<? else: ?>

<tr> 
	<th>Fecha de Corte</th>
	<td style="text-align:left">
		<? echo "$corte_dia/$corte_mes/$corte_anio"; ?>
		<input type="hidden" name="fecha_corte_dia" value="<?=$corte_dia?>">
		<input type="hidden" name="fecha_corte_mes" value="<?=$corte_mes?>">
		<input type="hidden" name="fecha_corte_anio" value="<?=$corte_anio?>">
	</td>
</tr>
<tr>	
	<th>Concepto</th><td style="text-align:left"><?=$conceptor?><input type="hidden" name="conceptor" value="<?=$conceptor?>" size="40"></td>
</tr>
<tr>
	<th>Monto</th><td style="text-align:left"><?=$monto?><input type="hidden" name="monto" value="<?=$monto?>" size="4"></td>				  
</tr>

<? endif;?>
<tr>
	<th>Status</th>
	<td style="text-align:left">
		<input type="radio"  name="status" id="pagado" value="1" <?=($status=="1"?"checked='checked'":"")?> /> <label for="pagado">Pagado</label><br />
		<input type="radio" name="status" id="no-pagado" value="0"  <?=($status=="0"?"checked='checked'":"")?> /> <label for="no-pagado">No Pagado</label>
	</td>
</tr>
<tr>
	<th>Fecha de Pago</th>
	<td style="text-align:left">
		<select name="fecha_pago_dia">
		<? for($i=1;$i<=31;$i++): ?>
			<option value="<?=$i?>" <?=($i==$pago_dia?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_pago_mes">
		<? for($i=1;$i<=12;$i++): ?>
			<option value="<?=$i?>" <?=($i==$pago_mes?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_pago_anio">
		<? for($i=date("Y")-2;$i<=date("Y")+5;$i++): ?>
			<option value="<?=$i?>" <?=($i==$pago_anio?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Enviar" /></td>
</tr>
</table>
</form>