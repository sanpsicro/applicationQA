<?
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
include 'conf.php';

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from general where id = '$idcaso'",$db);
$clave=mysql_result($result,0,"contrato");
$servicio=mysql_result($result,0,"servicio");
$estado=mysql_result($result,0,"ubicacion_estado");
$municipio=mysql_result($result,0,"ubicacion_municipio");

$dbl = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbl);
$resultl = mysql_query("SELECT * from Empleado where idEmpleado='$valid_userid'",$dbl);
$extension=mysql_result($resultl,0,"extension");
?>
<html><head>
<link href="style_1.css" rel="stylesheet" type="text/css" />
<script src="confirm_asignacion.js" type="text/javascript"></script> 
<script type="text/javascript">
function getposOffset(overlay, offsettype){
var totaloffset=(offsettype=="left")? overlay.offsetLeft : overlay.offsetTop;
var parentEl=overlay.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}
function overlay(curobj, subobj){
if (document.getElementById){
var subobj=document.getElementById(subobj)
subobj.style.left=getposOffset(curobj, "left")+"px"
subobj.style.top=getposOffset(curobj, "top")+"px"
subobj.style.display="block"
return false
}
else
return true
}
function overlayclose(subobj){
document.getElementById(subobj).style.display="none"
}
</script>
</head><body>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="6" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><strong>Proveedores en la localidad </strong></td>
        <td width="300" align="center" class="blacklinks"><a href="asigna_proveedor.php?idcaso=<? echo $idcaso; ?>&display=allstate">Proveedores en el Estado</a> | <a href="asigna_proveedor.php?idcaso=<? echo $idcaso; ?>&display=all">Todos los Proveedores</a></td>
      </tr>
    </table></td>
  </tr>
   <?
if($display=="allstate"){$condicion="where (cobertura like '$estado-%' or cobertura like '%,$estado-%') and (trabajos like '%,$servicio,%' or trabajos='$servicio' or trabajos like '$servicio,%' or trabajos like '%,$servicio')";
$arreglo="nombre";
}
   
elseif($display=="all"){$condicion="where (trabajos like '%,$servicio,%' or trabajos='$servicio' or trabajos like '$servicio,%' or trabajos like '%,$servicio')";
$arreglo="nombre";
}

else{
	

	
	$condicion="where (cobertura like '$estado-$municipio-_' or cobertura like '$estado-$municipio-_,%' or cobertura like '%,$estado-$municipio-_,%' or cobertura like '%,$estado-$municipio-_') and (trabajos like '%,$servicio,%' or trabajos='$servicio' or trabajos like '$servicio,%' or trabajos like '%,$servicio')";

$arreglo="
CASE 
WHEN cobertura LIKE '%$estado-$municipio-A%' THEN 1
WHEN cobertura LIKE '%$estado-$municipio-B%' THEN 2
WHEN cobertura LIKE '%$estado-$municipio-C%' THEN 3
WHEN cobertura LIKE '%$estado-$municipio-D%' THEN 4
WHEN cobertura LIKE '%$estado-$municipio-E%' THEN 5
WHEN cobertura LIKE '%$estado-$municipio-F%' THEN 6
WHEN cobertura LIKE '%$estado-$municipio-G%' THEN 7
WHEN cobertura LIKE '%$estado-$municipio-H%' THEN 8
WHEN cobertura LIKE '%$estado-$municipio-I%' THEN 9
WHEN cobertura LIKE '%$estado-$municipio-J%' THEN 10
WHEN cobertura LIKE '%$estado-$municipio-K%' THEN 11
WHEN cobertura LIKE '%$estado-$municipio-L%' THEN 12
WHEN cobertura LIKE '%$estado-$municipio-M%' THEN 13
WHEN cobertura LIKE '%$estado-$municipio-N%' THEN 14
WHEN cobertura LIKE '%$estado-$municipio-O%' THEN 15
WHEN cobertura LIKE '%$estado-$municipio-P%' THEN 16
WHEN cobertura LIKE '%$estado-$municipio-Q%' THEN 17
WHEN cobertura LIKE '%$estado-$municipio-R%' THEN 18
WHEN cobertura LIKE '%$estado-$municipio-S%' THEN 19
WHEN cobertura LIKE '%$estado-$municipio-T%' THEN 20
WHEN cobertura LIKE '%$estado-$municipio-U%' THEN 21
WHEN cobertura LIKE '%$estado-$municipio-V%' THEN 22
WHEN cobertura LIKE '%$estado-$municipio-W%' THEN 23
WHEN cobertura LIKE '%$estado-$municipio-X%' THEN 24
WHEN cobertura LIKE '%$estado-$municipio-Y%' THEN 25
WHEN cobertura LIKE '%$estado-$municipio-Z%' THEN 26
END


";
	}

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Provedor $condicion AND status='activo' order by $arreglo", $link); 
if (mysql_num_rows($result)){ 
echo' <tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Proveedor</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Contacto</strong></td>		
    <td align="center" bgcolor="#bbbbbb"><strong>Cobertura</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Especialidad</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Servicios</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Asignar</strong></td>
  </tr>';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
/*
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Estado where idEstado = '$estado'",$db);
$nombre_estado=mysql_result($result,0,"NombreEstado");

if($display==!"all"){
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db);
$nombre_municipio=mysql_result($result,0,"NombreMunicipio");
}
*/
$services=explode(",",$row["trabajos"]);

$tel1 = $row["tel"];
$telcall1 = preg_replace('/[^0-9]/', '', $tel1);
$tel2 = $row["cel"];
$telcall2 = preg_replace('/[^0-9]/', '', $tel2);
$tel3 = $row["nextel"];
$telcall3 = preg_replace('/[^0-9]/', '', $tel3);
$tel4 = $row["tel2"];
$telcall4 = preg_replace('/[^0-9]/ ', '', $tel4);
$tel5 = $row["cel2"];
$telcall5 = preg_replace('/[^0-9]/', '', $tel5);
$tel6 = $row["nextel2"];
$telcall6 = preg_replace('/[^0-9]/', '', $tel6);

  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass">'.$row["nombre"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="#" onClick="return overlay(this, \'subcontent'.$row["id"].'\')">Contacto</a>

<DIV id="subcontent'.$row["id"].'" style="position:absolute; display:none; border: 1px solid black; background-color: #eeeeee; width: 400px; height: padding: 5px">
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td width=30%><b>Datos de contacto</b></td><td width=70% align=right><a href="#" onClick="overlayclose(\'subcontent'.$row["id"].'\'); return false"><b>Cerrar [X]</b></a></td></tr>
<tr><td colspan=2 bgcolor="#bbbbbb" style="font-size:11px;"><b>'.$row["nombre"].'</b></td></tr>
<tr>
<td bgcolor="#cccccc" style="font-size:11px;"><b>Horario:</b></td>
<td bgcolor="#cccccc" style="font-size:11px;">'.$row["horario"].'</td>
</tr>
<tr>
<td bgcolor="#cccccc" style="font-size:11px;"><b>Precios:</b></td>
<td bgcolor="#cccccc" style="font-size:11px;">'.nl2br($row["precios"]).'</td>
</tr>
<tr>
<td bgcolor="#cccccc" style="font-size:11px;" colspan=2><b>Contacto:</b> '.$row["contacto"].'<br>
<b>tel&eacute;fono:</b> <a href="ctc.php?tel='.$telcall1.'&extension='.$extension.'" target="ctc">'.$row["tel"].'</a><br>
<b>Fax:</b> '.$row["fax"].'<br>
<b>Celular:</b> <a href="ctc.php?tel='.$telcall2.'&extension='.$extension.'" target="ctc">'.$row["cel"].'</a><br>
<b>Nextel:</b> '.$row["nextel"].'<br>
<b>Email:</b> <a href="mailto:'.$row["mail"].'">'.$row["mail"].'</a>
</td>
</tr>

<tr>
<td bgcolor="#cccccc" style="font-size:11px;" colspan=2><b>Contacto2:</b> '.$row["contacto2"].'<br>
<b>tel&eacute;fono:</b> <a href="ctc.php?tel='.$telcall4.'&extension='.$extension.'" target="ctc">'.$row["tel2"].'</a><br>
<b>Fax:</b> '.$row["fax2"].'<br>
<b>Celular:</b> <a href="ctc.php?tel='.$telcall5.'&extension='.$extension.'" target="ctc">'.$row["cel2"].'</a><br>
<b>Nextel:</b> '.$row["nextel2"].'<br>
<b>Email:</b> <a href="mailto:'.$row["mail2"].'">'.$row["mail2"].'</a>
</td>
</tr>
</table>
</DIV>
<iframe height="0" width="0" style="visibility:hidden;display:none" src="ctc.php" name="ctc" id="ctc"></iframe> 

</td>


<td bgcolor="'.$bgcolor.'" class="dataclass">';

echo '<a href="#" onClick="return overlay(this, \'cobertura'.$row["id"].'\')">Cobertura</a>';
echo '<DIV id="cobertura'.$row["id"].'" style="position:absolute; display:none; border: 1px solid black; background-color: #eeeeee; width: 400px; height: padding: 5px">
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td width=30%><b>Cobertura</b></td><td width=70% align=right><a href="#" onClick="overlayclose(\'cobertura'.$row["id"].'\'); return false"><b>Cerrar [X]</b></a></td></tr>
<tr><td colspan=2 bgcolor="#bbbbbb" style="font-size:11px;">';
$areas_cobertura=explode(",",$row["cobertura"]);
sort($areas_cobertura);
foreach($areas_cobertura as $mikarea){
if($mikarea!="" && $mikarea!=" "){
$apart=explode("-",$mikarea);
$dbdou = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbdou);
$resultdou = mysql_query("SELECT * from Estado where idEstado = '$apart[0]'",$dbdou);
$xexestado=mysql_result($resultdou,0,"NombreEstado");
$resultdou = mysql_query("SELECT * from Municipio where idMunicipio = '$apart[1]'",$dbdou);
$xexmunicipio=mysql_result($resultdou,0,"NombreMunicipio");
if($mikarea=="".$estado."-".$municipio."-".$apart[2].""){echo'<li><b>'.$xexestado.' - '.$xexmunicipio.' ( '.$apart[2].')</b><br>';
$arregloa=$apart[2];
}
else{echo'<li>'.$xexestado.' - '.$xexmunicipio.' ('.$apart[2].') <br>';}

}
}

echo '</td>
</tr>
</table>
</DIV>';


echo'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["especialidad"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass">';

echo '<a href="#" onClick="return overlay(this, \'servicios'.$row["id"].'\')">Servicios</a>';
echo '<DIV id="servicios'.$row["id"].'" style="position:absolute; display:none; border: 1px solid black; background-color: #eeeeee; width: 400px; height: padding: 5px">
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td width=30%><b>Servicios</b></td><td width=70% align=right><a href="#" onClick="overlayclose(\'servicios'.$row["id"].'\'); return false"><b>Cerrar [X]</b></a></td></tr>
<tr><td colspan=2 bgcolor="#bbbbbb" style="font-size:11px;">';

foreach($services as $servo){
$dbx = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbx);
$resultx = mysql_query("SELECT * from servicios where id = '$servo'",$dbx);
$servox=mysql_result($resultx,0,"servicio");
if($servo==$servicio){echo'<li><b>'.$servox.'</b>';}
else{echo'<li>'.$servox.'';}
}
echo '</td>
</tr>
</table>
</DIV>';

echo'</td><td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>
<a href="javascript:confirmAssign(\'proveedor_asignado.php?id_proveedor='.$row["id"].'&clave='.$clave.'&idcaso='.$idcaso.'\',\'al proveedor '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Asignar</a>
</td></tr>
';


   }

   echo'</table>';

   }
   
   
   else{
   
   
echo'<tr><td height=50><center><b>No se encontraron proveedores en la localidad donde se requiere el servicio<br><a href="asigna_proveedor.php?idcaso='.$idcaso.'&display=allstate">Ver todos los proveedores del servicio en el Estado</a><br><a href="asigna_proveedor.php?idcaso='.$idcaso.'&display=all">Ver todos los proveedores del servicio</a></b></center></tr></td></table>';
   }

   

   ?>
 </body></html>

