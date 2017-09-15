<?
$checa_arrayx=array_search("pagos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<span class="maintitle">Alta de pago al Expediente <a href="detalle_seguimiento.php?id=<?=$expediente?>" target="_blank"><?=$expediente?></a></span>
<form method="post" action="control_pago_db.php?action=alta">
<input type="hidden" name="expediente" value="<?=$_GET['expediente']?>">
<input type="hidden" name="proveedor" value="<?=$_GET['proveedor']?>">
<table width="100%" border="0" class="mainTable" cellspacing="3" cellpadding="3">
<tr> 
	<th>Fecha de Corte</th>
	<td style="text-align:left">
		<select name="fecha_corte_dia">
		<? for($i=1;$i<=31;$i++): ?>
			<option value="<?=$i?>" <?=($i==date("d")?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_corte_mes">
		<? for($i=1;$i<=12;$i++): ?>
			<option value="<?=$i?>" <?=($i==date("m")?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_corte_anio">
		<? for($i=date("Y")-2;$i<=date("Y")+5;$i++): ?>
			<option value="<?=$i?>" <?=($i==date("Y")?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
	</td>
</tr>
<tr>	
	<th>Concepto</th><td style="text-align:left"><input type="text" name="conceptor" size="40"></td>
</tr>
<tr>
	<th>Monto</th><td style="text-align:left"><input type="text" name="monto" size="4"></td>				  
</tr>
<tr>
	<th>Status</th>
	<td style="text-align:left">
		<input type="radio" name="status" id="pagado" value="1" /> <label for="pagado">Pagado</label><br />
		<input type="radio" name="status" id="no-pagado" value="0" /> <label for="no-pagado">No Pagado</label>
	</td>
</tr>
<tr>
	<th>Fecha de Pago</th>
	<td style="text-align:left">
		<select name="fecha_pago_dia">
		<? for($i=1;$i<=31;$i++): ?>
			<option value="<?=$i?>" <?=($i==date("d")?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_pago_mes">
		<? for($i=1;$i<=12;$i++): ?>
			<option value="<?=$i?>" <?=($i==date("m")?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
		/
		<select name="fecha_pago_anio">
		<? for($i=date("Y")-2;$i<=date("Y")+5;$i++): ?>
			<option value="<?=$i?>" <?=($i==date("Y")?"selected='selected'":"")?>><?=$i?></option>
		<? endfor; ?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Enviar" /></td>
</tr>
</table>